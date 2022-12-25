<?php

namespace App\Http\Controllers\Api;

use App\Enums\ActionEnums;
use App\Enums\PaymentGateways;
use App\Enums\SiteSettings;
use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\PaymentGatewayModel;
use App\Models\SansoWalletModel;
use App\Models\ServiceModel;
use App\Models\SiteSetttingModel;
use App\Models\TransactionModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;
use Stripe;

class BookingController extends Controller
{
    protected $res, $status = 200;

    function __construct()
    {
        $this->res = new stdClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)

    {

        if (Auth::user()->type == 'coach') {
            $bookings = BookingModel::where('coach_id', Auth::id())
                ->whereDate('created_at', $req->input('date'))
                ->orderBy('created_at', 'desc')
                ->get();

            $data = array();
            foreach ($bookings as $book) {

                $book->coachee = $book->getCoachee();
                $book->service = $book->getService();
                $book->transaction = $book->getTransaction();
                array_push($data, $book);
            }
            return $data;
        } else {

            $bookings = BookingModel::where('coachee_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->whereDate('created_at', $req->input('date'))
                ->get();

            $data = array();
            foreach ($bookings as $book) {

                $book->coachee = $book->getCoachee();
                $book->service = $book->getService();
                $book->coach = $book->getCoach();
                $book->transaction = $book->getTransaction();
                array_push($data, $book);
            }

            return $data;
        }
    }

    public function changeStatus(Request $req)
    {
        try {
            if (Auth::user()->type == 'coach') {
                BookingModel::where('id', $req->input('booking_id'))
                    ->where('coach_id', Auth::id())
                    ->update([
                        'status' => $req->input('status')
                    ]);
                if ($req->status == 4) {
                    $booking = BookingModel::find($req->input('booking_id'));

                    $price = DB::table('transactions')->select(DB::raw('amount-(amount*(servceFees/100)) as price'))->where('id', $booking->transaction_id)->get()->first();

                    $wallet = SansoWalletModel::where('user_id', Auth::id())->get()->first();

                    SansoWalletModel::where('id', $wallet->id)
                        ->update(['balance' => $wallet->balance + $price->price]);
                }
            } else {
                BookingModel::where('id', $req->input('booking_id'))
                    ->where('coachee_id', Auth::id())
                    ->update([
                        'status' => $req->input('status')
                    ]);
            }
            $this->res->message = 'Booking status changed!';
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        try {
            //make a booking
            $this->validate($request, [
                'card_number' => "required",
                'card_holder' => 'required|string',
                'card_expiry' => "required",
                'card_cvc' => 'required|numeric',
                'service_id' => "required|numeric"
            ], [
                'No card number provided!',
                'No card holder name provided!',
                'Expiry date is missing',
                'CVC number is missing',
                "No coaching service specified!",
            ]);

            //get service first
            $service = ServiceModel::find($request->service_id);
            $wallet = SansoWalletModel::where('user_id', $service->user_id)->first();
            //TODO: charge amount for the service.
            //make transaction

            $stripe = new \Stripe\StripeClient('sk_test_51JCiBhBEJyVxZuHvy7nISzbYKYTYJvF72YeNdMP0nj3B3ZjqEFKdP7bWakt75Np1QdL6sOWp0beg6xfHJ0NyeFdD00LxSjgXa3');
            $card_expiry = explode('/',$request->post('card_expiry'));
            $month = $card_expiry[0];
            $year = $card_expiry[1];
            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $request->post('card_number'),
                    'exp_month' => $month,
                    'exp_year' => $year,
                    'cvc' => $request->post('card_cvc'),
                ],
            ]);

            $charge = $stripe->charges->create([
                'card' => $token['id'],
                'currency' => 'USD',
                'amount' => $service->service_charges * 100,
                'description' => 'wallet',
            ]);

            $tx = uniqid();
            $txid = TransactionModel::create([
                'description' => "<a href='/user/" . Auth::id() . "'>" . Auth::user()->name . "</a> booked " . $service->service_title,
                'txid' => $tx,
                'amount' => $service->service_charges,
                'servceFees' => SiteSetttingModel::where('key', 'Service Fee')->get()->first()->value,
                'status' => 1,
                'payment_gateway_id' => PaymentGatewayModel::where('gateway', 'Credit/Debit Card')->first()->id,
                'sanso_wallet_id' => $wallet != null ? $wallet->id : 0
            ]);

            BookingModel::create([
                'status' => 0,
                'coachee_id' => Auth::id(),
                'coach_id' => $service->user_id,
                'transaction_id' => $txid->id,
                'coach_service_id' => $service->id
            ]);

            //notify coach
            $coachee = User::find(Auth::id());
            $not = new NotificationController();
            $not->notify([
                'title' => $coachee->name . " made booking",
                'body' => "Your service '" . $service->service_title . "' got a new coachee.",
                'send_to' => $service->user_id,
                'send_from' => Auth::id(),
                'status'  => "unread"
            ]);
            $objCoach = User::find($service->user_id);
            $notForAdmin = new NotificationController();
            $notForAdmin->notify([
                'title' => $coachee->name . " booked " . $objCoach->name . " for " . $service->service_title . " service",
                'body' => $coachee->name . " booked " . $objCoach->name . " for " . $service->service_title . " service",
                'send_to' => 1,
                'send_from' => Auth::id(),
                'status'  => "delivered"
            ]);
            $this->res->notified = 'done';
            $this->res->message = "Payment has been sent successfully. You booked " . $service->service_title . " from " . $service->user()->name . " Successfully";
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, $id)
    {
        $bookings = BookingModel::where('coach_id', $id)
            ->whereDate('created_at', 'like', '%' . $req->input('date') . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = array();
        foreach ($bookings as $book) {

            $book->coachee = $book->getCoachee();
            $book->service = $book->getService();
            $book->transaction = $book->getTransaction();
            array_push($data, $book);
        }
        return $bookings;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'wow';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\TransactionModel;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe;

class BookingController extends Controller
{

    public function storebooking()
    {

        $stripe = new \Stripe\StripeClient('sk_test_51JCiBhBEJyVxZuHvy7nISzbYKYTYJvF72YeNdMP0nj3B3ZjqEFKdP7bWakt75Np1QdL6sOWp0beg6xfHJ0NyeFdD00LxSjgXa3');
        $token = $stripe->tokens->create([
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 12,
                'exp_year' => 2023,
                'cvc' => '314',
            ],
        ]);

        $charge = $stripe->charges->create([
            'card' => $token['id'],
            'currency' => 'USD',
            'amount' => 5000,
            'description' => 'wallet',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //      $data = Booking::with(['users' , 'coach_service']);
        // $data = DB::table('bookings')
        //     ->join('users', 'bookings.coachee_id', '=', 'users.id')
        //     ->join('coach_service', 'bookings.coach_service_id', '=', 'coach_service.id')
        //     ->select('bookings.*', 'users.name as coachee_user', 'coach_service.service_title as service_title')
        //     ->get();

        // $data = Booking::join('users', 'bookings.coachee_id', '=', 'users.id')
        // ->join('coach_service', 'bookings.coach_service_id', '=', 'coach_service.id')
        // ->select('bookings.*', 'users.name as coachee_user', 'coach_service.service_title as service_title')
        // ->get();

        // dd($coach= User::where('id',1)->first());
        $bookf = BookingModel::all();
        //   dd($book);
        $data = array();
        foreach ($bookf as $booking) {
            //       dd($booking->id);

            $booking->book = BookingModel::all();
            $booking->service = DB::table('coach_service')->where('id', $booking->coach_service_id)->value('service_title');

            $booking->transaction = TransactionModel::where('id', $booking->transaction_id)->get();
            $booking->coachee = User::where('id', $booking->coachee_id)->first();
            $booking->coach = User::where('id', $booking->coach_id)->get();
            array_push($data);

            $data[] = [
                'book' => BookingModel::all(),
                'service' => DB::table('coach_service')->where('id', $booking->coach_service_id)->value('service_title'),
                'transaction' => TransactionModel::where('id', $booking->transaction_id)->first(),
                'coachee' => User::where('id', $booking->coachee_id)->first(),
                'coach' => User::where('id', $booking->coach_id)->first(),
                'booking_status' => $booking->status,
            ];
        }
//$data=$booking;
//dd($data[0]['book']->status);
        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()->addColumn('status', function ($row) {
                return isset($row['booking_status']) ? $row['booking_status'] : "";
            })
                ->addColumn('coach_id', function ($row) {
                    return isset($row['coach']->email) ? $row['coach']->email : "";
                })->addColumn('coachee_id', function ($row) {
                return isset($row['coachee']->email) ? $row['coachee']->email : "";
            })->addColumn('coach_service_id', function ($row) {
                return isset($row['service']) ? $row['service'] : "";
            })->addColumn('transaction_id', function ($row) {
                return isset($row['transaction']->txid) ? $row['transaction']->txid : "";
            })->addColumn('created_at', function ($row) {
                return isset($row['transaction']->created_at) ? $row['transaction']->created_at : "";
            })->addColumn('action', function ($row) {

            })->rawColumns(['action', 'status'])->make(true);
        }
        $data = BookingModel::OrderBy('id', 'asc')->get();

        $data = ['page_title' => 'Booking List', 'booking' => $data];
        return view('admin.booking.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}

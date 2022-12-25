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
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class BookingController extends Controller
{
    protected $res, $status=200;

    function __construct()
    {
        $this->res = new stdClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $this->validate($request,[
                'card_number'=>"required",
                'card_holder'=>'required|string',
                'card_expiry'=>"required",
                'card_cvc'=>'required|numeric',
                'service_id'=>"required|numeric"
            ],[
                'No card number provided!',
                'No card holder name provided!',
                'Expiry date is missing',
                'CVC number is missing',
                "No coaching service specified!",
            ]);

            //get service first
            $service=ServiceModel::find($request->service_id);
            $wallet=SansoWalletModel::where('user_id',$service->user_id)->first();
            //TODO: charge amount for the service.
            //make transaction
            $this->res->action=ActionEnums::Approved;
            $tx=uniqid();
           $txid=TransactionModel::create([
                'description'=>"<a href='/user/".Auth::id()."'>".Auth::user()->name."</a> booked ".$service->service_title,
                'txid'=>$tx,
                'amount'=>$service->service_charges,
                'servceFees'=>SiteSetttingModel::where('key',SiteSettings::ServiceFee)->get()->first()->value,
                'status'=>1,
                'payment_gateway_id'=>PaymentGatewayModel::where('gateway',PaymentGateways::Card)->first()->id,
                'sanso_wallet_id'=>$wallet!=null ? $wallet->id:0
            ]);
            
            BookingModel::create([
                'status'=>0,
                'coachee_id'=>Auth::id(),
                'coach_id'=>$service->user_id,
                'transaction_id'=>$txid->id,
                'coach_service_id'=>$service->id
            ]);
            $this->res->message="Payment has been sent successfully. You booked ".$service->service_title. " from ".$service->user()->name." Successfully";

        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status=500;
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
    public function show($id)
    {
        //
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
        //
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

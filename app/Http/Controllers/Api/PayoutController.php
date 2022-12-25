<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentGatewayModel;
use App\Models\PayoutModel;
use App\Models\SansoWalletModel;
use App\Models\SiteSetttingModel;
use App\Models\TransactionModel;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class PayoutController extends Controller
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
        if ($req->input('status')) {
            return PayoutModel::whereEncrypted('status', $req->status)
                ->where('sanso_wallet_id', $req->wallet_id)
                ->get();
        } else {
            return PayoutModel::latest()
                ->where('sanso_wallet_id', $req->wallet_id)
                ->get();
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
      exit;
      	
        try {
            $this->validate($request, [
                'card_id' => "required",
                'sanso_wallet_id' => 'required',
                'amount' => 'required|numeric'
            ]);
            //make trasaction sub negative amount
            $tx = uniqid();
            $txid = TransactionModel::create([
                'description' => "<a href='/user/" . Auth::id() . "'>" . Auth::user()->name . "</a> made a payout request",
                'txid' => $tx,
                'amount' => -(double)$request->amount,
                'servceFees' => SiteSetttingModel::where('key', 'Service Fee')->get()->first()->value,
                'status' => 1,
                'payment_gateway_id' => PaymentGatewayModel::where('gateway', 'Credit/Debit Card')->first()->id,
                'sanso_wallet_id' => $request->sanso_wallet_id
            ]);

            //subtract the amount from the wallet
            $wallet=SansoWalletModel::find($request->sanso_wallet_id);
            SansoWalletModel::where('id',$wallet->id)
            ->update([
                'balance'=>($wallet->balance-$request->amount)
            ]);
          PayoutModel::create([
                'transaction_id'=>$txid->id,
                'card_id'=>$request->card_id,
                'sanso_wallet_id'=>$wallet->id,
            ]);

            $this->res->message = 'Payout request added! You will be notified furhter!';
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
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

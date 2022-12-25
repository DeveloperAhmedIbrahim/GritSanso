<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionModel;
use App\Models\WebSetting;

use Illuminate\Http\Request;
use DataTables;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $site = WebSetting::OrderBy('id' , 'asc')->get();
        $data= TransactionModel::join('sanso_wallets', 'transactions.sanso_wallet_id', '=', 'sanso_wallets.id')
        ->join('payment_gateways', 'payment_gateways.id', '=', 'transactions.payment_gateway_id')
        ->join('web_settings','web_settings.id', '=','web_settings.id')
       ->select('transactions.*', 'web_settings.CurrencySign as wc','sanso_wallets.email','sanso_wallets.wallet_status','payment_gateways.gateway')
        ->orderBy('id', 'desc')
        ->get();

       // dd($data);
        if ($request->ajax()) {
          
   
            $data= TransactionModel::join('sanso_wallets', 'transactions.sanso_wallet_id', '=', 'sanso_wallets.id')
            ->join('payment_gateways', 'payment_gateways.id', '=', 'transactions.payment_gateway_id')
            ->join('web_settings','web_settings.id', '=','web_settings.id')
           ->select('transactions.*', 'web_settings.CurrencySign as wc','sanso_wallets.email','sanso_wallets.wallet_status','payment_gateways.gateway')
            ->orderBy('id', 'desc')
            ->get();
    

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
            return isset($row->id) ? $row->id : "";})
            ->addColumn('description', function ($row) {
                return isset($row->description) ?  strip_tags($row->description) : "";})
                ->addColumn('txid', function ($row) {
                    return isset($row->txid) ? $row->txid : "";})
                    ->addColumn('amount', function ($row) {
                        return isset($row->amount) ? $row->wc . $row->amount  : "";})
                        ->addColumn('servceFees', function ($row) {
                            return isset($row->servceFees) ? $row->servceFees : "";})
                            ->addColumn('payment_gateway_id', function ($row) {
                                return $row->gateway; })
                                ->addColumn('sanso_wallet_id', function ($row) {
                                    return isset($row->email) ? $row->email : "";})
                                    ->addColumn('final_amount', function ($row) {
                                        return isset($row->amount) ? $row->wc  .($row->amount-$row->servceFees) : "$row->wc . ($row->amount-$row->servceFees)";})
                                        ->addColumn('status', function ($row) {
                        return isset($row->status) ? $row->status : "";})
            ->addColumn('status', function ($row) {
             return ($row->status == 1) ? "Active" : "Deactive";
            })->addColumn('created_at', function ($row) {
                return (isset($row->created_at)) ? date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
               })->addColumn('action', function ($row) {
        
                   $btn = '';

              
                return $btn;
            })->rawColumns(['action'])->make(true);
               
        }

        $transaction= TransactionModel::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Transaction - Transaction ' , 'transaction' => $transaction];
        return view('admin.transaction.index' , $data);
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show( $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy( $transaction)
    {
        //
    }
}

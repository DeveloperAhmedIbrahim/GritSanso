<?php

namespace App\Http\Controllers;
use App\Models\Education;
use App\Models\PayoutModel;

use App\Models\SansoWalletModel;
use App\Models\user_notifications;
use App\Models\TransactionModel as Transaction;
use Illuminate\Http\Request;
use DataTables;

class DepositeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data= Transaction::join('sanso_wallets', 'transactions.sanso_wallet_id', '=', 'sanso_wallets.id')
        ->select('transactions.*', 'sanso_wallets.email','sanso_wallets.wallet_status')
        ->orderBy('id', 'desc')
        ->get();

            if ($request->ajax()) {
          
                $data = Transaction::OrderBy('id' , 'asc')->get();
                $data= Transaction::join('sanso_wallets', 'transactions.sanso_wallet_id', '=', 'sanso_wallets.id')
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
                    return isset($row->description) ? strip_tags($row->description) : "";})
                    ->addColumn('txid', function ($row) {
                        return isset($row->txid) ? $row->txid : "";})
                        ->addColumn('amount', function ($row) {
                            return isset($row->amount) ?  $row->wc . $row->amount : "";})
                            ->addColumn('servceFees', function ($row) {
                                return isset($row->servceFees) ?  $row->wc . $row->servceFees : "";})
                                ->addColumn('payment_gateway_id', function ($row) {
                                    return isset($row->gateway) ? $row->gateway : "";})
                                    ->addColumn('sanso_wallet_id', function ($row) {
                                        return isset($row->email) ? $row->email : "";})->addColumn('status', function ($row) {
                            return isset($row->status) ? $row->status : "";})
                ->addColumn('status', function ($row) {
                 return ($row->status == 1) ? "Active" : "Deactive";
                })->addColumn('created_at', function ($row) {
                    return (isset($row->created_at)) ? date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
                   })->addColumn('action', function ($row) {
               
                   
                    if($row->status == 'Active'){
                
                      $btn = '<a href="javascript:void(0)" class="statuss" data-status="'.$row->status.'" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check text-success"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></a>';
                     }  else
             {
              $btn = '<a href="javascript:void(0)" class="statuss" data-status="'.$row->status.'"  data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x text-danger"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg></a>';


             }
             
           
             return $btn;
                })->rawColumns(['action'])->make(true);
                   
                }
        $deposite=Transaction::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'deposite List' , 'deposite' => $deposite];
        return view('admin.deposite.index' , $data);
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
     * @param  \App\Models\Deposite  $deposite
     * @return \Illuminate\Http\Response
     */
    public function show(Deposite $deposite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposite  $deposite
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposite $deposite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposite  $deposite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposite $deposite)
    {
        //
        $id=$request->id;
      
        Deposite::where('id', $id)->update([
           'status' =>$request->status
        ]);
    

        
    }


       public function deposite_status($id , Request $request)
       {
          $payment_gateways=Transaction::find($id);
          
   
          if(!empty($payment_gateways)){
           
            if($payment_gateways->status = 1){
   
               $payment_gateways->status = 0;
               $payment_gateways->update();
                $sanso_wallets=SansoWalletModel::find($payment_gateways->sanso_wallet_id);
                  
             $note=user_notifications::create([

               'title'       => 'Deposite Deactive Successfully',

               'body' => 'Deposite Deactive Successfully',
               'send_to'   =>$sanso_wallets->user_id,
               'send_from_admin'   => '1',


             ]);

               
               return redirect(url('/deposite'))->with('success' , 'Deposite Deactive Successfully');
              
                   
             
            }
   
            else
             {
               $payment_gateways->status = 1;
                
               $payment_gateways->update();
   
                         
            $note=user_notifications::create([

               'title'       =>  'Deposite Deactive Successfully',

               'body' => 'Deposite Deactive Successfully',
               'send_to'   =>$sanso_wallets->user_id,
               'send_from_admin'   => '1',


             ]);

   
               return redirect(url('/deposite'))->with('success' , 'Deposite Active Successfully');
               
             }
          }
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposite  $deposite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposite $deposite)
    {
        //
    }
  
  public function payoutdate(request $request){
    
    PayoutModel::where('id', $request->id)->update(array('clearance' => $request->clearance));
	$payoutdata = PayoutModel::where('id', $request->id)->first();
    $users = SansoWalletModel::where('id', $payoutdata->sanso_wallet_id)->value('user_id');
  
    		 
               $payoutdata->status = "5";
               $payoutdata->update();
    
               $note=user_notifications::create([

               'title'       =>  'Your payout request has been processed you will receive your money at '. $request->clearance,
               'body' => 'Your payout request has been processed you will receive your money at' . $request->clearance,
               'send_to'   =>$users,
               'send_from_admin'   => '1',


             ]);
                   return redirect(url('/payout'))->with('success' , 'Your payout request has been processed');

 
  }
}

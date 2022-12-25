<?php

namespace App\Http\Controllers;

use App\Models\PayoutModel;
use App\Models\SansoWalletModel;

use App\Models\CardModel;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class PayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
              if ($request->ajax()) {
          
   
            $data= PayoutModel::All();
           
    

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
            return isset($row->id) ? $row->id : "";})
            ->addColumn('transaction_id', function ($row) {
                return isset($row->transaction_id) ?  strip_tags($row->transaction_id) : "";})
                ->addColumn('card_id', function ($row) {
                  $holder= CardModel::where('id',$row->card_id)->value('holder');
                    return isset($row->card_id) ? $holder : "";})
                    ->addColumn('sanso_wallet_id', function ($row) {
                       $sanso_email= SansoWalletModel::where('id',$row->sanso_wallet_id)->value('email');
                        return isset($row->sanso_wallet_id) ? $sanso_email  : "";})
                        ->addColumn('clearance', function ($row) {
                            return isset($row->clearance) ? $row->clearance 
   : "Pending"; })
                         
                ->addColumn('status', function ($row) {
                
                 return isset($row->status) ? $row->status  : "";
                  
                })->addColumn('created_at', function ($row) {
                    return (isset($row->created_at)) ? date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
                   })->addColumn('action', function ($row) {
               
                   
                    if($row->status == '1'){
                
                      $btn = '<a href="javascript:void(0)" class="statuss" data-status="'.$row->status.'" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check text-success"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></a>';
                         $btn .= '<a href="javascript:void(0)" class="clearence" data-status="'.$row->status.'" data-id="'.$row->id.'"> <i class="fa fa-calendar" aria-hidden="true"></i></a>';

                     }  else
             {
              $btn = '<a href="javascript:void(0)" class="statuss" data-status="'.$row->status.'"  data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x text-danger"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg></a>';
 
                      $btn .= '<a href="javascript:void(0)" class="clearence" data-status="'.$row->status.'" data-id="'.$row->id.'"> <i class="fa fa-calendar" aria-hidden="true"></i></a>';


             }
             
           
             return $btn;
                })->rawColumns(['action'])->make(true);
                   
                }

        $payout= PayoutModel::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'payout - Payout ' , 'payout' => $payout];
        return view('admin.payout.index' , $data);
  
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
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function show(Payout $payout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function edit(Payout $payout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Payout $payout)
    {
        //
        $id=$request->id;
      
        PayoutModel::where('id', $id)->update([
           'status' =>$request->status
        ]);
    

        
    }


       public function payout_status($id , Request $request)
       {
          $payment_gateways=PayoutModel::find($id);
          
   
          if(!empty($payment_gateways)){
           
            if($payment_gateways->status > 0){
   
               $payment_gateways->status = 0;
               $payment_gateways->update();
               
               
               return redirect(url('/payout'))->with('success' , 'Payout Deactive Successfully');
              
                   
             
            }
   
            else
             {
               $payment_gateways->status = 1;
               $payment_gateways->update();
   
                
   
               return redirect(url('/payout'))->with('success' , 'Payout Active Successfully');
               
             }
          }
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposite  $deposite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payout $payout)
    {
        //
    }
  
  
  
}

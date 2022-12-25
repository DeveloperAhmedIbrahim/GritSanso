<?php

namespace App\Http\Controllers;

use App\Models\payment_gateways;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;

use DataTables;
class PaymentGatewaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment_gateways  $payment_gateways
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
              
          
            $data = payment_gateways::OrderBy('id' , 'asc')->get();

      
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('gateway', function ($row) {
             return isset($row->gateway) ? $row->gateway : '';
            })
            ->addColumn('gateway_type', function ($row) {
                return isset($row->gateway_type) ? $row->gateway_type : '';
               })
              
               ->addColumn('gateway_status', function ($row) {
                return ($row->gateway_status == 1) ? "Active" : "Deactive";
               })
             ->addColumn('created_at', function ($row) {
             return (isset($row->created_at)) ? date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
            })->addColumn('action', function ($row) {
               
                $btn = '<a href='.url('/paymentmethod/edit/'.$row->id).'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
               
                      if($row->gateway_status != 0){
                  
                        $btn .= '<a href="javascript:void(0)" class="account_status" data-status="'.$row->gateway_status.'" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check text-success"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></a>';
                       }  else
               {
                $btn .= '<a href="javascript:void(0)" class="account_status" data-status="'.$row->gateway_status.'"  data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x text-danger"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg></a>';


               }
               
             
                  

                    return $btn;
                })->rawColumns(['action'])->make(true);
        }

        $payment_gateway= payment_gateways::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'payment_gateways - payment_gateways App' , 'payment_gateway' => $payment_gateway];
        return view('admin.payment_gateway.index' , $data);
    }

    public function edit($id, payment_gateways $Paymentgateway)
    {
        $paymentgateway=payment_gateways::find($id);
       
      //  dd($paymentgateway);

        $data=['page_title' => 'Edit paymentgateway - Coachee' , 'paymentgateway' => $paymentgateway , 'id' => $id ];
        return view('admin.paymentmethod.edit' ,$data);
    }


    public function update($id,Request $request, payment_gateways $Paymentgateway)
    {
        
        $Paymentgateway::where('id', $id)->update([
                         'name' => $request->input('name'),
                         'status'=>$request->input('status'),
                         'channel_id' => $request->input('channel_id')
                         
                         ]
                        );
       
            $data=['page_title' => 'Paymentgateway - Paymentgateway App' , 'paymentgateway' => $Paymentgateway];
            return view('admin.paymentmethod.list' , $data);
    }
    


       
    public function show_account_status($id , Request $request)
    {
       $payment_gateways=payment_gateways::find($id);
       

       if(!empty($payment_gateways)){
        
         if($payment_gateways->gateway_status > 0){

            $payment_gateways->gateway_status = 0;
            $payment_gateways->update();
            
            
            return redirect(url('/paymentgateway'))->with('success' , 'Payment Gateways Deactive Successfully');
           
                
          
         }

         else
          {
            $payment_gateways->gateway_status = 1;
            $payment_gateways->update();

             

            return redirect(url('/paymentgateway'))->with('success' , 'Payment Gateways  Active Successfully');
            
          }
       }
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}

<?php

namespace App\Http\Controllers;

use App\Models\Paymentmethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
class PaymentmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $Emailconfiguration=Emailconfiguration::OrderBy('id' , 'asc')->get();
    //    $data=['page_title' => 'Emailconfiguration - Coachee App' , 'Emailconfiguration' => $Emailconfiguration];
      //  return view('admin.emailconfiguration.index' , $data);
    
   
        $paymentmethod=Paymentmethod::find(1);

        $data=['page_title' => 'Edit Paymentmethod - Coachee' , 'paymentmethod' => $paymentmethod];
        return view('admin.paymentmethod.index' , $data);
    
        
        
    }


    public function edit($id, Paymentmethod $paymentmethod)
    {
        $paymentmethod=Paymentmethod::find($id);
       
        $data=['page_title' => 'Edit Payment Method - Coachee' , 'paymentmethod' => $paymentmethod , 'kid' => $id ];
 
        return view('admin.payment_card.edit' ,$data);
    }




      public function changeStatus(Request $request)
      {
          $Paymentmethod = Paymentmethod::find($request->id)->update(['status' => $request->status]);
  
          return response()->json(['success'=>'Status changed successfully.']);
      }
    

    public function update($id,Request $request, Paymentmethod $Paymentmethod)
    {
        
      if($id==4){
        Paymentmethod::where('id', $id)->update([
                         'name' => $request->input('name'),
                         'payurl' => $request->input('payurl'),
                         'mode'=>$request->input('mode'),
                         'channel_id' => $request->input('channel_id'),
                         'marchant_id'=>$request->input('marchant_id'),
                         'store_id' => $request->input('store_id'),
                         'return_url'=>$request->input('return_url'),
                         'username'=>$request->input('username'),
                         'password' => $request->input('password'),
                         'hash'=>$request->input('hash'),
                         'status'=>$request->input('status')
                         ]
                        );
                      }
      if($id==3){
        Paymentmethod::where('id', $id)->update([
                          'name' => $request->input('name'),
                          'bankname'=>$request->input('bankname'),
                          'bancode' => $request->input('bancode'),
                          'accountnumber'=>$request->input('accountnumber'),
                          'store_id' => $request->input('store_id'),
                          'username'=>$request->input('username'),
                          'password' => $request->input('password'),
                          'status'=>$request->input('status')
                          ]
        );
      }
      if($id==2){
        Paymentmethod::where('id', $id)->update([
          'name' => $request->input('name'),
                          'payurl' => $request->input('payurl'),
                          'mode'=>$request->input('mode'),
                          'secret' => $request->input('secret'),
                          'client_id'=>$request->input('client_id'),
                         
                          'return_url'=>$request->input('return_url'),
                          'username'=>$request->input('username'),
                          'password' => $request->input('password'),
                  
                          'status'=>$request->input('status')
                          
                          ]
                        );
                      }   
      if($id==1){
        Paymentmethod::where('id', $id)->update([
                          'payurl' => $request->input('payurl'),
                          'mode'=>$request->input('mode'),
                          'name' => $request->input('name'),
                     
                          'client_id'=>$request->input('client_id'),
                          'username'=>$request->input('username'),
                          'password' => $request->input('password'),
                          'status'=>$request->input('status')
                          ]
                        );
                      }                                       
                                      

        return redirect(url('/paymentgateway'))->with('success' , 'Payment Method Update Successfully');
    }

    
    public function show_account_status($id , Request $request)
    {
       $paymentmethod=Paymentmethod::find($id);
       

       if(!empty($paymentmethod)){
        
         if($paymentmethod->gateway_status > 0){

            $paymentmethod->gateway_status = 0;
            $paymentmethod->update();
            
            
            return redirect(url('/paymentgateway'))->with('success' , 'Coach Deactive Successfully');
           
                
          
         }

         else
          {
            $paymentmethod->gateway_status = 1;
            $paymentmethod->update();

             

            return redirect(url('/coach'))->with('success' , 'Coach Active Successfully');
            
          }
       }
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

  
    
    
    
    
    
    
    
    
  
}

    
    
    
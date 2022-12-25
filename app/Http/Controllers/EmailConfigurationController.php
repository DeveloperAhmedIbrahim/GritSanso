<?php

namespace App\Http\Controllers;

use App\Models\Emailconfiguration;
use Illuminate\Http\Request;

class EmailConfigurationController extends Controller
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
    
   
        $emailconfiguration=Emailconfiguration::find(1);
 //  dd($emailconfiguration);
        $data=['page_title' => 'Edit Emailconfiguration - Coachee' , 'emailconfiguration' => $emailconfiguration];
        return view('admin.emailconfiguration.index' , $data);
    
        
        
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

  
    
    
    
    
    
    
    
    
    
     public function edit($id, Emailconfiguration $Emailconfiguration)
    {
        $emailconfiguration=Emailconfiguration::find($id);
        $data=['page_title' => 'Edit Emailconfiguration - Coachee' , 'emailconfiguration' => $emailconfiguration];
        return view('admin.emailconfiguration.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, emailconfiguration $emailconfiguration)
    {
        
            Emailconfiguration::where('id', $id)->update([
                         'email_from' => $request->input('email_from'),
                         'email_name'=>$request->input('email_name'),
                         'smtp_host' => $request->input('smtp_host'),
                         'smtp_port'=>$request->input('smtp_port'),
                         'password' => $request->input('password'),
                         'smtp_encryption'=>$request->input('smtp_encryption'),
                         'username'=>$request->input('username')]
                        );
       
        return redirect(url('/email_controls'))->with('success' , 'Email configuration Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(emailconfiguration $emailconfiguration)
    {
        //
    }
}

    
    
    
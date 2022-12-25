<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websetting=WebSetting::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Web Setting - Coachee App' , 'websetting' => $websetting];
        return view('admin.websetting.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=['page_title' => 'Add WebSetting'];
        return view('admin.websetting.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $dashboard_icon_name="";
        if($request->hasFile('dashboard_icon')){

          $dashboard_icon_name=time().'.'.$request->dashboard_icon->extension();
          $request->dashboard_icon->move(public_path('WebSetting'),$dashboard_icon_name);

        }

        $dashboard_fav_icon_name="";
        if($request->hasFile('dashboard_fav_icon')){

          $dashboard_fav_icon_name=time().'.'.$request->dashboard_fav_icon->extension();
          $request->dashboard_fav_icon->move(public_path('WebSetting'),$dashboard_fav_icon_name);

        }
        $websetting=WebSetting::create([
          
          'dashboard_icon'     => $dashboard_icon_name,
          'dashboard_fav_icon' => $dashboard_fav_icon_name,
          'name'               => $request->name,
          'defaultcurrency'    => $request->defaultcurrency,
          'servicefee'         => $request->servicefee,
          'currencysign'         => $request->currencysign,
      
        ]);

        return redirect(url('/web_setting'))->with('success' , 'Setting Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Http\Response
     */
    public function show(WebSetting $webSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id, WebSetting $webSetting)
    {
        $websetting=WebSetting::find($id);
        $data=['page_title' => 'Edit WebSetting - Coachee' , 'websetting' => $websetting];
        return view('admin.websetting.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, WebSetting $webSetting)
    {
        $dashboard_icon_name="";
        if($request->hasFile('dashboard_icon')){

          $dashboard_icon_name=time().'.'.$request->dashboard_icon->extension();
          $request->dashboard_icon->move(public_path('WebSetting'),$dashboard_icon_name);

        }
        else{

            $dashboard_icon_name=$request->dashboard_icon;
        }

        $dashboard_fav_icon_name="";
        if($request->hasFile('dashboard_fav_icon')){

          $dashboard_fav_icon_name=time().'.'.$request->dashboard_fav_icon->extension();
          $request->dashboard_fav_icon->move(public_path('WebSetting'),$dashboard_fav_icon_name);

        }
        else{

            $dashboard_fav_icon_name=$request->dashboard_fav_icon;
        }

        $websetting=WebSetting::find($id);
        $websetting->dashboard_icon=$dashboard_icon_name;
        $websetting->dashboard_fav_icon=$dashboard_fav_icon_name;
        $websetting->name=$request->name;
        $websetting->defaultcurrency=$request->defaultcurrency;
        $websetting->servicefee=$request->servicefee;
         $websetting->currencysign=$request->currencysign;
        
        $websetting->save();

        return redirect(url('/web_setting'))->with('success' , 'Setting Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebSetting $webSetting)
    {
        //
    }
}

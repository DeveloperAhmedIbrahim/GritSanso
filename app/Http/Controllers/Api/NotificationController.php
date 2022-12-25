<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\user_notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class NotificationController extends Controller
{

    protected $res,$status;

    function __construct()
    {
        
        $this->res=new stdClass;
        $this->status=200;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications=user_notifications::where('send_to',Auth::id())
        ->latest()->where('status','unread')->get();
        $data=array();
        foreach($notifications as $not){
            $not->send_from=$not->getSendFrom();
            array_push($data,$not);
        }
//https://github.com/brozot/Laravel-FCM
        return $data;

    }


    public function notify($data){
     
        //TODO: send push notification post request
        user_notifications::create($data);
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

<?php

namespace App\Http\Controllers;

use App\Models\user_notifications;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class UserNotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
  //   \Artisan::call('cache:clear');
    //  \Artisan::call('route:clear');
      //   \Artisan::call('config:clear');

   // $data = array();
      
    
      
  //    foreach (user_notifications::get() as $wallet) {
   //      $data[] =[
   //       'sendfrom' => $wallet->getSendFrom(),
   //        'sendto' => $wallet->getSendTo(),    
   //  ];
         //  $data['un'] = user_notifications::all();
   //  }
     // dd($data);
      

    if ($request->ajax()) {
      
       // $data = array();
   //    $data = user_notifications::all();
   
      
   //   $un = user_notifications::all();
   
      $un = user_notifications::orderBy('id','Desc')->get();
      
      $data = array();
      
    
    
      
      foreach (user_notifications::orderBy('id', 'DESC')->get() as $wallet) {
         $data[] =[
          'sendfrom' => User::where('id' , $wallet->send_from)->value('name'),
            'sendto' => User::where('id' , $wallet->send_to)->value('name'),
           'topic' => Topic::where('id' , $wallet->topic)->value('topic'),
           'service' => DB::table('coach_service')->where('id' , $wallet->topic)->value('service_title'),
           'un' => $wallet,
     ];
        
         //  $data['un'] = user_notifications::all();
     }
      
    return Datatables::of($data)
                   ->addIndexColumn()->addColumn('status', function ($row) {
                return isset($row['un']['status']) ? $row['un']['status'] : "";
                })->addColumn('id', function ($row) {
                return isset($row['un']['id']) ? $row['un']['id']  : "";
                })->addColumn('title', function ($row) {
                return isset($row['un']['title']) ?$row['un']['title'] : "";
                })->addColumn('body', function ($row) {
                return isset($row['un']['body']) ? $row['un']['body'] : "";
                })->addColumn('send_to', function ($row) {
                return isset( $row['sendto']) ? $row['sendto'] : "";
                })
        
        ->addColumn('send_from', function ($row) {
                return isset($row['sendfrom']) ? $row['sendfrom'] : "Admin";
                })
        
      
        ->addColumn('service', function ($row) {
                return isset($row['service']) ? $row['service'] : "";
                })
        
        ->addColumn('created_at', function ($row) {
                    return isset($row['un']['created_at']) ?  $row['un']['created_at'] : "";
                    })->addColumn('action', function ($row) {
               
            })->rawColumns(['action','status'])->make(true);
        }  
      
   
    
    $user_notifications=user_notifications::OrderBy('id' , 'asc')->get();
    $data=['page_title' => 'User notifications List' , 'User_notifications' => $user_notifications];
    return view('admin.user_notifications.index' , $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::OrderBy('id' , 'asc')->get();
		$topic = Topic::OrderBy('id' , 'asc')->get();
      	$coachingServices = DB::table('coach_service')->get();      	
        $data=['page_title' => 'Push Notification' , 'users' => $user,'topic'=>$topic, 'coachingServices' => $coachingServices];
        return view('admin.user_notifications.create' , $data);      
    }

  //protected $serverKey='AAAA2hFdH2M:APA91bHr1ph9REpCVfMwoYlCSGV4nB69r6aR6j_CK4hnFp1lY_q4Pq8ELQmTofjPpOCY5lUCRbvyB2gWjSW3ec1Jrx90kgi3jHHfElQpptkC_iyNekazosqO6Xxpfj9941W9XJKFbg2f';
  protected $serverKey='AAAA2asc4Ks:APA91bFZY7HLIeviI8MWekl_iRylvKRtC8mmXUZmlHKpiVwT8RObuuvh7VBcgYgdALHq_QHVNDKQ9uwW-xFsYhbW0YnvE3Xqukn7ivezpNYhaexrmAk1h75AdJMd4huROQrJdjOSlzrG';
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
            			         
      $request->validate([         
          	'title' => 'required',
          	'body' => 'required',
          	'send_to' => 'required',         
         ]);
      	$User = User::find($request->send_to);
      	$fcm_token = $User->fcm_token;   
      $note=user_notifications::create([           
           'title' => $request->title,
           'topic' => $request->topic,
           'body' => $request->body,
           'send_to' => $request->send_to,
           'send_from_admin'   => '1',         
         ]);
      $this->sendNotificationToUser($request->body,$request->body,$fcm_token);
        return redirect(url('/notification'))->with('success' , ' Notification Sent Successfully');     
    }

  	    public function sendNotificationToUser($title,$body,$token)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken=[$token];
        $data = [
            "registration_ids" => $FcmToken,
            "data" => [
                "title" => $title,
                "body" => $body,  
            ],
            "notification" => [
                "body" => $body,  
            ]
        ];
        
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $this->serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        
        if ($result === FALSE) {
            toastr()->error(curl_error($ch));
            
        }else{
            //toastr()->success($result);
        }        
        // Close connection
        curl_close($ch);
        
        //return back();
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_notifications  $user_notifications
     * @return \Illuminate\Http\Response
     */
    public function show(user_notifications $user_notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_notifications  $user_notifications
     * @return \Illuminate\Http\Response
     */
    public function edit(user_notifications $user_notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_notifications  $user_notifications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_notifications $user_notifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_notifications  $user_notifications
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_notifications $user_notifications)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
  	
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function sentmail()
    {
        $message = "Testing mail";

        $arrayEmails = ['ceo@itcians.com'];
        $emailSubject = 'My Subject';
        $emailBody = 'Hello, this is my message content.';

        Mail::send(
            'emails.normal',
            ['msg' => $emailBody],
            function ($message) use ($arrayEmails, $emailSubject) {
                $message->to($arrayEmails)
                    ->subject($emailSubject);
            }
        );

        dd('sent');
    }  

}

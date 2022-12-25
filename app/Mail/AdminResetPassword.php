<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class AdminResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, $token)
    {
        $this->user=$request;
        $this->token=$token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Admin Reset Password')
                    ->to($this->user->email)
                    ->view('admin.mail.adminresetpassword' , ['user' => $this->user , 'token' => $this->token]);
    }
}

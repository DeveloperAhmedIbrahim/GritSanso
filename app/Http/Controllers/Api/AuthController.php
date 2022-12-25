<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sitelog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use stdClass;
use Carbon\Carbon;
class AuthController extends Controller
{
    protected $res, $status;

    function __construct()
    {
        $this->res = new stdClass;
        $this->status = 200;
    }


    function forgotPassword(Request $req)
    {
        try {
            $this->validate($req, [
                'email' => "required|email:users"
            ], ['No user found with that emaiL!']);

            $email = $req->email;
            $user = User::where('email', $email)->get()->first();
            if ($user) {
                //TODO: Fahad Configure SMPT and Send Reset link to email
                $this->res->message = "Password resent link has been send to your email!";
                $this->status = 200;
            } else {
                $this->res->error = "No user found with that email!";
                $this->status = 200;
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {

            return response()->json($this->res, $this->status);
        }
    }

    function login(Request $req)
    {
        try {
            $user = User::whereEncrypted('email', $req->input('email'))->get()->first();
            if ($user) {

                if (Hash::check($req->password,$user->password)) {

                    $user->token = $user->createToken('Api Auth Token')->plainTextToken;
                    $this->res->user = $user;
					Sitelog::create([
                    'type'=>$user->type,
					'session_id'=>1,
                    'login'=>Carbon::now(),
                    'user_id'=>$user->id
                  ]);

                } else {
                    $this->res->error = "Invalid password!";
                    $this->status = 200;
                }
            } else {
                $this->res->error = "No user found with that email!";
                $this->status = 200;
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

  
  function logout(){


    
    try{

$details=		Sitelog::create([
                    'type'=>Auth::user()->type,
					'session_id'=>0,
                    'logout'=>Carbon::now(),

                    'user_id'=>Auth::id()
                  ]);

      $this->res->message="Logged out successfully!";
      $this->res->details=$details;
    }catch(Exception $ex){
      $this->res->error=$ex->getMessage();
    }finally{
      return response()->json($this->res,$this->status);
    }
  }
    function signUp(Request $req)
    {
        try {
            $this->validate($req, [
                'name' => "required",
                'email' => "required|email",
                'password' => "required",
                'type' => "required|string"
            ],['name.required'=> 'Name is required!',
               'email.required'=>'Invalid email!',
               'email.unque_encrypted'=>'email is already taken!',
               'Password is required','Unsupported user type!']);

          if(User::whereEncrypted('email',$req->email)->get()->first()){
            $this->res->error="This email is already register!";
          }else{
            $user = new User();
            $user->name = $req->input('name');
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->type = $req->type;
            if($req->type=="Coach" || $req->type=='coach'){
                $user->account_status=0; // set account for approval
            }
            $user->save();
            $notification = "New  ". $req->type ."  has been registered!";
            DB::table('user_notifications')->insert([
              'title' => $notification,
              'body' => $notification,
              'send_to' => 1,
              'send_from_admin' => 1,
              'status' => 'delivered',
              'created_at' => date("Y-m-d H:i:s")
            ]);
            $user->token = $user->createToken('Api Auth Token')->plainTextToken;
            $this->res->user = $user;
		Sitelog::create([
                    'type'=>$user->type,
					'session_id'=>1,
                    'login'=>Carbon::now(),
                    'user_id'=>$user->id
                  ]);

          }
            
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }
}

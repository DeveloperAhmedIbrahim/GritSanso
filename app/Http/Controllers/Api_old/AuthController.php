<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use stdClass;

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

                if ($user->password=Hash::make($req->password)) {

                    $user->token = $user->createToken('Api Auth Token')->plainTextToken;
                    $this->res->user = $user;
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

    function signUp(Request $req)
    {
        try {
            $this->validate($req, [
                'name' => "required",
                'email' => "required|email|unique_encrypted:users,email",
                'password' => "required",
                'type' => "required|string"
            ],['Name is required!','Invalid email or email is already taken!','Password is required','Unsupported user type!']);

            $user = new User();
            $user->name = $req->input('name');
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->type = $req->type;
            if($req->type=="Coach" || $req->type=='coach'){
                $user->account_status=0; // set account for approval
            }
            $user->save();
            $user->token = $user->createToken('Api Auth Token')->plainTextToken;
            $this->res->user = $user;
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }
}

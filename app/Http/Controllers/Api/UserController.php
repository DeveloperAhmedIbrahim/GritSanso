<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BookingModel;
use App\Models\LikeModel;
use App\Models\MediaModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use stdClass;

class UserController extends Controller
{
    protected $res, $status;

    function __construct()
    {
        $this->res = new stdClass;
        $this->status = 200;
    }

    function dashboardCounter(Request $req){

        if(Auth::user()->type==='coach'){
            $this->res->totalBlogs=Blog::count();
            $this->res->totalRemindars=0;
            $this->res->totalBookings=BookingModel::where('coach_id',Auth::id())->count();
            $this->res->totalLikes=LikeModel::where('liked',Auth::id())->count();
            $this->res->totalCoachees=BookingModel::where('coach_id',Auth::id())->distinct()->count('coachee_id');
            $this->res->totalDocuments=MediaModel::where('user_id',Auth::id())
              ->whereNotNull('coach_service_id')->count();
        }

        return response()->json($this->res,$this->status);
    }


    function userInfo(Request $req)
    {
        try {
            $user=User::find(Auth::id());
            $user->fluent_in=$user->userLanguages();
            $user->token=$req->bearerToken();
            $user->wallet=$user->getWallet();
            $this->res->user=$user;
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }
    function uploadProfile(Request $request)
    {

        try {
            //handle jpeg, jpg, svg, png image types here 
            //this check assumes your client sends the image with the key photo //validate request 
            $this->validate($request, ['file' => 'required|file|image|mimes:jpeg,png,gif,svg']);
            $file = $request->file('file');

            //create a filename 
            $filename = uniqid() . "." . $file->getClientOriginalExtension();
            //upload the image as a stream to save memory while uploading $response = 
            //Storage::putFileAs('images', $file, $filename);
            $request->file('file')->move(public_path() . '/images', $filename);
            $user = User::find(Auth::id());
            $user->update(['profile_picture' => '/images/' . $filename]);
            $this->res->message = "User profile picture updated!";
            $this->res->uploaded_url = "/images/" . $filename;
            $this->status = 200;
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    function update(Request $req)
    {
        try {
            $user = User::find(Auth::id());
          if($req->input("fcm_token")){
            //update token
            $user->update(['fcm_token'=>$req->fcm_token]);
          }else{
            $user->update($req->except('token', 'created_at', 'updated_at', 'email', 'type', 'password', 'account_status'));


          }
                      $this->res->message = "User data updated!";
            $this->status = 200;

        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    
}

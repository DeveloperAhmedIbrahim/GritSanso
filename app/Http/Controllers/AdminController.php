<?php
namespace App\Http\Controllers;

use App\Enums\UserTypes;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Country;
use App\Models\Blog;
use Illuminate\Support\Facades\Artisan;

use App\Models\Author;



use App\Models\ServiceCategories;
use Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminResetPassword;
class AdminController extends Controller
{
  
  	public function readNotification(Request $request,$id)
    {
      DB::table('user_notifications')->where('id','=',$id)->update(['status'=>'read']);
      return redirect()->back();
    }
  	public function getAdminNotifications()
    {
     	$model = DB::table('user_notifications')->where([['send_to','=',1],['status','=','delivered']])->orderBy('id','DESC')->get(); 
    	$notifiationHtml = "";
      	if(count($model) > 0) 
        {
          for($i = 0; $i < count($model); $i++)
          {
            $notifiationHtml .= '<div class="dropdown-item">
            	<div class="media server-log">
                	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 						stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" 						rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                    	<div class="media-body">
                        	<div class="data-info">
                            	<h6 class="">'.$model[$i]->body.'</h6>
                                <p class="">'.Carbon::parse($model[$i]->created_at)->diffForHumans().'</p>
                            </div>
                            
                            <div class="icon-status">
                            <a href="'.url("/readNotification").'/'.$model[$i]->id.'">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-									linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18">								</line>
                              </svg>
							</a>
                        </div>
                 </div>
                 </div>
				</div>';
          }
        }
      	return $notifiationHtml;  
    }
    public function index()
    {
    
    
  
      
        $all_coach=User::whereEncrypted('type' , 'coach')->count();
        $blog=Blog::count();
        $service=ServiceCategories::count();

        $author=Author::count();
        $data=['page_title' => 'Admin Dashboard' , 'all_coach' => $all_coach , 'blog' => $blog , 'service' => $service , 'author' => $author];

        $author=Author::count();
        $data=['page_title' => 'Admin Dashboard' , 'all_coach' => $all_coach , 'blog' => $blog , 'service' => $service , 'author' => $author];


        return view('admin.dashboard' , $data);
    }

    public function getprofiledata()
    {
        $admin=Admin::first();
        return view('admin.profile' , ['admin' => $admin]);
    }

    public function edit_profile(Request $request)
    {
        $profile=Admin::find(auth()->guard('admin')->user()->id);
        $country=Country::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Edit Profile' , 'profile' => $profile , 'country' => $country];
        return view('admin.editprofile' , $data);
    }

    public function update_profile(Request $request)
    {
        // dd($request->all());
        $imageName = "";
        $request->validate([
          
          'name'    => 'required',
          'email'   => 'required|email',
          'country' => 'required',
          'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
          'password_confirmation' => 'min:8'
          // 'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
         
         if($request->hasFile('profile_picture')){

        $imageName = time().'.'.$request->profile_picture->extension();  
     
        $request->profile_picture->move(public_path('/admin_profile'), $imageName);

        }
         else{

            $imageName = $request->profile_picture;
         } 
        $password = \Hash::make($request->password);
        $profile=Admin::find(auth()->guard('admin')->user()->id);
        $profile->name=$request->name;
        $profile->email=$request->email;
        $profile->country=$request->country;
       $profile->password= $password ;
        $profile->profile_picture=$imageName;
        $profile->phone_number=$request->phone_number;
        $profile->update();
        
        return redirect(url('/profile'))->with('success' , 'Admin Profile Update Successfully');
    }

    public function forget_password(Request $request)
    {
        $request->validate([
              'email' => 'required|email|exists:admins',
          ]);
  
          $token = Str::random(64);
  
          DB::table('admin_password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
        
         Mail::send(new AdminResetPassword($request , $token));
  
          return back()->with('status', 'We have e-mailed your password reset link!');
    }

    public function getlinkforpassword($token ,Request $request)
    {
       $getlinkpassword=DB::table('admin_password_resets')->where('token' , $token)->first();
       return view('auth.passwords.reset' , ['email' => $getlinkpassword->email , 'token' => $token]);
    }

    public function UpdatePassword($email , Request $request)
    {
        $request->validate([
          'password' => 'required',

        ]);


        $password = $request->password;

        $admin = Admin::where('email', $email)->first();
        // Redirect the user back if the email is invalid
        if (!$admin) {

            return redirect()->back()->withErrors(['email' => 'Email not found']);
        }
        //Hash and update the new password
        $admin->password = \Hash::make($password);
        $admin->save(); //or $user->save();

        DB::table('admin_password_resets')->where('email', $admin->email)
            ->delete();
         if(auth()->user()){

          return redirect(url('/login'))->with('success' , 'Congratulation! You Got Own Password');
         }

    }
}

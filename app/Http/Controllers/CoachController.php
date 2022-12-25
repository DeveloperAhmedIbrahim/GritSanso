<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceModel;
use App\Models\MediaModel;
use App\Models\Education;
use App\Models\sanso_wallets;
use App\Models\Experiences;
use App\Models\Languages;

use App\Models\Country;
use App\Models\SansoWalletModel;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\user_notifications;
use DB;


class CoachController extends Controller
{
  use  SerializesModels ;
    public function index(Request $request)
    {

      $data = User::whereEncrypted('type' , 'coach')->get();

      if ($request->ajax()) {

     $data = User::whereEncrypted('type' , 'coach')->get();



            return Datatables::of($data)
                    ->addIndexColumn()
              ->addColumn('account_status', function ($row) {
                    return ($row->account_status == 1) ? "Active" : "Deactive";
                   })
              ->addColumn('country', function ($row) {
                 $country_name = DB::table('countries')->where('id' , $row->country)->value('name');

                    return ($country_name == "") ? $row->country : $country_name;
                   })
              ->addColumn('account_status', function ($row) {
                    return ($row->account_status == 1) ? "Active" : "Deactive";
                   })
                 ->addColumn('created_at', function ($row) {
                    return (isset($row->created_at)) ? date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
                   })->addColumn('action', function ($row) {
                      $btn = '<a href="'.url('/coach/'.$row->id.'/edit').'" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                     $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                     $btn .= '<a href="'.url('/coach/'.$row->id.'/show').'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>';

                     if($row->account_status != 0){

                       $btn .= '<a href="javascript:void(0)" class="account_status" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x text-danger"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg></a>';
                     }
                     else
                    {
                        $btn .= '<a href="javascript:void(0)" class="account_status" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check text-success"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></a>';

                    }

                    return $btn;
                })->rawColumns(['action'])->make(true);
        }

        $coach=User::whereEncrypted('type' , 'coach')->get();
        $data=['page_title' => 'Coach - Coachee App' , 'coach' => $coach];
        return view('admin.coach.index' , $data);
    }

    public function create()
    {
        $data=['page_title' => 'Add Coach'];
        return view('admin.coach.create' , $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([

         'name'  => 'required',
         'email' => 'required|email|unique:users',

        ]);

        $password=$request->password;

        $user=User::create([

          'name'     => $request->name,
          'email'    => $request->email,
          'password' => \Hash::make($request->password),
          'type'  => 'coach'

        ]);

        return redirect(url('/coach'))->with('success' , 'Coach Create Successfully');
    }



    public function edit($id, Request $request)
    {
        $coach=User::find($id);
       // $countries = Country::all();
        $countries = DB::table('countries')
        -> orderBy('name', 'asc')
        -> get();

        $languages = DB::table('languages')
        -> orderBy('language', 'asc')
        -> get();

       // dd($coach);
        $data=['page_title' => 'Edit Coach' , 'coach' => $coach,'countries'=>$countries,'languages'=>$languages];
        return view('admin.coach.edit' , $data);
    }

    public function show($id , Request $request)
    {
        \Artisan::call('cache:clear');
        \Artisan::call('route:clear');
        \Artisan::call('config:clear');

        $coach=User::find($id);
       	$coach->languages=$coach->userLanguages();
        $country_name = DB::table('countries')->where('id' , $coach->country)->value('name');
        //if($country_name == null || $country_name == "")
        //{
          //$country_name = DB::table('countries')->where('id' , $coach->country)->value('name');
        //}
      	$services=ServiceModel::where('user_id' , $id)->get();
        $sanso_wallets=SansoWalletModel::where('user_id' , $id)->get();
        $experience = Experiences::where('user_id', $id)->get();
        $education = Education::where('user_id', $id)->get();

        $attach = MediaModel::where('user_id' , $id)->get();
        $data = [
          'page_title' => 'Coach Detail' ,
          'coach' => $coach ,
          'services' => $services  ,
          'education' => $education ,
          'experience' => $experience,
          'sanso_wallets' => $sanso_wallets ,
          'attach' => $attach,
          'country_name'=>$country_name
        ];
        return view('admin.coach.show' , $data);
    }

    public function update($id, Request $request)
    {
      // dd($request );
        $request->validate([

         'name'  => 'required',
         'email' => 'required|email',


        ]);


        $coach=User::find($id);
        $coach->name=$request->name;
        $coach->email=$request->email;
        $coach->country=$request->country;
        $coach->phone_number=$request->phone_number;
        $coach->passport_id=$request->passport_id;
        $coach->linkedin_link=$request->linkedin_link;
       // $coach->fluent_in=serialize($request->fluent_in);

if(!empty($request->password)){
         $coach->password=Hash::make($request->password);
}
      else{
         $coach->password=$coach->password;
      }

        $coach->update();

        if($coach->type == 'coach'){
        return redirect(url('/coach'))->with('success' , 'Coach Update Successfully');
         }

        else{

            return redirect(url('/coachee'))->with('success' , 'Coachee Update Successfully');
        }

    }
    public function delete($id, Request $request)
    {
        $coach=User::find($id);

        if(!empty($coach)){

        $coach->delete();
        }

        if($coach->type == 'coach'){

        return redirect(url('/coach'))->with('success' , 'Coach Delete Successfully');

         }
         else
         {
           return redirect(url('/coachee'))->with('success' , 'Coachee Delete Successfully');
         }
    }

    public function show_account_status($id , Request $request)
    {
       $user=User::find($id);


       if(!empty($user)){


      $service=ServiceModel::where('user_id' , $id)->first();
     //    dd($service);
        $sanso_wallets=SansoWalletModel::where('user_id' , $id)->first();
        $experience = Experiences::where('user_id', $id)->first();
        $education = Education::where('user_id', $id)->first();
      if($user->type == 'coach'){

         if(!empty($service) && $service->service_title !==""  && $service->service_charges !==""  && $service->service_category_id !=="" ){
         if($user->account_status == 1){
            $user->account_status = 0;
            $user->update();

       $note=user_notifications::create([

               'title'       => 'Your Account has beed Deactivated',

               'body' => 'Your Account has beed Deactivated',
               'send_to'   =>$id,
               'send_from_admin'   => '1',


             ]);

          //  $service=ServiceModel::find($id);

        if(!empty($service)){

            if($service->service_status == 1){

                $service->service_status = 0;
                $service->update();

               $note=user_notifications::create([

          		 'title'       => 'Service Rejected Successfully!',
     			 'body' => 'Service Rejected Successfully!',
           		 'send_to'   =>$id,
           		 'send_from_admin'   => '1',
                 ]);


            }
        }
            if($user->type == 'coach'){


            return redirect(url('/coach'))->with('success' , 'Coach Deactive Successfully');
             }
             else
             {

                return redirect(url('/coachee'))->with('success' , 'Coachee Deactive Successfully');
             }
         }

         else
          {
            $user->account_status = 1;
            $user->update();
            $note=user_notifications::create([

           'title'       => 'Your Account has beed Activated',

           'body' => 'Your Account has beed Activated',
           'send_to'   =>$id,
           'send_from_admin'   => '1',


         ]);
             if($user->type == 'coach'){

            return redirect(url('/coach'))->with('success' , 'Coach Active Successfully');
             }
             else
             {

                return redirect(url('/coachee'))->with('success' , 'Coachee Active Successfully');
             }

          }
         }
              if($user->type == 'coach'){


          return redirect(url('/coach'))->with('success' , 'Cannot Approve!  All field are Required');
             }
             else
             {

               return redirect(url('/coachee'))->with('success' , 'Cannot Approve! All field are Required');
             }

       }
         else{
            if($user->account_status == 1){
            $user->account_status = 0;
            $user->update();

       $note=user_notifications::create([

               'title'       => 'Your Account has beed Deactivated',

               'body' => 'Your Account has beed Deactivated',
               'send_to'   =>$id,
               'send_from_admin'   => '1',


             ]);

            if($user->type == 'coach'){


            return redirect(url('/coach'))->with('success' , 'Coach Deactive Successfully');
             }
             else
             {

                return redirect(url('/coachee'))->with('success' , 'Coachee Deactive Successfully');
             }
         }

         else
          {
            $user->account_status = 1;
            $user->update();
            $note=user_notifications::create([

           'title'       => 'Your Account has beed Activated',

           'body' => 'Your Account has beed Activated',
           'send_to'   =>$id,
           'send_from_admin'   => '1',


         ]);
             if($user->type == 'coach'){

            return redirect(url('/coach'))->with('success' , 'Coach Active Successfully');
             }
             else
             {

                return redirect(url('/coachee'))->with('success' , 'Coachee Active Successfully');
             }

          }
         }


         }
    }

    public function CoacheeAccounts(Request $request)
    {
        if ($request->ajax()) {

            $data = User::whereEncrypted('type' , 'coachee')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                   ->addColumn('country', function ($row) {
                    return $row->country_id;
                   })->addColumn('account_status', function ($row) {
                    return ($row->account_status == 1) ? "Active" : "Deactive";
                   })->addColumn('created_at', function ($row) {
                    return (isset($row->created_at)) ?date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
                   })->addColumn('action', function ($row) {
                      $btn = '<a href="'.url('/coachee/'.$row->id.'/edit').'" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                     $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                     $btn .= '<a href="'.url('/coachee/'.$row->id.'/show').'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>';

                     if($row->account_status != 0){

                       $btn .= '<a href="javascript:void(0)" class="account_status" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x text-danger"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg></a>';
                     }
                     else
                    {
                        $btn .= '<a href="javascript:void(0)" class="account_status" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check text-success"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></a>';

                    }

                    return $btn;
                })->rawColumns(['action'])->make(true);
        }

        $coach=User::whereEncrypted('type' , 'coachee')->get();
        $data=['page_title' => 'Coachee - Coachee App' , 'coach' => $coach];
        return view('admin.coachee.index' , $data);
    }


 public function coach($id, Request $request)
    {
        $coach=User::find($id);

        if(!empty($coach)){
        $data=['page_title' => ' Coach Detail'];
        return view('admin.coach.detail' , $data);
  		}
 	}




    public function ChangePassword($id, Request $request)
    {
        $request->validate([

           'password' => 'required_with:password_confirmation|same:password_confirmation',

        ]);
       // dd($password = $request->password);

        $user = User::where('id', $id)->first();

            $affected = DB::table('users')
              ->where('id', $id)
              ->update(['password' =>  $request->password]);

  return redirect(url('/coach'))->with('success' , 'Password has been update Successfully');


    }

  	public function downloadMedia($id)
    {
      \Artisan::call('cache:clear');
      \Artisan::call('route:clear');
      \Artisan::call('config:clear');
      $attach = MediaModel::where('id' , $id)->get();
      $file = public_path($attach[0]->attachment);
      return response()->download($file);
    }

}

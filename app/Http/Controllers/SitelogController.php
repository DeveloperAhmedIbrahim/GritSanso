<?php

namespace App\Http\Controllers;

use App\Models\Sitelog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

use App\Models\User;
use App\Models\ServiceModel;
use App\Models\MediaModel;
use App\Models\user_notifications;
use App\Models\Education;
use App\Models\sanso_wallets;
use App\Models\Experiences;
use App\Models\Languages;
use App\Models\Country;
use App\Models\SansoWalletModel;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SitelogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       $data = array();
      
         //  $site=Sitelog::where('type','coach')->last();
      $user=User::where('type','coach')->get();

      foreach ($user as $sitelog) {
         $data[] =[
            'email' => Sitelog::where('user_id' , $sitelog->id)->get(),
            'sitelog' => $sitelog->email,
     ];
         //  $data['un'] = user_notifications::all();
     }
    
      
      foreach (Sitelog::get() as $sitelog) {
         $data[] =[
            'email' => User::where('id' , $sitelog->user_id)->value('email'),
            'sitelog' => $site,
     ];
         //  $data['un'] = user_notifications::all();
    
   //   dd($data);
      
        
        
        if ($request->ajax()) { 
             
              $data = array();
      
          //  $site=Sitelog::where('type','coach')->last();
      $user=User::where('type','coach')->get();
      
      foreach ($user as $sitelog) {
         $data[] =[
            'email' => Sitelog::where('user_id' , $user->id)->get(),
            'sitelog' => $sitelog->email,
     ];
       }
      
             return Datatables::of($data)
                ->addIndexColumn()
               ->addColumn('session_id', function ($row) {
                    return isset($row['sitelog']['session_id']) ? $row['sitelog']['session_id'] : ""; })
                ->addColumn('email', function ($row) {
                    return isset($row['email']) ? $row['email'] : "";
                
                })->addColumn('status', function ($row) {
                   
                 return ($row['sitelog']['logout'] == '0000-00-00 00:00:00' || $row['log']['logout'] ==NULL) ? "Online" : "offline";
               
               
               
                })->addColumn('created_at', function ($row) {
                    return isset($row['sitelog']['created_at']) ? date('H:i', strtotime( $row['sitelog']['created_at']))   : "";
                })->addColumn('action', function ($row) {
                })->rawColumns(['action', 'status'])->make(true);
        	}
        
        $sitelog = Sitelog::OrderBy('id', 'asc')->get();
        $data = ['page_title' => 'sitelog List', 'sitelog' => $sitelog];
        return view('admin.sitelog.index', $data);
    }

   
    }
  
   public function coachee(Request $request)
    {
   \Artisan::call('cache:clear');
     \Artisan::call('route:clear');
        \Artisan::call('config:clear');
   
         $data = array();
        
           
              if ($request->ajax()) { 
                 //   $data =   Sitelog::all(); 
                    $data = array();

                
              //   $data = User::all();
             
               $data = User::whereEncrypted('type' , 'coachee')->get();
     
               return Datatables::of($data)
                ->addIndexColumn()
                 
                ->addColumn('email', function ($row) {
                    return isset($row->email) ? $row->email : "";
                })
                 ->addColumn('status', function ($row) {
                    
                     $site_status= Sitelog::where(['user_id' =>$row->id])->orderBy('id', 'DESC')->first();
          // dd($site_status);
                 return (  $site_status->logout == '0000-00-00 00:00:00' ||   $site_status->logout ==NULL) ? "Online" : "Offline";
                })->addColumn('created_at', function ($row) {
                     return isset($row->created_at) ?  $row->created_at : "";
                })->addColumn('action', function ($row) {
                 
                  $btn = '<a href="'.url('/logs/'.$row->id).'" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>';

                 return $btn;
                })->rawColumns(['action', 'status'])->make(true);
        	}
        $sitelog = Sitelog::where('type','coachee')->OrderBy('id', 'asc')->get();
        $data = ['page_title' => 'sitelog List', 'sitelog' => $sitelog];
        return view('admin.sitelog.coacheelog', $data);
    }

   
  
   public function coach(Request $request)
    {
        \Artisan::call('cache:clear');
     \Artisan::call('route:clear');
        \Artisan::call('config:clear');
   
         $data = array();
        
           
              if ($request->ajax()) { 
                 //   $data =   Sitelog::all(); 
                    $data = array();

                
              //   $data = User::all();
             
               $data = User::whereEncrypted('type' , 'coach')->get();
     
               return Datatables::of($data)
                ->addIndexColumn()
                 
                ->addColumn('email', function ($row) {
                    return isset($row->email) ? $row->email : "";
                })
                 ->addColumn('status', function ($row) {
                      $site_status= Sitelog::where(['user_id' =>$row->id])->orderBy('id', 'DESC')->value('logout');
                    return ($row->id=="null") ? "OFFLINE" : "ONLINE";
                })
                ->addColumn('created_at', function ($row) {
                     return isset($row->created_at) ?  $row->created_at : "";
                })->addColumn('action', function ($row) {
                 
                  $btn = '<a href="'.url('/logs/'.$row->id).'" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>';

                 return $btn;
                })->rawColumns(['action', 'status'])->make(true);
        	
        	}
        
        $sitelog = Sitelog::where('type','coach')->OrderBy('id', 'asc')->get();
        $data = ['page_title' => 'sitelog List', 'sitelog' => $sitelog];
        return view('admin.sitelog.coachlog', $data);
    }

   
  
   public function logs($id,Request $request)
    {
         $data= Sitelog::where(['user_id' =>$id])->get();

        if ($request->ajax()) { 
             return Datatables::of($data)
              ->addColumn('id', function ($row) {
                    return isset($row->id) ? $row->id : "";})
                 ->addColumn('login', function ($row) {
                    return isset($row->login) ? \Carbon\Carbon::createFromFormat('H:i:s',$row->login)->format('h:i')  : " ";})
                    ->addColumn('logout', function ($row) {
                    return isset($row->logout) ? $row->logout: " ";})
                 ->addColumn('created_at', function ($row) {
                    return (isset($row->created_at)) ? date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
                   })->addColumn('action', function ($row) {
                    

                    
                 })->rawColumns(['action', 'status'])->make(true);
        	}
        $sitelog= Sitelog::where(['user_id' =>$id])->get();
        $data = ['page_title' => 'sitelog List', 'sitelog' => $sitelog];
        return view('admin.sitelog.logs', $data);
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
     * @param  \App\Models\sanso_wallets  $sanso_wallets
     * @return \Illuminate\Http\Response
     */
    public function show(Sitelog $sanso_wallets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanso_wallets  $sanso_wallets
     * @return \Illuminate\Http\Response
     */
    public function edit(Sitelog $sitelog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanso_wallets  $sanso_wallets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sitelog $sitelog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanso_wallets  $sanso_wallets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sitelog $sitelog)
    {
        //
    }
}

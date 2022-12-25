<?php

namespace App\Http\Controllers;

use App\Models\ReviewModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Crypt;

class ReviewController extends Controller
{
   	public function allreviews()
    {
      	$Reviews = DB::table('reviews')->where('coachee_id','=','0')->OrderBy('id' , 'DESC')->get();      	
    	$model = array();
      	$coach = User::whereEncrypted('type','coachee')->where('id','=',3)->value("name");
      	//dd($coach);
      	$coach = User::whereEncrypted('type','coachee')->get();
      	if(count($Reviews)>0)
        {
          	for($i = 0; $i < count($Reviews); $i++)
            {             	
             	$userName = User::whereEncrypted('type','coach')->where('id','=',$Reviews[$i]->userId)->value('name');;
              	$model[$i]["id"] = $Reviews[$i]->id;
              	$model[$i]["name"] = $userName;
              	$model[$i]["type"] = $Reviews[$i]->userType;
              	$model[$i]["rating"] = $Reviews[$i]->ratings;
              	$model[$i]["review"] = $Reviews[$i]->review;
              	$model[$i]["created_at"] = $Reviews[$i]->created_at;              
              	if($userName == null)
                {
                  	$userName = User::whereEncrypted('type','coachee')->where('id','=',$Reviews[$i]->userId)->value('name');
                  	$model[$i]["id"] = $Reviews[$i]->id;
              		$model[$i]["name"] = $userName;
              		$model[$i]["type"] = $Reviews[$i]->userType;
              		$model[$i]["rating"] = $Reviews[$i]->ratings;
              		$model[$i]["review"] = $Reviews[$i]->review;
                  	$model[$i]["created_at"] = $Reviews[$i]->created_at;
                }


            }        	
        }
      	
      	$data=['page_title' => 'Reviews List' , 'allReviews' => $model];
      	return view("admin.review.view",$data);
    }
  
  	public function addreviews()
    {
      $dataCoach = User::whereEncrypted('type' , 'coach')->get();
      $dataCoachee = User::whereEncrypted('type' , 'coachee')->get();
      $data = [
        'page_title' => 'Add Review',
        'dataCoach' => $dataCoach,
        'dataCoachee' => $dataCoachee
      ];
      return view("admin.review.create",$data);
    }
  	public function storereviews(Request $request)
    {      
      $type = $request->post('userType');
      if($type == "coach")
      {
       $userId = $request->post('coachId'); 
      }
      else if($type == "coachee")
      {
       $userId = $request->post('coacheeId'); 
      }      
      $rating = $request->post('rating');
      $message = $request->post('message');
      DB::table('reviews')->insert([
        'review' => $message,
        'ratings' => $rating,
        'userId' => $userId,
        'userType' => $type,
        'coachee_id' => '0',
        'coach_id' => '0',
        'created_at' => date("Y-m-d H:i:s")
      ]);
      return redirect(url('/allreviews'))->with('success' , ' Review Sent Successfully'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
       \Artisan::call('cache:clear');
      \Artisan::call('route:clear');
       \Artisan::call('config:clear');
      $review=ReviewModel::OrderBy('id' , 'asc')->get();
      
      $data = array();
      
        foreach (ReviewModel::get() as $review) {
           $data[] =[
             'coachee_id' => User::where('id' , $review->coachee_id)->value('name'),
             'coach_id' => User::where('id' , $review->coach_id)->value('name'),
             'rev' => $review,
        ];
      
       }
    
    if ($request->ajax()) {
      
    
    
       $review =   ReviewModel::all(); 
    
      foreach (ReviewModel::get() as $review) {
           $data[] =[
             'coachee_id' => User::where('id' , $review->coachee_id)->value('name'),
             'coach_id' => User::where('id' , $review->coach_id)->value('name'),
             'rev' => $review,
        ];
      
       }
                return Datatables::of($data)
                ->addIndexColumn()->addColumn('review', function ($row) {
                return isset($row['rev']['review']) ? $row['rev']['review'] : "";
                })->addColumn('ratings', function ($row) {
                return isset($row['rev']['ratings']) ? $row['rev']['ratings']  : "";
                })->addColumn('coachee_id', function ($row) {
                return isset( $row['coachee_id']) ? $row['coachee_id'] : "";
                })->addColumn('coach_id', function ($row) {
                return isset($row['coach_id']) ? $row['coach_id'] : "";
                })->addColumn('created_at', function ($row) {
                return isset($row['rev']['created_at']) ?  $row['rev']['created_at'] : "";
                })->addColumn('action', function ($row) {
               
                })->rawColumns(['action','status'])->make(true);
        }

    $review=ReviewModel::OrderBy('id' , 'asc')->get();
    $data=['page_title' => 'Reviews List' , 'reviews' => $review];
    return view('admin.review.index' , $data);

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

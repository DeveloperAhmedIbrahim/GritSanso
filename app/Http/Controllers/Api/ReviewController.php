<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\Models\ReviewModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ReviewController extends Controller
{

    protected $res,$status=200;

    function __construct()
    {
        
        $this->res=new stdClass;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=array();
        
        if(Auth::user()){
            
            if(Auth::user()->type=='coach'){
                //search by coach
                $reviews=ReviewModel::where('coach_id',Auth::id())->orderBy('ratings','desc')->get();
                
                foreach($reviews as $review){
                    $review->coach=$review->getCoach();
                    $review->coachee=$review->getCoachee();
                    array_push($data,$review);
                }
    
                
                
            }else{
                //search by user 
                $reviews=ReviewModel::where('coachee_id',Auth::id())->orderBy('ratings','desc')->get();
                return "coach";
                foreach($reviews as $review){
                    $review->coach=$review->getCoach();
                    $review->coachee=$review->getCoachee();
                    array_push($data,$review);
                }
            }
        }else{
            $reviews=ReviewModel::orderBy('ratings','desc')->latest()->get();
            
            foreach($reviews as $review){
                $review->coach=$review->getCoach();
                $review->coachee=$review->getCoachee();
                array_push($data,$review);
            }
        }
        

        return $data;
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
	try {

            $this->validate($request,[
                'review'=>"required",
                'coach_id'=>'required',
                'ratings'=>'required'
            ]);

$data=$request->only('review','coach_id','ratings');
      $data['coachee_id']=Auth::id();
            ReviewModel::create($data);
      		$objCoach = User::find($request->coach_id);
      		$objCoachee = User::find(Auth::id());
      		$notification = $objCoachee->name . " gave ". $request->ratings . " stars to " . $objCoach->name;
            DB::table('user_notifications')->insert([
              'title' => $notification,
              'body' => $notification,
              'send_to' => 1,
              'send_from_admin' => 1,
              'status' => 'delivered',
              'created_at' => date("Y-m-d H:i:s")
            ]);
            $this->res->message='Review added!';
        } catch (Exception $ex) {
            $this->res->error=$ex->getMessage();
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        
        $data=array();
        
        if($user->type=='coach'){
            //search by coach
            
            $reviews=ReviewModel::where('coach_id',$id)->orderBy('ratings','desc')->get();
            foreach($reviews as $review){
                $review->coach=$review->getCoach();
                $review->coachee=$review->getCoachee();
                array_push($data,$review);
            }

            
            
        }else{
            //search by user 
            
            $reviews=ReviewModel::where('coachee_id',$id)->orderBy('ratings','desc')->get();
            
            foreach($reviews as $review){
                $review->coach=$review->getCoach();
                $review->coachee=$review->getCoachee();
                array_push($data,$review);
            }
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

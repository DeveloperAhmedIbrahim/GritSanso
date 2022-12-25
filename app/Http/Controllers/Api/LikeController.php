<?php

namespace App\Http\Controllers\Api;
use Exception;
use stdclass;
use App\Http\Controllers\Controller;
use App\Models\LikeModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    protected $res;
    protected $status = 200;

    function __construct()
    {
        $this->res = new stdClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show who likes logged in  user
        $user = Auth::user();
        $data = array();
        if($user->type=='coach'){
            $likes = LikeModel::where('liked', Auth::id())->get();
            
            foreach ($likes as $like) {
                $like->liked_by = $like->getLikedBy();
                array_push($data, $like);
            }
        }else if($user->type=='coachee'){
            $likes = LikeModel::where('liked_by', Auth::id())->get();
            
            foreach ($likes as $like) {
                $like->liked_by = $like->getLiked();
                array_push($data, $like);
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
            if (LikeModel::where('liked', $request->input('coach_id'))->where('liked_by', Auth::id())->get()->first()) {
                //remove
                LikeModel::where('liked_by', Auth::id())->where('liked', $request->input('coach_id'))->delete();
                $this->res->message = "Removed from wish list!";
            } else {
                //add 
                LikeModel::create([
                    'liked_by' => Auth::id(),
                    'liked' => $request->input('coach_id')
                ]);
                $not=new NotificationController();
                $not->notify([
                    'title'=>"You got a like!",
                    'body'=>Auth::user()->name." as added you to wishlist",
                    'send_to'=>$request->input('coach_id'),
                    'send_from'=>Auth::id(),
                    'status'  =>"unread" 
                ]);
              	$objCoach = User::find($request->input('coach_id'));
              	$notAdmin=new NotificationController();              	
                $notAdmin->notify([
                    'title'=> Auth::user()->name . " added " . $objCoach->name . " to whishlist",
                    'body'=> Auth::user()->name . " added " . $objCoach->name . " to whishlist",
                    'send_to'=>1,
                    'send_from'=>Auth::id(),
                    'status'  =>"delivered" 
                ]);
                $this->res->message = "Added to wish list!";
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
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
        //
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

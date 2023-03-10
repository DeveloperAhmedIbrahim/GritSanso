<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LikeModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class LikeController extends Controller
{

    protected $res;
    protected $status=200;

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
        //
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
        try{
            if(LikeModel::where('liked',$request->input('coach_id'))->get()->first()){
                //remove
                LikeModel::where('liked_by',Auth::id())->where('liked',$request->input('coach_id'))->delete();
                $this->res->message="Removed from wish list!";
                
            }else{
                //add 
                LikeModel::create([
                    'liked_by'=>Auth::id(),
                    'liked'=>$request->input('coach_id')
                ]);
                $this->res->message="Added to wish list!";
            }
        }catch(Exception $ex){
            $this->res->error=$ex->getMessage();
            $this->status=500;
        }finally{
            return response()->json($this->res,$this->status);
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class EduController extends Controller
{
    protected $status, $res;

    function __construct()
    {

        $this->status = 200;
        $this->res = new stdClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Education::where('user_id',Auth::id())->get();
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
            $this->validate($request, [
                'school_name' => "required",
                'field_of_study' => "required",
                'degree'=>"required",
                'from' => "required|date",
                
            ]);

            $data=$request->except('created_at', 'updated_at','user_id');
            $data['user_id']=Auth::id();
            Education::create($data);
            $this->res->message = "Education added!";
            $this->status = 200;
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
        return Education::find($id);
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
        try {
            
            $this->validate($request, [
                'school_name' => "required",
                'field_of_study' => "required",
                'degree'=>"required",
                'from' => "required|date",
            ]);
            $exp = Education::find($id);
            $exp->update($request->except('created_at', 'updated_at', 'id', 'user_id'));
            $this->res->message = "Education data updated!";
            $this->status = 200;
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $exp = Education::find($id);
            if ($exp->user_id == Auth::id()) {
                //delete exp
                $exp->delete();
                $this->res->message = "Education data deleted!";
                $this->status = 200;
            } else {
                $this->res->error = "You are unauthorized to perform this action!";
                $this->status = 401;
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
            $this->status = 500;
        } finally {
            return response()->json($this->res, $this->status);
        }
    }
}

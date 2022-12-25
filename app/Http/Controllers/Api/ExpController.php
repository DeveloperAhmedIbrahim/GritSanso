<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experiences;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ExpController extends Controller
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
        return Experiences::where('user_id',Auth::id())->latest()->get();
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
                'exp_title' => "required",
                'company_name' => "required",
                'exp_from' => "required|date",
            ]);
            $data=$request->except('created_at', 'updated_at');
            $data['user_id']=Auth::id();
            Experiences::create($data);
            $this->res->message = "Experience added!";
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
        return Experiences::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
                'exp_title' => "required",
                'company_name' => "required",
                'exp_from' => "required|date",
            ]);
            $exp = Experiences::find($id);
            $exp->update($request->except('created_at', 'updated_at', 'id', 'user_id'));
            $this->res->message = "Experience updated!";
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
            $exp = Experiences::find($id);
            if ($exp->user_id == Auth::id()) {
                //delete exp
                $exp->delete();
                $this->res->message = "Experience deleted!";
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

<?php

namespace App\Http\Controllers;

use App\Models\ServiceCalendar;
use App\Models\ServiceModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ServiceCalendarController extends Controller
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
        
        // $array = array();

        // foreach (ServiceCalendar::limit(10)->latest()->get() as $service) {
        //     $ob = new stdClass;
        //     $ob->service = $service;
        //     $ob->service_category = $service->serviceCategory();
        //     $ob->coach = $service->user();
        //     $ob->media=$service->media();
        //     $ob->topics=$service->topics();
        //     array_push($array, $ob);
        // }

        // return $array;
        //return ServiceCalendar::where()
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
                'session_date' => "required|date",
                'session_time' => "required|time",
                'coach_service_id' => "required|numeric",
            ]);
            $data=$request->except('created_at', 'updated_at','id');
            
            ServiceCalendar::create($data);
            $this->res->message = "Service calendar added!";
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
        $service= ServiceCalendar::find($id);
        $this->res->calendar=$service;
        $this->res->service=$service->service();
        return response()->json($this->res,$this->status);
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
                'session_date' => "required|date",
                'session_time' => "required|time",
                'coach_service_id' => "required|numeric",
            ]);
            $service = ServiceCalendar::find($id);
            $data=$request->except('created_at', 'updated_at', 'id', 'coach_service_id');
            $service->update($data);
            $this->res->message = "Service calendar updated!";
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
            $service = ServiceCalendar::find($id);
            
            if (ServiceModel::find($service->coach_service_id)->user_id == Auth::id()) {
                //delete service
                $service->delete();
                $this->res->message = "Service deleted!";
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

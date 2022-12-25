<?php

namespace App\Http\Controllers;

use App\Models\ServiceCalendar as  Service_calendar;
use Illuminate\Http\Request;
use DataTables;
use DB;
class ServiceCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
     //   $data = service_calendar::OrderBy('id' , 'asc')->get();
          
     $data = service_calendar::OrderBy('id' , 'asc')->get();

     $data = DB::table('service_calendar')
            ->join('coach_service', 'coach_service.id', '=', 'service_calendar.coach_service_id')
            ->select('service_calendar.*', 'coach_service.service_title as title')
            ->get();

            if ($request->ajax()) {
              
          
         //   $data = Service_calendar::OrderBy('id' , 'asc')->get();

      
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('session_date', function ($row) {
             return isset($row->session_date) ? $row->session_date : '';
            })
            ->addColumn('session_time', function ($row) {
                return isset($row->session_time) ? $row->session_time : '';
               })
               ->addColumn('number_of_sessions', function ($row) {
                return isset($row->number_of_sessions) ? $row->number_of_sessions : '';
               })
               ->addColumn('coach_service_id', function ($row) {
                return isset($row->title) ? $row->title : '';
               })
              
               
             ->addColumn('created_at', function ($row) {
             return (isset($row->created_at)) ? date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
            })->addColumn('action', function ($row) {
               
                  

                })->rawColumns(['action'])->make(true);
        }

        $service_calendar= service_calendar::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Service calendar - Service_calendar App' , 'service_calendar' => $service_calendar];
        return view('admin.service_calendar.index' , $data);
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
     * @param  \App\Models\Service_calendar  $service_calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Service_calendar $service_calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service_calendar  $service_calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Service_calendar $service_calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service_calendar  $service_calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service_calendar $service_calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service_calendar  $service_calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service_calendar $service_calendar)
    {
        //
    }
}

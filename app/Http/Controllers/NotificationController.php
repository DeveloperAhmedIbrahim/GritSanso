<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;
use Carbon;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

    
        $data= Notification::join('notification', 'users.id', '=', 'notification.sent_to','users.id', '=', 'notification.sent_from')
        ->select('users.*', 'users.email')
        ->orderBy('id', 'desc')
        ->get();
        // dd($data);

        if ($request->ajax()) {

            $data = Notification::OrderBy('id' , 'asc')->get();
            $data= Notification::join('notification', 'users.id', '=', 'notification.sent_to','users.id', '=', 'notification.sent_from')
            ->select('users.*', 'users.email')
            ->orderBy('id', 'desc')
            ->get();
       //      dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user_id', function ($row) {
                        return isset($row->user_id) ? $row->user_id: "";
                        })->addColumn('description', function ($row) {
                            return isset($row->description) ? $row->description : "";
                            })->addColumn('is_read', function ($row) {
                        return isset($row->is_read) ? $row->is_read : "";
                        })->addColumn('created_at', function ($row) {
                        return isset($row->created_at) ? $row->created_at : "";
                        })->rawColumns(['action'])->make(true);
        }

        $notification=Notification::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Category - Notification' , 'category' => $notification];
        return view('admin.Notification.index' , $data);
    }

    public function getCustomFilterData(Request $request)
    {
        $notifications = Notification::select(['id','user_id' ,'description','is_read','created_at', 'updated_at'])->get();

        return Datatables::of($notifications)
            ->filter(function ($instance) use ($request) {
                if ($request->has('description')) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        return Str::contains($row['description'], $request->get('description')) ? true : false;
                    });
                }

                if ($request->has('user_id')) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        return Str::contains($row['user_id'], $request->get('user_id')) ? true : false;
                    });
                }
            })
            ->make(true);
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
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Author $author)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function delete($id,Author $author)
    {
       
    }
}

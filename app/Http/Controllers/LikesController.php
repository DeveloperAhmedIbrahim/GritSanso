<?php

namespace App\Http\Controllers;

use App\Models\LikeModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
    //   \Artisan::call('cache:clear');
      // \Artisan::call('route:clear');
     //  \Artisan::call('config:clear');
      $like=LikeModel::OrderBy('id' , 'asc')->get();
      
      $data = array();
      
        foreach (LikeModel::get() as $like) {
           $data[] =[
             'liked_by' => User::where('id' , $like->liked_by)->value('name'),
             'likedata' => $like,
        ];
      
       }
    
    if ($request->ajax()) {
      
    
    
       $review =   LikeModel::all(); 
    
        foreach (LikeModel::get() as $like) {
           $data[] =[
             'liked_by' => User::where('id' , $like->liked_by)->value('name'),
             'likedata' => $like,
        ];
      
    
      
       }
                return Datatables::of($data)
                ->addIndexColumn()
                  ->addColumn('liked_by', function ($row) {
                return isset($row['liked_by']) ? $row['liked_by'] : "";
                })->addColumn('liked', function ($row) {
                return isset($row['likedata']['liked']) ? $row['likedata']['liked']  : "";
                })->addColumn('created_at', function ($row) {
                return isset($row['likedata']['created_at']) ?  $row['likedata']['created_at'] : "";
                })->addColumn('action', function ($row) {
               
                })->rawColumns(['action','status'])->make(true);
        }
      $like=LikeModel::OrderBy('id' , 'asc')->get();
    $data=['page_title' => 'like List' , 'likes' => $like];
    return view('admin.like.index' , $data);

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

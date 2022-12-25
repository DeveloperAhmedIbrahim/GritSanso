<?php

namespace App\Http\Controllers;

use App\Models\Topics;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use DataTables;
use Carbon;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

        public function index(Request $request)
        {
             
        $data = Topics::OrderBy('id' , 'asc')->get();
          
             $data= Topics::leftjoin('coach_service', 'coach_service.id', '=', 'topics.coach_service_id')
             ->select('topics.*', 'coach_service.service_title as title')
             ->orderBy('id', 'desc')
             ->get();
 //   dd($data[1]->topic);
        
         if ($request->ajax()) {
                  
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('topic', function ($row) {
                 return isset($row->topic) ? $row->topic : '';
                })
                ->addColumn('coach_service_id', function ($row) {
                    return isset($row->title) ? $row->title	 : '';
                   })
                
                 ->addColumn('created_at', function ($row) {
                 return (isset($row->created_at)) ? date('d/m/Y h:i:s', strtotime($row->created_at)) : "";
                })->addColumn('action', function ($row) {
               
                    $btn = '<a href="javascript:void(0)" class="edit_option" data-name="'.$row->topic.'" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                    $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';


                   return $btn;
               
                    })->rawColumns(['action'])->make(true);
            }
    
            $topics= Topics::OrderBy('id' , 'asc')->get();
            $services=ServiceModel::OrderBy('id' , 'asc')->get();
        //  dd($services);
            $data=['page_title' => 'Topics - Topic App' , 'topics' => $topics,'services'=>$services];
            return view('admin.topic.index' , $data);
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
            $service = ServiceModel::OrderBy('id' , 'asc')->get();
             
        $data=['page_title' => 'Add Topics' , 'service' => $service];
        return view('admin.topic.create' , $data);
      
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
          
          
          $request->validate([
         
          'topic'       => 'required',
          'coach_service_id' => 'required',
         

         ]);

         $topics=Topics::create([
           
           'topic'       => $request->topic,
           'coach_service_id'       => $request->coach_service_id,

        
          

         ]);

         return redirect(url('/topic'))->with('success' , ' Topics Sent Successfully');

        }
    
        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Topics  $Topics
         * @return \Illuminate\Http\Response
         */
        public function show(Topics $topics)
        {
            //
        }
    
        public function update($id,Request $request, Topics $Topic)
        {
             $request->validate([
              
              'topic'    => 'required',
              // 'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
    
           
            $topic=Topics::find($id);
            $topic->topic=$request->topic;
            $topic->coach_service_id=$request->coach_service_id;
            $topic->update();
    
            return back()->with('success' , 'Topuc Update Successfully');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Author  $author
         * @return \Illuminate\Http\Response
         */
        public function delete($id,Author $author)
        {
            $author=Author::find($id);
    
            if(!empty($author)){
    
                $author->delete();
            }
    
            return back()->with('success' , 'Author Delete Successfully');
        }
    }
    
<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use DataTables;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if ($request->ajax()) {

            $data = Author::OrderBy('id' , 'asc')->get();

            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                     $btn = '<a href="javascript:void(0)" class="edit_option" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                     $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';


                    return $btn;
                })->rawColumns(['action'])->make(true);
        }

        $author=Author::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Authors' , 'author' => $author];
        return view('admin.blog.author.index' , $data);
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
         $request->validate([
          
          'name'    => 'required',
          // 'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('/blog_images'), $imageName);

        $author=Author::create([
         
         'name'  => $request->name,
         'image' => $imageName

        ]);

        return back()->with(['success' , 'Author Add Successfully']);
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
         $request->validate([
          
          'name'    => 'required',
          // 'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

      if(!empty($request->image)){

        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('/blog_images'), $imageName);

        $author=Author::find($id);
        $author->name=$request->name;
        $author->image=$imageName;
        $author->update();
      }
      else{
         $author=Author::find($id);
        $author->name=$request->name;
  
        $author->update();
      }
      

        return back()->with('success' , 'Author Update Successfully');
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

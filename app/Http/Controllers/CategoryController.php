<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
         if ($request->ajax()) {

            $data = Category::OrderBy('id' , 'asc')->get();

            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                     $btn = '<a href='.url('/category/'.$row->id.'/edit').'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                     $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';


                    return $btn;
                })->rawColumns(['action'])->make(true);
        }

        $category=Category::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Category - Coachee' , 'category' => $category];
        return view('admin.blog.category.index' , $data);
    }

    public function create()
    {
        $data=['page_title' => 'Create Category - Coachee'];
        return view('admin.blog.category.create' , $data);
    }

    public function store(Request $request)
    {

        $request->validate([
         
          'title'    => 'required',
          'subtitle' => 'required',
          'description' => 'required'
         
        ]);

        $category=Category::create([
          
          'title'    => $request->title,
          'subtitle' => $request->subtitle,
          'description' => $request->description

        ]);

        return redirect('/category')->with('success' , 'Category Create Successfully');
    }

    public function edit($id)
    {
        $category=Category::find($id);
        $data=['page_title' => 'Edit Category - Coachee' , 'category' => $category];
        return view('admin.blog.category..edit' , $data);
    }

    public function update($id , Request $request)
    {
          $request->validate([
         
          'title'    => 'required',
          'subtitle' => 'required',
          'description' => 'required'
         
        ]);

        $category=Category::find($id);
        $category->title=$request->title;
        $category->subtitle=$request->subtitle;
        $category->description=$request->description;
        $category->update();

        return redirect(url('/category'))->with('success' , 'Category Update Successfully');
    }

    public function delete($id, Request $request)
    {
        $category=Category::find($id);

        if(!empty($category)){

            $category->delete();
            return redirect('/category')->with('success' , 'Category Delete Successfully');
        }
        else
        {
            return back()->with('error' , 'Category Not Found');
        }
    }
}

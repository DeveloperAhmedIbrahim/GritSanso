<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use DataTables;

class BlogController extends Controller
{
  
    function getBlogsApi(Request $req)
    {
        $data = array();

        foreach (Blog::latest()->limit(15)->get() as $blog) {
           $blog->category= $blog->getCategory();
            $blog->author=$blog->getAuthor();
            array_push($data, $blog);
        }
        
        return $data;
    }
    public function index(Request $request)
    {
            if ($request->ajax()) {

            $data = Blog::with(['category' , 'author']);

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($row) {
                    return ($row->status == 1) ? "Publish" : "Draft";
                    })->addColumn('category', function ($row) {
                    return isset($row->category->title) ? $row->category->title : "";
                    })->addColumn('author', function ($row) {
                    return isset($row->author->name) ? $row->author->name : "";
                    })->addColumn('action', function ($row) {
                    $btn = '<a href='.url('/blog/'.$row->id.'/edit').'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                     $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                     if($row->status != 0){
                       
                       $btn .= '<a href="javascript:void(0)" class="eye_option" data-id="'.$row->id.'""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x text-danger"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg></a>';

                     }
                     else{

                        $btn .= '<a href="javascript:void(0)" class="eye_option" data-id="'.$row->id.'""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check text-success"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></a>';

                     }



                    return $btn;
                })->rawColumns(['action','status'])->make(true);
        }
        $article=Blog::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Blog List' , 'article' => $article];
        return view('admin.blog.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::OrderBy('id' , 'asc')->get();
        $author   = Author::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Add Blog' , 'category' => $category , 'author' => $author];
        return view('admin.blog.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name="";
        if($request->hasFile('image')){

          $image_name=time().'.'.$request->image->extension();
          $request->image->move(public_path('blog_image'),$image_name);

        }
         
         $request->validate([
         
          'title'       => 'required',
          'category_id' => 'required',
          'author_id'   => 'required',
          'description' => 'required'

         ]);

         $blog=Blog::create([
           
           'title'       => $request->title,
           'category_id' => $request->category_id,
           'author_id'   => $request->author_id,
           'keywords'    => serialize($request->keywords),
           'description' => $request->description,
           'image'       => $image_name, 

         ]);

         return redirect(url('/blog'))->with('success' , 'Blog Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Blog $blog)
    {
        $blog=Blog::find($id);
        $category = Category::OrderBy('id' , 'asc')->get();
        $author   = Author::OrderBy('id' , 'asc')->get();
        $data=['page_title' => 'Edit Blog - Coachee' , 'blog' => $blog , 'category' => $category , 'author' => $author];
        return view('admin.blog.edit' ,$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Blog $blog)
    {
        $image_name="";
        if($request->hasFile('image')){

          $image_name=time().'.'.$request->image->extension();
          $request->image->move(public_path('blog_image'),$image_name);

        }
        else{

            $image_name=$request->image;
        }

          $request->validate([
         
          'title'       => 'required',
          'category_id' => 'required',
          'author_id'   => 'required',
          'description' => 'required'

         ]);

         $blog=Blog::find($id);
         $blog->title       = $request->title;
         $blog->category_id = $request->category_id;
         $blog->author_id   = $request->author_id;
         $blog->description = $request->description;
         $blog->image       = $image_name;
         $blog->keywords    = serialize($request->keywords);
         $blog->update();

         return redirect(url('/blog'))->with('Blog Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function delete($id ,Blog $blog)
    {
        $blog=Blog::find($id);
        if(!empty($blog)){

            $blog->delete();
        }

        return redirect(url('/blog'))->with('success' , 'Blog Delete Successfully');
    }

    public function ChangeStatusById($id)
    {
        $blog=Blog::find($id);

        if(!empty($blog)){

            if($blog->status > 0){

                $blog->status = 0;
                $blog->save();

                return redirect(url('/blog'))->with('success' , 'Blog Keep In Draft Successfully');
            }
            else
            {
                $blog->status = 1;
                $blog->save(); 

                return redirect(url('/blog'))->with('success' , 'Blog Active Successfully');  
            }
        }
    }
}

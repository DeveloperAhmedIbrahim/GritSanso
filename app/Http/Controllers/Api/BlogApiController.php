<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogViews;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class BlogApiController extends Controller
{
    protected $res, $status = 200;

    function __construct()
    {
        $this->res = new stdClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {

        $data = array();
		
      if($req->input('date')){
        $data = array();
		
		foreach (Blog::whereDate('created_at', 'like', '%' . $req->input('date') . '%')
            ->orderBy('created_at', 'desc')
            ->limit(15)->get() as $blog) {
            $blog->category = $blog->getCategory();
            $blog->author = $blog->getAuthor();
            $blog->views=$blog->countViews();
            array_push($data, $blog);
        }

        
      }else{
		foreach (Blog::orderBy('created_at', 'desc')
            ->limit(15)->get() as $blog) {
            $blog->category = $blog->getCategory();
            $blog->author = $blog->getAuthor();
            $blog->views=$blog->countViews();
            array_push($data, $blog);
        }
      }
      
      return $data;       

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
            $this->validate($request,[
                'blog_id'=>"required|numeric"
            ]);
            //check if already viewed
            if(BlogViews::where('blog_id',$request->blog_id)->where('user_id',Auth::id())->get()->first()){
                //already viewed
                $this->res->error="Already viewed!";
            }else{
                BlogViews::create([
                    'user_id'=>Auth::id(),
                    'blog_id'=>$request->blog_id
                ]);
                $this->res->message="View recorded";
            }

            
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

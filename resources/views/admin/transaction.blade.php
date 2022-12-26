@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('blog'), 'page_name' => __('blog_list')])
@section('page_title' ,$page_title)
@section('content')
<div id="content" class="main-content">
<div class="container" style="margin-top: 50px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                            <h4>Blog List</h4>
                                        </div>
                                        {{-- <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="{{ url('/exercise_category/create') }}" class="btn" style="background-color: #1abc9c; color: white;">Add Questions</a>
                                        </div>  --}}                                                       
                                </div>
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('success')}}
                                </div>
                                @endif
                               {{--  <div class="jumbotron">
                                <div class="row"> --}}
                               {{--  <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Packages:</label>
                                <select name="package_id" class="form-control searcharticlebypackage">
                                <option>-- Select Package --</option>
                                 @foreach($package as $value)   
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                                </select>
                                </div> --}}
                                
                                {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <label>Publish/Draft</label>
                                <select name="status" class="form-control showpublishdraftblog">
                                <option>-- Select Status --</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6"></div>
                                </div>
                                </div>
 --}}                               

                 <div class="widget-content widget-content-area br-6 mt-5">
                  <div class="table-responsive">
                        <table id="" class="manage_blog table table-hover non-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th class="dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
            
                                </tbody>
                            </table>
                        </div>
                         </div>

                            </div>
                        </div>
</div>
</div>
</div>


  @foreach($article as $key => $value)
<div class="modal fade" id="delete-{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Modal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
        <h5>Are you Sure?</h5>
        </div>
        <div class="modal-footer">
          <a class="btn" style="background-color:#fff; color:#509dbc;" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <a href="{{ url('/blog/'.$value->id.'/delete') }}" class="btn backgroundbuttoncolor">Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach

    @foreach($article as $key => $value)
<div class="modal fade" id="eye-{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Blog Publish/Draft</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            @if($value->status != 0)
           <h5>Are you want to Draft The Blog?</h5>
            @else
            <h5>Are you want to Active The Blog?</h5>
            @endif
        </div>
        <div class="modal-footer">
          <a class="btn backgroundbuttoncolor" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
            <a href="{{ url('/blog/'.$value->id.'/status') }}" class="btn backgroundbuttoncolor">Update</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach

 
@endsection
@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('blog'),'sub_category_name' => __(''),  'page_name' => __('manage_author')])
@section('page_title' ,$page_title)

{{-- {{  dd(MLM::testFunc())  }} --}}
@section('content')

<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                            <h4>Manage Author</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="javascript:void(0)" data-toggle="modal" data-target="#add_author" class="btn backgroundbuttoncolor">Add Author</a>
                                        </div>
                                        </div>                                                        
                                </div>
                                {{-- <div class="jumbotron">
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
                            {{--     
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                <label>Publish/Draft</label>
                                <select name="status" class="form-control searchdraftbystatus">
                                <option>-- Select Status --</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6"></div>
                                </div>
                                </div>
                                </div> --}}

                 <div class="widget-content widget-content-area br-6 mt-5">
                    <table id="alter_pagination" class="table table-hover non-hover manage_author" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Image</th>
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

<div class="modal fade" id="add_author" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Author</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
         <form action="{{ url('/author/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Name<span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="col-md-12">
        <label>Image<span class="text-danger">*</span></label>
        <input type="file" name="image" class="form-control-file">
        </div>
        </div>
        </div>
        <div class="modal-footer">
          <a class="btn backgroundbuttoncolor" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
            <input type="submit" name="submit" class="btn backgroundbuttoncolor" value="Add">
        </div>
        </form>
      </div>
      
    </div>
  </div>
 
  @foreach($author as $value)
  <div class="modal fade" id="edit-{{ $value->id }}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Author</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
         <form action="{{ url('/author/'.$value->id.'/update/') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Name<span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $value->name }}">
        </div>
        <div class="col-md-12">
        <label>Image<span class="text-danger">*</span></label>
        <input type="file" name="image" class="form-control-file">
        <img src="{{ asset('/blog_images/'.$value->image) }}" width="100" height="100" class="mt-2">
        </div>
        </div>
        </div>
        <div class="modal-footer">
          <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
            <input type="submit" name="submit" class="btn btn-primary" value="Add">
        </div>
        </form>
      </div>
      
    </div>
  </div>
  @endforeach
 


  @foreach($author as $key => $value)
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
          <a class="btn backgroundbuttoncolor"  data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <a href="{{ url('/author/'.$value->id.'/delete') }}" class="btn backgroundbuttoncolor" >Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach

@endsection
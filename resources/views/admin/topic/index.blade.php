@extends('admin.layouts.master', ['class' => 'off-canvas-sidebar', 'category_name' => __('topic'), 'sub_Transaction' => __(''), 'page_name' => __('manage_topic')])
@section('page_title', $page_title)

{{-- {{  dd(MLM::testFunc())  }} --}}
@section('content')

    <div id="content" class="main-content">
        <div class="container" style="margin-top: 30px;">
            <div class="container">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                         <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-10 col-md-10 col-sm-12 col-12">
                                    <h4>Manage Topic</h4>
                                </div>
                                <div class="col-xl-2 col-md-2 col-sm-12 col-12">
                                    <a href="{{ url('/topic/create') }}" class="btn backgroundbuttoncolor">Add Topic</a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="jumbotron">
                                <div class="row"> --}}
                        {{--  <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Packages:</label>
                                <select name="package_id" class="form-control searcharticlebypackage">
                                <option>-- Select Package --</option>
                                 @foreach ($package as $value)   
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
                            <div class="table-responsive">
                                <table id="" class="table table-hover non-hover topic" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Coach Service</th>
                                            <th>Created At</th>
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


    <div class="modal fade" id="add_topic" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Topic</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
             <form action="{{ url('/topic/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
            <label>Name<span class="text-danger">*</span></label>
            <input type="text" name="topic" class="form-control" placeholder="Enter Topic">
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
     
      @foreach($topics as $value)
      <div class="modal fade" id="edit-{{ $value->id }}" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Topic</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
             <form action="{{ url('/topic/'.$value->id.'/update/') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
            <label>Name<span class="text-danger">*</span></label>
            <input type="text" name="topic" id="topic-{{ $value->id }}" class="form-control" placeholder="Enter Name" value="{{ $value->name }}">
            </div>
         
              
            <div class="col-md-12">
            <label>Services<span class="text-danger">*</span></label>
              
            <select name="coach_service_id" class="form-control" id="coach_service">
                @foreach ($services as $val)
                <option value="{{ $val->id }}" "{{ ($val->id  == $value->coach_service_id) ? 'selected' : '' }}"> 
                  {{ $val->service_title }} 
                </option>
                @endforeach
            </select>
          </div>
            </div>
            </div>
           
            <div class="modal-footer">
              <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
            </form>
          </div>
          
        </div>
      </div>
      @endforeach
     
    
    
      @foreach($topics as $key => $value)
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
                    <a href="{{ url('/topic/'.$value->id.'/delete') }}" class="btn backgroundbuttoncolor" >Delete</a>
            </div>
          </div>
          
        </div>
      </div>
      @endforeach
    
    @endsection
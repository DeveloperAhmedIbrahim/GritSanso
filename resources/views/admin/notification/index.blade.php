@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('notification'),'sub_category_name' => __(''),  'page_name' => __('notification')])
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
                                        <div class="col-xl-9 col-md-9 col-sm-12 col-12">
                                            <h4>Manage Notification</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-12 col-12">
                                           <a href="{{ url('/notification/create') }}" class="btn backgroundbuttoncolor">Add Notification</a>
                                        </div>
                                        </div>                                                        
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 form-inline" style="position: absolute; z-index: 2;">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="start" value="{{ Carbon\Carbon::now()->format('m/d/Y') }}" />
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="input-sm form-control" name="end" value="{{  Carbon\Carbon::now()->format('m/d/Y') }}"/>
                                        </div>
                                        <button type="button" id="dateSearch" class="btn btn-sm btn-primary">Search</button>
                                    </div>
                                </div>         
                 <div class="widget-content widget-content-area br-6 mt-5">
                  <div class="table-responsive">
                    <table id="alter_pagination" class="table table-hover non-hover notification" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Username</th>
                                        <th>Description</th>
                                        <th>IS Read</th>
                                        <th>Date</th>
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


 


  @foreach($notification as $key => $value)
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
          <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <a href="{{ url('/notification/'.$value->id.'/delete') }}" class="btn backgroundbuttoncolor">Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach

  

@endsection
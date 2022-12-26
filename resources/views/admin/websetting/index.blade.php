@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('setting'),'sub_category_name' => __(''),  'page_name' => __('manage_websetting')])
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
                                            <h4>Manage Websetting</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           {{-- <a href="{{ url('/web_setting/create') }}" class="btn backgroundbuttoncolor">Add Websetting</a> --}}
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
                    <div class="table-responsive">
                        <table id="alter_pagination" class="table table-hover non-hover users_table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        
                                        <th>Dashbaord Icon</th>
                                        <th>Dashboard Fav Icon</th>
                                        <th>Name</th>
                                        <th>Service Fee</th>
                                        <th>Currency</th>
                                        <th>Currency sign</th>
                                        <th>Created At</th>
                                        <th class="dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($websetting as $key => $value)
                                 <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td><img src="{{ asset('WebSetting/'.$value->dashboard_icon) }}" width="100" height="100"></td>
                                 <td><img src="{{ asset('WebSetting/'.$value->dashboard_fav_icon) }}" width="100" height="100"></td>
                                 <td>{{ $value->name }}</td>
                                 <td>{{ $value->servicefee }}</td>
                                 <td>{{ $value->defaultcurrency }}</td>
                                 <td>{{ $value->CurrencySign }}</td>
                                 <td>{{ $value->created_at }}</td>
                                 <td><a href="{{ url('/web_setting/'.$value->id.'/edit') }}" ><i data-feather="edit"></i></a></td>
                                 </tr>
                                 @endforeach
                                </tbody>
                            </table>
                    </div>

                        </div>



                            </div>
                        </div>
</div>
</div>
</div>


 

{{-- 
  @foreach($coach as $key => $value)
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
                <a href="{{ url('/coach/'.$value->id.'/delete') }}" class="btn backgroundbuttoncolor">Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach --}}

{{-- @foreach($coach as $key => $value)
<div class="modal fade" id="account_status-{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Coach Active/Deactive Modal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            @if($value->account_status == 0)
             <h5>Are you Sure To Active Coach?</h5>
            @else
             <h5>Are you Sure To Deactive Coach?</h5>
            @endif
        </div>
        <div class="modal-footer">
          <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
            
            @if($value->account_status == 0)
            <a href="{{ url('/coach/'.$value->id.'/status') }}" class="btn backgroundbuttoncolor">Active</a>
            @else
            <a href="{{ url('/coach/'.$value->id.'/status') }}" class="btn backgroundbuttoncolor">Deactive</a>
            @endif
        </div>
      </div>
      
    </div>
  </div>
  @endforeach --}}

@endsection
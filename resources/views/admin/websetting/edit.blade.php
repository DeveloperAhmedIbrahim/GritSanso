@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('setting'),'page_name' => __('edit_websetting')])
@section('page_title' ,$page_title)
@section('content')

<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                            <h4>Edit Web Setting</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="" class="btn backgroundbuttoncolor">Manage Setting</a>
                                        </div>
                                        </div>                                                        
                                </div>
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('success')}}
                                </div>
                                @endif
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
                    <form action="{{ url('/web_setting/'.$websetting->id.'/update') }}" method="POST" id="formfordoctor" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="row">
                    <div class="col-md-6">
                    <div class="card">
                    <div class="card-header">
                    <h4>Dashboard Icon</h4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="form-group">
                    <label>Dashbaord Logo<span class="text-danger">*</span></label>
                    <input type="file" name="dashboard_icon" class="form-control-file">
                    <input type="hidden" name="dashboard_icon" value="{{ $websetting->dashboard_icon }}">
                    @error('dashboard_icon')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    <div class="cool-lg-4 col-md-4 col-sm-4 col-4">
                    <img src="{{ asset('/WebSetting/'.$websetting->dashboard_icon) }}" width="100" height="100" style="border-radius:5%;">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card">
                    <div class="card-header">
                    <h4>Dashboard Fav Icon</h4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="form-group">
                    <label>Dashboard Fav logo<span class="text-danger">*</span></label>
                    <input type="file" name="dashboard_fav_icon" class="form-control-file">
                    <input type="hidden" name="dashboard_fav_icon" value="{{ $websetting->dashboard_fav_icon }}">
                    @error('dashboard_fav_icon')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                    <img src="{{ asset('WebSetting/'.$websetting->dashboard_fav_icon) }}" width="100" height="100" style="border-radius:5%;">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6 mt-2">
                      <div class="form-group">
                      <label>Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $websetting->name }}">
                      @error('defaultcurrency')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      </div>
                    </div>
                    <div class="col-md-6 mt-2">
                    <div class="form-group">
                    <label>Currency<span class="text-danger">*</span></label>
                    <input type="defaultcurrency" name="defaultcurrency" class="form-control" placeholder="Enter Currency" value="{{ $websetting->defaultcurrency }}">
                    @error('defaultcurrency')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    
                    </div>
                    <div class="col-md-6 mt-2">
                      <div class="form-group">
                      <label>Service Fee<span class="text-danger">*</span></label>
                      <input type="text" name="servicefee" class="form-control" placeholder="Entee Service Fee" value="{{ $websetting->CurrencySign }}">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      </div>
                      
                      </div>
                      <div class="col-md-6 mt-2">
                        <div class="form-group">
                        <label>Currency Sign<span class="text-danger">*</span></label>
                        <input type="text" name="currencysign" class="form-control" placeholder="Enter Currency Sign" value="{{ $websetting->CurrencySign }}">
                        @error('currencysign')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        
                        </div>
                    </div>
                    <button type="submit" class="btn backgroundbuttoncolor mt-3">Update</button>
                    </form>
                        </div>
                            </div>
                        </div>
</div>
</div>
</div>
{{--  @foreach($article as $key => $value)
<div class="modal fade" id="{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <table class="table table-hover non-hover">
        <thead>
        <tr>
        <th>#</th>
        <th>Options</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($value->options))
            <?php $series=1;?>
        @foreach($value->options as $val)
        <tr>
        <td>{{ $series++ }}</td>
        <td>{{ $val }}</td>
        </tr>
        @endforeach
        @else
        <tr>
        <td>No Data Available</td>
        </tr>
        @endif
        </tbody>
         </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="background-color:#1abc9c; color:white;" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach

  @foreach($article as $key => $value)
<div class="modal fade" id="{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="background-color:#1abc9c; color:white;" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach --}}

{{--   @foreach($article as $key => $value)
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
          <a class="btn" style="background-color:#fff; color:#1abc9c;" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <a href="{{ url('/article_delete/'.$value->id) }}" class="btn" style="background-color:#1abc9c; color:white;">Delete</a>
        </div>
      </div>
      
    </div>
  </div> --}}
{{--   @endforeach --}}

@endsection
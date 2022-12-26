@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('coach'),'page_name' => __('edit email configuration')])
@section('page_title' ,$page_title)
@section('content')
<style>
    #dp{
        width:25%;
        
    }
    .dp{
        width:35%;
    }
    .widget-content-area{
        padding-top:0;
    }
</style>
<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                            <h4>Edit Email Configuration</h4>
                                             
                                        
                                        </div>
                                       
                                        </div>                                                        
                                </div>
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('success')}}
                                </div>
                                @endif
                                

                 <div class="widget-content widget-content-area br-6 mt-5">
                     <form action="{{ url('/email_controls/'.$emailconfiguration->id.'/update') }}" method="POST" id="formfordoctor" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Email From<span class="text-danger">*</span></label>
                    <input type="text" name="email_from" class="form-control" placeholder="Enter Email From" value="{{ $emailconfiguration->email_from}}">
                    </div>
                    @error('email_from')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Email Name<span class="text-danger">*</span></label>
                    <input type="text" name="email_name" class="form-control" placeholder=""  value="{{ $emailconfiguration->email_name}}">
                    </div>
                    @error('email_name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>

                  
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Smtp Host<span class="text-danger">*</span></label>
                    <input type="text" name="smtp_host" class="form-control  @error('smtp_host') is-invalid @enderror" placeholder=""  
                    value="{{ $emailconfiguration->smtp_host}}">
                     @error('smtp_host')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Smtp Port<span class="text-danger">*</span></label>
                    <input type="text" name="smtp_port" class="form-control  @error('smtp_port') is-invalid @enderror" placeholder="smtp port"  value="{{ $emailconfiguration->smtp_port}}">
                     @error('smtp_port')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Smtp Encryption<span class="text-danger">*</span></label>
                    <input type="text" name="smtp_encryption" class="form-control  @error('smtp_encryption') is-invalid @enderror" placeholder="smtp encryption"  value="{{ $emailconfiguration->smtp_encryption}}">
                     @error('smtp_encryption')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>User Name<span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror" placeholder="Username"  value="{{ $emailconfiguration->username}}">
                     @error('username')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                     
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="text" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="password"  value="{{ $emailconfiguration->password}}">
                     @error('password')
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








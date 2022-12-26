@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('coach'),'page_name' => __('edit Payment Gateway')])
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
                                            <h4> Payment Gateway</h4>
                                             
                                        
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
                     <form action="{{ url('/paymentmethod/'.$paymentmethod->id.'/update') }}" method="POST" id="formfordoctor" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Pay Url<span class="text-danger">*</span></label>
                    <input type="text" name="payurl" class="form-control" placeholder="Enter Pay url" value="{{ $paymentmethod->payurl}}">
                    </div>
                    @error('email_from')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Mode<span class="text-danger">*</span></label>
                    <input type="text" name="mode" class="form-control" placeholder=""  value="{{ $paymentmethod->mode}}">
                    </div>
                    @error('email_name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>

                  
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Channel id<span class="text-danger">*</span></label>
                    <input type="text" name="channel_id" class="form-control  @error('channel_id') is-invalid @enderror" placeholder=""  
                    value="{{ $paymentmethod->channel_id}}">
                     @error('channel_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Marchant id<span class="text-danger">*</span></label>
                    <input type="text" name="marchant_id" class="form-control  @error('marchant_id') is-invalid @enderror" placeholder="Marchant id "  value="{{ $paymentmethod->marchant_id}}">
                     @error('marchant_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Store Id<span class="text-danger">*</span></label>
                    <input type="text" name="store_id" class="form-control  @error('store_id') is-invalid @enderror" placeholder="Store Id"  value="{{ $paymentmethod->store_id}}">
                     @error('store_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Return Url<span class="text-danger">*</span></label>
                        <input type="text" name="return_url" class="form-control  @error('return_url') is-invalid @enderror" placeholder="return url"  value="{{ $paymentmethod->return_url}}">
                         @error('return_url')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        </div>
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>User Name<span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror" placeholder="Username"  value="{{ $paymentmethod->username}}">
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
                    <input type="text" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="password"  value="{{ $paymentmethod->password}}">
                     @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    

                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Hash<span class="text-danger">*</span></label>
                        <input type="text" name="hash" class="form-control  @error('hash') is-invalid @enderror" placeholder="return url"  value="{{ $paymentmethod->hash}}">
                         @error('hash')
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








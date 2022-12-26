@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('setting'),'page_name' => __('edit_email configuration')])
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
                                            <h4>Edit Email configuration</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="" class="btn backgroundbuttoncolor">Manage Email configuration</a>
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
                   
                
 
                    
                     <div class="col-lg-6 col-md-6 col-sm-6 col-8">
                    <div class="form-group">
                    <label>From Email<span class="text-danger">*</span></label>
                 <div>
                    <input type="text" name="email_from" value="{{ $emailconfiguration->email_from }}">
                    @error('smtp')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                     </div>
                    <div class="cool-lg-6 col-md-6 col-sm-4 col-4">
                    <div class="form-group">
                         <div>
                    <label>Email Name<span class="text-danger">*</span></label>
                   <div>     <input type="text" name="email_name" value="{{ $emailconfiguration->email_name }}"> </div>
                    </div>
                    </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-8">
                    <div class="form-group">
                    <label>SMTP HOST<span class="text-danger">*</span></label>
                 <div>
                    <input type="text" name="smtp_host" value="{{ $emailconfiguration->smtp_host }}">
                    @error('smtp')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
               
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                    <label>SMTP PORT<span class="text-danger">*</span></label>
                        <div><input type="text" name="smtp_port" value="{{ $emailconfiguration->smtp_port }}"> </div>
                   
                    @error('smtp')
                  
                    @enderror
                    </div>
                    </div>
                   
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                         <div class="form-group">
                    <label>Smtp Encryption<span class="text-danger">*</span></label>
        
                       <div><input type="text" name="smtp_encryption" value="{{ $emailconfiguration->smtp_encryption }}"> </div>
                    </div>
                   
                    </div>
                    <div class="col-md-6 mt-2">
                    <div class="form-group">
                    <label>Username<span class="text-danger">*</span></label>
                     <div><input type="text" name="username" value="{{ $emailconfiguration->username }}"> </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    
                    </div>
                    
                      <div class="col-md-6 mt-2">
                    <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                     <div><input type="text" name="password" value="{{ $emailconfiguration->password }}"> </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
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


@endsection
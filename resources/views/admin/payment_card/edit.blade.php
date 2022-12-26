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
                                
@if($kid==4)
                 <div class="widget-content widget-content-area br-6 mt-5">
                    <form action="{{ url('/paymentmethod/update/'.$paymentmethod->id) }}" method="POST" id="formfordoctor" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                       
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" readonly placeholder="Enter Pay url" value="Bank Alfalah">
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
                     
                        
                    <div class="col-md-6">
                        <div class="form-group">
                       
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" role="switch" value="1" id="status"  @if(is_array(old('status')) && in_array('status', old('status'))) checked @endif checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                          </div>
                        </div>
                        </div>
                    
                    </div>
                    <button type="submit" class="btn backgroundbuttoncolor mt-3">Update</button>
                    </form>
                        </div>
                        @endif
                       
         @if($kid==3)
                        <div class="widget-content widget-content-area br-6 mt-5">
                            <form action="{{ url('/paymentmethod/update/'.$kid) }}" method="POST" id="formfordoctor" enctype="multipart/form-data">
                               @csrf
                               @method('PUT')
                              
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" readonly  value="Transferwise">
                                </div>
                                @error('email_from')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                

                           <div class="col-md-6">
                           <div class="form-group">
                           <label>bank Name<span class="text-danger">*</span></label>
                           {{Form::text('bankname',$paymentmethod->bankname,['class' => 'form-control', 'placeholder' => 'Enter Bank nName'])}}
                           </div>
                           @error('bankname')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           </div>
                         
                           <div class="col-md-6">
                           <div class="form-group">
                           <label>bancode<span class="text-danger">*</span></label>
                           <input type="text" name="bancode" class="form-control" placeholder="Enter bancode"  value="{{ $paymentmethod->bancode}}">
                           </div>
                           @error('bancode')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           </div>
       
                         
                           <div class="col-md-6">
                           <div class="form-group">
                           <label>Account Number<span class="text-danger">*</span></label>
                           <input type="text" name="accountnumber" class="form-control  @error('accountnumber') is-invalid @enderror" placeholder="Enter Account number"  
                           value="{{ $paymentmethod->accountnumber}}">
                            @error('accountnumber')
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
                           
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" role="switch" value="1" id="status"  @if(is_array(old('status')) && in_array('status', old('status'))) checked @endif checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                              </div>
                            </div>
                            </div>
                           
                           </div>
                           <button type="submit" class="btn backgroundbuttoncolor mt-3">Update</button>
                           </form>
                               </div>
                        @endif


        @if($kid==2)
                        <div class="widget-content widget-content-area br-6 mt-5">
                            <form action="{{ url('/paymentmethod/update/'.$kid) }}" method="POST" id="formfordoctor" enctype="multipart/form-data">
                               @csrf
                               @method('PUT')
                              
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" readonly placeholder="Enter Pay url" value="Paypal">
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
                                    {{Form::text('mode',$paymentmethod->mode,['class' => 'form-control', 'placeholder' => 'Enter Mode'])}}
                                   
                                     @error('mode')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    </div>
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
                           <label>Currency<span class="text-danger">*</span></label>
                           <input type="text" name="currency" class="form-control" placeholder=""  value="{{ $paymentmethod->currency}}">
                           </div>
                           @error('email_name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           </div>
       
                           
                           <div class="col-md-6">
                           <div class="form-group">
                           <label>Secret Key<span class="text-danger">*</span></label>
                           <input type="text" name="secret" class="form-control  @error('secret') is-invalid @enderror" placeholder="Secret "  value="{{ $paymentmethod->secret}}">
                            @error('secret')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           </div>
                           </div>
                           
                           
                           
                           <div class="col-md-6">
                           <div class="form-group">
                           <label>Client Id<span class="text-danger">*</span></label>
                           <input type="text" name="client_id" class="form-control  @error('client_id') is-invalid @enderror" placeholder="Cleint Id"  value="{{ $paymentmethod->client_id}}">
                            @error('client_id')
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
                           
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" role="switch" value="1" id="status"  @if(is_array(old('status')) && in_array('status', old('status'))) checked @endif checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                              </div>
                            </div>
                            </div>
                           
                           </div>
                           <button type="submit" class="btn backgroundbuttoncolor mt-3">Update</button>
                           </form>
                               </div>

@endif


@if($kid==1)
<div class="widget-content widget-content-area br-6 mt-5">
    <form action="{{ url('/paymentmethod/update/'.$kid) }}" method="POST" id="formfordoctor" enctype="multipart/form-data">
       @csrf
       @method('PUT')
      
   <div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label>Name<span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" readonly placeholder="Enter Pay url" value="Payoneer">
        </div>
        @error('email_from')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

   <div class="col-md-6">
   <div class="form-group">
   <label>Currency<span class="text-danger">*</span></label>
   <input type="text" name="currency" class="form-control" placeholder="Enter Currency" value="{{ $paymentmethod->currency}}">
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
   @error('mode')
   <span class="invalid-feedback" role="alert">
   <strong>{{ $message }}</strong>
   </span>
   @enderror
   </div>

 

   <div class="col-md-6">
    <div class="form-group">
    <label>Pay Url<span class="text-danger">*</span></label>
    <input type="text" name="payurl" class="form-control  @error('payurl') is-invalid @enderror" placeholder="Pay url"  value="{{ $paymentmethod->payurl}}">
     @error('payurl')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>
    </div>

   <div class="col-md-6">
   <div class="form-group">
   <label>Partner id<span class="text-danger">*</span></label>
   <input type="text" name="client_id" class="form-control  @error('client_id') is-invalid @enderror" placeholder=""  
   value="{{ $paymentmethod->client_id}}">
    @error('client_id')
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
   
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="status" role="switch" value="1" id="status"  @if(is_array(old('status')) && in_array('status', old('status'))) checked @endif checked>
        <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
      </div>
    </div>
    </div>

   </div>
   <button type="submit" class="btn backgroundbuttoncolor mt-3">Update</button>
   </form>
       </div>

@endif

                            </div>
                        </div>
</div>
</div>
</div>

@endsection








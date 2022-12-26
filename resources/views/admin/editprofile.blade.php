@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('profile'),'page_name' => __('profile')])
@section('page_title' ,$page_title)
@section('content')

@php
$user_country=\App\Models\Admin::where('id',$profile->id)->value('country');
$phone=\App\Models\Countries::where('name',$user_country)->value('phonecode');

@endphp
 <!--  BEGIN NAVBAR  -->
<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                            <h4>Edit Profile</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3 text-right">
                                           <a href="{{ url('/profile') }}" class="btn" style="background-color: #509dbc; color: white;">Profile</a>
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
                    <form action="{{ url('/update/'.$profile->id.'/profile') }}" method="POST" id="formfordoctor" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name"value="{{ $profile->name }}">
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="e.g xyz@gmail.com"  value="{{ $profile->email }}">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                      
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="password" name="password"  value="{{  $profile->password
   }}"  class="form-control" placeholder="Enter Password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation"  value="{{  $profile->password  }}" class="form-control" placeholder="Confirm Password" >
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div> 
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Country<span class="text-danger">*</span></label>
                    <select name="country" class="form-control">
                    <option value="" hidden disabled selected>-- Select Country --</option>
                    @foreach($country as $value)
                    <option value="{{ $value->name }}" {{ $profile->country == $value->name ? 'selected' : '' }}>{{ $value->name }}</option>
                    @endforeach
                    </select>
                    </div>
                    @error('country')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Phone Number<span class="text-danger">*</span></label><br>
                       <input type="hidden" name="" class="form-control" id="phonecode"  value="{{ $phone }}">
                   <input name="phone_number" type="text" value="{{ $profile->phone_number }}" class="form-control mb-2 inptFielsd" id="phone"
placeholder="Phone Number" />
                    </div>
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-lg-12">
                    <div class="card">
                    <div class="card-header">
                    <h4>Profile Image</h4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="offset-2 col-lg-5 col-md-5 col-sm-5 col-5">
                    <input type="file" name="profile_picture" class="form-control-file mt-5" >
                    <input type="hidden" name="profile_picture" value="{{ $profile->profile_picture }}">
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                    <img src="@if(empty($profile->profile_picture)) {{ asset('assets/img/dumy.jpg') }} @else {{ asset('admin_profile/'.$profile->profile_picture) }} @endif"  style="border-radius: 5%; width:50%; height:auto;">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <button type="submit" class="btn mt-3 backgroundbuttoncolor" style="background-color:#509dbc;">Update</button>
                    </form>
                     </div>
                    </div>
                    </div>
</div>
</div>
</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">

<link href="https://intl-tel-input.com/node_modules/intl-tel-input/examples/css/prism.css" rel="stylesheet" media="screen">

<link href="https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1638200991544" rel="stylesheet" media="screen">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  

  <script src="https://intl-tel-input.com/node_modules/intl-tel-input/examples/js/prism.js"></script>
    <script src="https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?1638200991544"></script>
    <script src="https://intl-tel-input.com/node_modules/intl-tel-input/examples/gen/js/isValidNumber.js?1638200991544"></script>

 <script>
 var input = document.querySelector("#phone"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti = window.intlTelInput(input, {
  utilsScript: "../../build/js/utils.js?1638200991544"
});

var reset = function() {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
    }
  }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);

</script>

@endsection
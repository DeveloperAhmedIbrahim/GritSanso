@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('coach'),'page_name' => __('')])
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
                                          @if(@$coach->type=='coach')
                                            <h4>Edit Coach</h4>
                                          @else
                                          <h4>
                                            Edit Coachee
                                          </h4>
                                          @endif
                                          
                                              @if(empty($coach->profile_picture))
                                                                                     <img src="https://az-solutions.pk/coachee/assets/img/dumy.jpg" width="150" height="150" style="border-radius:5%;">
                                        @else
                           

                                           <img src="{{ $coach->profile_picture }}"
                                                            width="300" height="auto">
                                        @endif  
                                       
                 
                                        
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                             @if(@$coach->type=='coach')
                                                <a href="{{ url('/coach') }}" class="btn backgroundbuttoncolor">Manage Coach</a>
                                          @else
                                          <h4>
                                                <a href="{{ url('/coachee') }}" class="btn backgroundbuttoncolor">Manage Coachee</a>
                                          </h4>
                                          @endif
                                       
                                       
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
                    <form action="{{ url('/coach/'.$coach->id.'/update') }}" method="POST" id="formfordoctor">
                        @csrf
                        @method('PUT')
                        
                    <div class="row">
                     
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required placeholder="Enter Name" value="{{ $coach->name }}">
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
                    <input type="email" name="email" readonly class="form-control" required placeholder="e.g xyz@gmail.com"  value="{{ $coach->email }}">
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
                    <input type="password" name="password"  value=""  class="form-control" placeholder="Enter Password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation"   value="" class="form-control" placeholder="Confirm Password" >
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div> 
                    
                   @if($coach->type == "coach")
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Phone Number<span class="text-danger">*</span></label>
                    <input type="text" name="phone_number"  class="form-control  @error('phone_number') is-invalid @enderror" placeholder="e.g 092021234564"  
                    value="{{  $coach->phone_number  }}">
                     @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                    
                    
                
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Country<span class="text-danger">*</span></label>
                      @php
                      $country =App\Models\Country::where('id' ,  $coach->country_id)->value('name');
                    
                      @endphp
                    <input type="text" name="" readonly  class="form-control  @error('') is-invalid @enderror" 
                    value="{{  $country  }}">
                     @error('')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Linkedin Link<span class="text-danger">*</span></label>
                    <input type="text" name="linkedin_link" required class="form-control   @error('linkedin_link') is-invalid @enderror" placeholder="Linkedin Link"  value="{{  $coach->linkedin_link  }}">
                     @error('linkedin_link')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Passport<span class="text-danger"></span></label>
                    <input type="text" name="passport_id" required class="form-control  @error('passport_id') is-invalid @enderror" placeholder="Passport"  value="{{  $coach->passport_id  }}">
                     @error('passport_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                   
                   
                 
                    
                    
                    @endif
                    
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
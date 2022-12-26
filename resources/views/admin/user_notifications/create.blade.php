@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('user_notification'),'page_name' => __('create_notification')])
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
                                            <h4>Add User Notification</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="{{ url('/notification') }}" class="btn backgroundbuttoncolor">Manage User Notification</a>
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
                                <label class="font-weight-bold">Users:</label>
                                <select name="package_id" class="form-control searcharticlebypackage">
                                <option>-- Select Users --</option>
                                 @foreach($users as $value)   
                                <option value="{{ $value->id }}">{{ $value->email }}</option>
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
                    <form action="{{ url('/notification/store') }}" method="POST" id="formfordoctor">
                        @csrf
                      
                       
                    <div class="row">
                    
                      
                      <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Users:</label>
                                <select name="send_to" class="form-control searcharticlebypackage">
                                <option>-- Select Users --</option>
                                 @foreach($users as $value)   
                                <option value="{{ $value->id }}">{{ $value->email }}</option>
                                @endforeach
                                </select>
                          </div> 
                     
                       <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Coaching Services:</label>
                         		<select name="topic" class="form-control searcharticlebypackage">
                               		@foreach($coachingServices as $value)   
                                		<option value="{{ $value->id }}">{{ $value->service_title }}</option>
                                	@endforeach
                                </select>
                                <!--<select name="topic" class="form-control searcharticlebypackage">
                                <option>-- Select Topics --</option>
                                 @foreach($topic as $value)   
                                <option value="{{ $value->id }}">{{ $value->topic }}</option>
                                @endforeach
                                </select>-->
                          </div> 
                      
                      
                      <div class="col-md-6">
                    <div class="form-group">
                     <label class="font-weight-bold">Subject<span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Subject"value="{{ old('title') }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                     <label class="font-weight-bold">Body<span class="text-danger">*</span></label>
                    <textarea name="body" class="form-control" id="ck_editor"></textarea>
                     @error('body')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                    </div>
                    <button type="submit" class="btn backgroundbuttoncolor mt-3">Create</button>
                    </form>
                        </div>
                            </div>
                        </div>
</div>
</div>
</div>
@endsection
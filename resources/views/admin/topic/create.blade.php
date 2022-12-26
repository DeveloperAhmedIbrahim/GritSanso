@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('topic'),'page_name' => __('add_topic')])
@section('page_title' ,$page_title)
@section('content')

<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-12 col-12">
                                            <h4>Add Topic</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-12 col-12">
                                           <a href="{{ url('/topic') }}" class="btn backgroundbuttoncolor">Manage Topic</a>
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
                    <form action="{{ url('/topic/store') }}" method="POST" id="formfordoctor">
                        @csrf
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Topic<span class="text-danger">*</span></label>
                    <input type="text" name="topic" class="form-control @error('topic') is-invalid @enderror" placeholder="Enter topic"value="{{ old('topic') }}">
                     @error('topic')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Topic:</label>
                                <select name="coach_service_id" class="form-control searcharticlebypackage">
                                <option>-- Select Services --</option>
                                 @foreach($service as $value)   
                                <option value="{{ $value->id }}">{{ $value->service_title }}</option>
                                @endforeach
                                </select>
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
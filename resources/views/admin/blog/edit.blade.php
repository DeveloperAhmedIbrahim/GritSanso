@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('blog'),'page_name' => __('add_blog')])
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
                                            <h4>Add Blog</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-12 col-12">
                                           <a href="{{ url('/blog/create') }}" class="btn backgroundbuttoncolor">Manage Blog</a>
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
                    <form action="{{ url('/blog/'.$blog->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Category<span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control">
                    <option value="" hidden selected disabled>-- Select Category --</option>
                    @foreach($category as $value)
                    <option value="{{ $value->id }}" {{ $value->id == $blog->category_id ? 'selected' : '' }}>{{ $value->title }}</option>
                    @endforeach
                    </select>
                    </div>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Title<span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title"value="{{ $blog->title }}">
                    </div>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Author<span class="text-danger">*</span></label>
                    <select name="author_id" class="form-control">
                    <option value="" hidden selected disabled>-- Select Author --</option>
                    @foreach($author as $value)
                    <option value="{{ $value->id }}" {{ $value->id == $blog->author_id  ? 'selected' : '' }}>{{ $value->name }}</option>
                    @endforeach
                    </select>
                    </div>
                    @error('author_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>keywords<span class="text-danger">*</span></label>
                    <select name="keywords[]" class="form-control basic" multiple="multiple" required>
                        @foreach(unserialize($blog->keywords) as $val)
                        <option {{ $val == $val ? 'selected' : '' }}>{{ $val }}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('keywords')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                    <h4>Blog Image</h4>
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mt-4">
                    <input type="file" name="image" class="form-control-file">
                    <input type="hidden" name="image" value="{{ $blog->image }}">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <img src="{{ asset('/blog_image/'.$blog->image) }}" width="100" height="100" style="border-radius: 5%;">
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
                    <div class="col-md-12 mt-3">
                    <div class="form-group">
                    <label>Description<span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" id="ck_editor">{{ $blog->description }}</textarea>
                    </div>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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
@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('service_calendar'),'sub_category_name' => __(''),  'page_name' => __('manage_service_calendar')])
@section('page_title' ,$page_title)

{{-- {{  dd(MLM::testFunc())  }} --}}
@section('content')


<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                            <h4>Manage Service calendar</h4>
                                        </div>
                                      
                                        </div>                                                        
                                </div>
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
                  <div class="table-responsive">
                    <table id="alter_pagination" class="table table-hover non-hover service_calendar" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Session Date</th>
                                        <th>Session time</th>
                                        <th>Number of Sessions</th>
                                        <th>Coach Service</th>
                                        <th>Date</th>
                                        <th class="dt-no-sorting"></th>
                                    </tr>
                                </thead>
                                <tbody>
                
                                </tbody>
                            </table>

                        </div>



                            </div>
                        </div>
</div>
</div>
</div>







@endsection


<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">

@extends('admin.layouts.master', ['class' => 'off-canvas-sidebar', 'category_name' => __('coach'), 'sub_category_name' => __(''), 'page_name' => __('manage_coach')])
@section('page_title', $page_title)

{{-- {{  dd(MLM::testFunc())  }} --}}
@section('content')

    <div id="content" class="main-content">
        <div class="container" style="margin-top: 30px;">
            <div class="container">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-10 col-md-10 col-sm-12 col-12">
                                    <h4>Manage Coach</h4>
                                </div>
                                <div class="col-xl-2 col-md-2 col-sm-12 col-12">
                                    <a href="{{ url('/coach/create') }}" class="btn backgroundbuttoncolor">Add Coach</a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="jumbotron">
                                <div class="row"> --}}
                        {{--  <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Packages:</label>
                                <select name="package_id" class="form-control searcharticlebypackage">
                                <option>-- Select Package --</option>
                                 @foreach ($package as $value)   
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
                                <table id="" class="table table-hover non-hover users_table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                          
                                            <th>Country</th>
                                            <th>Profile Picture</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th class="dt-no-sorting">Action</th>
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
    </div>





    @foreach ($coach as $key => $value)
        <div class="modal fade" id="delete-{{ $value->id }}" role="dialog">
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
                        <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                        <a href="{{ url('/coach/' . $value->id . '/delete') }}" class="btn backgroundbuttoncolor">Delete</a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

    @foreach ($coach as $key => $value)




        <div class="modal fade" id="account_status-{{ $value->id }}" role="dialog">
            <div class="modal-dialog">
@php
              $service=\App\Models\ServiceModel::where('user_id',$value->id)->value('service_title');
@endphp
              @if(empty($service))
              <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">You Cannot Approved!  {{$value->name }} didn't Select Service</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
              </div>
              
          @else   
            
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Coach Active/Deactive Modal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        @if ($value->account_status == 0)
                            <h5>Are you Sure To Active Coach?</h5>
                        @else
                            <h5>Are you Sure To Deactive Coach?</h5>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>

                        @if ($value->account_status == 0)
                            <a href="{{ url('/coach/' . $value->id . '/status') }}"
                                class="btn backgroundbuttoncolor">Active</a>
                        @else
                            <a href="{{ url('/coach/' . $value->id . '/status') }}"
                                class="btn backgroundbuttoncolor">Deactive</a>
                        @endif
                    </div>
                </div>
    @endif
            </div>
        </div>

    @endforeach

@endsection

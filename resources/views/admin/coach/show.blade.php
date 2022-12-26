@extends('admin.layouts.master', ['class' => 'off-canvas-sidebar', 'category_name' => __('coach'), 'page_name' => __('coach_profile')])
@section('page_title', $page_title)
@section('content')




<style>
    .rounded-pills-icon .nav-pills .nav-link.active, .rounded-pills-icon .nav-pills .show > .nav-link{
                        background-color: #009688 !important;
                    }
  .flStackForm img {
  margin: 100px;
  transition: transform 0.25s ease;
  cursor: zoom-in;
}

.click-zoom input[type=checkbox] {
  display: none
}

.click-zoom img {
  margin: 100px;
  transition: transform 0.25s ease;
  cursor: zoom-in
}

.click-zoom input[type=checkbox]:checked~img {
  transform: scale(2);
  cursor: zoom-out
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
<h4>Coach Details</h4>                                          @else
                                          <h4>
                      Coachee Details
                                          </h4>
                                          @endif
                                  
                                </div>
                                <div class="col-xl-3 col-md-3 col-sm-3 col-3 text-right">
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
                        <div class="widget-content widget-content-area rounded-pills-icon">

                            <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-pills-icon-tab"
                                role="tablist">
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab"
                                        data-toggle="pill" href="#rounded-pills-icon-home" role="tab"
                                        aria-controls="rounded-pills-icon-home" aria-selected="true"><i
                                            data-feather="home"></i>{{@$coach->type}} <br>Info</a>
                                </li>
                                @if ($coach->type == 'coach')
                                    <li class="nav-item ml-2 mr-2">
                                        <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab"
                                            data-toggle="pill" href="#rounded-pills-icon-profile" role="tab"
                                            aria-controls="rounded-pills-icon-profile" aria-selected="false"><i
                                                data-feather="user"></i> {{@$coach->type}} Services</a>
                                    </li>
                                @endif

                                @if ($coach->type == 'coach')
                                    <li class="nav-item ml-2 mr-2">
                                        <a class="nav-link mb-2 text-center" id="rounded-pills-icon-contact-tab"
                                            data-toggle="pill" href="#rounded-pills-icon-contact" role="tab"
                                            aria-controls="rounded-pills-icon-contact" aria-selected="false"><i
                                                data-feather="book"></i>{{@$coach->type}} Academics</a>
                                    </li>
                                @endif

                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 text-center" id="rounded-pills-icon-document-tab"
                                        data-toggle="pill" href="#rounded-pills-icon-document" role="tab"
                                        aria-controls="rounded-pills-icon-contact" aria-selected="false"><i
                                            data-feather="file"></i>{{@$coach->type}} Documents</a>
                                </li>

                                @if ($coach->type == 'coach')
                                    <li class="nav-item ml-2 mr-2">
                                        <a class="nav-link mb-2 text-center" id="rounded-pills-icon-wallet-tab"
                                            data-toggle="pill" href="#rounded-pills-icon-wallet" role="tab"
                                            aria-controls="rounded-pills-icon-contact" aria-selected="false"><i
                                                data-feather="dollar-sign"></i>{{@$coach->type}} Wallet</a>
                                    </li>
                                @endif


                                {{-- <li class="nav-item ml-2 mr-2">
                                            <a class="nav-link mb-2 text-center" id="rounded-pills-icon-settings-tab" data-toggle="pill" href="#rounded-pills-icon-settings" role="tab" aria-controls="rounded-pills-icon-settings" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Settings</a>
                                        </li> --}}
                            </ul>
                            <div class="tab-content" id="rounded-pills-icon-tabContent">
                                <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-home-tab">
                                    <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                    @if (empty($coach->profile_picture))
                                                        <img src="{{ asset('assets/img/dumy.jpg') }}" width="300"
                                                            height="300" style="border-radius:5%;">
                                                    @else
                                                        <img src="{{ $coach->profile_picture }}"
                                                            width="300" height="auto">
                                                    @endif

                                                    <div>
                                                        <h5 class="text-center mt-3">
                                                            
                                                            <a
                                                                href="{{ $coach->linkedin_link ? $coach->linkedin_link : 'https://www.linkedin.com/in/dummy-account-0679081b5/' }}"
                                                                class="btn backgroundbuttoncolor" target="_blank"
                                                                style="color:white;"><i data-feather="linkedin"></i></a>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                                    <h1 class="ml-4">{{ ucwords($coach->name) }}</h1>
                                                    @if (empty($coach->about))
                                                        <p style="justify-content: center;padding: 3px 26px 26px;">
                                                           Lor em Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever since the 1500s, when an unknown printer took a galley
                                                            of type and scrambled it to make a type specimen book. It has
                                                            survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged. It was
                                                            popularised in the 1960s with the release of Letraset sheets
                                                            containing Lorem Ipsum passages, and more recently with desktop
                                                            publishing software like Aldus PageMaker including versions of
                                                            Lorem Ipsum.
                                                        @else
                                                        <p style="justify-content: center;padding: 3px 26px 26px;">
                                                            {{ $coach->about }}</p>
                                                    @endif
                                                    </p>
                                                    <h4 class="ml-4 font-weight-bold"><i data-feather="mail"
                                                            style="color:#509dbc;"></i> <span>{{ $coach->email }}</span>
                                                    </h4>
                                                    <h4 class="ml-4 font-weight-bold mt-3"><i data-feather="phone"
                                                            style="color:#509dbc;"></i>
                                                        <span>{{ $coach->phone_number ? $coach->phone_number : '' }}</span>
                                                    </h4>
                                                    <h4 class="ml-4 font-weight-bold mt-3"><i data-feather="flag"
                                                            style="color:#509dbc;"></i>
                                                        <span>{{ isset($country_name) ? $country_name : '' }}</span>
                                                    </h4>
                                                    <h4 class="ml-4 font-weight-bold mt-3"><i data-feather="globe"
                                                            style="color:#509dbc;"></i>
                                                        <span>

                                                            @if (isset($coach->languages))
                                                                @foreach($coach->languages as $lang)
                                                                {{$lang->language}} , 
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $attachment = \App\Models\MediaModel::where('user_id', $coach->id)->first();
                                    @endphp
                                    @if ($coach->type == 'caoch')
                                        <div class="row">
                                            <div class="col-lg-5 mt-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="font-weight-bold">Introduction Video</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <video width="320" height="240" controls>
                                                            <source
                                                                src="{{ !empty($attachment) ? asset('/docs/' . $attachment->attachment) : asset('assets/img/Introvideo.mp4') }}"
                                                                type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-profile-tab">

                                    <div class="table-responsive">
                                        <table id="alter_pagination" class="table table-hover non-hover users_table"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Service Category</th>
                                                    <th>Service Title</th>
                                                   
                                                    <th>Service Charges</th>
                                                    <th>Service Status</th>
                                                    <th class="dt-no-sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($services->isNotEmpty())
                                                    @foreach ($services as $key => $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ isset($value->sercategories) ? $value->sercategories->service : '' }}
                                                            </td>
                                                            <td>{{ $value->service_title }}</td>
                                                          
                                                            <td>{{ $value->service_charges }}</td>
                                                            @if ($value->service_status != 0)
                                                                <td>Approved</td>
                                                            @else
                                                                <td>Pending</td>
                                                            @endif

                                                            <td>
                                                                @if ($value->service_status != 0)
                                                                    <a href="javascript:void(0)"
                                                                        data-id="{{ $value->id }}"
                                                                        class="service_status"><i
                                                                            data-feather="eye"></i></a>
                                                                @else
                                                                    <a href="javascript:void(0)"
                                                                        data-id="{{ $value->id }}"
                                                                        class="service_status"><i
                                                                            data-feather="eye-off"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <td colspan="5" class="text-center">No Data Available</td>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-contact-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Education</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="alter_pagination_1"
                                                    class="table table-hover non-hover users_table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>School Name</th>
                                                            <th>Field Of Study</th>
                                                            <th>Degree</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($education->isNotEmpty())
                                                            @foreach ($education as $key => $val)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $val->school_name }}</td>
                                                                    <td>{{ $val->field_of_study }}</td>
                                                                    <td>{{ $val->degree }}</td>
                                                                    <td>{{ $val->from }}</td>
                                                                    <td>{{ $val->to }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <td colspan="5" class="text-center">No Data Available</td>
                                                        @endif
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4>Experience</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="alter_pagination_2"
                                                    class="table table-hover non-hover users_table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Expenerice Title</th>
                                                            <th>Company Name</th>
                                                            <th>Experience To</th>
                                                            <th>Experience From</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($experience->isNotEmpty())
                                                            @foreach ($experience as $key => $vall)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $vall->exp_title }}</td>
                                                                    <td>{{ $vall->company_name }}</td>
                                                                    <td>{{ $vall->exp_to??'Present' }}</td>
                                                                    <td>{{ $vall->exp_from }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <td colspan="5" class="text-center">No Data Available</td>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rounded-pills-icon-document" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-document-tab">
                                    <div class="table-responsive">
                                        <table id="alter_pagination" class="table table-hover non-hover users_table"
                                            style="width:100%">
                                            <input type="checkbox" id="zoomCheck">

                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Attachment</th>
                                                    <th>Attachment Type</th>
                                                  	<th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                              @php
                                               	$attachment = \App\Models\MediaModel::where('user_id', $coach->id)->get();		
                                              	$i=1;
                                              @endphp
                                           
                                              @if ($attach);

                                                @foreach ($attach as  $value)                                                        
                                                <tr>
                                                  <td>{{ $i++  }}</td>
                                                  <td>
                                                    @php
                                                    	$attachmentName = explode('/',$value->attachment);
														$attachmentNameIndex = count($attachmentName) - 1;
                                                    	$attachmentName = $attachmentName[$attachmentNameIndex];
                                                    	echo $attachmentName;
                                                    @endphp                                                     
                                                  </td>                                                
                                                  <td>{{ $value->attachment_type }}</td>
                                                  <td>
                                                    <a href="{{ asset($value->attachment) }}" target="_blank">view</a>
                                                    <a href="{{ url('coach/downloadMedia') . '/' . $value->id }}">download</a>
                                                  </td>
                                                </tr>
                                                @endforeach
                                          
                                              @else
                                              	<td colspan="3" class="text-center">No Data Available</td>
                                              @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rounded-pills-icon-wallet" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-wallet-tab">
                                    {{-- <blockquote class="blockquote text-center">
                                              <img src="{{ asset('assets/img/setting.gif') }}" width="100" height="100">
                                              <h4 class="font-weight-bold">Under Construction</h4>
                                            </blockquote> --}}

                                    <div class="table-responsive">
                                        <table id="alter_pagination" class="table table-hover non-hover users_table"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Balance</th>
                                                    <th>Wallet Status</th>
 <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($sanso_wallets->isNotEmpty())
                                                    @foreach ($sanso_wallets as $key => $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $value->firstName }}</td>
                                                            <td>{{ $value->lastName }}</td>
                                                            <td>{{ $value->email }}</td>
                                                            <td>{{ $value->balance }}</td>
                                                            @if ($value->wallet_status != 0)
                                                                <td>Approved</td>
                                                            @else
                                                                <td>Rejected</td>
                                                            @endif

 <td>
                                                              
   
    <a href="javascript:void(0)" id="changepassword"
                                                                        data-id="{{ $value->id }}"
                                                                        class="changepassword-{{ $value->id }}"><i
                                                                            data-feather="edit"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <td colspan="5" class="text-center">No Data Available</td>
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($services as $key => $value)
        <div class="modal fade" id="service_status-{{ $value->id }}" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Coach Services Approved/Rejected Modal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        @if ($value->service_status == 0)
                            <h5>Are you Sure To Approved Coach Services?</h5>
                        @else
                            <h5>Are you Sure To Rejected Coach Services?</h5>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>

                        @if ($value->service_status == 0)
                            <a href="{{ url('/service_status/' . $value->id) }}"
                                class="btn backgroundbuttoncolor">Approved</a>
                        @else
                            <a href="{{ url('/service_status/' . $value->id) }}"
                                class="btn backgroundbuttoncolor">Rejected</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    @endforeach




 @foreach ($sanso_wallets as $value)
        <div class="modal fade" id="changepassword-{{ $value->id }}" role="dialog">
            <div class="modal-dialog">
 <form action="{{ url('/coach/ChangePassword/'.$value->id)}}" method="POST" id="formfordoctor">
                     @csrf
                        @method('PUT')
                        
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sanso Wallet password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                      
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="password" name="password"  value="{{  $value->password }}"  class="form-control" placeholder="Enter Password">
                    </div>
                   
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation"  value="{{  $value->password  }}" class="form-control" placeholder="Confirm Password" >
                    </div>
                  
                    </div> 
                    
                    </div>
                    <div class="modal-footer">
                        <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>

                    
                            <button type="submit"
                                    class="btn backgroundbuttoncolor">Change password</button>
                    
                    </div>
                       
                </div>
 </form>
            </div>
        </div>
    @endforeach


@endsection

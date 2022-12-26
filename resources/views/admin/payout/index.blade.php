@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('manage_payout'),'manage_deposite' => __(''),  'page_name' => __('manage_payout')])
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
                                        <div class="col-xl-9 col-md-9 col-sm-12 col-12">
                                            <h4>Manage  Payout</h4>
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
                        <table id="" class="table table-hover non-hover payout" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Transaction </th>
                                        <th>Card</th> 
                                        <th>Sanso Wallet </th> 
                                        <th>Clearence</th>
                                       
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                            <th></th>
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


   <!-- Modal for Edit button -->


@foreach($payout as $key => $value) 
<div class="modal fade" id="delete-{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
    
      
    </div>
  </div>
  @endforeach
  <div class="modal fade" id="delete-1" role="dialog">
   
  </div>
  @foreach($payout as $key => $value)
<div class="modal fade" id="statuss-{{$value->status}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Disable Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
                         <h5>Are you sure to  
                        @if($value->status == 0)
                       Enable
                        @else
                 Disbale
                      
                        @endif 

                        </h5>
                    </div>
                    <div class="modal-footer">
                      <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                        
                        @if($value->status == 0)
                        <a href="{{ url('/payout/'.$value->id.'/update') }}" class="btn backgroundbuttoncolor">Active</a>
                        @else
                        <a href="{{ url('/payout/'.$value->id.'/update') }}" class="btn backgroundbuttoncolor">Deactive</a>
                      
                        @endif
                    </div>
      </div>
      
    </div>
  </div>
  @endforeach


 @foreach($payout as $key => $value)
<div class="modal fade" id="clearence-{{$value->id}}" role="dialog">
    <div class="modal-dialog">
   <form action="{{ url('/payoutdate/') }}" method="POST" id="">
                        @csrf
                        @method('PUT')
     
     
                        
           <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Clearence Date</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
                        
               <div class="input-group date" id="datetimepicker1">
                      <input id="input" type="date" class="form-control" name="clearance" />	<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                  </div>'
 <input value="{{$value->id}}" type="hidden" id="input" class="form-control" name="id" />	
                    </div>
                    <div class="modal-footer">
                      <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                        
                        <button href=""button="submit" class="btn backgroundbuttoncolor">Submit</button>
                      
                    </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  @endforeach





@endsection


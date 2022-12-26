@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('$allReviews'),'sub_category_name' => __(''),  'page_name' => __('manage_user_notification')])
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
                             	<h4>Manage Reviews</h4>
                          	</div>
                                 
                      	</div>                                                        
                  	</div>
                                                           
                 	<div class="widget-content widget-content-area br-6 mt-5">
                  		<div class="table-responsive">
                          
                    		<table id="alter_pagination" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>User</th>
                                      	<th>Review</th>
                                        <th>Ratings</th>
                                        <th>Type</th>
                                      	<th>Date</th>
                                    </tr>
                                </thead>                              	
                              	<tbody>
                                	@if(count($allReviews) > 0)
                                  		@for($i = 0; $i < count($allReviews); $i++)
                                            <tr>
                                              <th>{{$i+1}}</th>
                                              <th>{{$allReviews[$i]["name"]}}</th>
                                              <th>{{$allReviews[$i]["review"]}}</th>
                                              <th>{{$allReviews[$i]["rating"]}}</th>
                                              <th>{{$allReviews[$i]["type"]}}</th>
                                  			  <th>{{ date("Y-m-d H:i:s",strtotime($allReviews[$i]["created_at"]))}}</th>
                                    		</tr>                                    	
                                  		@endfor
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


 


@foreach($allReviews as $key => $value)
<div class="modal fade" id="delete-{{$value['id']}}" role="dialog">
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
                <a href="{{ url('/user_notifications/'.$value['id'].'/delete') }}" class="btn backgroundbuttoncolor">Delete</a>
        </div>
      </div>      
    </div>
</div>
@endforeach

@endsection
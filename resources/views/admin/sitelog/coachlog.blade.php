@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('manage_caochlog'),'sub_category_name' => __(''),  'page_name' => __('manage_caochlog')])
@section('page_title' ,$page_title)

{{-- {{  dd(MLM::testFunc())  }} --}}
@section('content')
<style>
.online-red{color:red;}
.online-green{color:green;}
</style>
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-12 col-12">
                                            <h4>Manage Coach Log</h4>
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
                    <table id="alter_pagination" class="table table-hover non-hover caochlog" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                     
                                        <th>Email</th>
                                        <th>Online Status</th>    
                                        <th>Date</th>
                                        <th class="dt-no-sorting">Action</th>
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


  


  @foreach($sitelog as $key => $value)
<div class="modal fade" id="site-{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      {{$value->id}}
      
    </div>
  </div>
  @endforeach


    
     <script type="text/javascript">
  $(document).on('click' , '.siteid' , function(){
      
    let id=$(this).attr('data-id');

      var urll = url( pathh);
        var table = $('.alllog').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
          
                 ajax: url('logs/'+id),
       columns: [
           {data: 'email' , name: 'email'},
         
          {data: 'login' , name: 'login'},
          {data: 'logout' , name: 'logout'},
           {data: 'status', status: 'status'},           
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}
    
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });
    
       table.draw();
    
    }
</script>
    
@endsection
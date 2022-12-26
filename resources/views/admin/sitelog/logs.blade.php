@extends('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('manage_all_logg'),'sub_category_name' => __(''),  'page_name' => __('manage_all_logh')])
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
                
                    
                    <table id="dt" class="table table-striped" style="width:100%">
        <thead>
             <th>id</th>
                                     
                                        <th>Time In</th>
                                        <th>Time Out </th>
                                        <th>Date</th>
        </thead>
        <tbody>
          @php $i=1; @endphp
            @foreach($sitelog as $site)
                                   <tr>
                                        <th>{{$i++}}</th>
                                     
                                        <th>{{$site->login}}</th>
                                        <th>{{$site->logout}} </th>
                                        <th>{{$site->created_at}}</th>
                                       
                                    </tr>
          
    
                      
                                  @endforeach
          
           
          
         
    </table>

                        </div>



                            </div>
                        </div>
                      </div>
</div>
</div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.0/css/colReorder.bootstrap.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.0/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

<style>
    div.dt-button-background {
        position: unset !important;
        z-index: 0;
    }
    .dt-button-collection {
        margin-top: 5.5px !important;
        margin-bottom: 5px !important;
        position: fixed !important;
    }
    .dt-button-collection button {
        background-color: white !important;
        border-color: gray;
    }
    .dt-button-collection button.active {
        background-color: #bbcdb0 !important;
        border-color: #bbcdb0;
        color: white
    }
</style>

<script>
    
   $(document).ready(function(){
       table = $( "#dt" ).DataTable( {
        stateSave: true,
        dom: 'Bfrtip',
        colReorder: true,
        
        @if(@$noSearch)
        
        searching: false,
        
        @endif
        
        buttons: [
        @if(!@$noTools)
        { extend: 'copyHtml5', className: 'btn btn-primary btn-outline btn-sm', text:'<i class="fa fa-copy"></i>'  },
        { extend: 'csv', className: 'btn btn-primary btn-outline btn-sm', text:'<i class="fa fa-file-excel-o"></i>' },
        { extend: 'colvis', className: 'btn btn-outline btn-default', text: '<i class="fa fa-columns"></i>' },
        @endif
        
        @if(!@$noPaging)
        { extend: 'pageLength', className: 'btn btn-outline btn-default', text: '<i class="fa fa-table"></i>' }
        @endif
        
        ]
        
        
    })
    });
    
</script>

@endsection
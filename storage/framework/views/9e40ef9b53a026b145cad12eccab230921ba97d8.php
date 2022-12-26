
<?php $__env->startSection('page_title' ,$page_title); ?>



<?php $__env->startSection('content'); ?>
<style>
.online-red{color:red;}
.online-green{color:green;}
</style>
 <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
          <?php $i=1; ?>
            <?php $__currentLoopData = $sitelog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <tr>
                                        <th><?php echo e($i++); ?></th>
                                     
                                        <th><?php echo e($site->login); ?></th>
                                        <th><?php echo e($site->logout); ?> </th>
                                        <th><?php echo e($site->created_at); ?></th>
                                       
                                    </tr>
          
    
                      
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
           
          
         
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
        
        <?php if(@$noSearch): ?>
        
        searching: false,
        
        <?php endif; ?>
        
        buttons: [
        <?php if(!@$noTools): ?>
        { extend: 'copyHtml5', className: 'btn btn-primary btn-outline btn-sm', text:'<i class="fa fa-copy"></i>'  },
        { extend: 'csv', className: 'btn btn-primary btn-outline btn-sm', text:'<i class="fa fa-file-excel-o"></i>' },
        { extend: 'colvis', className: 'btn btn-outline btn-default', text: '<i class="fa fa-columns"></i>' },
        <?php endif; ?>
        
        <?php if(!@$noPaging): ?>
        { extend: 'pageLength', className: 'btn btn-outline btn-default', text: '<i class="fa fa-table"></i>' }
        <?php endif; ?>
        
        ]
        
        
    })
    });
    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('manage_all_logg'),'sub_category_name' => __(''),  'page_name' => __('manage_all_logh')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/sitelog/logs.blade.php ENDPATH**/ ?>
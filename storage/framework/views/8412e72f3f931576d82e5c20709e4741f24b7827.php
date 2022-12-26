
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


  


  <?php $__currentLoopData = $sitelog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="site-<?php echo e($value->id); ?>" role="dialog">
    <div class="modal-dialog">
    
      <?php echo e($value->id); ?>

      
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    
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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('manage_caochlog'),'sub_category_name' => __(''),  'page_name' => __('manage_caochlog')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/sitelog/coachlog.blade.php ENDPATH**/ ?>
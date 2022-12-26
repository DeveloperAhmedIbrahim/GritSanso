
<?php $__env->startSection('page_title' ,$page_title); ?>


<?php $__env->startSection('content'); ?>

<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-12 col-12">
                                            <h4>Manage User notification</h4>
                                        </div>
                                 
                                        </div>                                                        
                                </div>
                                
                               
                            

                 <div class="widget-content widget-content-area br-6 mt-5">
                  <div class="table-responsive">
                    <table id="alter_pagination" class="table table-hover non-hover user_notification" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Send_to</th>
                                        <th>Send_from</th>
                                    
                                        <th>Service</th>
                                    <th>Status</th>
                                      
                                        <th>Date</th>
                                       
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


 


  <?php $__currentLoopData = $User_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="delete-<?php echo e($value->id); ?>" role="dialog">
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
                <a href="<?php echo e(url('/user_notifications/'.$value->id.'/delete')); ?>" class="btn backgroundbuttoncolor">Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('user_notification'),'sub_category_name' => __(''),  'page_name' => __('manage_user_notification')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/user_notifications/index.blade.php ENDPATH**/ ?>
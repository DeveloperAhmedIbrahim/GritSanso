
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
                                            <h4>Manage Reviews</h4>
                                        </div>
                                 
                                        </div>                                                        
                                </div>
                                
                               
                            

                 <div class="widget-content widget-content-area br-6 mt-5">
                  <div class="table-responsive">
                    <table id="alter_pagination" class="table table-hover non-hover reviews_table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                       <th>Caoch</th>
                                        <th>Coachee</th> 
                                      <th>Reviews</th>
                                        <th>Rating</th>
                                     
                                      
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


 


  <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('reviews'),'sub_category_name' => __(''),  'page_name' => __('manage_reviews')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/review/index.blade.php ENDPATH**/ ?>
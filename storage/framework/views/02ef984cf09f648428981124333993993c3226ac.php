
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
                                            <h4>Manage  Payout</h4>
                                        </div>
                                       
                                        </div>                                                        
                                </div>
                                
                               
                            

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


<?php $__currentLoopData = $payout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<div class="modal fade" id="delete-<?php echo e($value->id); ?>" role="dialog">
    <div class="modal-dialog">
    
    
      
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="delete-1" role="dialog">
   
  </div>
  <?php $__currentLoopData = $payout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="statuss-<?php echo e($value->status); ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Disable Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
                         <h5>Are you sure to  
                        <?php if($value->status == 0): ?>
                       Enable
                        <?php else: ?>
                 Disbale
                      
                        <?php endif; ?> 

                        </h5>
                    </div>
                    <div class="modal-footer">
                      <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                        
                        <?php if($value->status == 0): ?>
                        <a href="<?php echo e(url('/payout/'.$value->id.'/update')); ?>" class="btn backgroundbuttoncolor">Active</a>
                        <?php else: ?>
                        <a href="<?php echo e(url('/payout/'.$value->id.'/update')); ?>" class="btn backgroundbuttoncolor">Deactive</a>
                      
                        <?php endif; ?>
                    </div>
      </div>
      
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


 <?php $__currentLoopData = $payout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="clearence-<?php echo e($value->id); ?>" role="dialog">
    <div class="modal-dialog">
   <form action="<?php echo e(url('/payoutdate/')); ?>" method="POST" id="">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
     
     
                        
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
 <input value="<?php echo e($value->id); ?>" type="hidden" id="input" class="form-control" name="id" />	
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
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('manage_payout'),'manage_deposite' => __(''),  'page_name' => __('manage_payout')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/payout/index.blade.php ENDPATH**/ ?>
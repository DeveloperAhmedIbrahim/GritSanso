<link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/table/datatable/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/table/datatable/custom_dt_html5.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/table/datatable/dt-global_style.css')); ?>">


<?php $__env->startSection('page_title', $page_title); ?>


<?php $__env->startSection('content'); ?>

    <div id="content" class="main-content">
        <div class="container" style="margin-top: 30px;">
            <div class="container">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-10 col-md-10 col-sm-12 col-12">
                                    <h4>Manage Coach</h4>
                                </div>
                                <div class="col-xl-2 col-md-2 col-sm-12 col-12">
                                    <a href="<?php echo e(url('/coach/create')); ?>" class="btn backgroundbuttoncolor">Add Coach</a>
                                </div>
                            </div>
                        </div>
                        
                        
                        

                        <div class="widget-content widget-content-area br-6 mt-5">
                            <div class="table-responsive">
                                <table id="" class="table table-hover non-hover users_table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                          
                                            <th>Country</th>
                                            <th>Profile Picture</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th class="dt-no-sorting">Action</th>
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





    <?php $__currentLoopData = $coach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <a href="<?php echo e(url('/coach/' . $value->id . '/delete')); ?>" class="btn backgroundbuttoncolor">Delete</a>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $coach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>




        <div class="modal fade" id="account_status-<?php echo e($value->id); ?>" role="dialog">
            <div class="modal-dialog">
<?php
              $service=\App\Models\ServiceModel::where('user_id',$value->id)->value('service_title');
?>
              <?php if(empty($service)): ?>
              <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">You Cannot Approved!  <?php echo e($value->name); ?> didn't Select Service</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
              </div>
              
          <?php else: ?>   
            
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Coach Active/Deactive Modal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <?php if($value->account_status == 0): ?>
                            <h5>Are you Sure To Active Coach?</h5>
                        <?php else: ?>
                            <h5>Are you Sure To Deactive Coach?</h5>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>

                        <?php if($value->account_status == 0): ?>
                            <a href="<?php echo e(url('/coach/' . $value->id . '/status')); ?>"
                                class="btn backgroundbuttoncolor">Active</a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/coach/' . $value->id . '/status')); ?>"
                                class="btn backgroundbuttoncolor">Deactive</a>
                        <?php endif; ?>
                    </div>
                </div>
    <?php endif; ?>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', ['class' => 'off-canvas-sidebar', 'category_name' => __('coach'), 'sub_category_name' => __(''), 'page_name' => __('manage_coach')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/coach/index.blade.php ENDPATH**/ ?>
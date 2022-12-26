
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
                                    <h4>Manage Topic</h4>
                                </div>
                                <div class="col-xl-2 col-md-2 col-sm-12 col-12">
                                    <a href="<?php echo e(url('/topic/create')); ?>" class="btn backgroundbuttoncolor">Add Topic</a>
                                </div>
                            </div>
                        </div>
                        
                        
                        

                        <div class="widget-content widget-content-area br-6 mt-5">
                            <div class="table-responsive">
                                <table id="" class="table table-hover non-hover topic" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Coach Service</th>
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


    <div class="modal fade" id="add_topic" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Topic</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
             <form action="<?php echo e(url('/topic/store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
            <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
            <label>Name<span class="text-danger">*</span></label>
            <input type="text" name="topic" class="form-control" placeholder="Enter Topic">
            </div>
            
            </div>
            </div>
            <div class="modal-footer">
              <a class="btn backgroundbuttoncolor" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <input type="submit" name="submit" class="btn backgroundbuttoncolor" value="Add">
            </div>
            </form>
          </div>
          
        </div>
      </div>
     
      <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="modal fade" id="edit-<?php echo e($value->id); ?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Topic</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
             <form action="<?php echo e(url('/topic/'.$value->id.'/update/')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
            <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
            <label>Name<span class="text-danger">*</span></label>
            <input type="text" name="topic" id="topic-<?php echo e($value->id); ?>" class="form-control" placeholder="Enter Name" value="<?php echo e($value->name); ?>">
            </div>
         
              
            <div class="col-md-12">
            <label>Services<span class="text-danger">*</span></label>
              
            <select name="coach_service_id" class="form-control" id="coach_service">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($val->id); ?>" "<?php echo e(($val->id  == $value->coach_service_id) ? 'selected' : ''); ?>"> 
                  <?php echo e($val->service_title); ?> 
                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
            </div>
            </div>
           
            <div class="modal-footer">
              <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
            </form>
          </div>
          
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     
    
    
      <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
              <a class="btn backgroundbuttoncolor"  data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                    <a href="<?php echo e(url('/topic/'.$value->id.'/delete')); ?>" class="btn backgroundbuttoncolor" >Delete</a>
            </div>
          </div>
          
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', ['class' => 'off-canvas-sidebar', 'category_name' => __('topic'), 'sub_Transaction' => __(''), 'page_name' => __('manage_topic')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/topic/index.blade.php ENDPATH**/ ?>
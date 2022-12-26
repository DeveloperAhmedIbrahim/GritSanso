
<?php $__env->startSection('content'); ?>
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget">
                             <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <h2 class="font-weight-italic" style="font-size: 40px;"><?php echo e($all_coach); ?></h2>
                            <h5 class="font-weight-italic">Total Coach</h5>
                            <a href="<?php echo e(url('/coach')); ?>" class="btn mt-3" style="background: #009688; color: white;">View All</a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <i class="fa fa-users" aria-hidden="true" style="font-size:45px; color: #009688; float: right;"></i> 
                            </div>
                             </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget">
                             <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <h2 class="font-weight-italic" style="font-size: 40px;"><?php echo e($blog); ?></h2>
                            <h5 class="font-weight-italic">Total Blogs</h5>
                            <a href="<?php echo e(url('/blog')); ?>" class="btn mt-3" style="background: #009688; color: white;">View All</a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <i class="fa fa-file" aria-hidden="true" style="font-size:45px; color: #009688; float: right;"></i> 
                            </div>
                             </div>
                            
                        </div>
                    </div>
                      
                         <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget">
                             <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">


                            <h2 class="font-weight-italic" style="font-size: 40px;"><?php echo e($author); ?></h2>
                            <h5 class="font-weight-italic">Total Authors</h5>
                            <a href="<?php echo e(url('/author')); ?>" class="btn mt-3" style="background: #009688; color: white;">View All</a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <i class="fa fa-user" aria-hidden="true" style="font-size:45px; color: #009688; float: right;"></i> 
                            </div>
                             </div>
                            
                        </div>
                    </div>

 
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget">
                             <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <h2 class="font-weight-italic" style="font-size: 40px;"><?php echo e($service); ?></h2>
                            <h5 class="font-weight-italic">Categories</h5>
                            <a href="<?php echo e(url('/service_category')); ?>" class="btn mt-3" style="background: #009688; color: white;">View All</a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <i class="fa fa-cogs" aria-hidden="true" style="font-size:45px; color: #009688; float: right;"></i> 
                            </div>
                             </div>
                            
                        </div>
                    </div>














         

                    

                </div>

            </div>

        </div>
        <!--  END CONTENT AREA  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master' , ['category_name' => 'dashboard' , 'page_name' => 'admin_dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\GritSanso\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
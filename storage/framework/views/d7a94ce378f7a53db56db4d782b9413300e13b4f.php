
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
                                            <h4>Manage Coachee Log</h4>
                                        </div>
                                       
                                        </div>                                                        
                                </div>
                                
                               
                            

                 <div class="widget-content widget-content-area br-6 mt-5">
                  <div class="table-responsive">
                    <table id="alter_pagination" class="table table-hover non-hover sitelog" style="width:100%">
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


  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('manage_log'),'sub_category_name' => __(''),  'page_name' => __('manage_log')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/sitelog/coacheelog.blade.php ENDPATH**/ ?>
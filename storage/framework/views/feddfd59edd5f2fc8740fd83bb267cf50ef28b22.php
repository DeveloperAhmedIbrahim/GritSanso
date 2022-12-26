
<?php $__env->startSection('page_title' ,$page_title); ?>
<?php $__env->startSection('content'); ?>

<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                            <h4>Add User Notification</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="<?php echo e(url('/notification')); ?>" class="btn backgroundbuttoncolor">Manage User Notification</a>
                                        </div>
                                        </div>                                                        
                                </div>
                                <?php if(Session::has('success')): ?>
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?php echo e(Session::get('success')); ?>

                                </div>
                                <?php endif; ?>
                                
                               
                            

                 <div class="widget-content widget-content-area br-6 mt-5">
                    <form action="<?php echo e(url('/notification/store')); ?>" method="POST" id="formfordoctor">
                        <?php echo csrf_field(); ?>
                      
                       
                    <div class="row">
                    
                      
                      <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Users:</label>
                                <select name="send_to" class="form-control searcharticlebypackage">
                                <option>-- Select Users --</option>
                                 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                          </div> 
                     
                       <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Coaching Services:</label>
                         		<select name="topic" class="form-control searcharticlebypackage">
                               		<?php $__currentLoopData = $coachingServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                		<option value="<?php echo e($value->id); ?>"><?php echo e($value->service_title); ?></option>
                                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <!--<select name="topic" class="form-control searcharticlebypackage">
                                <option>-- Select Topics --</option>
                                 <?php $__currentLoopData = $topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->topic); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>-->
                          </div> 
                      
                      
                      <div class="col-md-6">
                    <div class="form-group">
                     <label class="font-weight-bold">Subject<span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Subject"value="<?php echo e(old('title')); ?>">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                     <label class="font-weight-bold">Body<span class="text-danger">*</span></label>
                    <textarea name="body" class="form-control" id="ck_editor"></textarea>
                     <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    </div>
                    </div>
                    <button type="submit" class="btn backgroundbuttoncolor mt-3">Create</button>
                    </form>
                        </div>
                            </div>
                        </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('user_notification'),'page_name' => __('create_notification')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/user_notifications/create.blade.php ENDPATH**/ ?>
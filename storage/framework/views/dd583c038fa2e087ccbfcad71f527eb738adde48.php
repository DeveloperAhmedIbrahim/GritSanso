
<?php $__env->startSection('page_title' ,$page_title); ?>
<?php $__env->startSection('content'); ?>
<style>
    #dp{
        width:25%;
        
    }
    .dp{
        width:35%;
    }
    .widget-content-area{
        padding-top:0;
    }
</style>
<div id="content" class="main-content">
<div class="container" style="margin-top: 30px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                        <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                          <?php if(@$coach->type=='coach'): ?>
                                            <h4>Edit Coach</h4>
                                          <?php else: ?>
                                          <h4>
                                            Edit Coachee
                                          </h4>
                                          <?php endif; ?>
                                          
                                              <?php if(empty($coach->profile_picture)): ?>
                                                                                     <img src="https://az-solutions.pk/coachee/assets/img/dumy.jpg" width="150" height="150" style="border-radius:5%;">
                                        <?php else: ?>
                           

                                           <img src="<?php echo e($coach->profile_picture); ?>"
                                                            width="300" height="auto">
                                        <?php endif; ?>  
                                       
                 
                                        
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                             <?php if(@$coach->type=='coach'): ?>
                                                <a href="<?php echo e(url('/coach')); ?>" class="btn backgroundbuttoncolor">Manage Coach</a>
                                          <?php else: ?>
                                          <h4>
                                                <a href="<?php echo e(url('/coachee')); ?>" class="btn backgroundbuttoncolor">Manage Coachee</a>
                                          </h4>
                                          <?php endif; ?>
                                       
                                       
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
                    <form action="<?php echo e(url('/coach/'.$coach->id.'/update')); ?>" method="POST" id="formfordoctor">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                    <div class="row">
                     
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required placeholder="Enter Name" value="<?php echo e($coach->name); ?>">
                    </div>
                    <?php $__errorArgs = ['name'];
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
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" readonly class="form-control" required placeholder="e.g xyz@gmail.com"  value="<?php echo e($coach->email); ?>">
                    </div>
                    <?php $__errorArgs = ['email'];
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


                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="password" name="password"  value=""  class="form-control" placeholder="Enter Password">
                    </div>
                    <?php $__errorArgs = ['password'];
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
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation"   value="" class="form-control" placeholder="Confirm Password" >
                    </div>
                    <?php $__errorArgs = ['password_confirmation'];
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
                    
                   <?php if($coach->type == "coach"): ?>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Phone Number<span class="text-danger">*</span></label>
                    <input type="text" name="phone_number"  class="form-control  <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="e.g 092021234564"  
                    value="<?php echo e($coach->phone_number); ?>">
                     <?php $__errorArgs = ['phone_number'];
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
                    
                    
                    
                
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Country<span class="text-danger">*</span></label>
                      <?php
                      $country =App\Models\Country::where('id' ,  $coach->country_id)->value('name');
                    
                      ?>
                    <input type="text" name="" readonly  class="form-control  <?php $__errorArgs = [''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    value="<?php echo e($country); ?>">
                     <?php $__errorArgs = [''];
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
                    
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Linkedin Link<span class="text-danger">*</span></label>
                    <input type="text" name="linkedin_link" required class="form-control   <?php $__errorArgs = ['linkedin_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Linkedin Link"  value="<?php echo e($coach->linkedin_link); ?>">
                     <?php $__errorArgs = ['linkedin_link'];
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
                    
                    
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Passport<span class="text-danger"></span></label>
                    <input type="text" name="passport_id" required class="form-control  <?php $__errorArgs = ['passport_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Passport"  value="<?php echo e($coach->passport_id); ?>">
                     <?php $__errorArgs = ['passport_id'];
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
                   
                   
                 
                    
                    
                    <?php endif; ?>
                    
                    </div>
                    <button type="submit" class="btn backgroundbuttoncolor mt-3">Update</button>
                    </form>
                        </div>
                            </div>
                        </div>
</div>
</div>
</div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('coach'),'page_name' => __('')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/coach/edit.blade.php ENDPATH**/ ?>
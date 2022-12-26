
<?php $__env->startSection('page_title', $page_title); ?>
<?php $__env->startSection('content'); ?>




<style>
    .rounded-pills-icon .nav-pills .nav-link.active, .rounded-pills-icon .nav-pills .show > .nav-link{
                        background-color: #009688 !important;
                    }
  .flStackForm img {
  margin: 100px;
  transition: transform 0.25s ease;
  cursor: zoom-in;
}

.click-zoom input[type=checkbox] {
  display: none
}

.click-zoom img {
  margin: 100px;
  transition: transform 0.25s ease;
  cursor: zoom-in
}

.click-zoom input[type=checkbox]:checked~img {
  transform: scale(2);
  cursor: zoom-out
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
<h4>Coach Details</h4>                                          <?php else: ?>
                                          <h4>
                      Coachee Details
                                          </h4>
                                          <?php endif; ?>
                                  
                                </div>
                                <div class="col-xl-3 col-md-3 col-sm-3 col-3 text-right">
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
                        <div class="widget-content widget-content-area rounded-pills-icon">

                            <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-pills-icon-tab"
                                role="tablist">
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab"
                                        data-toggle="pill" href="#rounded-pills-icon-home" role="tab"
                                        aria-controls="rounded-pills-icon-home" aria-selected="true"><i
                                            data-feather="home"></i><?php echo e(@$coach->type); ?> <br>Info</a>
                                </li>
                                <?php if($coach->type == 'coach'): ?>
                                    <li class="nav-item ml-2 mr-2">
                                        <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab"
                                            data-toggle="pill" href="#rounded-pills-icon-profile" role="tab"
                                            aria-controls="rounded-pills-icon-profile" aria-selected="false"><i
                                                data-feather="user"></i> <?php echo e(@$coach->type); ?> Services</a>
                                    </li>
                                <?php endif; ?>

                                <?php if($coach->type == 'coach'): ?>
                                    <li class="nav-item ml-2 mr-2">
                                        <a class="nav-link mb-2 text-center" id="rounded-pills-icon-contact-tab"
                                            data-toggle="pill" href="#rounded-pills-icon-contact" role="tab"
                                            aria-controls="rounded-pills-icon-contact" aria-selected="false"><i
                                                data-feather="book"></i><?php echo e(@$coach->type); ?> Academics</a>
                                    </li>
                                <?php endif; ?>

                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 text-center" id="rounded-pills-icon-document-tab"
                                        data-toggle="pill" href="#rounded-pills-icon-document" role="tab"
                                        aria-controls="rounded-pills-icon-contact" aria-selected="false"><i
                                            data-feather="file"></i><?php echo e(@$coach->type); ?> Documents</a>
                                </li>

                                <?php if($coach->type == 'coach'): ?>
                                    <li class="nav-item ml-2 mr-2">
                                        <a class="nav-link mb-2 text-center" id="rounded-pills-icon-wallet-tab"
                                            data-toggle="pill" href="#rounded-pills-icon-wallet" role="tab"
                                            aria-controls="rounded-pills-icon-contact" aria-selected="false"><i
                                                data-feather="dollar-sign"></i><?php echo e(@$coach->type); ?> Wallet</a>
                                    </li>
                                <?php endif; ?>


                                
                            </ul>
                            <div class="tab-content" id="rounded-pills-icon-tabContent">
                                <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-home-tab">
                                    <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <?php if(empty($coach->profile_picture)): ?>
                                                        <img src="<?php echo e(asset('assets/img/dumy.jpg')); ?>" width="300"
                                                            height="300" style="border-radius:5%;">
                                                    <?php else: ?>
                                                        <img src="<?php echo e($coach->profile_picture); ?>"
                                                            width="300" height="auto">
                                                    <?php endif; ?>

                                                    <div>
                                                        <h5 class="text-center mt-3">
                                                            
                                                            <a
                                                                href="<?php echo e($coach->linkedin_link ? $coach->linkedin_link : 'https://www.linkedin.com/in/dummy-account-0679081b5/'); ?>"
                                                                class="btn backgroundbuttoncolor" target="_blank"
                                                                style="color:white;"><i data-feather="linkedin"></i></a>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                                    <h1 class="ml-4"><?php echo e(ucwords($coach->name)); ?></h1>
                                                    <?php if(empty($coach->about)): ?>
                                                        <p style="justify-content: center;padding: 3px 26px 26px;">
                                                           Lor em Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem Ipsum has been the industry's standard dummy
                                                            text ever since the 1500s, when an unknown printer took a galley
                                                            of type and scrambled it to make a type specimen book. It has
                                                            survived not only five centuries, but also the leap into
                                                            electronic typesetting, remaining essentially unchanged. It was
                                                            popularised in the 1960s with the release of Letraset sheets
                                                            containing Lorem Ipsum passages, and more recently with desktop
                                                            publishing software like Aldus PageMaker including versions of
                                                            Lorem Ipsum.
                                                        <?php else: ?>
                                                        <p style="justify-content: center;padding: 3px 26px 26px;">
                                                            <?php echo e($coach->about); ?></p>
                                                    <?php endif; ?>
                                                    </p>
                                                    <h4 class="ml-4 font-weight-bold"><i data-feather="mail"
                                                            style="color:#509dbc;"></i> <span><?php echo e($coach->email); ?></span>
                                                    </h4>
                                                    <h4 class="ml-4 font-weight-bold mt-3"><i data-feather="phone"
                                                            style="color:#509dbc;"></i>
                                                        <span><?php echo e($coach->phone_number ? $coach->phone_number : ''); ?></span>
                                                    </h4>
                                                    <h4 class="ml-4 font-weight-bold mt-3"><i data-feather="flag"
                                                            style="color:#509dbc;"></i>
                                                        <span><?php echo e(isset($country_name) ? $country_name : ''); ?></span>
                                                    </h4>
                                                    <h4 class="ml-4 font-weight-bold mt-3"><i data-feather="globe"
                                                            style="color:#509dbc;"></i>
                                                        <span>

                                                            <?php if(isset($coach->languages)): ?>
                                                                <?php $__currentLoopData = $coach->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($lang->language); ?> , 
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $attachment = \App\Models\MediaModel::where('user_id', $coach->id)->first();
                                    ?>
                                    <?php if($coach->type == 'caoch'): ?>
                                        <div class="row">
                                            <div class="col-lg-5 mt-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="font-weight-bold">Introduction Video</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <video width="320" height="240" controls>
                                                            <source
                                                                src="<?php echo e(!empty($attachment) ? asset('/docs/' . $attachment->attachment) : asset('assets/img/Introvideo.mp4')); ?>"
                                                                type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-profile-tab">

                                    <div class="table-responsive">
                                        <table id="alter_pagination" class="table table-hover non-hover users_table"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Service Category</th>
                                                    <th>Service Title</th>
                                                   
                                                    <th>Service Charges</th>
                                                    <th>Service Status</th>
                                                    <th class="dt-no-sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($services->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($key + 1); ?></td>
                                                            <td><?php echo e(isset($value->sercategories) ? $value->sercategories->service : ''); ?>

                                                            </td>
                                                            <td><?php echo e($value->service_title); ?></td>
                                                          
                                                            <td><?php echo e($value->service_charges); ?></td>
                                                            <?php if($value->service_status != 0): ?>
                                                                <td>Approved</td>
                                                            <?php else: ?>
                                                                <td>Pending</td>
                                                            <?php endif; ?>

                                                            <td>
                                                                <?php if($value->service_status != 0): ?>
                                                                    <a href="javascript:void(0)"
                                                                        data-id="<?php echo e($value->id); ?>"
                                                                        class="service_status"><i
                                                                            data-feather="eye"></i></a>
                                                                <?php else: ?>
                                                                    <a href="javascript:void(0)"
                                                                        data-id="<?php echo e($value->id); ?>"
                                                                        class="service_status"><i
                                                                            data-feather="eye-off"></i></a>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <td colspan="5" class="text-center">No Data Available</td>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-contact-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Education</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="alter_pagination_1"
                                                    class="table table-hover non-hover users_table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>School Name</th>
                                                            <th>Field Of Study</th>
                                                            <th>Degree</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($education->isNotEmpty()): ?>
                                                            <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($key + 1); ?></td>
                                                                    <td><?php echo e($val->school_name); ?></td>
                                                                    <td><?php echo e($val->field_of_study); ?></td>
                                                                    <td><?php echo e($val->degree); ?></td>
                                                                    <td><?php echo e($val->from); ?></td>
                                                                    <td><?php echo e($val->to); ?></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <td colspan="5" class="text-center">No Data Available</td>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4>Experience</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="alter_pagination_2"
                                                    class="table table-hover non-hover users_table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Expenerice Title</th>
                                                            <th>Company Name</th>
                                                            <th>Experience To</th>
                                                            <th>Experience From</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($experience->isNotEmpty()): ?>
                                                            <?php $__currentLoopData = $experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($key + 1); ?></td>
                                                                    <td><?php echo e($vall->exp_title); ?></td>
                                                                    <td><?php echo e($vall->company_name); ?></td>
                                                                    <td><?php echo e($vall->exp_to??'Present'); ?></td>
                                                                    <td><?php echo e($vall->exp_from); ?></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <td colspan="5" class="text-center">No Data Available</td>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rounded-pills-icon-document" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-document-tab">
                                    <div class="table-responsive">
                                        <table id="alter_pagination" class="table table-hover non-hover users_table"
                                            style="width:100%">
                                            <input type="checkbox" id="zoomCheck">

                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Attachment</th>
                                                    <th>Attachment Type</th>
                                                  	<th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                              <?php
                                               	$attachment = \App\Models\MediaModel::where('user_id', $coach->id)->get();		
                                              	$i=1;
                                              ?>
                                           
                                              <?php if($attach): ?>;

                                                <?php $__currentLoopData = $attach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                        
                                                <tr>
                                                  <td><?php echo e($i++); ?></td>
                                                  <td>
                                                    <?php
                                                    	$attachmentName = explode('/',$value->attachment);
														$attachmentNameIndex = count($attachmentName) - 1;
                                                    	$attachmentName = $attachmentName[$attachmentNameIndex];
                                                    	echo $attachmentName;
                                                    ?>                                                     
                                                  </td>                                                
                                                  <td><?php echo e($value->attachment_type); ?></td>
                                                  <td>
                                                    <a href="<?php echo e(asset($value->attachment)); ?>" target="_blank">view</a>
                                                    <a href="<?php echo e(url('coach/downloadMedia') . '/' . $value->id); ?>">download</a>
                                                  </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          
                                              <?php else: ?>
                                              	<td colspan="3" class="text-center">No Data Available</td>
                                              <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rounded-pills-icon-wallet" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-wallet-tab">
                                    

                                    <div class="table-responsive">
                                        <table id="alter_pagination" class="table table-hover non-hover users_table"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Balance</th>
                                                    <th>Wallet Status</th>
 <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($sanso_wallets->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $sanso_wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($key + 1); ?></td>
                                                            <td><?php echo e($value->firstName); ?></td>
                                                            <td><?php echo e($value->lastName); ?></td>
                                                            <td><?php echo e($value->email); ?></td>
                                                            <td><?php echo e($value->balance); ?></td>
                                                            <?php if($value->wallet_status != 0): ?>
                                                                <td>Approved</td>
                                                            <?php else: ?>
                                                                <td>Rejected</td>
                                                            <?php endif; ?>

 <td>
                                                              
   
    <a href="javascript:void(0)" id="changepassword"
                                                                        data-id="<?php echo e($value->id); ?>"
                                                                        class="changepassword-<?php echo e($value->id); ?>"><i
                                                                            data-feather="edit"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <td colspan="5" class="text-center">No Data Available</td>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="service_status-<?php echo e($value->id); ?>" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Coach Services Approved/Rejected Modal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <?php if($value->service_status == 0): ?>
                            <h5>Are you Sure To Approved Coach Services?</h5>
                        <?php else: ?>
                            <h5>Are you Sure To Rejected Coach Services?</h5>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>

                        <?php if($value->service_status == 0): ?>
                            <a href="<?php echo e(url('/service_status/' . $value->id)); ?>"
                                class="btn backgroundbuttoncolor">Approved</a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/service_status/' . $value->id)); ?>"
                                class="btn backgroundbuttoncolor">Rejected</a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




 <?php $__currentLoopData = $sanso_wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="changepassword-<?php echo e($value->id); ?>" role="dialog">
            <div class="modal-dialog">
 <form action="<?php echo e(url('/coach/ChangePassword/'.$value->id)); ?>" method="POST" id="formfordoctor">
                     <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sanso Wallet password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                      
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="password" name="password"  value="<?php echo e($value->password); ?>"  class="form-control" placeholder="Enter Password">
                    </div>
                   
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation"  value="<?php echo e($value->password); ?>" class="form-control" placeholder="Confirm Password" >
                    </div>
                  
                    </div> 
                    
                    </div>
                    <div class="modal-footer">
                        <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>

                    
                            <button type="submit"
                                    class="btn backgroundbuttoncolor">Change password</button>
                    
                    </div>
                       
                </div>
 </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', ['class' => 'off-canvas-sidebar', 'category_name' => __('coach'), 'page_name' => __('coach_profile')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\GritSanso\resources\views/admin/coach/show.blade.php ENDPATH**/ ?>

<?php $__env->startSection('page_title' ,$page_title); ?>
<?php $__env->startSection('content'); ?>
<style>
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:45px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #7CFC00;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #7CFC00;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #7CFC00;
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
                              	<h4>Add Reviews</h4>
                          	</div>
                          	<div class="col-xl-3 col-md-3 col-sm-3 col-3">
                              	<a href="<?php echo e(url('/addreviews')); ?>" class="btn backgroundbuttoncolor">Manage Reviews</a>
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
                      	<form action="<?php echo e(url('/storereviews/')); ?>" method="POST" id="reviewForm">
                        <?php echo csrf_field(); ?>
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              	<label class="font-weight-bold">Users Type</label>
                              	<select name="userType" id="userType" class="form-control searcharticlebypackage">                                  	
                                	<option value="0">-- Select User Type --</option>
                                  	<option value="coach">Coach</option>
                                    <option value="coachee">Coachee</option>
                              	</select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6" id="blockCoach">
                              	<label class="font-weight-bold">Select Coach</label>
                              	<select name="coachId" class="form-control searcharticlebypackage">
                                  	<?php                                  	
                                  	if(count($dataCoach) > 0)
	                                {
                                  		for($i = 0; $i < count($dataCoach); $i++)
                                        {
											echo '<option value="'.$dataCoach[$i]->id.'">'.$dataCoach[$i]->name.'</option>';
                                        }                                  		                                  
    	                            }
                                    ?>                                	
                              	</select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6" id="blockCoachee">
                              	<label class="font-weight-bold">Select Coachee</label>
                              	<select name="coacheeId" class="form-control searcharticlebypackage">                                  	
                                	<?php                                  	
                                  	if(count($dataCoachee) > 0)
	                                {
                                  		for($i = 0; $i < count($dataCoachee); $i++)
                                        {
											echo '<option value="'.$dataCoachee[$i]->id.'">'.$dataCoachee[$i]->name.'</option>';
                                        }                                  		                                  
    	                            }
                                    ?>
                              	</select>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	<label class="font-weight-bold" style="float:left;">Rating</label>
                              	<div class="rate">
                                  <input type="radio" id="star5" name="rate" value="5" onclick="setRating(5)" />
                                  <label for="star5" title="text">5 stars</label>
                                  <input type="radio" id="star4" name="rate" value="4" onclick="setRating(4)" />
                                  <label for="star4" title="text">4 stars</label>
                                  <input type="radio" id="star3" name="rate" value="3" onclick="setRating(3)" />
                                  <label for="star3" title="text">3 stars</label>
                                  <input type="radio" id="star2" name="rate" value="2" onclick="setRating(2)" />
                                  <label for="star2" title="text">2 stars</label>
                                  <input type="radio" id="star1" name="rate" value="1" onclick="setRating(1)" />
                                  <label for="star1" title="text">1 star</label>
                              	</div>
                              	<input type="hidden" name="rating" id="rating" value="0"> 
                            </div>
                          </div>
                          <div class="row mt-4">
                    		<div class="col-md-12">
                    			<div class="form-group">
                                  <label class="font-weight-bold">Message</label>
                                  <textarea name="message" class="form-control" id="ck_editor" required></textarea>                     			
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  	var userType = $("#userType").val();
    if(userType == "coachee")
    {
      $("#blockCoachee").css("display","block");
      $("#blockCoach").css("display","none");
    }
    else if(userType == "coach")
    {
      $("#blockCoachee").css("display","none");
      $("#blockCoach").css("display","block");
    }
    else
    {
      $("#blockCoachee").css("display","none");
      $("#blockCoach").css("display","none");
    }
	$("#userType").change(function(){
      var userType = $("#userType").val();
      if(userType == "coachee")
      {
        $("#blockCoachee").css("display","block");
        $("#blockCoach").css("display","none");
      }
      else if(userType == "coach")
      {
        $("#blockCoachee").css("display","none");
        $("#blockCoach").css("display","block");
      }
      else
      {
        $("#blockCoachee").css("display","none");
        $("#blockCoach").css("display","none");
      }
    });
  	function setRating(rating)
  	{
      $("#rating").val(rating);
    }
  	$("#reviewForm").submit(function(){
      var userType = parseInt($("#userType").val());
      var rating = parseInt($("#rating").val());
      if(userType == 0)
      {
      	alert("Select user!");
        return false;
      }
      else if(rating == 0)
      {
        alert("Select rating!");
        return false;
      }
      else
      {
        return true;
      }
      return false;
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master' , ['class' => 'off-canvas-sidebar', 'category_name' => __('user_notification'),'page_name' => __('create_notification')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gritsansoh/public_html/resources/views/admin/review/create.blade.php ENDPATH**/ ?>
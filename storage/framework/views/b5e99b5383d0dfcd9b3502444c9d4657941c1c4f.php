        <!--  BEGIN SIDEBAR  -->
        <style>
            .fa {
            font-size: 20px; 
            
            vertical-align: middle;
            padding-right: 20px;
            }
            body {background: #f9fbfd;}
            .sidebar-wrapper{
                
        border: 0;
    }
       .form-control-file {
    width: 100%;
    color: #009688!important;
}
    
   .sidebar-overflow
   {
     height:400px;
     overflow:auto;
   }
   .sidebar-overflow::-webkit-scrollbar {
    width:5px;
   }
   .sidebar-overflow::-webkit-scrollbar-track {
     -webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.3); 
     border-radius:5px;
   }
   .sidebar-overflow::-webkit-scrollbar-thumb {
     border-radius:5px;
     -webkit-box-shadow: inset 0 0 6px #009688; 
   }   
    #sidebar ul.menu-categories li.menu > .dropdown-toggle{}
          </style>
            <div class="sidebar-wrapper sidebar-theme">
                <?php if($category_name): ?>
                <nav id="sidebar">
                    <div class="profile-info">
                        
                        
                    </div>
                    
                    <ul class="list-unstyled menu-categories sidebar-overflow" id="accordionExample" style="height:600px;overflow:auto;">
                       
    
                 <li class="menu <?php echo e(($category_name === 'dashboard') ? 'active' : ''); ?>">
                    <a href="#dasboard" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'dashboard') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'dashboard') ? 'show' : ''); ?> "
                        id="dasboard" data-parent="#accordionExample">
                        <li class="<?php echo e(($page_name === 'admin_dashboard') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('dashboard/')); ?>">Admin Dashboard</a>
                        </li> 
                        <li class="<?php echo e(($page_name === 'manage_profile') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/profile')); ?>">Admin Profile</a>
                        </li>   
                    </ul>
                </li>
    
                    <li class="menu <?php echo e(($category_name === 'coach') ? 'active' : ''); ?>">
                    <a href="#inventory" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'coach') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="user"></i>
                            <span>Users</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'coach') ? 'show' : ''); ?> "
                        id="inventory" data-parent="#accordionExample">
                    
                        <li class="<?php echo e(($page_name === 'add_coach') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/coach/create')); ?>">Add Coach</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'manage_coach') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/coach')); ?>">Manage Coach</a>
                        </li>
                       <li class="<?php echo e(($page_name === 'manage_coachee') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/coachee')); ?>">Manage Coachee</a>
                        </li>
                                        </ul>
                </li>
    
                    <li class="menu <?php echo e(($category_name === 'blog') ? 'active' : ''); ?>">
                    <a href="#blog" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'blog') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="file"></i>
    
                            <span>Blog</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'blog') ? 'show' : ''); ?> "
                        id="blog" data-parent="#accordionExample">
                        
                        <li class="<?php echo e(($page_name === 'manage_category') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/category')); ?>">Categories</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'add_blog') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/blog/create')); ?>">Add Blog</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'blog_list') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/blog')); ?>">Blogs List</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'manage_author') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/author')); ?>">Authors</a>
                        </li>
                       
                    </ul>
                </li>
    
                <li class="menu <?php echo e(($category_name === 'transaction') ? 'active' : ''); ?>">
                    <a href="#transaction" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'transaction') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="activity"></i>
    
                            <span>Transaction</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'transaction') ? 'show' : ''); ?> "
                        id="transaction" data-parent="#accordionExample">
                        
                        <li class="<?php echo e(($page_name === 'manage_transaction') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/transaction')); ?>">Transaction</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'booking') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('booking')); ?>">Booking</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'manage_sanso_wallet') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/sansowallet')); ?>">Sanso Wallet</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'manage_deposite') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/deposite')); ?>">Deposite</a>
                        </li>
                         <li class="<?php echo e(($page_name === 'manage_payout') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/payout')); ?>">Payout</a>
                        </li>
                        
                    </ul>
                </li>
    
                    <li class="menu <?php echo e(($category_name === 'service_categories') ? 'active' : ''); ?>">
                    <a href="#servicecategories" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'service_categories') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="align-justify"></i>
                            <span>Service Categories</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'service_categories') ? 'show' : ''); ?> "
                        id="servicecategories" data-parent="#accordionExample">
                        
                        <li class="<?php echo e(($page_name === 'manage_service_categories') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/service_category')); ?>">Service Categories</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'add_service_categories') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/service_category/create')); ?>">Add Service Categories</a>
                        </li>                   
                    </ul>
                </li>
    
        
               
    
                <li class="menu <?php echo e(($category_name === 'service_calender') ? 'active' : ''); ?>">
                    <a href="#servicecalender" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'service_calender') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="calendar"></i>
                            <span> Calendly</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'service_calender') ? 'show' : ''); ?> "
                        id="servicecalender" data-parent="#accordionExample">
                        
                        <li class="<?php echo e(($page_name === 'manage_service_categories') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/servicecalender')); ?>">Service Calender</a>
                        </li>
                                        
                    </ul>
                </li>
                
    
                <li class="menu <?php echo e(($category_name === 'manage_notification') ? 'active' : ''); ?>">
                    <a href="#notification" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'manage_notification') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="bell"></i>
                            <span>Manage Notification</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'manage_notification') ? 'show' : ''); ?> "
                        id="notification" data-parent="#accordionExample">
                        
                        <li class="<?php echo e(($page_name === 'manage_transaction') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/notification')); ?>">Notification</a>
                        </li>
                      <li class="<?php echo e(($page_name === 'create_notification') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/notification/create')); ?>">Push Notification</a>
                        </li>
                       <li class="<?php echo e(($page_name === 'manage_topic') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/topic')); ?>">Topic</a>
                        </li>
                         <li class="<?php echo e(($page_name === 'manage_reviews') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/reviews')); ?>"> Reviews</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'manage_likes') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/likes')); ?>"> Likes</a>
                        </li>
  
                    </ul>
                </li>
    
              
    
    
            <li class="menu <?php echo e(($category_name === 'setting') ? 'active' : ''); ?>">
                    <a href="#setting" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'setting') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="settings"></i>
                            <span>Web Setting</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'setting') ? 'show' : ''); ?> "
                        id="setting" data-parent="#accordionExample">
                        
                        <li class="<?php echo e(($page_name === 'manage_websetting') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/web_setting')); ?>">Web Setting</a>
                        </li>
           <li class="<?php echo e(($page_name === 'manage_websetting') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/email_controls')); ?>">Email Configuration</a>
                        </li>
                        
                        <li class="<?php echo e(($page_name === 'manage_paymentgateway') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/paymentgateway')); ?>">Payment Gateway</a>
                        </li>
    
                    </ul>
                </li>
    
    
                    <li class="menu <?php echo e(($category_name === 'review_manage') ? 'active' : ''); ?>">
                    <a href="#sitelog_manage" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'review_manage') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="align-justify"></i>
                            <span>Review</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'review_manage') ? 'show' : ''); ?> "
                        id="sitelog_manage" data-parent="#accordionExample">
                        
                        <li class="<?php echo e(($page_name === 'review_manage') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/allreviews')); ?>">Reviews</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'review_manage') ? 'active' : ''); ?>">
                          <a href="<?php echo e(url('/addreviews')); ?>">Add Reviews</a>
                        </li>                   
                    </ul>
                </li>
                      
                      <li class="menu <?php echo e(($category_name === 'sitelog_manage') ? 'active' : ''); ?>">
                    <a href="#sitelog_manage" data-toggle="collapse"
                        aria-expanded="<?php echo e(($category_name === 'sitelog_manage') ? 'true' : 'false'); ?>" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="align-justify"></i>
                            <span>Log</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled <?php echo e(($category_name === 'sitelog_manage') ? 'show' : ''); ?> "
                        id="sitelog_manage" data-parent="#accordionExample">
                        
                        <li class="<?php echo e(($page_name === 'sitelog_manage') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/coachlog')); ?>">Coach Log</a>
                        </li>
                        <li class="<?php echo e(($page_name === 'sitelog_manage') ? 'active' : ''); ?>">
                          <a href="<?php echo e(url('/coacheelog')); ?>">Coachee Log</a>
                        </li>                   
                    </ul>
                </li>
    
                    </ul>
                    
                </nav>
              <?php endif; ?>
            </div>
            <!--  END SIDEBAR  --><?php /**PATH E:\xampp\htdocs\GritSanso\resources\views/admin/inc/sidebar.blade.php ENDPATH**/ ?>
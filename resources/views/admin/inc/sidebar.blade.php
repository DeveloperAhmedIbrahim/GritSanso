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
                @if($category_name)
                <nav id="sidebar">
                    <div class="profile-info">
                        {{-- <figure class="user-cover-image"></figure> --}}
                        {{-- <div class="user-info">
                            <img src="assets/img/90x90.jpg" alt="avatar">
                            <h6 class=""></h6>
                            <p class="">{{ auth()->user()->role }}</p>
                        </div> --}}
                    </div>
                    {{-- <div class="shadow-bottom"></div> --}}
                    <ul class="list-unstyled menu-categories sidebar-overflow" id="accordionExample" style="height:600px;overflow:auto;">
                       
    {{--             <li class="menu {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                    <a href="{{ url('/') }}"
                        aria-expanded="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li> --}}
                 <li class="menu {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                    <a href="#dasboard" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'dashboard') ? 'show' : '' }} "
                        id="dasboard" data-parent="#accordionExample">
                        <li class="{{ ($page_name === 'admin_dashboard') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/') }}">Admin Dashboard</a>
                        </li> 
                        <li class="{{ ($page_name === 'manage_profile') ? 'active' : '' }}">
                            <a href="{{ url('/profile') }}">Admin Profile</a>
                        </li>   
                    </ul>
                </li>
    
                    <li class="menu {{ ($category_name === 'coach') ? 'active' : '' }}">
                    <a href="#inventory" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'coach') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="user"></i>
                            <span>Users</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'coach') ? 'show' : '' }} "
                        id="inventory" data-parent="#accordionExample">
                    
                        <li class="{{ ($page_name === 'add_coach') ? 'active' : '' }}">
                            <a href="{{ url('/coach/create') }}">Add Coach</a>
                        </li>
                        <li class="{{ ($page_name === 'manage_coach') ? 'active' : '' }}">
                            <a href="{{ url('/coach') }}">Manage Coach</a>
                        </li>
                       <li class="{{ ($page_name === 'manage_coachee') ? 'active' : '' }}">
                            <a href="{{ url('/coachee') }}">Manage Coachee</a>
                        </li>
                                        </ul>
                </li>
    
                    <li class="menu {{ ($category_name === 'blog') ? 'active' : '' }}">
                    <a href="#blog" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'blog') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="file"></i>
    
                            <span>Blog</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'blog') ? 'show' : '' }} "
                        id="blog" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'manage_category') ? 'active' : '' }}">
                            <a href="{{ url('/category') }}">Categories</a>
                        </li>
                        <li class="{{ ($page_name === 'add_blog') ? 'active' : '' }}">
                            <a href="{{ url('/blog/create') }}">Add Blog</a>
                        </li>
                        <li class="{{ ($page_name === 'blog_list') ? 'active' : '' }}">
                            <a href="{{ url('/blog') }}">Blogs List</a>
                        </li>
                        <li class="{{ ($page_name === 'manage_author') ? 'active' : '' }}">
                            <a href="{{ url('/author') }}">Authors</a>
                        </li>
                       
                    </ul>
                </li>
    
                <li class="menu {{ ($category_name === 'transaction') ? 'active' : '' }}">
                    <a href="#transaction" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'transaction') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="activity"></i>
    
                            <span>Transaction</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'transaction') ? 'show' : '' }} "
                        id="transaction" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'manage_transaction') ? 'active' : '' }}">
                            <a href="{{ url('/transaction') }}">Transaction</a>
                        </li>
                        <li class="{{ ($page_name === 'booking') ? 'active' : '' }}">
                            <a href="{{ url('booking') }}">Booking</a>
                        </li>
                        <li class="{{ ($page_name === 'manage_sanso_wallet') ? 'active' : '' }}">
                            <a href="{{ url('/sansowallet') }}">Sanso Wallet</a>
                        </li>
                        <li class="{{ ($page_name === 'manage_deposite') ? 'active' : '' }}">
                            <a href="{{ url('/deposite') }}">Deposite</a>
                        </li>
                         <li class="{{ ($page_name === 'manage_payout') ? 'active' : '' }}">
                            <a href="{{ url('/payout') }}">Payout</a>
                        </li>
                        
                    </ul>
                </li>
    
                    <li class="menu {{ ($category_name === 'service_categories') ? 'active' : '' }}">
                    <a href="#servicecategories" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'service_categories') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="align-justify"></i>
                            <span>Service Categories</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'service_categories') ? 'show' : '' }} "
                        id="servicecategories" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'manage_service_categories') ? 'active' : '' }}">
                            <a href="{{ url('/service_category') }}">Service Categories</a>
                        </li>
                        <li class="{{ ($page_name === 'add_service_categories') ? 'active' : '' }}">
                            <a href="{{ url('/service_category/create') }}">Add Service Categories</a>
                        </li>                   
                    </ul>
                </li>
    
        
               
    
                <li class="menu {{ ($category_name === 'service_calender') ? 'active' : '' }}">
                    <a href="#servicecalender" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'service_calender') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="calendar"></i>
                            <span> Calendly</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'service_calender') ? 'show' : '' }} "
                        id="servicecalender" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'manage_service_categories') ? 'active' : '' }}">
                            <a href="{{ url('/servicecalender') }}">Service Calender</a>
                        </li>
                                        
                    </ul>
                </li>
                {{-- <li class="menu {{ ($category_name === 'manage_payout') ? 'active' : '' }}">
                    <a href="#payout" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'manage_payout') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="file"></i>
                            <span>Manage Payout</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'payout') ? 'show' : '' }} "
                        id="payout" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'manage_payout') ? 'active' : '' }}">
                            <a href="{{ url('/payout') }}">Payout</a>
                        </li>
                        
                    </ul>
                </li> --}}
    
                <li class="menu {{ ($category_name === 'manage_notification') ? 'active' : '' }}">
                    <a href="#notification" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'manage_notification') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="bell"></i>
                            <span>Manage Notification</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'manage_notification') ? 'show' : '' }} "
                        id="notification" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'manage_transaction') ? 'active' : '' }}">
                            <a href="{{ url('/notification') }}">Notification</a>
                        </li>
                      <li class="{{ ($page_name === 'create_notification') ? 'active' : '' }}">
                            <a href="{{ url('/notification/create') }}">Push Notification</a>
                        </li>
                       <li class="{{ ($page_name === 'manage_topic') ? 'active' : '' }}">
                            <a href="{{ url('/topic') }}">Topic</a>
                        </li>
                         <li class="{{ ($page_name === 'manage_reviews') ? 'active' : '' }}">
                            <a href="{{ url('/reviews') }}"> Reviews</a>
                        </li>
                        <li class="{{ ($page_name === 'manage_likes') ? 'active' : '' }}">
                            <a href="{{ url('/likes') }}"> Likes</a>
                        </li>
  
                    </ul>
                </li>
    
              
    
    
            <li class="menu {{ ($category_name === 'setting') ? 'active' : '' }}">
                    <a href="#setting" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'setting') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="settings"></i>
                            <span>Web Setting</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'setting') ? 'show' : '' }} "
                        id="setting" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'manage_websetting') ? 'active' : '' }}">
                            <a href="{{ url('/web_setting') }}">Web Setting</a>
                        </li>
           <li class="{{ ($page_name === 'manage_websetting') ? 'active' : '' }}">
                            <a href="{{ url('/email_controls') }}">Email Configuration</a>
                        </li>
                        {{-- <li class="{{ ($page_name === 'manage_payment') ? 'active' : '' }}">
                            <a href="{{ url('/paymentmethod') }}">Payment Method</a>
                        </li> --}}
                        <li class="{{ ($page_name === 'manage_paymentgateway') ? 'active' : '' }}">
                            <a href="{{ url('/paymentgateway') }}">Payment Gateway</a>
                        </li>
    
                    </ul>
                </li>
    
    
                    <li class="menu {{ ($category_name === 'review_manage') ? 'active' : '' }}">
                    <a href="#sitelog_manage" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'review_manage') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="align-justify"></i>
                            <span>Review</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'review_manage') ? 'show' : '' }} "
                        id="sitelog_manage" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'review_manage') ? 'active' : '' }}">
                            <a href="{{ url('/allreviews') }}">Reviews</a>
                        </li>
                        <li class="{{ ($page_name === 'review_manage') ? 'active' : '' }}">
                          <a href="{{ url('/addreviews') }}">Add Reviews</a>
                        </li>                   
                    </ul>
                </li>
                      
                      <li class="menu {{ ($category_name === 'sitelog_manage') ? 'active' : '' }}">
                    <a href="#sitelog_manage" data-toggle="collapse"
                        aria-expanded="{{ ($category_name === 'sitelog_manage') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="align-justify"></i>
                            <span>Log</span>
                        </div>
                        <div>
                            <i data-feather="chevron-right"></i>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ ($category_name === 'sitelog_manage') ? 'show' : '' }} "
                        id="sitelog_manage" data-parent="#accordionExample">
                        
                        <li class="{{ ($page_name === 'sitelog_manage') ? 'active' : '' }}">
                            <a href="{{ url('/coachlog') }}">Coach Log</a>
                        </li>
                        <li class="{{ ($page_name === 'sitelog_manage') ? 'active' : '' }}">
                          <a href="{{ url('/coacheelog') }}">Coachee Log</a>
                        </li>                   
                    </ul>
                </li>
    
                    </ul>
                    
                </nav>
              @endif
            </div>
            <!--  END SIDEBAR  -->
<?php
$websetting=\App\Models\WebSetting::first();
$user_notifications=\App\Models\user_notifications::where('status','unread')->orderBy('id','desc')->limit(5)->get();

?>
 <!--  BEGIN NAVBAR  -->
 <style>
    
table.dataTable {

margin-top: 42px !important;
}

.page-item:first-child .page-link, .page-item:last-child .page-link,.page-link,.pagination{
padding: 5px 12px;    border-radius: 0;

}

.page-item.active .page-link,.spinner-grow{
background-color: #009688;
}
div.dataTables_wrapper div.dataTables_info{
color:#009688;
}
   .navbar .navbar-item .nav-item.dropdown.notification-dropdown .dropdown-menu {
     min-width: 26rem;}
.navbar, .header-container .navbar-nav.theme-brand, .dt-buttons .dt-button, #sidebar ul.menu-categories li.menu:not(.active) > .dropdown-toggle[aria-expanded="true"], #sidebar ul.menu-categories li.menu.active > .dropdown-toggle, .backgroundbuttoncolor {
background-color: #009688!important;
background-image: none;
}
.dt-buttons .dt-button{
width: 55px;
height: 32px;
margin-right: 0;
}

element.style {
width: 100%;
}
table.dataTable {
margin-top: 15px !important;
}
.backgroundbuttoncolor{
float: right;
}
#alter_pagination_next a, #alter_pagination_previous a{
border-radius: 0;
}
#sidebar ul.menu-categories ul.submenu > li.active a{color: #009688 !important;}

element.style {
width: 137px;
}
table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting {
padding-right: 30px;
}
table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
cursor: pointer;
position: relative;
}
.table > thead > tr > th {

border-top: none;
background: #E0F0EF;}
   
   .notification-scroll
   {
     height:400px;
     overflow:auto;
   }
   .notification-scroll::-webkit-scrollbar {
    width:5px;
   }
   .notification-scroll::-webkit-scrollbar-track {
     -webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.3); 
     border-radius:5px;
   }
   .notification-scroll::-webkit-scrollbar-thumb {
     border-radius:5px;
     -webkit-box-shadow: inset 0 0 6px #009688; 
   }

    </style>
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        
        <ul class="navbar-nav theme-brand flex-row  text-center">
            
            <li class="nav-item theme-text">
                <a href="<?php echo e(url('dashboard')); ?>" class="nav-link ml-2"><?php if(!empty($websetting->dashboard_icon)): ?> <img src="<?php echo e(asset('WebSetting/'.$websetting->dashboard_icon)); ?>" width="60" height="60" style="border-radius: 5%;"> <?php else: ?> <?php echo e($websetting->name); ?> <?php endif; ?></a>
            </li>
            <li class="nav-item toggle-sidebar">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>
            </li>
        </ul>

        <ul class="navbar-item flex-row navbar-dropdown">
            <li class="nav-item dropdown apps-dropdown more-dropdown md-hidden">
                <div class="dropdown  custom-dropdown-icon">
               

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="appSection">
                        <a class="dropdown-item" data-value="Chat" href="apps_chat.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Chat</a>
                        <a class="dropdown-item" data-value="Mailbox" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Mailbox</a>
                        <a class="dropdown-item" data-value="Todo" href="apps_todoList.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Todo List</a>
                        <a class="dropdown-item" data-value="Notes" href="apps_notes.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Notes</a>
                        <a class="dropdown-item" data-value="Scrumboard" href="apps_scrumboard.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg> Scrumboard</a>
                        <a class="dropdown-item" data-value="Contacts" href="apps_contacts.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> Contacts</a>
                        <div class="dropdown-item-collapsable">
                            <a class="dropdown-item" data-value="Invoice" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> Invoice <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </a>
     
                        </div>                            
                        
                    </div>
                </div>
            </li>
        </ul>

        <ul class="navbar-item flex-row search-ul">
            <li class="nav-item align-self-center search-animated">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
               
            </li> 
        </ul>
        <ul class="navbar-item flex-row navbar-dropdown">
         <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">

        
                           
                      </div>
                    </div>
                </li>
         
     
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            
                            <div class="media-body">
                                <h5><?php echo e(auth()->guard('admin')->user()->name); ?></h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="<?php echo e(url('/profile')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>My Profile</span>
                        </a>
                    </div>
                    
                    <div class="dropdown-item">
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                             <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                            </form>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>

<script>
  		
	setInterval(function(){
      
    	var count = 0;
      	$.ajax({
            url:"<?php echo e(url('getAdminNotifications/')); ?>",
            method:"POST",
          	data:{"_token":"<?php echo e(csrf_token()); ?>"},
            success:function(response)
          	{
              	$(".notification-scroll").html(response);
        	}
        });
    }, 2000);
</script>


<!--  END NAVBAR  --><?php /**PATH E:\xampp\htdocs\GritSanso\resources\views/admin/inc/navbar.blade.php ENDPATH**/ ?>
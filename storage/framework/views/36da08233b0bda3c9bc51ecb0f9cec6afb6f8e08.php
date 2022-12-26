    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo e(asset('assets/js/libs/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    
    <script type="text/javascript">
    feather.replace();
</script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="<?php echo e(asset('plugins/apex/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/dash_1.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
      
    <script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/select2/custom-select2.js')); ?>"></script>

    


   

    <?php if(Session::has('success')): ?>
        <script>
        toastr.success("<?php echo e(Session::get('success')); ?>");
            
        </script>
    <?php elseif(Session::has('error')): ?>
    <script>
        toastr.error("<?php echo e(Session::get('error')); ?>");
            
        </script>

    <?php endif; ?>

    <?php if(isset($page_name)): ?>

    <?php switch($page_name):

    case ('manage_coach'): ?>

    <script type="text/javascript">
    $(document).ready(function(){
     
       var table = $('.users_table').DataTable({
       processing: true,
       serverSide: true,
       responsive: true,
       autoWidth : true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/coach')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'name' , name: 'name'},
           {data: 'email' , name: 'email'},
         
           {data: 'country' , name: 'country'},
            { data: 'profile_picture', name: 'profile_picture',
            render: function( data, type, full, meta ) {
          //    return "<img >";
             return "<img style='border-radius:1000%;width:80px;' src=\'"+ data + "'\' height=\'50\'/>";
            }
            },
           {data: 'phone_number' , name: 'phone_number'},
           {data: 'account_status', status: 'account_status', render: function(data,type,row) {
            if(data=="Active"){
                data="Active";
                    data = '<span class="badge badge-success" account_status="'+data+'" href="/#">'+data+'</span>';
                    
           }
else{
    data="Deactive"
    data = '<span class="badge badge-danger" account_status="'+data+'" href="/#">'+data+'</span>';
}                    return data;
                }},
            {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action' , orderable: false, searchable: false}
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
       });

       table.draw();

    });
    </script>

    <script type="text/javascript">
    
   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 
      
      

   $(document).on('click' , '.account_status' , function(){
    
    let id = $(this).attr('data-id');
    $('#account_status-'+id).modal('show');

   });



   $(document).on('click' , '.deposite_status' , function(){
 
    let id = $(this).attr('data-id');
    $('#deposite_status-'+id).modal('show');

   });

</script>

    <?php break; ?>;
    
    <?php case ('add_category'): ?>
    <script>
    CKEDITOR.replace('ck_editor');
    </script>
    <?php break; ?>;
    <?php case ('manage_profile'): ?>

    <script type="text/javascript">
        var messageBox = document.querySelector('.js-message');
      var btn = document.querySelector('.js-message-btn');
      var card = document.querySelector('.js-profile-card');
      var closeBtn = document.querySelectorAll('.js-message-close');

      btn.addEventListener('click',function (e) {
          e.preventDefault();
          card.classList.add('active');
      });

      closeBtn.forEach(function (element, index) {
         console.log(element);
          element.addEventListener('click',function (e) {
              e.preventDefault();
              card.classList.remove('active');
          });
      });
    </script>
    <?php break; ?>;

    <?php case ('manage_category'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.manage_category').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/category')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'title' , name: 'title'},
           {data: 'subtitle', name: 'subtitle'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}

       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });

       table.draw();

    });
</script>
          <script type="text/javascript">
    
   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

</script>
    <?php break; ?>;

    <?php case ('manage_author'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>
    

     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.manage_author').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/author')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'name' , name: 'name'},
           { data: 'image', name: 'image',
            render: function( data, type, full, meta ) {
              return "<img src=\'blog_images/"+ data + "'\' height=\'80\' width='80'/>";
          // return "<img src=\'"+ data + "'\' height=\'50\'/>";
    }
},
     
           {data: 'action' , name: 'action', orderable: false, searchable: false}

       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });

       table.draw();

    });
</script>
<script type="text/javascript">
   
   $(document).on('click' , '.edit_option' , function(){
      
    let id=$(this).attr('data-id');
    $('#edit-'+id).modal('show');

   });

   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

</script>
    
    <?php break; ?>;

    <?php case ('add_blog'): ?>
    <script>
    CKEDITOR.replace('ck_editor');
    </script>
    <script type="text/javascript">
    var ss = $(".basic").select2({
   tags: true,
    });
   </script>

    <?php break; ?>;

    <?php case ('blog_list'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

     <script type="text/javascript">
    $(document).ready(function(){
     
       var table = $('.manage_blog').DataTable({
       processing: true,
       serverSide: true,
          bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/blog')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'id'},
           {data: 'category' , name: 'category'},
           {data: 'title' , name: 'title'},
           { data: 'image', name: 'image',
            render: function( data, type, full, meta ) {
              return "<img src=\'blog_image/"+ data + "'\' height=\'80\' width='80'/>";
          // return "<img src=\'"+ data + "'\' height=\'50\'/>";
    }
},
           {data: 'author' , name: 'author'},
           {data: 'status' , name: 'status'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}

       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });

       table.draw();

    });


   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 



   $(document).on('click' , '.eye_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#eye-'+id).modal('show');

   }); 
   
 
  $(document).ready(function(){
  $('#myModal').on('click', function() {
    var $el = $(this);
    var $username = $el.data('amount');
    alert($username);
    $(".modal-title").html($username);
  });
});
</script>





  <script type="text/javascript">
      $(document).on('change' , '.showpublishdraftblog' , function(){
      let id=$(this).val();

      $.ajax({
              url: '<?php echo e(url('/showpublishdraftblog')); ?>/'+id,
              type: 'POST',
              data: {_token : '<?php echo e(csrf_token()); ?>'},
              success: function (data) {
                  alert(data);
              }
          });

      });

  </script>

    <?php break; ?>;

    <?php case ('coach_profile'): ?>

<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

<script>
              $('#alter_pagination').DataTable( {
                "pagingType": "full_numbers",
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { 
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });
</script>

<script>
              $('#alter_pagination_2').DataTable( {
                "pagingType": "full_numbers",
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { 
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });
</script>

<script>
              $('#alter_pagination_1').DataTable( {
                "pagingType": "full_numbers",
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { 
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });
</script>


<script type="text/javascript">
$(document).on('click' , '.service_status' , function(){
 
   let id=$(this).attr('data-id');
   $('#service_status-'+id).modal('show');

});
</script>

    <?php break; ?>;

    <?php case ('manage_coachee'): ?>

        <script type="text/javascript">
    $(document).ready(function(){
     
       var table = $('.users_table').DataTable({
       processing: true,
       serverSide: true,
       responsive: true,
       autoWidth : true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/coachee')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'name' , name: 'name'},
           {data: 'email' , name: 'email'},
           {data: 'country' , name: 'country'},
             { data: 'profile_picture', name: 'profile_picture',
            render: function( data, type, full, meta ) {
          //    return "<img >";
             return "<img style='border-radius:1000%;width:80px;' src=\'"+ data + "'\' height=\'50\'/>";
            }
            },
           {data: 'phone_number' , name: 'phone_number'},
           {data: 'account_status' , name: 'account_status'},
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action' , orderable: false, searchable: false}
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
       });

       table.draw();

    });
    </script>

    <script type="text/javascript">
    
   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

   $(document).on('click' , '.account_status' , function(){
    
    let id = $(this).attr('data-id');
    $('#account_status-'+id).modal('show');

   });



</script>


    <?php break; ?>;

    <?php case ('manage_websetting'): ?>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

<script>
              $('#alter_pagination').DataTable( {
                "pagingType": "full_numbers",
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { 
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });

</script>


    <?php break; ?>;

    <?php case ('manage_websetting'): ?>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

<script>
              $('#alter_pagination').DataTable( {
                "pagingType": "full_numbers",
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { 
                        "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });
</script>

    <?php break; ?>;

    <?php case ('add_service_categories'): ?>

       <script>
    CKEDITOR.replace('ck_editor');
    </script>

    <?php break; ?>;

    <?php case ('manage_service_categories'): ?>

        <script type="text/javascript">
    $(document).ready(function(){
     
       var table = $('.service_table').DataTable({
     
       processing: true,
       serverSide: true,
       responsive: true,
       autoWidth : true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/service_category')); ?>',
       },
       columns: [
         
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'service' , name: 'service'},
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action' , orderable: false, searchable: false}
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
       });

       table.draw();

    });
    </script>

    <script type="text/javascript">
          $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 
    </script>

    <?php break; ?>;

    <?php case ('add_service_categories'): ?>

       <script>
    CKEDITOR.replace('ck_editor');
    </script>

    <?php break; ?>;

    <?php case ('manage_service_categories'): ?>

        <script type="text/javascript">
    $(document).ready(function(){
     
       var table = $('.service_table').DataTable({
       processing: true,
       serverSide: true,
       responsive: true,
       autoWidth : true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/service_category')); ?>',
       },
       columns: [
           {data: 'id', name: 'id'},
           {data: 'service' , name: 'service'},
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action' , orderable: false, searchable: false}
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
       });

       table.draw();

    });
    </script>

    <script type="text/javascript">
          $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 
    </script>

    <?php break; ?>;



    <?php case ('manage_payment_gateway'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.payment_gateway').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/paymentgateway')); ?>',
       },
       columns: [
           {data: 'id', name: 'id'},
           {data: 'gateway' , name: 'gateway'},
           {data: 'gateway_type' , name: 'gateway_type'},
           {data: 'gateway_status', status: 'gateway_status', render: function(data,type,row) {
            if(data=="Active"){
                    data = '<span class="badge badge-success" gateway_status="'+data+'" href="/#">'+data+'</span>';
                    
           }
else{
    data = '<span class="badge badge-danger" gateway_status="'+data+'" href="/#">'+data+'</span>';
}                    return data;
                }},
          
           {data: 'action' , name: 'action', orderable: false, searchable: false}

       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });

       table.draw();

    });
</script>
<script type="text/javascript">
   
   $(document).on('click' , '.edit_option' , function(){
      
    let id=$(this).attr('data-id');
    $('#edit-'+id).modal('show');

   });

   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 
   
   $(document).on('click' , '.account_status' , function(){
    
    let id = $(this).attr('data-id');
    let status = $(this).attr('data-status');
    $('#account_status-'+status).modal('show');

   });

   $(document).on('click' , '.deposite_status' , function(){
 
 	let id = $(this).attr('data-id');
 	$('#deposite_status-'+id).modal('show');

	});
  
    $(document).on('click' , '.payout_status' , function(){
 
 	let id = $(this).attr('data-id');
	 $('#payout_status-'+id).modal('show');

	});

</script>
    
    <?php break; ?>;


    
    <?php case ('manage_transaction'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

    

     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.transaction').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/transaction')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'description' , name: 'description'},
           {data: 'amount' , name: 'amount'},
           {data: 'txid' , name: 'txid'},
           {data: 'servceFees' , name: 'servceFees'},
           {data: 'payment_gateway_id' , name: 'payment_gateway_id'},
           {data: 'sanso_wallet_id' , name: 'sanso_wallet_id'},
                   {data: 'final_amount' , status: 'final_amount'},

           {data: 'status', status: 'status', render: function(data,type,row) {
            if(data=="Active"){
                    data = '<span class="badge badge-success" status="'+data+'" href="/#">'+data+'</span>';
                    
           }
else{
    data = '<span class="badge badge-danger" status="'+data+'" href="/#">'+data+'</span>';
}                    return data;
                }},

           
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}

       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });

       table.draw();

    });
</script>
<script type="text/javascript">
   
   $(document).on('click' , '.edit_option' , function(){
      
    let id=$(this).attr('data-id');
    $('#edit-'+id).modal('show');

   });

   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

</script>
<?php break; ?>;


    
<?php case ('manage_deposite'): ?>

<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

 <script type="text/javascript">
$(document).ready(function(){
 
    var table = $('.deposite').DataTable({
   processing: true,
   serverSide: true,
   bLengthChange: false,
   ajax: {
     url: '<?php echo e(url('/deposite')); ?>',
   },
   columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'description' , name: 'description'},
           {data: 'amount' , name: 'amount'},
           {data: 'txid' , name: 'txid'},
           {data: 'servceFees' , name: 'servceFees'},
           {data: 'payment_gateway_id' , name: 'payment_gateway_id'},
           {data: 'sanso_wallet_id' , name: 'sanso_wallet_id'},
         
           {data: 'status', status: 'status', render: function(data,type,row) {
            if(data=="Active"){
                data="Active";
                    data = '<span class="badge badge-success" status="'+data+'" href="/#">'+data+'</span>';
                    
           }
else{
    data="Deactive"
    data = '<span class="badge badge-danger" status="'+data+'" href="/#">'+data+'</span>';
}                    return data;
                }},
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}

   ],
   "bDestroy": true,
   dom: 'lBfrtip',
    buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print'
    ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
   });

   table.draw();

});
</script>
<script type="text/javascript">

$(document).on('click' , '.edit_option' , function(){
  
let id=$(this).attr('data-id');
$('#edit-'+id).modal('show');

});


$(document).on('click' , '.statuss' , function(){
    console.log("deposite");
    let id = $(this).attr('data-id');
    let status = $(this).attr('data-status');
    $('#deposite_status-'+id).modal('show');

   });
$(document).on('click' , '.delete_option' , function(){

let id=$(this).attr('data-id');
$('#delete-'+id).modal('show');

}); 
$(document).on('click' , '.edit_option' , function(){
      
      let id=$(this).attr('data-id');
      var method = $(this).attr('data-method');
      $('#id').val(id);
      var amount = $(this).attr('data-amount');
      var username = $(this).attr('data-username');
      var transaction = $(this).attr('data-transaction');
      $('.txt_num').text(transaction);
      $('.method').text(method);
      $('.amount').text(amount);
      $('.username').text(username);
     

      $('#myModal').modal('show');
  
     });

</script>
    <?php break; ?>;


<?php case ('manage_payout'): ?>

<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

 <script type="text/javascript">
$(document).ready(function(){
 
    var table = $('.payout').DataTable({
   processing: true,
   serverSide: true,
   bLengthChange: false,
   ajax: {
     url: '<?php echo e(url('/payout')); ?>',
   },
   columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'transaction_id' , name: 'transaction_id'},
           {data: 'card_id' , name: 'card_id'},
           {data: 'sanso_wallet_id' , name: 'sanso_wallet_id'},
           {data: 'clearance' , name: 'clearance'},
          
           {data: 'status', status: 'status', render: function(data,type,row) {
          if(data=="0"){
                data="Pending";
                    data = '<span class="badge badge-danger" status="'+data+'" href="/#">'+data+'</span>';
                    
           }
          if(data=="5"){
                data="Under Clearence";
                    data = '<span class="badge badge-primary" status="'+data+'" href="/#">'+data+'</span>';
                    
           }
            if(data=="1"){
                data="Approved"

                data = '<span class="badge badge-success" status="'+data+'" href="/#">'+data+'</span>';
            }                    return data;
                
                }},
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}

   ],
   "bDestroy": true,
   dom: 'lBfrtip',
    buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print'
    ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
   });

   table.draw();

});
</script>
<script type="text/javascript">

$(document).on('click' , '.edit_option' , function(){
  
let id=$(this).attr('data-id');
$('#edit-'+id).modal('show');

});


$(document).on('click' , '.statuss' , function(){
   
    let id = $(this).attr('data-id');
    let status = $(this).attr('data-status');
    $('#statuss-'+status).modal('show');

   });
  
  
$(document).on('click' , '.clearence' , function(){
    console.log("clearence");
    let id = $(this).attr('data-id');
    let status = $(this).attr('data-status');
    $('#clearence-'+id).modal('show');

   });
$(document).on('click' , '.delete_option' , function(){

let id=$(this).attr('data-id');
$('#delete-'+id).modal('show');

}); 
$(document).on('click' , '.edit_option' , function(){
      
      let id=$(this).attr('data-id');
      var method = $(this).attr('data-method');
      $('#id').val(id);
      var amount = $(this).attr('data-amount');
      var username = $(this).attr('data-username');
      var transaction = $(this).attr('data-transaction');
      $('.txt_num').text(transaction);
      $('.method').text(method);
      $('.amount').text(amount);
      $('.username').text(username);
     

      $('#myModal').modal('show');
  
     });

</script>
    <?php break; ?>;


        
<?php case ('notification'): ?>

<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

 <script type="text/javascript">
$(document).ready(function(){
 
    var table = $('.notification').DataTable({
   processing: true,
   serverSide: true,
   bLengthChange: false,
   
   ajax: {
     url: '<?php echo e(url('/notification')); ?>',
   },
   columns: [
    {data: 'id', name: 'id'},
       {data: 'user_id', name: 'user_id'},
       {data: 'description', name: 'description'},
       {data: 'is_read', name: 'is_read'},
       {data: 'created_at', name: 'created_at'},
       {data: 'action' , name: 'action', orderable: false, searchable: false}

   ],
   "bDestroy": true,
   dom: 'lBfrtip',
    buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print'
    ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
   });

   table.draw();

});
</script>
<script type="text/javascript">

$(document).on('click' , '.edit_option' , function(){
  
let id=$(this).attr('data-id');
$('#edit-'+id).modal('show');

});

$(document).on('click' , '.delete_option' , function(){

let id=$(this).attr('data-id');
$('#delete-'+id).modal('show');

}); 

</script>
    <?php break; ?>;



    
    <?php case ('manage_booking'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

    

     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.manage_booking').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/booking')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'coach_id' , name: 'coach_id'},
           {data: 'coachee_id' , name: 'coachee_id'},
           {data: 'coach_service_id' , name: 'coach_service_id'},
           {data: 'transaction_id' , name: 'transaction_id'},
       
           {data: 'status', status: 'status', render: function(data,type,row) {
            if(data=="0"){
                data="Pending";
                    data = '<span class="badge badge-danger" status="'+data+'" href="/#">'+data+'</span>';
                    
           }
            else{
                data="Approved"

                data = '<span class="badge badge-success" status="'+data+'" href="/#">'+data+'</span>';
            }                    return data;
                
           
           }},
           {data: 'created_at' , name: 'created_at'},
        
           
           {data: 'action' , name: 'action', orderable: false, searchable: false}

       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });

       table.draw();

    });
</script>
<script type="text/javascript">
   
   $(document).on('click' , '.edit_option' , function(){
      
    let id=$(this).attr('data-id');
    $('#edit-'+id).modal('show');

   });

   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

</script>
<?php break; ?>;


<?php case ('manage_user_notification'): ?>

<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>



 <script type="text/javascript">
$(document).ready(function(){
 
    var table = $('.user_notification').DataTable({
   processing: true,
   serverSide: true,
   bLengthChange: false,
   ajax: {
     url: '<?php echo e(url('/notification')); ?>',
   },
   columns: [
       {data: 'id', name: 'id'},
       {data: 'title' , name: 'title'},
     {data: 'body' , name: 'body'},
          {data: 'send_to' , name: 'send_to'},
     {data: 'send_from' , name: 'send_from'},
     {data: 'topic' , name: 'topic'},
     
    {data: 'status', status: 'status', render: function(data,type,row) {
            if(data=="read"){
                data="Read";
                    data = '<span class="badge badge-success" status="'+data+'" href="/#">'+data+'</span>';
                    
           }
else{
    data="Unread"
    data = '<span class="badge badge-danger" status="'+data+'" href="/#">'+data+'</span>';
}                    return data;
                           }},
            {data: 'created_at' , name: 'created_at'},

     
     {data: 'action' , name: 'action', orderable: false, searchable: false}
       
     

   ],
   "bDestroy": true,
   dom: 'lBfrtip',
    buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print'
    ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
   });

   table.draw();

});
</script>
<script type="text/javascript">

$(document).on('click' , '.edit_option' , function(){
  
let id=$(this).attr('data-id');
$('#edit-'+id).modal('show');

});

$(document).on('click' , '.delete_option' , function(){

let id=$(this).attr('data-id');
$('#delete-'+id).modal('show');

}); 

</script>
<?php break; ?>;





<?php case ('manage_reviews'): ?>

<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>



 <script type="text/javascript">
$(document).ready(function(){
 
    var table = $('.reviews_table').DataTable({
   processing: true,
   serverSide: true,
   bLengthChange: false,
   ajax: {
     url: '<?php echo e(url('/reviews')); ?>',
   },
   columns: [
       {data: 'DT_RowIndex', name: 'DT_RowIndex'},
       {data: 'coach_id' , name: 'coach_id'},
     {data: 'coachee_id' , name: 'coachee_id'},
      {data: 'review' , name: 'review'},
     {data: 'ratings' , name: 'ratings'},
     
      {data: 'created_at' , name: 'created_at'},

     
     {data: 'action' , name: 'action', orderable: false, searchable: false}
       
     

   ],
   "bDestroy": true,
   dom: 'lBfrtip',
    buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print'
    ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
   });

   table.draw();

});
</script>
<script type="text/javascript">

$(document).on('click' , '.edit_option' , function(){
  
let id=$(this).attr('data-id');
$('#edit-'+id).modal('show');

});

$(document).on('click' , '.delete_option' , function(){

let id=$(this).attr('data-id');
$('#delete-'+id).modal('show');

}); 

</script>
<?php break; ?>;




<?php case ('manage_likes'): ?>

<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>



 <script type="text/javascript">
$(document).ready(function(){
 
    var table = $('.likes_table').DataTable({
   processing: true,
   serverSide: true,
   bLengthChange: false,
   ajax: {
     url: '<?php echo e(url('/likes')); ?>',
   },
   columns: [
       {data: 'DT_RowIndex', name: 'DT_RowIndex'},
       {data: 'liked_by' , name: 'likes_by'},
       {data: 'liked' , name: 'liked'},
       {data: 'created_at' , name: 'created_at'},

     {data: 'action' , name: 'action', orderable: false, searchable: false}
       
     

   ],
   "bDestroy": true,
   dom: 'lBfrtip',
    buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print'
    ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
   });

   table.draw();

});
</script>
<script type="text/javascript">

$(document).on('click' , '.edit_option' , function(){
  
let id=$(this).attr('data-id');
$('#edit-'+id).modal('show');

});

$(document).on('click' , '.delete_option' , function(){

let id=$(this).attr('data-id');
$('#delete-'+id).modal('show');

}); 

</script>
<?php break; ?>;



<?php case ('manage_sansowallet'): ?>

<script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>



 <script type="text/javascript">
$(document).ready(function(){
 
    var table = $('.sansowallet').DataTable({
   processing: true,
   serverSide: true,
   bLengthChange: false,
   ajax: {
     url: '<?php echo e(url('/sansowallet')); ?>',
   },
   columns: [
       {data: 'DT_RowIndex', name: 'DT_RowIndex'},
       {data: 'firstName' , name: 'firstName'},
       {data: 'lastName' , name: 'lastName'},
       {data: 'email' , name: 'email'},
     
       {data: 'balance' , name: 'balance'},
      
       {data: 'wallet_status', status: 'wallet_status', render: function(data,type,row) {
            if(data=="1"){
                data="Active";
                    data = '<span class="badge badge-success" wallet_status="'+data+'" href="/#">'+data+'</span>';
                    
           }
else{
    data="Deactive"
    data = '<span class="badge badge-danger" wallet_status="'+data+'" href="/#">'+data+'</span>';
}                    return data;
                }
       },
       {data: 'created_at' , name: 'created_at'},
      
     {data: 'action' , name: 'action', orderable: false, searchable: false}
       

   ],
   "bDestroy": true,
   dom: 'lBfrtip',
    buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print'
    ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
   });

   table.draw();

});
</script>
<script type="text/javascript">

$(document).on('click' , '.edit_option' , function(){
  
let id=$(this).attr('data-id');
$('#edit-'+id).modal('show');

});

$(document).on('click' , '.delete_option' , function(){

let id=$(this).attr('data-id');
$('#delete-'+id).modal('show');

}); 

</script>
<?php break; ?>;


<?php case ('manage_service_calendar'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>

     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.service_calendar').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/servicecalender')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'session_date' , name: 'session_date'},
           {data: 'session_time' , name: 'session_time'},
           {data: 'number_of_sessions' , name: 'number_of_sessions'},
           {data: 'coach_service_id' , name: 'coach_service_id'},
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}

       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });

       table.draw();

    });
</script>

    
    <?php break; ?>;






    
    <?php case ('manage_topic'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>
    
     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.topic').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/topic')); ?>',
       },
       columns: [
           {data: 'id', name: 'id'},
           {data: 'topic' , name: 'topic'},
           {data: 'coach_service_id' , name: 'coach_service_id'},
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}
    
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });
    
       table.draw();
    
    });
</script>
<script type="text/javascript">
   
   $(document).on('click' , '.edit_option' , function(){
      
    let id=$(this).attr('data-id');
    let name=$(this).attr('data-name');
    $('#topic-'+id).val(name);
    $('#edit-'+id).modal('show');

   });

   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

</script>
    
    
    <?php break; ?>;
    



    
    <?php case ('manage_log'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>
    
     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.sitelog').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/coacheelog')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          
           {data: 'email' , name: 'email'},
          
       {data: 'status', status: 'status', render: function(data,type,row) {
            if(data=="Offine"){
              
                    data = '<i  class="fa fa-circle online-red" aria-hidden="true"></i>'+data;
                    
           }
else{
 
    data = '<i class="fa fa-circle online-green" aria-hidden="true"></i>'+data;
}                    return data;
                }
       },
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}
    
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });
    
       table.draw();
    
    });
</script>
<script type="text/javascript">
   
   $(document).on('click' , '.site_status' , function(){
      
    let id=$(this).attr('data-id');
    
    $('#site-'+id).modal('show');

   });

   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

</script>
    
    
    <?php break; ?>;

 <?php case ('manage_caochlog'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>
    
     <script type="text/javascript">
    $(document).ready(function(){
     
        var table = $('.caochlog').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
       ajax: {
         url: '<?php echo e(url('/coachlog')); ?>',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'email' , name: 'email'},
           {data: 'status', status: 'status', render: function(data,type,row) {
           if(data=="Offine"){
              
                    data = '<i  class="fa fa-circle online-red" aria-hidden="true"></i>'+data;
                    
           }
           else{
 
   				 data = '<i class="fa fa-circle online-green" aria-hidden="true"></i>'+data;
}                return data;
                }
       },
         
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}
    
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });
    
       table.draw();
    
    });
</script>
<script type="text/javascript">
   
   $(document).on('click' , '.edit_option' , function(){
      
    let id=$(this).attr('data-id');
    let name=$(this).attr('data-name');
    $('#topic-'+id).val(name);
    $('#edit-'+id).modal('show');

   });

   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

</script>
    
    
    <?php break; ?>;
    


<?php case ('manage_all_log'): ?>

    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/table/datatable/button-ext/buttons.print.min.js')); ?>"></script>
    
     <script type="text/javascript">
    $(document).ready(function(){
     var me = getUrlVars()["me"];
      
        var table = $('.alllog').DataTable({
       processing: true,
       serverSide: true,
       bLengthChange: false,
           ajax: {
         url: 'url("/logs/+me") }}',
       },
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'email' , name: 'email'},
         
          {data: 'login' , name: 'login'},
          {data: 'logout' , name: 'logout'},
           {data: 'status', status: 'status'},           
           {data: 'created_at' , name: 'created_at'},
           {data: 'action' , name: 'action', orderable: false, searchable: false}
    
       ],
       "bDestroy": true,
       dom: 'lBfrtip',
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
       });
    
       table.draw();
    
    });
</script>
<script type="text/javascript">
   
   $(document).on('click' , '.edit_option' , function(){
      
    let id=$(this).attr('data-id');
    let name=$(this).attr('data-name');
    $('#topic-'+id).val(name);
    $('#edit-'+id).modal('show');

   });

   $(document).on('click' , '.delete_option' , function(){
 
   let id=$(this).attr('data-id');
   $('#delete-'+id).modal('show');

   }); 

</script>
    
    
    <?php break; ?>;
    



    <?php endswitch; ?>

    <?php endif; ?>



<script>
$(document).on('click' , '#changepassword' , function(){

let id=$(this).attr('data-id');
$('#changepassword-'+id).modal('show');

}); 

  
  
  
$( document ).ready(function() {

    $(".fluent_in").select2({
      tags: true
  });
  
  
  
  console.log( "ready!" );
  });
</script>

<script>
  $(document).on('change' , '#inputt' , function(){
    var clearance = $(this).val();
    var id=$(this).attr("data-id");
        console.log( 'Handler for "change" called.' );

   
    
     $.ajax({
            url: '<?php echo URL('/payoutdate'); ?>',
            type: 'post',
            dataType: 'json',
            data: { _token:'<?php echo e(csrf_token()); ?>' , id: id , clearance :clearance},
            success: function (response) {
        //     location.reload();
       window.location.reload();
            }, error: function (error) {
    window.location.reload();
            }
        });
 
   
    });
   
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS --><?php /**PATH E:\xamp\htdocs\sanso\resources\views/admin/inc/script.blade.php ENDPATH**/ ?>
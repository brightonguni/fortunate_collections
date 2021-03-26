 //$(document).ready(function() {


 //   });

 (function($) {
     "use strict";


     $(".dropdown").hover(
         function() {
             $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
             $(this).toggleClass('open');
         },
         function() {
             $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
             $(this).toggleClass('open');
         }
     );

     $("#slide-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });

     $("#service_category-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });

     $("#blog-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });
     $("#product-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });
     $("#project-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });
     $("#package-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });
     $("#service-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });
     $("#recipe-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });
     $("#blog-category-carousel").carousel({
         arrows: false,
         infinite: true,
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 1500,
         mobileFirst: true
     });

     $(".accordion-toggle").mouseover(function() {
         $(".accordion-toggle").trigger("click");
     });

     $('.accordion-toggle').hover(function() {
         $(this).click();
     });
     // card-header

     $(".card-header").parent('.card').hover(
         function() {
             $(this).children('.collapse').collapse('show');
         },
         function() {
             $(this).children('.collapse').collapse('hide');
         }
     );
     //panel
     $(".panel-heading").parent('.panel').hover(
         function() {
             $(this).children('.collapse').collapse('show');
         },
         function() {
             $(this).children('.collapse').collapse('hide');
         }
     );
     /*-------------------------------------
         Sidebar Toggle Menu
       -------------------------------------*/
     $('.sidebar-toggle-view').on('click', '.sidebar-nav-item .nav-link', function(e) {
         if (!$(this).parents('#wrapper').hasClass('sidebar-collapsed')) {
             var animationSpeed = 300,
                 subMenuSelector = '.sub-group-menu',
                 $this = $(this),
                 checkElement = $this.next();
             if (checkElement.is(subMenuSelector) && checkElement.is(':visible')) {
                 checkElement.slideUp(animationSpeed, function() {
                     checkElement.removeClass('menu-open');
                 });
                 checkElement.parent(".sidebar-nav-item").removeClass("active");
             } else if ((checkElement.is(subMenuSelector)) && (!checkElement.is(':visible'))) {
                 var parent = $this.parents('ul').first();
                 var ul = parent.find('ul:visible').slideUp(animationSpeed);
                 ul.removeClass('menu-open');
                 var parent_li = $this.parent("li");
                 checkElement.slideDown(animationSpeed, function() {
                     checkElement.addClass('menu-open');
                     parent.find('.sidebar-nav-item.active').removeClass('active');
                     parent_li.addClass('active');
                 });
             }
             if (checkElement.is(subMenuSelector)) {
                 e.preventDefault();
             }
         } else {
             if ($(this).attr('href') === "#") {
                 e.preventDefault();
             }
         }
     });


     // if($('#addMenu').find('.invalid-feedback').length > 0 ) {
     //     $('.nav-link[href="#tab9"]').trigger('click');
     //     $('#tab1').removeClass('active');
     //     $('#tab1').removeClass('show');
     //     $('#tab9').addClass('active show');
     //
     //
     //     $('button[data-target="#addMenu"]').trigger('click');
     // }


     /*-------------------------------------
         Sidebar Menu Control
       -------------------------------------*/
     $(".sidebar-toggle").on("click", function() {
         window.setTimeout(function() {
             $("#wrapper").toggleClass("sidebar-collapsed");
         }, 500);
     });

     /*-------------------------------------
         Sidebar Menu Control Mobile
       -------------------------------------*/
     $(".sidebar-toggle-mobile").on("click", function() {
         $("#wrapper").toggleClass("sidebar-collapsed-mobile");
         if ($("#wrapper").hasClass("sidebar-collapsed")) {
             $("#wrapper").removeClass("sidebar-collapsed");
         }
     });

     /*-------------------------------------
         jquery Scollup activation code
      -------------------------------------*/
     $.scrollUp({
         scrollText: '<i class="fa fa-angle-up"></i>',
         easingType: "linear",
         scrollSpeed: 900,
         animation: "fade"
     });

     /*-------------------------------------
         jquery Scollup activation code
       -------------------------------------*/
     $("#preloader").fadeOut("slow", function() {
         $(this).remove();
     });

     /*-------------------------------------
        Status value
       -------------------------------------*/
     $('#active').on('change', function() {
         this.value = this.checked ? 1 : 0;
         // alert(this.value);
     }).change();
     /*-------------------------------------
        Drop image value
       -------------------------------------*/
     //

     Dropzone.autoDiscover = false;

     $('#fileUpload').on('click', function() {
         // var files = $('#my-dropzone').get(0).dropzone.getAcceptedFiles();
         $('#logo').trigger('click');
         // Do something with the files.
     });


     $('#licensor-logo-up').on('click', function() {
         $('#licensor_logo').trigger('click');
     });

     $('#store-logo-up').on('click', function() {
         $('#logo').trigger('click');
     });

     $('#service-avatar').on('click', function()) {
         $('#avatar').trigger('click');
     }

     $('#licensor-splash-screen-up').on('click', function() {
         $('#licensor_splash_screen').trigger('click');
     });

     $('#licensor_logo, #licensor_splash_screen').on('change', function() {
         var reader = new FileReader();
         var $this = $(this).siblings('img');

         $this.removeAttr('hidden');
         reader.onload = function(e) {
             $this.attr('src', e.target.result);
         }
         reader.readAsDataURL(this.files[0]);
     });
     $('#logo').on('change', function() {
         var reader = new FileReader();
         var $this = $(this).siblings('img');

         $this.removeAttr('hidden');
         reader.onload = function(e) {
             $this.attr('src', e.target.result);
         }
         reader.readAsDataURL(this.files[0]);
     });


     $('#licensor-logo-up30').dropzone({
         autoProcessQueue: false,
         uploadMultiple: false,
         parallelUploads: 100,
         maxFiles: 2,
         acceptedFiles: ".png,.jpg,.gif,.jpeg",
         maxFilesize: 2,
         url: '#',
         previewsContainer: '.dz-preview',

         // The setting up of the dropzone
         init: function() {
             var myDropzone = this;

             // First change the button to actually tell Dropzone to process the queue.
             $('#userProfileForm').on('submit', function(e) {
                 // Make sure that the form isn't actually being sent.
                 e.preventDefault();
                 e.stopPropagation();
                 myDropzone.processQueue();
             });

             // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
             // of the sending event because uploadMultiple is set to true.
             this.on("sendingmultiple", function() {
                 // Gets triggered when the form is actually being sent.
                 // Hide the success button or the complete form.
             });
             this.on("successmultiple", function(files, response) {
                 // Gets triggered when the files have successfully been sent.
                 // Redirect user or notify of success.
             });
             this.on("errormultiple", function(files, response) {
                 // Gets triggered when there was an error sending the files.
                 // Maybe show form again, and notify user of error
             });
         }
     });



     $(function() {

         /*-------------------------------------
               Licensor Form
           -------------------------------------*/

         // $('#color, #additional_color, #secondary_color').colorpicker(

         // );


         // $('#color').on('keyup', function() {
         //     $(this).colorpicker('setValue', $(this).val());
         // });

         $("#link_active").on("change", function() {
             //if($("#podcast_link").is(":hidden")) {
             if ($('.licensor_url_wrap').parent().is(":hidden")) {
                 $('.licensor_url_wrap').parent().removeAttr('hidden');
             } else {
                 $('.licensor_url_wrap').parent().attr('hidden', 'hidden');
             }
         });
         //   });

         if ($("#link_active").is(":checked")) {
             $("#podcast_link").parent().removeAttr('hidden');
         }
         $('#addLinks').on('click', function(eve) {
             eve.preventDefault();
             $('#addLinks').prop('disabled', true);
             var input_num = parseInt($('#countL').val()) + 1;
             $('#countL').val(input_num);
             $.ajax({
                 'url': '/licensors/licensor_partial/' + input_num,
                 'dataType': 'html',
             }).done(function(data) {
                 $('#addLinks').prop('disabled', false);
                 $('.licensor_url_wrap').append(data);
             })
         });

         $('.licensor_url_wrap').on('click', '.remove-link', function(eve) {
             eve.preventDefault();
             var remove_holder = $(this).attr('id');
             remove_holder = '#' + remove_holder.replace('remove-link', 'removelink');
             $(remove_holder).remove();
         });
         $('#licensorForm').on('click', '.remove-link', function(eve) {
             eve.preventDefault();
             var remove_holder = $(this).attr('id');
             remove_holder = '#' + remove_holder.replace('remove-link', 'removelink');
             $(remove_holder).remove();
         });

         /*-------------------------------------
               Data Table init
           -------------------------------------*/
         if ($.fn.DataTable !== undefined) {
             $('.data-table').DataTable({
                 paging: true,
                 searching: true,
                 info: true,
                 lengthChange: false,
                 lengthMenu: [20, 50, 75, 100],
                 language: {
                     search: "_INPUT_",
                     searchPlaceholder: "Search..."
                 },
                 columnDefs: [{
                     targets: [0, -1], // column or columns numbers
                     orderable: false // set orderable for selected columns
                 }],
             });

             $('#nopagination').DataTable({
                 paging: false,
                 searching: true,
                 info: true,
                 lengthChange: false,
                 lengthMenu: [20, 50, 75, 100],
                 language: {
                     search: "_INPUT_",
                     searchPlaceholder: "Search..."
                 },
                 columnDefs: [{
                     targets: [0, -1], // column or columns numbers
                     orderable: false // set orderable for selected columns
                 }],
             });
         }

         /*-------------------------------------
               All Checkbox Checked
           -------------------------------------*/
         $(".checkAll").on("click", function() {
             $(this).parents('.table').find('input:checkbox').prop('checked', this.checked);
         });

         /*-------------------------------------
               Tooltip init
           -------------------------------------*/
         $('[data-toggle="tooltip"]').tooltip();

         /*-------------------------------------
               Select 2 Init
           -------------------------------------*/
         if ($.fn.select2 !== undefined) {
             $('.select2').select2({
                 width: '100%'
             });
         }

         /*-------------------------------------
               Date Picker
           -------------------------------------*/

         $('#start').datetimepicker({
             locale: moment.locale('en-SG'),
             format: 'YYYY-MM-DD HH:mm:s',
             minDate: moment()
         });
         $('#end').datetimepicker({
             locale: moment.locale('en-SG'),
             format: 'YYYY-MM-DD HH:mm:s',
             minDate: moment()
         });



         /*-------------------------------------
               Counter
           -------------------------------------*/
         var counterContainer = $(".counter");
         if (counterContainer.length) {
             counterContainer.counterUp({
                 delay: 50,
                 time: 1000
             });
         }


         /*-------------------------------------
               Delete
           -------------------------------------*/
         $("#delete").on("show.bs.modal", function(e) {
             var id = $(e.relatedTarget).data('target-id');
             // var url = 'users/'+id+'/delete';
             $('#delete-btn').data("target-id", id);
             console.log('----- ID ---- > ', id);
             // $(selector).val(value)
         });

         $('#delete-btn').click(function(e) {
             e.preventDefault();
             var id = $('#delete-btn').data('target-id');
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             var segments = window.location.pathname.split('/');
             console.log(segments);
             var pathname = segments[1];

             console.log(pathname);
             $.ajax({
                 type: "post",
                 url: '/' + pathname + '/' + id,
                 data: {
                     'id': id,
                     _method: 'delete'
                 },
                 fail: function(data, status) {
                     console.log('-------- Fail ----> ', data);
                 },
                 success: function(data, status) {
                     console.log(data);
                     if (segments.length > 2) {
                         var newsegment = window.location.pathname.split('?');
                         window.location.href = '/' + newsegment[0].split('/')[1] + '?delete=' + id;
                     } else {
                         location.reload();
                         window.location.href = window.location.pathname.split('?') + '?delete=' + id;
                     }

                 }
             });
         });


         /*-------------------------------------
           init Store multiple selection Values
         -------------------------------------*/
         const regex = "/\/(stores)\/\d\/(edit)/s";
         const str = window.location.pathname;
         if (regex.exec(str) !== null) {
             var segments = window.location.pathname.split('/');
             var id = segments[2];
             console.log(id);
             $.getJSON('/store/' + id + '/categories', function(result) {
                 var categories = [];
                 $.each(result, function(i, field) {
                     categories.push(field.id);
                 });
                 $('#categories').val(categories).trigger('change');
             });

             $.getJSON('/store/' + id + '/hours', function(result) {
                 var hours = [];
                 $.each(result, function(i, field) {
                     hours.push(field.id);
                 });
                 console.log(hours);
                 $('#hour').val(hours).trigger('change');
             });
         }
         /*-------------------------------------
               Doughnut Chart
           -------------------------------------*/


         /*-------------------------------------
               Calender initiate
           -------------------------------------*/
         if ($.fn.fullCalendar !== undefined) {
             $('#fc-calender').fullCalendar({
                 header: {
                     center: 'basicDay,basicWeek,month',
                     left: 'title',
                     right: 'prev,next',
                 },
                 fixedWeekCount: false,
                 navLinks: true, // can click day/week names to navigate views
                 editable: true,
                 eventLimit: true, // allow "more" link when too many events
                 aspectRatio: 1.8,
                 events: [{
                         title: 'All Day Event',
                         start: '2019-04-01'
                     },

                     {
                         title: 'Meeting',
                         start: '2019-04-12T14:30:00'
                     },
                     {
                         title: 'Happy Hour',
                         start: '2019-04-15T17:30:00'
                     },
                     {
                         title: 'Birthday Party',
                         start: '2019-04-20T07:00:00'
                     }
                 ]
             });
         }
     });

 })(jQuery);
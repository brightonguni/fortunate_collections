<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name', 'Mywendyhouse') }}</title>
        <meta name="description" content="">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
        <!-- Normalize CSS -->
        <link rel="stylesheet" href="{{URL::asset('assets/css/normalize.css')}}">
       
       <!-- Latest compiled and minified CSS -->
         {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">  --}}

       
        <!-- Latest compiled and minified JavaScript -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}"> 
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.grid.min.css')}}"> 
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.roboot.min.css')}}">     
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{URL::asset('assets/css/all.min.css')}}">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{asset('assets/fonts/flaticon.css')}}">
        <!-- Full Calender CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/fullcalendar.min.css')}}">
        <!-- Data Table CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
        <!-- Select 2 CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
        <!-- Date Picker CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" >
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-colorpicker.min.css')}}" >
        <!-- Custom CSS -->
         <!-- Main CSS -->
       <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/mega-menu.css') }}">
        <link  rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
               rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" 
               crossorigin="anonymous">  
        <!-- Modernize js -->
        <script src="{{asset('js/modernizr-3.6.0.min.js')}}"></script>
        <!-- jquery-->
       <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>  
    </head>
    <body>
        <!-- Preloader Start Here -->
          <div id="wrapper" class="wrapper">
             @include('layouts.web.navbar')   
             @include('web._partials.slider.slider')  
              {{-- @include('layouts.web.navbar-lower')     --}}
            <!-- Header Menu Area End Here -->
            <div class="dashboard">
              <div class="dashboard-content">
                  @yield('content')
              </div>
            </div>
            @include('layouts.web.footer')
            <!-- Page Area End Here -->
          </div>
        <!-- Plugins js -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>  
        
      <script>
        CKEDITOR.replace( 'summary-ckeditor' );
      </script>
      
      <script src="{{ asset('assets/js/mega-menu.js') }}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
     <!-- jquery-->
      <script src="{{asset('assets/js/plugins.js')}}"></script>
      <!-- Popper js -->
      <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <!-- Moment Js -->
       <script src="{{asset('assets/js/moment.min.js')}}"></script>
      <!-- Bootstrap js -->
      <script src="{{asset('assets/js/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
      <script src="{{asset('assets/js/transition.js')}}"></script>
      <!-- Counterup Js -->
      <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
      <!-- Waypoints Js -->
      <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
      <!-- Scroll Up Js -->
      <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
      <!-- Full Calender Js -->
      <script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
      <!-- Data Table Js -->
      <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
      <!-- Select 2 Js -->
      <script src="{{asset('assets/js/select2.min.js')}}"></script>
      <!-- Dropzone.js Js -->
      <script src="{{asset('assets/js/dropzone.js')}}"></script>
      <!-- Date Picker Js -->
      <script src="{{asset('assets/js/bootstrap-colorpicker.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

      <script src="{{asset('assets/js/jscolor.js')}}"></script>
      <script src="{{asset('assets/js/celebral-modal.js')}}"></script>
       
      <!-- Custom Js -->
      <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
      $(window).load(function() {
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
         $("#product-category-carousel").carousel({
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
         
       	});

    </script>   
    </body>
</html>


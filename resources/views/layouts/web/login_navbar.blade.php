<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name', 'Celebral') }}</title>
        <meta name="description" content="">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">
        <!-- Normalize CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <!-- Fontawesome CSS -->
        <link  rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
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
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
        <!-- Modernize js -->
        <script src="{{asset('assets/js/modernizr-3.6.0.min.js')}}"></script>
        <!-- jquery-->
        <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    </head>
    <body>
      <div id="wrapper" class="web-login-banner" style="background-image: url('{{ asset('assets/images/login/burger_on_fire.jpg')}}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="dashboard-page-one">
          <div class="dashboard-content-one">
            @yield('content')
            <footer class="footer-wrap-layout1 text-center">
                <div class="copyright">© Copyrights <a href="#"></a> 2020. All rights reserved. Designed by
                    <a
                        href="#">Guni It Solutions
                    </a>
                </div>
            </footer>
          </div>
        </div>
      </div>
        <!-- Plugins js -->
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <!-- Moment Js -->
         <script src="{{asset('assets/js/moment.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
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
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>


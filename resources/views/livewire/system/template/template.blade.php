<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">



<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Bhumlu Bootstrap admin template made using Bootstrap 4, it has tons of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="Bhumlu, bootstrap admin template, bootstrap admin panel, bootstrap 4 admin template, admin template">
    <meta name="author" content="Srthemesvilla" />
    <link rel="icon" type="image/x-icon" href="{{url('assets/img/favicon.ico')}}">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{url('assets/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{url('assets/fonts/ionicons.css')}}">
    <link rel="stylesheet" href="{{url('assets/fonts/linearicons.css')}}">
    <link rel="stylesheet" href="{{url('assets/fonts/open-iconic.css')}}">
    <link rel="stylesheet" href="{{url('assets/fonts/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{url('assets/fonts/feather.css')}}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/uikit.css')}}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{url('assets/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{url('assets/libs/flot/flot.css')}}">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>


    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    @livewireStyles



</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            @include('livewire.system.template.side-nav-bar')
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            @include('livewire.system.template.notification-bar')
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    {{$slot}}
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                  @include('livewire.system.template.footer')
                    <!-- [ Layout footer ] End -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Core scripts -->
    <script src="{{url('assets/js/pace.js')}}"></script>
    <script src="{{url('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('assets/libs/popper/popper.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.js')}}"></script>
    <script src="{{url('assets/js/sidenav.js')}}"></script>
    <script src="{{url('assets/js/layout-helpers.js')}}"></script>
    <script src="{{url('assets/js/material-ripple.js')}}"></script>

    <!-- Libs -->
    <script src="{{url('assets/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('assets/libs/eve/eve.js')}}"></script>
    <script src="{{url('assets/libs/flot/flot.js')}}"></script>
    <script src="{{url('assets/libs/flot/curvedLines.js')}}"></script>
    <script src="{{url('assets/libs/chart-am4/core.js')}}"></script>
    <script src="{{url('assets/libs/chart-am4/charts.js')}}"></script>
    <script src="{{url('assets/libs/chart-am4/animated.js')}}"></script>

    <!-- Demo -->
    <script src="{{url('assets/js/demo.js')}}"></script>
    <script src="{{url('assets/js/analytics.js')}}"></script>
    <script src="{{url('assets/js/pages/dashboards_index.js')}}"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    .

    <style>

        .select2-selection__rendered {
            line-height: 31px !important;
        }
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
        .select2-selection__arrow {
            height: 34px !important;
        }
         </style>



    @livewireScripts





</body>

</html>

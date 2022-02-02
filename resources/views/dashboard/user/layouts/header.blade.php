<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:10:31 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
       <?php
        $setting = App\Models\Setting::where('id','=',1)->first();
    ?>
    <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset($setting->company_favicon)}}" >
    <title>User | Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}"  rel="stylesheet">
     <link href="{{asset('assets/plugins/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/gridstack/gridstack.css')}}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{asset('assets/plugins/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/chartist-js/dist/chartist-init.css')}}"  rel="stylesheet">
    <link href="{{asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}"  rel="stylesheet">
    <link href="{{asset('assets/plugins/css-chart/css-chart.css')}}"  rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{asset('assets/plugins/c3-master/c3.min.css')}}"  rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}"  rel="stylesheet" />
         <!-- Popup CSS -->
    <link
      href="{{asset('assets/plugins/Magnific-Popup-master/dist/magnific-popup.css')}}"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
 
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/css/colors/default-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <link href="{{asset('assetscss/colors/blue.css" id="theme')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('assets/plugins/dropify/dist/css/dropify.min.css')}}" />
     {{-- toastr  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />

</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
               <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('user.dashboard')}}">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset($setting->company_logo)}}" style="width: 35px;height:30px" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <span   alt="homepage" class="dark-logo" style="margin-left: 10px" >myCRM</span>
                            <!-- Light Logo text -->
                            <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box">
                            <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               
                                @if (Auth::guard('web')->user()->image == '0')
                                <img src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="profile-pic" />
                                @else
                                <img src="{{asset(Auth::guard('web')->user()->image)}}" alt="userp"
                                    class="profile-pic">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                            
                                                 @if (Auth::guard('web')->user()->image == '0')
                                                <img src="{{asset('assets/images/users/1.jpg')}}" alt="user"  />
                                                @else
                                                <img src="{{asset(Auth::guard('web')->user()->image)}}" alt="userp"
                                                >
                                                @endif
                                            </div>
                                            <div class="u-text">
                                                <h4>{{Auth::guard('web')->user()->first_name}} {{Auth::guard('web')->user()->last_name }}</h4>
                                                <p class="text-muted">
                                                    <a href="https://www.wrappixel.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="23554251564d63444e424a4f0d404c4e">{{Auth::guard('web')->user()->email}}</a></p>
                                                <a href="{{route('user.profile')}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                  
                                    <li> <a href="{{ route('user.logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                class="fa fa-power-off"></i> Logout</a>
                                        <form action="{{ route('user.logout') }}" id="logout-form" method="post">@csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
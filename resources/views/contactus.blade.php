<!DOCTYPE html>
<html lang="en">


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
    <title>Contact Us | {{$setting->company_name}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">

</head>

<body>

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{asset('assets/images/background/contactusp.jpg);')}}">
            <div class="login-box card">
                    @if(session()->has('success'))
                        <div class="alert alert-success mt-3">
                              {{ session()->get('success') }}
                        </div>
                        @endif
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('contactus.store') }}">
                        @csrf
                        <h3 class="box-title m-b-20">Contact Us</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="name" placeholder="Name" type="text" class="form-control" name="name" required>

                             </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" required>
                             </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="number" placeholder="Number" type="text" class="form-control" name="number" required>
                             </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <textarea name="message" class="form-control" placeholder="Enter Message..." id="" cols="30" rows="3" required></textarea>
                             </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-block text-uppercase waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    
</body>
</html>


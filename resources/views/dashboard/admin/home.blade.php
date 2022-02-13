@extends('dashboard.admin.layouts.includes')
@section('content')
   <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                               <a href="{{route('admin.plans')}}">
                                    <div class="d-flex flex-row">
                                    <div class="round round-sm align-self-center round-info"><i class="fa fa-paper-plane"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0 font-light">Total Plans</h3>
                                        <h5 class="text-muted m-b-0">{{$totalPlans}}</h5></div>
                                </div>
                               </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <a href="{{route('admin.users')}}">
                                 <div class="d-flex flex-row">
                                    <div class="round round-sm align-self-center round-warning"><i class="fa fa-users"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0 font-light">Total Users</h3>
                                        <h5 class="text-muted m-b-0">{{$totalUser}}</h5></div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                      <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                               <a href="{{route('admin.plan.requests')}}">
                                 <div class="d-flex flex-row">
                                    <div class="round round-sm align-self-center round-danger"><i class="fa fa-paper-plane"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0 font-light">Total Requests</h3>
                                        <h5 class="text-muted m-b-0">{{$totalRequests}}</h5></div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                               <a href="{{route('admin.withdrawals')}}">
                                 <div class="d-flex flex-row">
                                    <div class="round round-sm align-self-center round-primary"><i class="ti-money"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0 font-light">Total Withdrawals</h3>
                                        <h5 class="text-muted m-b-0">{{$totalWithdrawal}}</h5></div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">

                                 <div class="d-flex flex-row">
                                    <div class="round round-sm align-self-center round-success"><i class="fa fa-users"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0 font-light">Total Visitors</h3>
                                        <h5 class="text-muted m-b-0">{{$totalVisitors}}</h5></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
                    <?php
                        $setting = App\Models\Setting::where('id','=',1)->first();
                    ?>
            <footer class="footer">
                © 2022 {{$setting->company_name}}
            </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
        @endsection

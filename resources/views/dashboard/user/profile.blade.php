@extends('dashboard.user.layouts.includes')
@section('content')
   <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- Bread crumb and right sidebar toggle -->

                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"><a href="{{route('user.dashboard')}}">Dashboard</a></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>

                <!-- End Bread crumb and right sidebar toggle -->
                   <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">My Profile</h4>
                        <form id="userForm">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
                            <div class="form-group">
                                <label class="control-label">First Name</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{Auth::guard('web')->user()->first_name}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control"
                                    value="{{Auth::guard('web')->user()->last_name}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{Auth::guard('web')->user()->email}}">
                            </div>
                            <div class="form-group">
                                <label for="input-file-now-custom-3">Profile Image</label>
                                <input type="file" name="image" id="input-file-now-custom-3" class="dropify"
                                    data-height="200"
                                    data-default-file="{{Auth::guard('web')->user()->image == '0' ? asset('assets/plugins/dropify/src/images/test-image-2.jpg') : asset(Auth::guard('web')->user()->image)}}" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
                    <?php
                        $setting = App\Models\Setting::where('id','=',1)->first();
                    ?>
            <footer class="footer">
                © 2022 {{$setting->company_name}}
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        @endsection

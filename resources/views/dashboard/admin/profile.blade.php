@extends('dashboard.admin.layouts.includes')
@section('content')
   <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- Bread crumb and right sidebar toggle -->

                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"><a href="{{route('admin.dashboard')}}">Dashboard</a></h3>
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
                        <form id="adminForm">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::guard('admin')->user()->id}}">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{Auth::guard('admin')->user()->name}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{Auth::guard('admin')->user()->email}}">
                            </div>
                             <div class="form-group">
                                <label class="control-label">Wallet Address</label>
{{--                                <input type="text" name="wallet_address" class="form-control"--}}
{{--                                    value="{{Auth::guard('admin')->user()->wallet_address}}">--}}
                                 <textarea name="wallet_address" class="form-control" cols="30"
                                           rows="10">{{Auth::guard('admin')->user()->wallet_address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="input-file-now-custom-3">Profile Image</label>
                                <input type="file" name="image" id="input-file-now-custom-3" class="dropify"
                                    data-height="200"
                                    data-default-file="{{Auth::guard('admin')->user()->image == "0" ? asset('assets/plugins/dropify/src/images/test-image-2.jpg') : asset(Auth::guard('admin')->user()->image)}}" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Password Change</h4>
                        <form method="POST" action="{{ route('admin.change.password') }}">
                            @csrf

                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
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

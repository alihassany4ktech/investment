@extends('dashboard.admin.layouts.includes')
@section('content')
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor"><a href="{{route('admin.dashboard')}}">Dashboard</a> </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{route('admin.users')}}">Users</a></li>
                    <li class="breadcrumb-item">User Details</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Start Page Content -->
        <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{asset($user->image)}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{$user->first_name}} {{$user->last_name}}</h4>
                                </center>
                            </div>
                            <div>
                                <hr> 
                              </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><a href="mailto:{{$user->email}}">{{$user->email}}</a></h6> 
                                <small class="text-muted p-t-10 db">Phone</small>
                                    <h6>{{$user->phone}}</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Overview</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                              <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>City</strong>
                                        <br>
                                        <p class="text-muted">{{$user->city}}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Region</strong>
                                        <br>
                                        <p class="text-muted">{{$user->region}}</p>
                                    </div>
                                      <div class="col-md-3 col-xs-6 b-r"> <strong>Country</strong>
                                        <br>
                                        <p class="text-muted">{{$user->country}}</p>
                                    </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>National Id</strong>
                                        <br>
                                        <p class="text-muted">{{$user->national_id}}</p>
                                    </div>
                                   
                                </div>
                                <hr>
                                <div class="row">
                                      <div class="col-md-3 col-xs-6 b-r"> <strong>Zip/Postal Code</strong>
                                        <br>
                                        <p class="text-muted">{{$user->postal_or_zip_code}}</p>
                                    </div>
                                       <div class="col-md-4 col-xs-6 b-r"> <strong>Address</strong>
                                        <br>
                                        <p class="text-muted">{{$user->address}}</p>
                                    </div>
                                       <div class="col-md-5 col-xs-6"> <strong>Dociment Address</strong>
                                        <br>
                                        <p class="text-muted">{{$user->document_address}}</p>
                                    </div>
                              </div>
                                    
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
        <!-- End PAge Content -->
    </div>
    <!-- footer -->
    <footer class="footer">
        © 2022 Webfabricant
    </footer>
    <!-- End footer -->
</div>
<!-- End Page wrapper  -->
@endsection


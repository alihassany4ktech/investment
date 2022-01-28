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
                    <li class="breadcrumb-item active"><a href="">Plans</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('admin.plan.requests')}}">Plan Purchase Requests</a></li>
                    <li class="breadcrumb-item">Plan Purchase Details</li>
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
                                <center class="m-t-30"> <img src="{{asset($planRequest->user->image)}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{$planRequest->user->first_name}} {{$planRequest->user->last_name}}</h4>
                                </center>
                            </div>
                            <div>
                                <hr> 
                              </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><a href="mailto:{{$planRequest->user->email}}">{{$planRequest->user->email}}</a></h6> 
                                <small class="text-muted p-t-10 db">Phone</small>
                                    <h6>{{$planRequest->user->phone}}</h6>
                                    <small class="text-muted p-t-10 db">Address</small>
                                    <h6>{{$planRequest->user->address}}</h6>
                                    <small class="text-muted p-t-10 db">Dociment Address</small>
                                    <h6>{{$planRequest->user->document_address}}</h6>
                                    <small class="text-muted p-t-10 db">City</small>
                                    <h6>{{$planRequest->user->city}}</h6>
                                    <small class="text-muted p-t-10 db">Region</small>
                                    <h6>{{$planRequest->user->region}}</h6>
                                    <small class="text-muted p-t-10 db">Country</small>
                                    <h6>{{$planRequest->user->country}}</h6>
                                    <small class="text-muted p-t-10 db">National Id</small>
                                    <h6>{{$planRequest->user->national_id}}</h6>
                                    <small class="text-muted p-t-10 db">Zip/Postal Code</small>
                                    <h6>{{$planRequest->user->postal_or_zip_code}}</h6>
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
                              <h3 class="mt-3" style="text-align: center">Plan #{{$planRequest->plan->id}}:  {{$planRequest->plan->title}}</h3>
                              <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Status</strong>
                                        <br>
                                        <p class="text-muted">{{$planRequest->status}}</p>
                                    </div>
                                    <div class="col-md-9 col-xs-6 b-r"> <strong>Transaction Url</strong>
                                        <br>
                                        <p class="text-muted">{{$planRequest->transaction_url}}</p>
                                    </div>
                                  
                                </div>
                                <hr>
                                <h5 class="font-medium m-t-30">Screenshot</h5>
                                <img src="{{asset($planRequest->screenshot)}}"  width="300px" height="300px"  />
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


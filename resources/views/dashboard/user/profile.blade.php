@extends('dashboard.user.layouts.includes')
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
                    <li class="breadcrumb-item">MY Profile</li>
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
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile"
                                role="tab">Profile</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#withdrawal"
                                role="tab">Withdrawal</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#refferalUser"
                                role="tab">Refferal User</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#editProfile" role="tab">Edit
                                Profile</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile" role="tabpanel">
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

                        {{-- withdrawal --}}
                        <?php
                                $withdrawals = App\Models\Withdrawal::where('user_id', '=', Auth::guard('web')->user()->id)->where('status', '=', 'Approved')->get();
                                $plans = App\Models\PurchasedPlan::where('referral_code', '=', Auth::guard('web')->user()->refferal_code)->get();
                                 ?>
                        <div class="tab-pane" id="withdrawal" role="tabpanel">
                            <div class="card-body">
                                <div class="row justify-content-center prjectDiv">
                                    <div class="col-md-3 col-xs-6 mb-2"><span
                                            class="btn btn-circle  btn-success text-white">{{count($withdrawals)}}</span>
                                        <strong>Total Withdrawals</strong>

                                    </div>
                                    <div class="col-md-3 col-xs-6 mb-2"><span
                                            class="btn btn-circle  btn-warning text-white">{{count($withdrawals)}}</span>
                                        <strong>Out Of 6</strong>

                                    </div>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User Name</th>
                                                <th>Plan</th>
                                                <th>Available Balance</th>
                                                <th>Wallet Address</th>
                                                <th>Request Payment</th>
                                                <th>Payment Method</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($withdrawals as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <img data-toggle="tooltip"
                                                        data-original-title="{{$row->user->first_name}} {{$row->user->last_name}}"
                                                        src="{{asset($row->user->image) }}" alt="user"
                                                        class="img-circle" width="30" height="30">
                                                </td>
                                                <td>{{$row->plan->title}}</td>
                                                <td>${{$row->available_balance}}</td>
                                                <td>{{$row->wallet_address}}</td>
                                                <td>{{$row->request_payment}}</td>
                                                <td>{{$row->payment_method}}</td>
                                                <td>{{$row->updated_at->format('d-m-Y')}}</td>
                                                <td>{{$row->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        {{-- refferal user --}}
                        <div class="tab-pane" id="refferalUser" role="tabpanel">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>Phone</th>
                                                <th>Referral Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($plans->isEmpty())
                                            <tr>
                                                <td colspan="5"><small>No Record Found</small></td>
                                            </tr>
                                            @else
                                            @foreach ($plans as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->user->first_name}} {{$row->user->last_name}}</td>
                                                <td>{{$row->user->email}}</td>
                                                <td>{{$row->user->phone}}</td>
                                                <td>${{round($refferalAmount)}} ({{$commission}})% </td>
                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- profile -->
                        <div class="tab-pane" id="editProfile" role="tabpanel">
                            <div class="card-body">

                                <form id="userForm">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    value="{{$user->first_name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control"
                                                    value="{{$user->last_name}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-file-now-custom-3">Profile Image</label>
                                        <input type="file" name="image" id="input-file-now-custom-3" class="dropify"
                                            data-height="200"
                                            data-default-file="{{$user->image == '0' ? asset('assets/plugins/dropify/src/images/test-image-2.jpg') : asset(Auth::guard('web')->user()->image)}}" />
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </form>
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


{{-- @extends('dashboard.user.layouts.includes')
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
                        <input type="file" name="image" id="input-file-now-custom-3" class="dropify" data-height="200"
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
@endsection --}}

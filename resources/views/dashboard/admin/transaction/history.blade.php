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
                    <li class="breadcrumb-item active">Transaction History</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaction History</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
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
                                          <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdrawals as $row)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>
                                                 <a href="{{route('admin.user.show',['id'=>$row->id])}}">
                                                       <img data-toggle="tooltip" data-original-title="{{$row->user->first_name}} {{$row->user->last_name}}"
                                                src="{{asset($row->user->image) }}" alt="user" class="img-circle" width="30"
                                                height="30">
                                                 </a>
                                          </td>
                                          <td>{{$row->plan->title}}</td>
                                          <td>${{$row->available_balance}}</td>
                                          <td>{{$row->wallet_address}}</td>
                                          <td>{{$row->request_payment}}</td>
                                          <td>{{$row->payment_method}}</td>
                                          <td>{{$row->status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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


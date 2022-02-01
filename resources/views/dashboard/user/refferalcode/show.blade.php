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
                    <li class="breadcrumb-item active">Refferal Code</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users Using Your Refferal Code</h4>
                        <button type="button"
                            class="btn btn-outline-success m-t-8 float-right" style="margin-right: 10px;font-size: 12px"></i> 
                              {{Auth::guard('web')->user()->refferal_code == null? '': 'Your Refferal Code: ' .Auth::guard('web')->user()->refferal_code}}    
                        </button>
                        <button type="button"
                            class="btn btn-outline-warning m-t-8 float-right" style="margin-right: 10px;font-size: 12px"></i> 
                              Total RafferalAmount ${{count($plans)*round($refferalAmount)}}    
                        </button>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
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
                                    @foreach ($plans as $row)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$row->user->first_name}} {{$row->user->last_name}}</td>
                                          <td>{{$row->user->email}}</td>
                                          <td>{{$row->user->phone}}</td>
                                          <td>${{round($refferalAmount)}} ({{$commission}})% </td>
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
    <footer class="footer">
        © 2022 Webfabricant
    </footer>
    <!-- End footer -->
</div>
<!-- End Page wrapper  -->
@endsection


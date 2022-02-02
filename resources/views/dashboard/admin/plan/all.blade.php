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
                    <li class="breadcrumb-item active">Plans</li>
                    <li class="breadcrumb-item">All Plans</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Plans</h4>
                        <a href="{{route('admin.plan.create')}}" type="button"
                            class="btn btn-outline-success m-t-8 float-right" style="margin-right: 10px;font-size: 12px"><i class="ti-plus" style="font-size: 12px"></i> Add New
                            Plan</a>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Return Price</th>
                                        <th>Commission</th>
                                        <th>Daily Earning</th>
                                        <th>WithDrawal</th>
                                        <th>Referral Commission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $row)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$row->title}}</td>
                                          <td>${{$row->price}}</td>
                                          <td>${{$row->return_price}}</td>
                                          <td>{{$row->commission}}%</td>
                                          <td>${{$row->daily_earning}}</td>
                                          <td>{{$row->withdrawal}} days</td>
                                          <td>${{$row->referral_commission }}</td>
                                                  <td class="">
                                            <div class="dropdown">
                                                <button class="btn btn-light" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-settings" style="font-size: 10px"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-dark"
                                                        href="{{route('admin.plan.show',['id' => $row->id])}}"
                                                        type="button" style="font-size: 12px;cursor: pointer"><i
                                                            class="ti-eye" style="font-size: 12px"></i> View</a>
                                                    <a class="dropdown-item text-dark" type="button"
                                                        style="font-size: 12px; cursor: pointer;"
                                                        href="{{route('admin.plan.edit',['id' => $row->id])}}"><i
                                                            class="ti-marker-alt" style="font-size: 12px"></i> Edit</a>
                        
                                                    <a class="dropdown-item text-dark"
                                                        href="{{route('admin.plan.delete',['id' => $row->id])}}"
                                                        type="button" style="font-size: 12px" id="deletePlan"><i class="ti-close"
                                                            style="font-size: 12px"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
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


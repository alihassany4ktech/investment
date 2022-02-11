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
                              <li class="breadcrumb-item active">Cntacts</li>
                        </ol>
                  </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Start Page Content -->
            <div class="row">
                  <div class="col-12">
                        <div class="card">
                              <div class="card-body">
                                    <h4 class="card-title">Cntacts</h4>
                                    <div class="table-responsive m-t-40">
                                          <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Number</th>
                                                            <th>Message</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach ($contacts as $row)
                                                      <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$row->name}}</td>
                                                            <td>{{$row->email}}</td>
                                                            <td>{{$row->number}}</td>

                                                            <td>
                                                                  {{$row->message}}
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
      $setting = App\Models\Setting::where('id', '=', 1)->first();
      ?>
      <footer class="footer">
            © 2022 {{$setting->company_name}}
      </footer>
      <!-- End footer -->
</div>
<!-- End Page wrapper  -->
@endsection
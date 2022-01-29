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
                      <li class="breadcrumb-item "><a href="{{route('user.client.area')}}">Client Area</a></li>
                    <li class="breadcrumb-item active">Withdrawal</li>
                </ol>
            </div>
        </div>

        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <!-- Column -->
            <div class="col-lg-7 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title bg-success p-3" style="text-align: center">Withdrawal</h3>
                        <div class="table-responsive">
                            <table class="table m-b-0  m-t-30 no-border">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center">
                                            <h4 class="card-title mt-2 bg-light p-3">Available Balance </h4>
                                        </td>
                                      
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">
                                            <h4 class="card-title mt-2 bg-light p-3">Wallet Address </h4>
                                     
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">
                                            <h4 class="card-title mt-2 bg-light p-3">Request Payment</h4>
                                     
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
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

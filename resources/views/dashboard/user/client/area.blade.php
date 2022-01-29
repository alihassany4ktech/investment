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
                    <li class="breadcrumb-item active">Client Area</li>
                </ol>
            </div>
        </div>

        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Start Page Content -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title bg-success p-3 text-white" style="text-align: center">Client Area</h3>
                        <div class="table-responsive">
                            <table class="table m-b-0  m-t-30 no-border">
                                <tbody>
                                    <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title  bg-light p-3">Deposit Amount</h4>
                                        </td>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">Amount in
                                                ${{$purchasedPlan->plan->price}}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">Daily profit</h4>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">Amount in
                                                ${{$purchasedPlan->plan->daily_earning}}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">Count Down</h4>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3" id="the-final-countdown"></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">Available Balance</h4>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">$</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">Referral commission </h4>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">$</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="card-body m-b-20 m-t-10">
                        <div class="row">
                            <div class="col-12 align-self-center text-center">
                                <a type="button" href="{{route('user.client.withdrawal')}}" class="btn btn-success">Withdrawal</a>
                            </div>
                        </div>
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

@push('clientarea-page-script')
<script>
    $(document).ready(function () {
        setInterval(function time() {
            var d = new Date();
            var hours = 24 - d.getHours();
            var min = 60 - d.getMinutes();
            if ((min + '').length == 1) {
                min = '0' + min;
            }
            var sec = 60 - d.getSeconds();
            if ((sec + '').length == 1) {
                sec = '0' + sec;
            }
            jQuery('#the-final-countdown').html(hours + ':' + min + ':' + sec)
        }, 1000);
    });
</script>
@endpush

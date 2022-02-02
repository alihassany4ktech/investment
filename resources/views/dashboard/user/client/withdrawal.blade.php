@extends('dashboard.user.layouts.includes')
@section('content')
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
               <h3 class="text-themecolor">{{Auth::guard('web')->user()->first_name}} {{Auth::guard('web')->user()->last_name}}</h3>
                <h4 class="text-themecolor"><a href="{{route('user.dashboard')}}">Dashboard</a></h4>
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
                            <form action="{{route('user.withdrawal.store')}}" method="POST">
                                @csrf
                                <table class="table m-b-0  m-t-30 no-border">
                                    <tbody>
                                        <tr>
                                            <td style="width:400px;text-align: center">
                                                <h4 class="card-title  bg-light p-2">Available Balance </h4>
                                            </td>
                                            <td style="width:400px;text-align: center">
                                                <input type="number" min="0" name="available_balance" class="form-control">
                             @error('available_balance')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">
                                                <h4 class="card-title  bg-light p-2">Wallet Address </h4>
                                            <td style="width:400px;text-align: center">
                                                <input type="text" name="wallet_address" class="form-control">
                                @error('wallet_address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">
                                                <h4 class="card-title bg-light p-2">Request Payment</h4>
                                            <td style="width:400px;text-align: center">
                                                <input type="text" name="request_payment" class="form-control">
                                 @error('request_payment')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                            </td>
                                        </tr>
                                           <tr>
                                            <td style="text-align: center">
                                                <h4 class="card-title bg-light p-2">Payment Method</h4>
                                            <td style="width:400px;text-align: center">
                                                  <select class="select2 form-control"  style="width: 100%" name="payment_method" >
                                    <option value="">Select Method</option>
                                    @foreach ($paymentMethods as $row)
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                 @error('payment_method')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="card-body m-b-20 m-t-10">
                        <div class="row">
                            <div class="col-12 align-self-center text-center">
                                <button type="submit"
                                    class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Row -->
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

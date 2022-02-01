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
                              <li class="breadcrumb-item"><a href="{{route('user.plans')}}">Plans</a></li>
                            <li class="breadcrumb-item active">Purchase Plan</li>
                        </ol>
                    </div>
                </div>
                <?php
                    $walletAddress = App\Models\Admin::where('id','=',1)->first();
                 ?>
                <!-- End Bread crumb and right sidebar toggle -->
                   <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Purchase Plan</h4>
                        <form action="{{route('user.plan.purchase.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{$plan->id}}">
                            <div class="form-group">
                                <label class="control-label">Wallet Address</label>
                                <input type="email" name="wallet_address" readonly value="{{$walletAddress->wallet_address}}" class="form-control" >
                                 @error('wallet_address')
                                    <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                             
                            <div class="form-group">
                                <label class="control-label">Transaction URL</label>
                                <input type="url" pattern="https://.*" size="30" name="transaction_url" class="form-control"
                                    placeholder="https://">
                              @error('transaction_url')
                                    <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">Referral Code</label>
                                <input type="text" name="referral_code" class="form-control" placeholder="Optional">
                                 @error('referral_code')
                                    <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="input-file-now-custom-3">Upload The Screenshot </label>
                                <input type="file" name="screenshot" id="input-file-now-custom-3" class="dropify"
                                    data-height="200"
                                    data-default-file="" />
                                    @error('screenshot')
                                    <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                             <div class="form-row">
                              <div class="col-md-12 mb-3" style="margin-top: 46px">
                                    <input type="checkbox" id="md_checkbox_3" class="chk-col-indigo" name="term_and_condition"/>
                                  <label for="md_checkbox_3" class="text-info">I have read all the term and condition and I am agree with that</label> <br>
                                    @error('term_and_condition')
                                    <small class="text-danger">{{ $message }}</small>
                              @enderror
                              </div>
                             </div>
                              
                            <div>
                                <button type="submit" class="btn btn-info float-right">Next</button>
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
            <footer class="footer">
                © 2022 Webfabricant
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        @endsection

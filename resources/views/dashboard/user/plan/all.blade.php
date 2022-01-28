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
                            <li class="breadcrumb-item active">Plans</li>
                            <li class="breadcrumb-item">All Plans</li>
                        </ol>
                    </div>
                </div>

                <!-- End Bread crumb and right sidebar toggle -->
                   <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                  <h4 class="card-title">Plans</h4>
                                <div class="row pricing-plan">
                                   @foreach ($plans as $row)
                                    <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                                        <div class="pricing-box">
                                            <div class="pricing-body b-l featured-plan">
                                                <div class="pricing-header">
                                                      @if(App\Models\PurchasedPlan::where('user_id','=',Auth::guard('web')->user()->id)->where('plan_id','=',$row->id)->where('status','=','Pending')->exists())
                                                          <p class="price-lable text-white bg-warning"> Pending</p>
                                                          @elseif(App\Models\PurchasedPlan::where('user_id','=',Auth::guard('web')->user()->id)->where('plan_id','=',$row->id)->where('status','=','Approved')->exists())
                                                           <p class="price-lable text-white bg-success"> Purchased</p>
                                                           @elseif(App\Models\PurchasedPlan::where('user_id','=',Auth::guard('web')->user()->id)->where('plan_id','=',$row->id)->where('status','=','Rejected')->exists()) 
                                                           <p class="price-lable text-white bg-danger"> Rejected</p>
                                                      @endif
                                                    <h4 class="text-center">{{$row->title}}</h4>
                                                    <h2 class="text-center"><span class="price-sign">$</span>{{$row->price}}</h2>
                                                </div>
                                                <div class="price-table-content">
                                                    <div class="price-row">Return Price: <span class="text-success">${{$row->return_price}}</span></div>
                                                    <div class="price-row">Commission: <span class="text-danger">{{$row->commission}}%</span></div>
                                                    <div class="price-row">Daily Earning:<span class="text-warning">{{$row->daily_earning}}%</span></div>
                                                    <div class="price-row">Withdraw: <span class="text-primary">${{$row->withdraw}}</span></div>
                                                    <div class="price-row">Referral Commission: <span class="text-secondary">${{$row->referral_commission}}</span></div>
                                                    <div class="price-row">
                                                         @if(App\Models\PurchasedPlan::where('user_id','=',Auth::guard('web')->user()->id)->where('plan_id','=',$row->id)->where('status','=','Pending')->exists())
                                                        <a type="button"    data-toggle="tooltip" title="Already Pending" class="btn text-white btn-sm btn-warning waves-effect waves-light m-t-10">Purchase</a>
                                                          @elseif(App\Models\PurchasedPlan::where('user_id','=',Auth::guard('web')->user()->id)->where('plan_id','=',$row->id)->where('status','=','Approved')->exists())
                                                            <a type="button" href="{{route('user.purchase.plan',['id'=>$row->id])}}" class="btn btn-sm btn-success waves-effect waves-light m-t-10">Purchase</a>
                                                           @elseif(App\Models\PurchasedPlan::where('user_id','=',Auth::guard('web')->user()->id)->where('plan_id','=',$row->id)->where('status','=','Rejected')->exists()) 
                                                            <a type="button"    data-toggle="tooltip" title="Already Rejected" class="btn btn-sm text-white  btn-danger waves-effect waves-light m-t-10">Purchase</a>

                                                           @else 
                                                            <a type="button" href="{{route('user.purchase.plan',['id'=>$row->id])}}" class="btn btn-sm btn-success waves-effect waves-light m-t-10">Purchase</a>

                                                      @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
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

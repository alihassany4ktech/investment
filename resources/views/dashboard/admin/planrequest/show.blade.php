@extends('dashboard.admin.layouts.includes')
@section('content')
<style>
    /*Hidden class for adding and removing*/
    .lds-dual-ring.hidden {
        display: none;
    }

    /*Add an overlay to the entire page blocking any further presses to buttons or other elements.*/
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 50%;
        height: 50vh;
        /* background: rgba(0,0,0,.8); */
        z-index: 999;
        opacity: 1;
        transition: all 0.5s;
    }

    /*Spinner Styles*/
    .lds-dual-ring {
        display: inline-block;
        width: 30px;
        height: 30px;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 50px;
        height: 50px;
        margin: 5% auto;
        border-radius: 50%;
        border: 6px solid rgb(236, 8, 8);
        border-color: rgb(236, 8, 8) transparent rgb(236, 8, 8) transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

</style>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor"><a href="{{route('admin.dashboard')}}">Dashboard</a> </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="">Plans</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('admin.plan.requests')}}">Plan Purchase
                            Requests</a></li>
                    <li class="breadcrumb-item">Plan Purchase Details</li>
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
                        <center class="m-t-30"> <img src="{{asset($planRequest->user->image)}}" class="img-circle"
                                width="150" />
                            <h4 class="card-title m-t-10">{{$planRequest->user->first_name}}
                                {{$planRequest->user->last_name}}</h4>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6><a href="mailto:{{$planRequest->user->email}}">{{$planRequest->user->email}}</a></h6>
                        <small class="text-muted p-t-10 db">Phone</small>
                        <h6>{{$planRequest->user->phone}}</h6>
                        <small class="text-muted p-t-10 db">Address</small>
                        <h6>{{$planRequest->user->address}}</h6>
                        <small class="text-muted p-t-10 db">Dociment Address</small>
                        <h6>{{$planRequest->user->document_address}}</h6>
                        <small class="text-muted p-t-10 db">City</small>
                        <h6>{{$planRequest->user->city}}</h6>
                        <small class="text-muted p-t-10 db">Region</small>
                        <h6>{{$planRequest->user->region}}</h6>
                        <small class="text-muted p-t-10 db">Country</small>
                        <h6>{{$planRequest->user->country}}</h6>
                        <small class="text-muted p-t-10 db">National Id</small>
                        <h6>{{$planRequest->user->national_id}}</h6>
                        <small class="text-muted p-t-10 db">Zip/Postal Code</small>
                        <h6>{{$planRequest->user->postal_or_zip_code}}</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home"
                                role="tab">Overview</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#withdrawal"
                                role="tab">Withdrawals</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#refferalUser"
                                role="tab">Referral Users</a> </li>
                    </ul>
                    <!-- Tab overview -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <h3 class="mt-3" style="text-align: center">Plan #{{$planRequest->plan->id}}:
                                {{$planRequest->plan->title}}</h3>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Status</strong>
                                        <br>
                                        <p class="text-muted">
                                            {{-- {{$planRequest->status}} --}}
                                            <select id="{{$planRequest->id}}" class="form-control bg-light statusChange"
                                                name="status">
                                                <option value="Approved"
                                                    {{$planRequest->status == 'Approved'? 'selected': ''}}>Approved
                                                </option>
                                                <option value="Pending"
                                                    {{$planRequest->status == 'Pending'? 'selected': ''}}>Pending
                                                </option>
                                                <option value="Rejected"
                                                    {{$planRequest->status == 'Rejected'? 'selected': ''}}>Rejected
                                                </option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="col-md-9 col-xs-6 b-r"> <strong>Transaction Url</strong>
                                        <br>
                                        <p class="text-muted">{{$planRequest->transaction_url}}</p>
                                    </div>

                                </div>
                                <hr>
                                <div class="card-columns el-element-overlay">
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1">
                                                <a class="image-popup-vertical-fit"
                                                    href="{{asset($planRequest->screenshot)}}" target="_blanck">
                                                    <img src="{{asset($planRequest->screenshot)}}" alt="user" />
                                                </a>
                                            </div>
                                            <div class="el-card-content">
                                                <h5 class="box-title">Screenshot</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- withdrawal --}}
                        <?php
                                $withdrawals = App\Models\Withdrawal::where('user_id', '=', $planRequest->user->id)->where('status', '=', 'Approved')->get();
                                $plans = App\Models\PurchasedPlan::where('referral_code', '=', $planRequest->user->refferal_code)->get();
                                 ?>
                        <div class="tab-pane" id="withdrawal" role="tabpanel">
                            <div class="card-body">
                                <div class="row justify-content-center prjectDiv">
                                    <div class="col-md-3 col-xs-6 mb-2">
                                        <span class="btn btn-circle  btn-success text-white">{{count($withdrawals)}}</span>
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
{{--                                                <td>${{round($refferalAmount)}} ({{$commission}})% </td>--}}
                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- End PAge Content -->
        <div class="">
            <button class="
                      right-side-toggle
                      waves-effect waves-light
                       btn btn-circle btn-lg

                      m-l-10
                    ">
                <div id="loader" class="lds-dual-ring hidden overlay"></div>
            </button>
        </div>
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
@push('purchased-plans-requests.script')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.statusChange').change(function () {
            var status = $(this).val();
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('admin.change.plan.status') }}",
                method: "POST",
                dataType: "json",

                data: {
                    _token: "{{ csrf_token() }}",
                    status: status,
                    id: id,
                },
                beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                    $('#loader').removeClass('hidden')
                },

                success: function (data) {
                    $('#loader').addClass('hidden');
                    toastr.success(data.success);
                }
            });
        });


    });

</script>
@endpush

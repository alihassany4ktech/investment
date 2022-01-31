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
                    <li class="breadcrumb-item active">Withdrawals</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Withdrawals</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Plan</th>
                                        <th>Available Balance</th>
                                        <th>Wallet Address</th>
                                        <th>Request Payment</th>
                                        <th>Status</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdrawals as $row)
                                    <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>
                                                
                                                 <img data-toggle="tooltip" data-original-title="{{$row->user->first_name}} {{$row->user->last_name}}"
                                                src="{{asset($row->user->image) }}" alt="user" class="img-circle" width="30"
                                                height="30">
                                          </td>
                                          <td>{{$row->plan->title}}</td>
                                          <td>${{$row->available_balance}}</td>
                                          <td>{{$row->wallet_address}}</td>
                                          <td>{{$row->request_payment}}</td>
                                          <td>
                                                <select id="{{$row->id}}" class="form-control bg-light statusChange" name="status">
                                                <option value="Approved" {{$row->status == 'Approved'? 'selected': ''}}>Approved</option>
                                                <option value="Pending" {{$row->status == 'Pending'? 'selected': ''}}>Pending</option>
                                                <option value="Rejected" {{$row->status == 'Rejected'? 'selected': ''}}>Rejected</option>
                                          </select>
                                          </td>
                                          {{-- <td class="">
                                            <div class="dropdown">
                                                <button class="btn btn-light" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-settings" style="font-size: 10px"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-dark"
                                                        href=""
                                                        type="button" style="font-size: 12px;cursor: pointer"><i
                                                            class="ti-eye" style="font-size: 12px"></i> View Details</a>
                                                    <a class="dropdown-item text-dark" type="button"
                                                        style="font-size: 12px; cursor: pointer;"
                                                        href=""><i
                                                            class="ti-marker-alt" style="font-size: 12px"></i> Edit</a>
                        
                                                    <a class="dropdown-item text-dark"
                                                        href=""
                                                        type="button" style="font-size: 12px" id="deletePlan"><i class="ti-close"
                                                            style="font-size: 12px"></i> Delete</a>
                                                </div>
                                            </div>
                                           </td> --}}
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
@push('withdrawals-page-script')
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
                url: "{{ route('admin.change.withdrawal.status') }}",
                method: "POST",
                dataType: "json",

                data: {
                    _token: "{{ csrf_token() }}",
                    status: status,
                    id: id,
                },

                success: function (data) {
                    toastr.success(data.success);
                }
            });
        });


    });

</script>
@endpush

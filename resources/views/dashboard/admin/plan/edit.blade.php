@extends('dashboard.admin.layouts.includes')
@section('content')
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
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
                  
                    <li class="breadcrumb-item"><a href="{{route('admin.plans')}}">Plans</a></li>
                    <li class="breadcrumb-item active">Update Plan</li>
                </ol>
            </div>
      
        </div>

        <!-- End Bread crumb and right sidebar toggle -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                        <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img"
                                    class="img-circle"> <span>Varun Dhavan <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img"
                                    class="img-circle"> <span>Genelia Deshmukh <small
                                        class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img"
                                    class="img-circle"> <span>Ritesh Deshmukh <small
                                        class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img"
                                    class="img-circle"> <span>Arijit Sinh <small
                                        class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img"
                                    class="img-circle"> <span>Govinda Star <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img"
                                    class="img-circle"> <span>John Abraham<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img"
                                    class="img-circle"> <span>Hritik Roshan<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img"
                                    class="img-circle"> <span>Pwandeep rajan <small
                                        class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <div class="row">
            <div class="col-12">
                <h4 class="card-title">UPDATE PLAN</h4>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.plan.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$plan->id}}">
                        <br>
                            <div class="form-row">
                                <div class="col-md-4 mb-4 mt-1">
                                    <label for="validationDefault01">Title <small class="text-danger">*</small></label>
                                   <input type="text" name="title" class="form-control" id="validationDefault01"
                                        value="{{$plan->title}}" >
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4 mt-1">
                                   <label for="validationDefault02">Price <small
                                            class="text-danger">*</small></label>
                                      <input type="number" min="1" name="price" class="form-control" id="validationDefault02"
                                        value="{{$plan->price}}" >
                                         @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            
                                 <div class="col-md-4 mb-4 mt-1">
                                   <label for="validationDefault02">Return Price <small
                                            class="text-danger">*</small></label>
                                      <input type="number" min="1" name="return_price" class="form-control" id="validationDefault02"
                                       value="{{$plan->return_price}}"  >
                                         @error('return_price')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                  
                            </div>
                            <div class="form-row">
                                     <div class="col-md-6 mb-4">
                                   <label for="validationDefault03">Commission</label>
                                   <input type="number" min="00.01" max="100.00" step="0.01" name="commission" class="form-control" id="validationDefault03"
                                        value="{{$plan->commission}}" >
                                         @error('commission')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationDefault04">Daily Earning <small
                                            class="text-danger">*</small></label>
                                      <input type="number" min="00.01" max="100.00" step="0.01" name="daily_earning" class="form-control" id="validationDefault04"
                                        value="{{$plan->daily_earning}}">
                                         @error('daily_earning')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                

                              
                            </div>
                       
                        <div class="form-row">
                                <div class="col-md-6 mb-3" id="deadline_div">
                                    <label for="validationDefault05">Withdraw</label>
                                    <input type="number"  min="1" name="withdraw" class="form-control" id="validationDefault05"
                                        value="{{$plan->withdraw}}">
                                           @error('withdraw')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3" id="deadline_div">
                                    <label for="validationDefault06">Referral Commission <small
                                            class="text-danger">*</small></label>
                                    <input type="number" min="1" name="referral_commission" class="form-control" id="validationDefault06"
                                        value="{{$plan->referral_commission}}">
                                              @error('referral_commission')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                        </div>
                          
                         
                            <br>
                            <button class="btn btn-success" type="submit"><i class="ti-check"></i> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->

    <footer class="footer">
        © 2022 Webfabricant
    </footer>

    <!-- End footer -->

</div>
@endsection


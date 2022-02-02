@extends('dashboard.admin.layouts.includes')
@section('content')
<style>
.vtabs .tabs-vertical {
  width: 186px;

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
                            <li class="breadcrumb-item active">Setings</li>
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
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
      
                  <!-- Start Page Content -->

                  <div class="row">
                        <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Settings</h4>
                                <!-- Nav tabs -->
                                <div class="vtabs customvtab">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Company Settings</span> </a> </li>
                                        {{-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Profile</span></a> </li> --}}
                                        {{-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li> --}}
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home3" role="tabpanel">
                                            <div class="p-20">
                                                <form action="{{route('admin.setting.update')}}" method="POST" enctype="multipart/form-data">
                                                      @csrf
                                                      <input type="hidden" name="id" value="{{$setting->id}}">
                                                      <div class="form-row">
                                                            <div class="col-md-4 mb-5">
                                                                  <label for="validationDefault03">Company Name <small class="text-danger">*</small></label>
                                                                  <input type="text" name="company_name" class="form-control" id="validationDefault03" value="{{$setting->company_name}}" >
                                                                  @error('company_name')
                                                                  <small class="text-danger">{{ $message }}</small>
                                                                  @enderror
                                                            </div>
                                                             <div class="col-md-4">
                                                                  <label for="validationDefault03">Company Email <small class="text-danger">*</small></label>
                                                                  <input type="email" name="company_email" class="form-control" id="validationDefault03" value="{{$setting->company_email}}" >
                                                                  @error('company_email')
                                                                  <small class="text-danger">{{ $message }}</small>
                                                                  @enderror
                                                            </div>
                                                             <div class="col-md-4">
                                                                  <label for="validationDefault03">Company Phone <small class="text-danger">*</small></label>
                                                                  <input type="text" name="company_phone" class="form-control" id="validationDefault03" value="{{$setting->company_phone}}" >
                                                                  @error('company_phone')
                                                                  <small class="text-danger">{{ $message }}</small>
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                      <div class="form-row mb-5">
                                                            <div class="col-md-4">
                                                                  <label for="validationDefault03">Company Logo</label>
                                                                  <input type="file" name="company_logo" id="input-file-now-custom-3" class="dropify" data-height="150"
                                                                  data-default-file="{{asset($setting->company_logo)}}"  />
                                                                  @error('company_logo')
                                                                  <small class="text-danger">{{ $message }}</small>
                                                                  @enderror
                                                            </div>
                                                             <div class="col-md-4">
                                                                  <label for="validationDefault03">Favicon Image</label>
                                                                  <input type="file" name="company_favicon" id="input-file-now-custom-3" class="dropify" data-height="150"
                                                                  data-default-file="{{asset($setting->company_favicon)}}"  />
                                                                  @error('company_favicon')
                                                                  <small class="text-danger">{{ $message }}</small>
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                      <div class="form-row mb-5">
                                                            <div class="col-md-12 mb-4">
                                                                  <label for="validationDefault03">Company Address <small class="text-danger">*</small></label>
                                                                  <textarea class="summernote" name="company_address">{{$setting->company_address}}</textarea>
                                                                   @error('company_address')
                                                                  <small class="text-danger">{{ $message }}</small>
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                      <div class="form-row mb-5">
                                                            <div class="col-md-12">
                                                                  <label for="validationDefault03">Company Website</label>
                                                                  <input type="url" name="company_website_link" class="form-control"  pattern="https://.*" size="30" id="validationDefault03"  value="{{$setting->company_website_link}}" >
                                                                  @error('company_website_link')
                                                                  <small class="text-danger">{{ $message }}</small>
                                                                  @enderror
                                                            </div>
                                                         
                                                      </div>
                                                 
                                                    
                                                      <br>
                                                    <button class="btn btn-success" type="submit">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane  p-20" id="profile3" role="tabpanel">2</div>
                                        <div class="tab-pane p-20" id="messages3" role="tabpanel">3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                  <!-- End Page Content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
                    <?php
                        $setting = App\Models\Setting::where('id','=',1)->first();
                    ?>
            <footer class="footer">
                © 2022 {{$setting->company_name}}
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        @endsection

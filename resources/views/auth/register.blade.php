<!DOCTYPE html>
<html>
    <head>
            <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/plugins/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
            {{-- <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"> --}}
   <style>


.select2-container--default .select2-selection--single {
  border-color: #d9d9d9;
  height: 38px; }

.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 38px; }

.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 33px; }
    .phone_country_code {
    width: 200px;
    /* background: #e4e7ea; */
    padding: 10px 10px !important;
    border-radius: 4px 0 0 4px !important;
    }
</style>

    </head>


<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 bg-light p-4">
                <h3>Sign Up</h3>
                <form action="{{route('user.signup')}}" class="form-horizontal form-material" method="POST">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                             <input  id="first_name" placeholder="First Name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            name="first_name"  autocomplete="first_name" autofocus>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                             <input  id="last_name" placeholder="Last Name" type="text"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            name="last_name"  autocomplete="last_name" autofocus>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inputEmail4">Email</label>
                              <input  id="email" placeholder="Email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                             autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Document Address</label>
                             <input  id="document_address" placeholder="Address As Per The Documents "
                                            type="text"
                                            class="form-control @error('document_address') is-invalid @enderror"
                                            name="document_address"  autocomplete="document_address" autofocus>
                                        @error('document_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                              <input  id="address" placeholder="Address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                             autocomplete="address" autofocus>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="inputCity">City</label>
                             <input  id="city" placeholder="City" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                             autocomplete="city" autofocus>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">Region</label>
                             <input  id="region" placeholder="Region" type="text"
                                            class="form-control @error('region') is-invalid @enderror" name="region"
                                             autocomplete="region" autofocus>
                                        @error('region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputZip">Zip/Postal Code </label>
                               <input  id="postal_or_zip_code" placeholder="Five Digit" type="text" 
                                            class="form-control @error('postal_or_zip_code') is-invalid @enderror"
                                            name="postal_or_zip_code"  autocomplete="postal_or_zip_code"
                                            autofocus>
                                        @error('postal_or_zip_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>

                        <div class="form-row mb-4">
                               <div class="col-md-6">
                                     <label for="inputZip">Country </label>
                                        <input  id="country" placeholder="Country" type="text"
                                            class="form-control @error('country') is-invalid @enderror" name="country"
                                             autocomplete="country" autofocus>
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                     <label for="inputZip">Country Code</label>
                                        <input  id="country_code" placeholder="Country Code" type="text"
                                            class="form-control @error('country_code') is-invalid @enderror" name="country_code"
                                             autocomplete="country_code" autofocus>
                                        @error('country_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                   
                                    {{-- <div class="col-md-4 ">
                                         <label for="phone">Number</label>
                                        <input  id="phone" placeholder="Number" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                             autocomplete="phone" autofocus>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> --}}
                        </div>
                        <div class="form-row mb4">
                             <div class="col-md-12">
                                          <label for="validationDefault02">Number</label>
                                          <div class="form-group" style="display: flex;">
                                          <select class="select2 phone_country_code form-control" name="phone_code">
                                              <option value="">Select</option>
                                                @foreach ($countries as $item)
                                                    <option value="+{{ $item->phonecode }}">+{{ $item->phonecode.' ('.$item->iso.')' }}</option>
                                                @endforeach
                                            </select>
                                            <input type="tel" name="phone" id="phone"  style="width:100%;" class="mobile" autocomplete="nope">
                                            </div>
                                           @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-md-4">
                                <div class="form-check" style="margin-top: 35px">
                                 <input class="form-check-input" name="is_plus_eighteen" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Age
                            </label>
                            </div>
                            </div>
                            <div class="col-md-8">
                                <label for="inputZip">National id card or passport number</label>
                                 <input  id="national_id" placeholder="National id card or passport number"
                                            type="text" class="form-control @error('national_id') is-invalid @enderror"
                                            name="national_id"  autocomplete="national_id" autofocus>
                                        @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>
                        <div class="form-row mb-4">
                                            <div class="col-md-4 ">
                                                <label for="inputZip">Password</label>
                                        <input  id="password" placeholder="password" type="Password"
                                            class="form-control @error('password') is-invalid @enderror" name="password" 
                                            autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                       <div class="col-md-4">
                                           <label for="inputZip">Confirm Password</label>
                                    <input  id="password_confirmation" placeholder="Retype Password" type="password"
                                        name="password_confirmation" class="form-control"  autocomplete="new-password">
                                </div>
                                
                        </div>
                            <a href="{{route('user.login')}}"><small class="mt-3">already i have an account</small></a>
                        <button type="submit" class="btn btn-primary float-right">Next</button>
                        </form>
            </div>
        </div>
    </div>

 <!-- End Wrapper -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
     <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>


    <script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
     
     

      








</body>
</html>
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}"  autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}"  autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password"  autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                    autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}

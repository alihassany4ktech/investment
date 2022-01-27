<!DOCTYPE html>
<html>
    <head>
          <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
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
                             <input  id="first_name" placeholder="first name" type="text"
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
                             <input  id="last_name" placeholder="first name" type="text"
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
                              <input  id="email" placeholder="email" type="email"
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
                             <input  id="document_address" placeholder="address as per the documents "
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
                              <input  id="address" placeholder="address" type="text"
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
                             <input  id="city" placeholder="city" type="text"
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
                             <input  id="region" placeholder="region" type="text"
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
                               <input  id="postal_or_zip_code" placeholder="Five digit" type="text" 
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
                               <div class="col-md-4">
                                     <label for="inputZip">Country </label>
                                        <input  id="country" placeholder="country" type="text"
                                            class="form-control @error('country') is-invalid @enderror" name="country"
                                             autocomplete="country" autofocus>
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                     <label for="inputZip">Country Code</label>
                                        <input  id="country_code" placeholder="country_code" type="text"
                                            class="form-control @error('country_code') is-invalid @enderror" name="country_code"
                                             autocomplete="country_code" autofocus>
                                        @error('country_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 ">
                                         <label for="inputZip">Number</label>
                                        <input  id="phone" placeholder="number" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                             autocomplete="phone" autofocus>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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
                                        <input  id="password" placeholder="password" type="password"
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
                                    <input  id="password_confirmation" placeholder="retype password" type="password"
                                        name="password_confirmation" class="form-control"  autocomplete="new-password">
                                </div>
                                
                        </div>
                            <a href="{{route('user.login')}}"><small class="mt-3">already i have an account</small></a>
                        <button type="submit" class="btn btn-primary float-right">Next</button>
                        </form>
            </div>
        </div>
    </div>

   <script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
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

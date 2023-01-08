@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    @if($configData['theme'] === 'dark')
                        <img class="img-fluid" src="{{asset('images/pages/register-v2-dark.svg')}}" alt="Register V2"/>
                    @else
                        <img class="img-fluid" src="{{asset('images/pages/register-v2.svg')}}" alt="Register V2"/>
                    @endif
                </div>
            </div>
            <!-- /Left Text-->
            <!-- Register-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bold mb-1">{{ __('Register') }}</h2>
                    @if(count($errors) > 0)
                        @foreach( $errors->all() as $message )
                            <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                <span>{{ $message }}</span>
                            </div>
                        @endforeach
                    @endif
                    <form class="auth-register-form mt-2" action="{{ route('frontend.auth.register') }}" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                            <input id="first_name" type="text"
                                   class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                   value="{{ old('first_name') }}" placeholder="Jhon" required autocomplete="first_name"
                                   autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                            <input id="last_name" type="text"
                                   class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                   value="{{ old('last_name') }}" placeholder="Doe" required autocomplete="last_name"
                                   autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="group_id" type="number"
                                   hidden
                                   name="group_id" value="{{ $group_id ?? null }}" placeholder="" required
                                   autocomplete="email">
                            @if($email)
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror " @if($email) disabled
                                       @endif
                                       name="email" value="{{ $email ?? old('email') }}" placeholder=""
                                       autocomplete="email">
                                <input id="email" type="hidden" class="form-control disabled" name="email"
                                       value="{{ $email }}">

                            @else
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror "
                                       name="email" value="{{ old('email') }}" placeholder="" required
                                       autocomplete="email">
                            @endif
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input id="password" type="password"
                                       class="form-control form-control-merge @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password">
                                <span class="input-group-text cursor-pointer">  <x-feathericon-eye/></span>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input id="password_confirmation" type="password"
                                       class="form-control form-control-merge @error('password_confirmation') is-invalid @enderror"
                                       name="password_confirmation" required autocomplete="new-password">
                                <span class="input-group-text cursor-pointer">  <x-feathericon-eye/></span>
                            </div>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" id="register-privacy-policy" value="1" name="terms"
                                       type="checkbox" tabindex="4"/>
                                <label class="form-check-label" for="register-privacy-policy">I agree to<a href="#">&nbsp;privacy
                                        policy & terms</a></label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" tabindex="5">{{ __('Sign up') }}</button>
                    </form>
                    <p class="text-center mt-2">
                        <span>Already have an account?</span>
                        <a href="{{route('frontend.auth.login')}}"><span>&nbsp;Sign in instead</span></a>
                    </p>
                </div>
            </div>
            <!-- /Register-->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/auth-register.js')}}"></script>
@endsection

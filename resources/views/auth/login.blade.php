@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

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
                        <img class="img-fluid" src="{{asset('images/pages/login-v2-dark.svg')}}" alt="Login V2" />
                    @else
                        <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" />
                    @endif
                </div>
            </div>
            <!-- /Left Text-->

            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bold mb-1">{{__('Welcome to Your Craziest Experience in 2022')}}! 👋</h2>
                    <p class="card-text mb-2">{{__('Please sign-in to your account and start the adventure')}}</p>
                    <form class="auth-login-form mt-2" action="{{route('frontend.auth.login')}}" method="POST">
                        @csrf
                        @if(count($errors) > 0)
                            @foreach( $errors->all() as $message )
                                <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <span>{{ $message }}</span>
                                </div>
                            @endforeach
                        @endif
                        @if(config('boilerplate.access.captcha.login'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    <input type="hidden" name="captcha_status" value="true" />
                                </div><!--col-->
                            </div><!--row-->
                        @endif
                        <div class="mb-1">
                            <label class="form-label" for="email">{{__('Email')}}</label>
                            <input class="form-control" id="login-email" type="text" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">{{__(('Password'))}}</label>
                                <a href="{{ route('frontend.auth.password.request') }}">
                                    <small>{{__('Forgot Password?')}}</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                <span class="input-group-text cursor-pointer"><x-feathericon-eye /></span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                                <label class="form-check-label" for="remember-me"> {{__('Remember Me')}}</label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" type="submit" tabindex="4">{{__('Sign in')}}</button>
                    </form>
                    <p class="text-center mt-2">
                        <span>New on our platform?</span>
                        <a href="{{ route('frontend.auth.register') }}"><span>&nbsp;{{__('Create an account')}}</span></a>
                    </p>
                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection

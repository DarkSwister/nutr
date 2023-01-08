@extends('layouts/contentLayoutMaster')

@section('title', 'Profile Settings')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-2">
                <!-- Account -->
                <li class="nav-item">
                    <button class="nav-link active" id="nav-profile-settings-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profile-settings" role="tab"
                            aria-selected="true" aria-controls="nav-profile-settings">
                        <i data-feather="user" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Account</span>
                    </button>
                </li>
                <!-- security -->
                <li class="nav-item">
                    <button class="nav-link" id="nav-profile-security-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profile-security" role="tab"
                            aria-selected="false" aria-controls="nav-profile-security">
                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Security</span>
                    </button>
                </li>
                <!-- billing and plans -->
                <li class="nav-item">
                    <button class="nav-link" id="nav-profile-billing-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profile-billing" role="tab"
                            aria-selected="false" aria-controls="nav-profile-billing">
                        <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Billings &amp; Plans</span>
                    </button>
                </li>
                <!-- notification -->
                <li class="nav-item">
                    <button class="nav-link" id="nav-profile-notifications-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profile-notifications" role="tab"
                            aria-selected="false" aria-controls="nav-profile-notifications">
                        <i data-feather="bell" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Notifications</span>
                    </button>
                </li>
                <!-- connection -->
                <li class="nav-item">
                    <button class="nav-link" id="nav-profile-connections-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profile-connections" role="tab"
                            aria-selected="false" aria-controls="nav-profile-connections">
                        <i data-feather="link" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Connections</span>
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" role="tabpanel" id="nav-profile-settings"
                     aria-labelledby="nav-profile-settings-tab">
                    <livewire:dynamic-component component="user.settings.profile-settings"></livewire:dynamic-component>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="nav-profile-security"
                     aria-labelledby="nav-profile-security-tab">
                    @livewire('user.settings.profile-security')
                </div>
                <div class="tab-pane fade" role="tabpanel" id="nav-profile-billing"
                     aria-labelledby="nav-profile-billing-tab">
                    @livewire('user.settings.profile-billing')
                </div>
                <div class="tab-pane fade" role="tabpanel" id="nav-profile-notifications"
                     aria-labelledby="nav-profile-notifications-tab">
                    @livewire('user.settings.profile-notifications')
                </div>
                <div class="tab-pane fade" role="tabpanel" id="nav-profile-connections"
                     aria-labelledby="nav-profile-connections-tab">
                    @livewire('user.settings.profile-connections')
                </div>
            </div>
            <!--/ profile -->
        </div>
    </div>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/page-account-settings-account.js')) }}"></script>
@endsection

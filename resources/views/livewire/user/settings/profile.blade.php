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

<div>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-2">
                <!-- Account -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{asset('page/account-settings-account')}}">
                        <i data-feather="user" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Account</span>
                    </a>
                </li>
                <!-- security -->
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('page/account-settings-security')}}">
                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Security</span>
                    </a>
                </li>
                <!-- billing and plans -->
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('page/account-settings-billing')}}">
                        <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Billings &amp; Plans</span>
                    </a>
                </li>
                <!-- notification -->
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('page/account-settings-notifications')}}">
                        <i data-feather="bell" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Notifications</span>
                    </a>
                </li>
                <!-- connection -->
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('page/account-settings-connections')}}">
                        <i data-feather="link" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Connections</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="nav-tabContent">
                <div id="nav-profile-settings">
                    @if($currentTab === "nav-profile-settings-tab")
                        @livewire('user.settings.profile-settings')
                    @endif
                </div>
                <div id="nav-profile-security">
                    @if($currentTab === "nav-profile-security-tab")
                        @livewire('user.settings.profile-security')
                    @endif
                </div>
                <div id="nav-profile-billing">
                    @if($currentTab === "nav-profile-billing-tab")
                        @livewire('user.settings.profile-billing')
                    @endif
                </div>
                <div id="nav-profile-notifications">
                    @if($currentTab === "nav-profile-notifications-tab")
                        @livewire('user.settings.profile-notifications')
                    @endif
                </div>
                <div id="nav-profile-connections">
                    @if($currentTab === "nav-profile-connections-tab")
                        @livewire('user.settings.profile-connections')
                    @endif
                </div>
            </div>
            <!--/ profile -->
        </div>
    </div>
</div>
@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/page-account-settings-account.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/page-pricing.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/modal-add-new-cc.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/modal-edit-cc.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/page-account-settings-billing.js')) }}"></script>
@endsection

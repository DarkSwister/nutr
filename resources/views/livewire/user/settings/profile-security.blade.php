@section('title', 'Security')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

<div class="row">
    <div class="col-12">
        @livewire('user.settings.profile-tabs')

        {{--        password changing--}}
        @livewire('user.settings.forms.update-password-form')

        <!-- two-step verification -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Two-step verification</h4>
            </div>
            <div class="card-body my-2 py-25">
                @if ($logged_in_user->hasTwoFactorEnabled())
                    <p class="fw-bolder">Two Factor Authentication is Enabled</p>
                        <a href="{{ route('frontend.auth.account.2fa.show') }}" class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light" >
                            View/Regenerate Recovery Codes
                        </a>
                        <button class="btn btn-danger mt-1 waves-effect" data-bs-toggle="modal"
                                data-bs-target="#twoFactorAuthModalDelete">Remove Two Factor Authentication</button>
                @else
                    <p class="fw-bolder">@lang('Two factor authentication is not enabled yet.')</p>
                    <p>
                        Two-factor authentication adds an additional layer of security to your account by requiring
                        <br/>
                        more than just a password to log in. Learn more.
                    </p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#twoFactorAuthModal">
                        Enable two-factor authentication
                    </button>
                @endif
            </div>
        </div>
        <!-- / two-step verification -->


        <!-- recent device -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Recent devices</h4>
            </div>
            <div class="card-body my-2 py-25">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap text-center">
                        <thead>
                        <tr>
                            <th class="text-start">BROWSER</th>
                            <th>DEVICE</th>
                            <th>LOCATION</th>
                            <th>RECENT ACTIVITY</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-start">
                                <div class="avatar me-25">
                                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20"
                                         height="20"/>
                                </div>
                                <span class="fw-bolder">Chrome on Windows</span>
                            </td>
                            <td>Dell XPS 15</td>
                            <td>United States</td>
                            <td>10, Jan 2021 20:07</td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                <div class="avatar me-25">
                                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20"
                                         height="20"/>
                                </div>
                                <span class="fw-bolder">Chrome on Android</span>
                            </td>
                            <td>Google Pixel 3a</td>
                            <td>Ghana</td>
                            <td>11, Jan 2021 10:16</td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                <div class="avatar me-25">
                                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20"
                                         height="20"/>
                                </div>
                                <span class="fw-bolder">Chrome on MacOS</span>
                            </td>
                            <td>Apple iMac</td>
                            <td>Mayotte</td>
                            <td>11, Jan 2021 12:10</td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                <div class="avatar me-25">
                                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20"
                                         height="20"/>
                                </div>
                                <span class="fw-bolder">Chrome on iPhone</span>
                            </td>
                            <td>Apple iPhone XR</td>
                            <td>Mauritania</td>
                            <td>12, Jan 2021 8:29</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- / recent device -->
        <!--/ security -->
    </div>

</div>
@push('modals')
    @if (!$logged_in_user->hasTwoFactorEnabled())
        @include('content/_partials/_modals/modal-two-factor-auth')
    @else
        @include('content/_partials/_modals/modal-two-factor-auth-delete')
    @endif

@endpush
@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/modal-two-factor-auth.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/page-account-settings-security.js')) }}"></script>
@endsection

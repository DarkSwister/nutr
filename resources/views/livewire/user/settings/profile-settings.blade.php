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
@section('vendor-script')
    <script src="{{asset('vendors/js/extensions/toastr.min.js')}}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-clipboard.js')) }}"></script>
@endsection

<div class="row">
    <div class="col-12">

        @livewire('user.settings.profile-tabs')
        <!-- profile -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">@lang('Profile Details')</h4>
            </div>
            <div class="card-body  my-25">
                @livewire('user.settings.forms.update-user-profile-form')
            </div>
        </div>

        <!-- Meal  settings  -->
        @if(auth()->user()->isSetup())
            <div class="card ">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('Personal Details')</h4>
                </div>
                <div class="card-body p-2">
                    @livewire('user.settings.user-meal-properties')
                </div>
            </div>

            <div class="card card-statistics">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('Calculated Properties')</h4>
                </div>
                <div class="card-body statistics-body p-2">
                    @livewire('user.user-stats')
                </div>
            </div>
        @else

            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('Personal Details')</h4>
                </div>
                <div class="card-body p-2">


                    <p class="fw-bolder">@lang('You have to complete setup.')</p>
                    <a href="{{route('user.setup')}}" class="btn btn-primary">
                        @lang('Setup')
                    </a>
                </div>
            </div>
        @endif

        <!-- Invite links  -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">@lang('Invite Link')</h4>
            </div>
            <div class="card-body  my-25">
                @livewire('user.profile-invite-link',['groups'=>$groups])
            </div>
        </div>


        <!-- User invitations  -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">@lang('Group Invitations')</h4>
            </div>
            <div class="card-body p-2">
                @livewire('user.user-invitation-table')
            </div>
        </div>

        <!-- groups  -->
        <div class="card card-statistics">
            <div class="card-header">
                <h4 class="card-title">Group Statistics</h4>
                <select wire:model="selectedGroupId" name="group" class="form-select mt-1">
                    @forelse($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @empty
                        <option value="">@lang('You are not assigned to group')</option>
                    @endforelse
                </select>
            </div>
            @if($selectedGroup)
                <div class="card-body statistics-body ">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                            <a href="{{route('recipes.index')}}">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <x-feathericon-feather></x-feathericon-feather>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{$selectedGroup->recipes_count}}</h4>
                                        <p class="card-text font-small-3 mb-0">@lang('Recipes')</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-info me-2">
                                    <div class="avatar-content">
                                        <x-feathericon-user></x-feathericon-user>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{$selectedGroup->users_count}}</h4>
                                    <p class="card-text font-small-3 mb-0">@lang('Users')</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <a href="{{route('recipes.index')}}">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <x-feathericon-tag></x-feathericon-tag>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{$selectedGroup->categories_count}}</h4>
                                        <p class="card-text font-small-3 mb-0">@lang('Categories')</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="{{route('recipes.index')}}">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <x-feathericon-tag></x-feathericon-tag>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{$selectedGroup->tags_count}}</h4>
                                        <p class="card-text font-small-3 mb-0">@lang('Tags')</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- deactivate account  -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">@lang('Delete Account')</h4>
            </div>
            <div class="card-body py-2 my-25">
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Are you sure you want to delete your account?</h4>
                    <div class="alert-body fw-normal">
                        Once you delete your account, there is no going back. Please be certain.
                    </div>
                </div>

                <form id="formAccountDeactivation" class="validate-form" onsubmit="return false">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                            data-msg="Please confirm you want to delete account"
                        />
                        <label class="form-check-label font-small-3" for="accountActivation">
                            I confirm my account deactivation
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger deactivate-account mt-1">Deactivate Account</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

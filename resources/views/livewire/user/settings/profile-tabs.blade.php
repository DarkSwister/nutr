<div>
    <ul class="nav nav-pills mb-2">
        <!-- Account -->
        <li class="nav-item">
            <a class="nav-link @if(Route::is('frontend.user.profile-settings')) active @endif" href="{{route('frontend.user.profile-settings')}}">
                <i data-feather="user" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Account</span>
            </a>
        </li>
        <!-- security -->
        <li class="nav-item">
            <a class="nav-link @if(Route::is('frontend.user.profile-security')) active @endif" href="{{route('frontend.user.profile-security')}}">
                <i data-feather="lock" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Security</span>
            </a>
        </li>

    </ul>
</div>

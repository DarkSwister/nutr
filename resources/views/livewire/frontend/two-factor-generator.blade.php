<div>
    <h1 class="text-center mb-2 pb-50" id="twoFactorAuthAppsTitle">Add Authenticator App</h1>

    <h4>Authenticator Apps</h4>
    <p>
        Using an authenticator app like Google Authenticator, Microsoft Authenticator, Authy, or 1Password, scan the
        QR code. It will generate a 6 digit code for you to enter below.
    </p>

    <div class="d-flex justify-content-center my-2 py-50">
        {!! $qrCode !!}
    </div>

    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">{{ $secret }}</h4>
        <div class="alert-body fw-normal">
            If you having trouble using the QR code, select manual entry on your app
        </div>
    </div>
    <livewire:frontend.two-factor-authentication/>


</div>

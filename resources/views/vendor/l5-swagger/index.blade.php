@extends('layouts/contentLayoutMaster')

@section('title', 'Documentation')

@push('css')
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ l5_swagger_asset($documentation, 'swagger-ui.css') }}">
    <link rel="icon" type="image/png" href="{{ l5_swagger_asset($documentation, 'favicon-32x32.png') }}" sizes="32x32"/>
    <link rel="icon" type="image/png" href="{{ l5_swagger_asset($documentation, 'favicon-16x16.png') }}" sizes="16x16"/>
@endpush

@section('content')
    <!-- Page layout -->
    <div class="card">
        <div class="card-body">
            <div id="swagger-ui"></div>
        </div>
    </div>

    <script src="{{ l5_swagger_asset($documentation, 'swagger-ui-bundle.js') }}"></script>
    <script src="{{ l5_swagger_asset($documentation, 'swagger-ui-standalone-preset.js') }}"></script>
    <script>
        window.onload = function() {
            // Build a system
            const ui = SwaggerUIBundle({
                dom_id: '#swagger-ui',
                url: "{!! $urlToDocs !!}",
                operationsSorter: {!! isset($operationsSorter) ? '"' . $operationsSorter . '"' : 'null' !!},
                configUrl: {!! isset($configUrl) ? '"' . $configUrl . '"' : 'null' !!},
                validatorUrl: {!! isset($validatorUrl) ? '"' . $validatorUrl . '"' : 'null' !!},
                oauth2RedirectUrl: "{{ route('l5-swagger.'.$documentation.'.oauth2_callback', [], $useAbsolutePath) }}",

                requestInterceptor: function(request) {
                    request.headers['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
                    return request;
                },

                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],

                plugins: [
                    // SwaggerUIBundle.plugins.DownloadUrl
                ],

                // layout: "StandaloneLayout",

                persistAuthorization: "{!! config('l5-swagger.defaults.ui.authorization.persist_authorization') ? 'true' : 'false' !!}",

            })

            window.ui = ui
        }
    </script>
    <!--/ Page layout -->
@endsection

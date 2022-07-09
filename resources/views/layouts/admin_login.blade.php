<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }} | @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Favicon icon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('dattaable/assets/images/favicon.ico') }}">
        <!-- fontawesome icon -->
        <link rel="stylesheet" href="{{ asset('dattaable/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
        <!-- animation css -->
        <link rel="stylesheet" href="{{ asset('dattaable/assets/plugins/animation/css/animate.min.css') }}">
        <!-- vendor css -->
        <link rel="stylesheet" href="{{ asset('dattaable/assets/css/style.css') }}">
        <!-- Principal Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div style="background-color: #697388;">
            @yield('content')
        </div>

        <!-- Required Js -->
        <script src="{{ asset('dattaable/assets/js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('dattaable/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- Principal Scripts -->
        <script src="{{ mix('js/bundle.private.js') }}"></script>
    </body>
</html>

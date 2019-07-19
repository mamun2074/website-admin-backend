<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | EZY Carport Solutions</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('asset/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('asset/plugins/node-waves/waves.css') }}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{ asset('asset/plugins/animate-css/animate.css') }}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    {{--<div class="logo">--}}
        {{--<a href="javascript:void(0);"><img style="width:338px; border-radius: 20px;" src="{{ asset('asset/images/logo.png') }}" alt=""></b></a>--}}
        {{--<small></small>--}}
    {{--</div>--}}

    @yield('auth-body')

</div>

<!-- Jquery Core Js -->
<script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('asset/plugins/node-waves/waves.js') }}"></script>

<!-- Validation Plugin Js -->
<script src="{{ asset('asset/plugins/jquery-validation/jquery.validate.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('asset/js/admin.js') }}"></script>
<script src="{{ asset('asset/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>
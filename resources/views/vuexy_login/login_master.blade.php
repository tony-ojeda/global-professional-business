<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GPB | Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo/favicon.ico">

    @include('vuexy_login.styles')

</head>



<body class="vertical-layout 1-column blank-page bg-full-screen-image pace-done menu-expanded vertical-menu-modern" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    @include('vuexy_login.scripts')

</body>

</html>
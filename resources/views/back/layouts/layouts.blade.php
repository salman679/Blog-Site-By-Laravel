<!doctype html>
<html class="no-js " lang="en">
<head>
@include('back.section.haed')
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('back/images/loader.svg') }}" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

@include('back.section.left_bar')

@include('back.section.right_bar')

@yield('content')

@include('back.section.script')

@yield('customJs')
</body>
</html>
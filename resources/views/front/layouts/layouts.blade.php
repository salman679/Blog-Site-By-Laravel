<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.section.head')

    @yield('custom_css')
</head>

<body>
    <!-- header start -->
    @include('front.section.header')
    <!-- header end -->

    @yield('content')

    <!-- footer start -->
    @include('front.section.footer')
    <!-- footer end -->

    @include('front.section.script')

    @yield('custom_js')

</body>

</html>
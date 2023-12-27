<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BunGee Blog</title>

<link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/slick.css') }}">

<!-- main css -->
<link rel="stylesheet" href="{{ asset('front/scss/style.css') }}">

<!-- favicon -->
<link rel="shortcut icon" href="{{ asset('front/image/favicon.ico') }}" type="image/x-icon">

@section('custom_css')
    <style>
    .item-info .tag a{
        font-size: 12px;
        font-weight: 600;
        padding: 4px 15px;
        background-color: #f70d28;
        color: #fff;
        text-transform: uppercase;
        margin-right: 10px;
    }
</style>
@endsection
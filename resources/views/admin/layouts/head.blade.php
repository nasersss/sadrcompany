<title>@yield('title')</title>
<!-- App favicon -->
<!-- Favicon -->
<link rel="icon" href="{{ asset('/assets/img/image/As2.pgn') }}" />
<link rel="shortcut" href="{{ asset('/assets/img/image/As2.pgn') }}" />
<link rel="apple-touch-icon" href="{{ asset('/assets/img/image/As2.pgn') }}" />

@yield('first-css')

<!-- App css -->

<link href="{{ asset('assets/css/app-ar.min.css') }}" rel="   stylesheet" type="text/css" id="light-style">

{{-- <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"> --}}
<link href="{{ asset('assets/css/color.css') }}" rel="stylesheet" type="text/css" id="dark-style">

<!-- App css -->
<link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
<!-- third party css -->

<link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/resposive-size.css') }}" rel="stylesheet" type="text/css" id="light-style">

<!-- third party css end -->
@yield('css')

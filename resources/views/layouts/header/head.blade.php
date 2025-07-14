<title>@yield('title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description"
content="شركة رائدة في تقديم الخدمات الهندسية والإعلانية,نعمل بأعلى مستويات الجودة وبإشراف طاقم ذو خبرة وكفاءة عالية"/>
<meta name="keywords"  content="التصميم الهندسي,
,التصاميم, والمخططات المعمارية والتنفيذية,التصميم الجرافيكي
,تصميم هوية الشركات, تصميم الكتب,تصميم الأغلفة,تصميم المجلات
    ,التصميم الداخلي
,تصميم الديكور, تصيم الاثاث بطريقة عصرية
    الموشين جرافيك
"/>
<meta name="author" content="Go Up"/>

<!-- Favicon -->
<link rel="icon" href="{{asset('/assets/img/image/As.png')}}" />
<link rel="shortcut"  href="{{asset('/assets/img/image/As.png')}}" />
<link rel="apple-touch-icon"  href="{{asset('/assets/img/image/As.png')}}" />
<!--
for facebook sharing
-->
<meta property="og:title" content="BuildPlus"/>
<meta property="og:description" content="شركة رائدة في تقديم الخدمات الهندسية والإعلانية ، نعمل بأعلى مستويات الجودة "/>
<meta property="og:image" content="{{asset('/assets/img/sharing.jpg')}}"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:url"  content="https://buildplus.online/"/>
<meta property="og:type" content="website"/>
<!-- for facebook twitter -->

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@buildplus_c"/>
<meta name="twitter:creator" content="@AL_Ghaithweb"/>
<meta property="og:url" content="https://buildplus.online/" />
<meta property="og:title" content="BuildPlus" />
<meta property="og:description"content="شركة رائدة في تقديم الخدمات الهندسية والإعلانية ، نعمل بأعلى مستويات الجودة وبإشراف طاقم ذو خبرة وكفاءة عالية"/>
<meta name="twitter:image:src"  content="{{asset('/assets/img/sharing.jpg')}}"/>

<link href="{{asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">
<!-- third party css end -->

<!-- App css -->
<link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet" type="text/css">
{{-- <link href="{{asset('assets/css/app-ar.min.css')}}" rel="stylesheet" type="text/css" id="light-style"> --}}
{{-- <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"> --}}
{{-- <link href="{{asset('assets/css/header.css')}}" rel="stylesheet"> --}}
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">

<!-- Murad -->
<link href="{{asset('assets/lib/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/css/about.css')}}" rel="stylesheet">

<!-- Murad -->

{{-- Build plus css --}}

<!-- CSS Libraries -->
<link href="{{asset('assets/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
<link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/lib/slick/slick.css')}}" rel="stylesheet">
<link href="{{asset('assets/lib/slick/slick-theme.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- Owl-carousel CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />


<!-- Template Stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/owlstyl.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/work.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/comments.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/all.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/about.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/contact.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/header.css')}}" rel="stylesheet">
{{-- <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"> --}}

@if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'ltr')
        <link rel="stylesheet" href="{{ asset('assets/css/en.css') }}">
    @endif
@yield('css')


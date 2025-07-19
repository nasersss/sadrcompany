@extends('master')

@section('title')
    SadrCompany Company شركة بيلد بلس
@endsection

{{-- page css files or code  --}}
@section('css')
@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
    @include('message')
    <!-- About Start -->
    <div class="about wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="text">
                        <div class="section-header text-right">
                            <h1 class="head main-c en-text-left">{{ __('home.title') }}</h1>
                            <p class="text-header main-c en-text-left">{{ __('home.subtitle') }}</p>
                        </div>
                        <div class="about-text">
                            <p class="main-c"style="text-overflow: clip;">
                                {{ __('home.who_are') }}
                            </p>
                        </div>
                    </div>
                    <div class="button">
                        <a href="{{ route('contact') }}" target="_blank"><button
                                class="main-Bg contact-btn">{{ __('home.contact') }}</button></a>
                        {{-- <a href="#"> <button class="brof" data-toggle="modal"
                                data-target="#exampleModal">{{ __('home.work_prtfolio') }}</button></a> --}}
                        <a href="https://drive.google.com/file/d/1H5K4WLBqM7JSfa4zcNGnJb0N6ioseJtd/view?usp=drivesdk"
                            target="_blank"> <button class="brof"
                                data-toggle="modal">{{ __('home.work_prtfolio') }}</button></a>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about-img">
                        <img src="{{ asset('/assets/img/logo/interface1.png') }}" alt="Image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start-->
    <div class="FeatureContainer main-Bg">
        <div class="container">
            <div class="feature wow fadeInUp" id="whyUs" data-wow-delay="0.1s">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="section-header text-center w-100">
                            <h2 style="main-c  text-title pt-2 pb-2">{{ __('home.why_us') }}</h2>
                        </div>
                        <div class="col-lg-4 featu">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="{{ asset('/assets/img/image/whyUs/Experince.png') }}" alt="Technical" />
                                </div>
                                <div class="feature-text">
                                    <h3>{{ __('home.experience') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4  featu">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="{{ asset('/assets/img/image/whyUs/Quality.png') }}" alt="quality" />
                                </div>
                                <div class="feature-text">
                                    <h3>{{ __('home.quality') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4  featu">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="{{ asset('/assets/img/image/whyUs/time.png') }}" alt="time" />
                                </div>
                                <div class="feature-text">
                                    <h3 class="qlaty">{{ __('home.appointments') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature End-->
    <!-- Fact Start -->
    <div class="fact">
        <div class="container">
            <div class="container-fluid">
                <div class="row counters">
                    <div class="col-md-12 fact-left wow slideInRight">
                        <div class="row">
                            <div class="col-4 content">
                                <div class="fact-text">
                                    <h2 data-toggle="counter-up">9</h2><span>+</span>
                                </div>
                                <p>{{ __('home.expert') }}</p>

                            </div>
                            <div class="col-4 content">
                                <div class="fact-text">

                                    <h2 data-toggle="counter-up">183</h2><span>+</span>
                                </div>
                                <p>{{ __('home.client') }}</p>

                            </div>
                            <div class="col-4 content">
                                <div class="fact-text">
                                    <h2 data-toggle="counter-up">356</h2><span>+</span>
                                </div>
                                <p>{{ __('home.project') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

    <!-- Service Start -->
    <div class="service  mb-3" id="service">
        <div class="container-fluid">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="w-c text-title">{{ __('home.service') }}</h2>
                </div>
                <div class="innerCard ">
                    <div class="card">
                        <img src="{{ asset('/assets/img/image/Servies/Engineering_Designs.png') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title w-c"style="font-size:25px;">{{ __('home.arch_title') }}</h5>
                            <p class="card-text">{{ __('home.arch_desc') }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{ asset('/assets/img/image/Servies/InnerDesigns.png') }}" style=" width: 162px;"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title w-c"style="font-size:25px;">{{ __('home.interior_title') }}</h5>
                            <p class="card-text">{{ __('home.interior_desc') }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{ asset('/assets/img/image/Servies/Graphics_Designs.png') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title w-c"style="font-size:25px;">{{ __('home.supervision_title') }}</h5>
                            <p class="card-text">{{ __('home.supervision_desc') }}</p>
                        </div>
                    </div>

                    {{-- <div class="card">
                        <img src="{{ asset('/assets/img/image/Servies/moshenGraphic.png') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title w-c"style="font-size:25px;">{{ __('home.motion_title') }}</h5>
                            <p class="card-text">{{ __('home.motion_desc') }}</p>
                        </div>
                    </div> --}}
                    <!-- <div class="card">
                                            <img src="img/image/Servies/website.png" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">تصميم المواقع </h5>
                                                <p class="card-text"> تصميم المواقع الاكترونية بشكل احترافي وجذاب </p>
                                            </div>
                                            </div> -->
                    <!--<div class="card">-->
                    <!--    <img src="img/image/Servies/consulting.png" class="card-img-top" alt="...">-->
                    <!--    <div class="card-body">-->
                    <!--        <h5 class="card-title">الاستشارات </h5>-->
                    <!--        <p class="card-text">أخذ آراء المختصين وذوي الخبرة في الهندسة والاعلان</p>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>

    <!-- Service End -->
    @if (count($works) > 0)
        @include('works')

        <div class="butt ">
            <a href="{{ route('works') }}" class="second-bg login-a border-0 text-light fw-bold btn-secondary"
                target="_blanck">
                {{ __('home.see_more') }}
            </a>
        </div>
    @endif
    <!-- Partners Start-->
    <div class="partners main-Bg pb-3">
        <div class="container ml-10 mr-10">
            <div class="section-header text-center m-0 pt-2">
                <h2 class="text-title w-c pt-3">{{ __('home.success') }}

                </h2>
            </div>
            <div class="part m-0 p-0">
                <img class="larg" src="{{ asset('assets/img/image/OurParteners/larg.jpg') }}" alt=" ourpartener" />
                <img class="smal" src="{{ asset('assets/img/image/OurParteners/small.jpg') }}" alt="ourpartener" />
            </div>
        </div>
    </div>
    <!-- Partners end-->
    {{-- courses --}}
    {{-- @isset($courses)
        @if (count($courses) > 0)
            @include('courses')
        @endif
    @endisset --}}
    {{-- courses --}}
    {{-- posts --}}
    @isset($posts)
        @if (count($posts) > 0)
            @include('posts')
        @endif
    @endisset
    {{-- posts --}}


    {{-- Add new comment --}}
    @isset($comments)
        @if (count($comments) > 0)
            @include('displayComment')
        @endif
    @endisset
    {{-- Add new comment --}}

    <div class="startwith mt-5">
        <div class="container">
            <div class="butt">
                <a href="{{ route('add_comment') }}" target="_blank"> <button>{{ __('home.comment') }}
                    </button></a>
            </div>
            <div class="but">
                {{-- <a href="https://www.facebook.com/buildplus.online" target="_blank"><img style="border-radius: 0px;"
                        src="{{ asset('/assets/img/sotioal/face.png') }}" alt="facebook" /></a> --}}
                <a href="https://www.instagram.com/sadr.companyy/" target="_blank"><img style="border-radius: 0px;"
                        src="{{ asset('assets/img/sotioal/inst.png') }}" alt="Instagram" /></a>
                <a href="https://x.com/sadrcompanyy" target="_blank"><img style="border-radius: 0px;"
                        src="{{ asset('/assets/img/sotioal/twitter.png') }}" alt="twittre" /></a>
                <a href="https://wa.me/+966555087348" target="_blank"><img style="border-radius: 0px;"
                        src="{{ asset('/assets/img/sotioal/whats.png') }}" alt="whatsUpp" /></a>
                {{-- <a href="https://www.youtube.com/@buildplus4200" target="_blank"><img style="border-radius: 0px;"
                        src="{{ asset('/assets/img/sotioal/youtube2.png') }}" alt="youtube" /></a> --}}
            </div>
        </div>
    </div>
    {{-- Add new comment --}}
@endsection
{{-- content of page !!! --}}

{{-- page scripts  --}}
@section('script')
@endsection

{{-- page scripts !!!!! --}}

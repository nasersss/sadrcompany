@extends('master')

@section('title')
    {{ __('home.service') }}
@endsection

{{-- page css files or code  --}}
@section('css')
@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
    <!-- Service Start -->
    <!-- Service Start -->
    <div class="service  mb-3" style="background: #fff" id="service">
        <div class="container-fluid">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="w-c text-title " style="color: #4b5159 !important;">{{ __('home.service') }}</h2>
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

                    <div class="card">
                        <img src="{{ asset('/assets/img/image/Servies/moshenGraphic.png') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title w-c"style="font-size:25px;">{{ __('home.motion_title') }}</h5>
                            <p class="card-text">{{ __('home.motion_desc') }}</p>
                        </div>
                    </div>
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
@endsection

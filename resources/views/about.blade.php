@extends('master')

@section('title')
    {{ __('home.about') }}
@endsection

{{-- page css files or code  --}}
@section('css')
@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
    <!-- aboute -->
    <div class="about-me">

        <div class="about mt-3 mb-3">
            <div class="container p-5 mb-2 mt-2">
                <div class="main ">
                    <div class="text-card">
                        <div class="innercard">
                            <div class="title">
                                <h2>{{ __('home.about') }}</h2>
                            </div>
                            <div class="text "style="padding:0px">
                                <p> {{ __('home.who_are') }} </p>
                            </div>
                        </div>
                        <div class="innercard">
                            <div class="title">
                                <h2>{{ __('about.vision') }}</h2>
                            </div>
                            <div class="text " style="padding:0px">
                                <p>{{ __('about.vision_desc') }}</p>
                            </div>
                        </div>
                        <div class="innercard">
                            <div class="title ">
                                <h2>{{ __('about.message') }}</h2>
                            </div>
                            <div class="text"style="padding:0px">
                                <p>{{ __('about.message_desc') }}</p>
                            </div>
                        </div>
                        <div class="innercard">
                            <div class="title ">
                                <h2>{{ __('about.motto') }}</h2>
                            </div>
                            <div class="text"style="padding:0px">
                                <p>{{ __('about.motto_desc') }} </p>
                            </div>
                        </div>
                        <div class="innercard">
                            <div class="title">
                                <h2>{{ __('home.service') }}</h2>
                            </div>
                            <div class="text" style="padding:0px">
                                <p>
                                    {{ __('home.arch_title') }} <br>
                                    {{ __('home.interior_title') }}<br>
                                    {{ __('home.supervision_title') }}<br>
                                    {{-- {{ __('home.motion_title') }} --}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="logo">
                        {{-- <img src="{{asset('/assets/img/logo.png')}}" alt="product"> --}}
                        <img class="pl-10 squer" src="{{ asset('/assets/img/squer.png') }}" alt="poduct"
                            style="width:350px;padding-top:150px;">

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- aboute -->
@endsection

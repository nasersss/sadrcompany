@extends('master-course')

@section('title')
{{__('home.getCertificate')}}
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<!-- continue learn Start -->

<div class="container  p-2 py-4  ">
    <div class="row py-2 form btn-print ">
        <div class=" py-4 py-lg-0 print-container">
            <button id="printCertificate"  class="second-bg login-a border-0 text-light fw-bold">
                طباعة الشهادة
            </button>
        </div>
    </div>
    <div class="print-container ">
        <div class="certification   py-3 form"  >
            <img src="/images/certification/cetificate.png" alt="" class="certification-img"srcset="" >
            <div class="box-cetificate">
                <div class="row-ar mb-1">
                    <p class="cetificate-title">تشهد منصة بليد بلس التعليمية بأن </p>
                    <p class="cetificate-title">
                        @isset($gender)
                        @if($gender==0)
                        <span>الأخت : </span>
                        @else
                        <span>الأخ : </span>
                        @endif
                        @endisset
                        <span class="main-c">@isset($ARstudentName)
                            {{$ARstudentName}}
                        @endisset</span>
                    </p>
                    <p class="cetificate-title">
                        قد أتم بنجاح المنهج التدريبي المقرر في :
                        <span class="main-c"> @isset($ARTitle)
                            {{$ARTitle}}
                        @endisset</span>
                    </p>
                    <p class="cetificate-title">
                        لمدة ( <span class="main-c">@isset($hoursNumber) {{$hoursNumber}}@endisset</span><span class="main-c">ساعة</span> ) وحصل على نسبة  ( <span class="main-c">@isset($degree){{$degree}}@endisset%</span> ) بتقدير عام : <span class="main-c">@isset($ARestimation)          
                       {{$ARestimation}} @endisset</span>         </p>
                </div>
                <div class="row-ar row-en">
                    <p class="cetificate-title">The Buildplus educational platform certifies that </p>
                    <p class="cetificate-title">
                        @isset($gender)
                        @if($gender==0)
                        <span>Ms : </span>
                        @else
                        <span>Mr : </span>
                        @endif
                        @endisset
                        <span class="main-c">@isset($ENstudentName)
                            {{$ENstudentName}}
                        @endisset</span>
                    </p>
                    <p class="cetificate-title">
                        has successfully completed a training course in :
                        <span class="main-c"> @isset($ENTitle)
                            {{$ENTitle}}
                        @endisset</span>
                    </p>
                    <p  class="cetificate-title">
                    During ( <span class="main-c">@isset($hoursNumber) {{$hoursNumber}}@endisset</span><span class="main-c"> hours</span> )  and he obtained apercentage ( <span class="main-c">@isset($degree){{$degree}}@endisset%</span> )  with overall evalution of : <span class="main-c">@isset($ENestimation){{$ENestimation}} @endisset</span>         </p>
                </div>
            </div>
            <div class="parcode">
                @include("QR-code")
            </div>
            <div class="cetificate-footer">
                <span>@isset($date){{$date}}@endisset</span>
                <span>{{ str_pad($courseId, 3, '0', STR_PAD_LEFT) }}{{ date('Y', strtotime($date)) }}{{ str_pad($studentId, 4, '0', STR_PAD_LEFT) }}</span>
            </div>
        </div>

    </div>

 </div>

<!-- continue learn End -->

<script src="{{asset('assets/js/print/certificate.js')}}"></script>


@endsection

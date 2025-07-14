@extends('admin.layouts.main')

@section('title')
لوحة التحكم

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
الرئيسية
@endsection
@section('breadcrumb-item2')
لوحة التحكم
@endsection
@section('breadcrumb-item2')
لوحة التحكم
@endsection
@section('breadcrumb-item-active')
لوحة التحكم
@endsection

@section('page-title')
لوحة التحكم
@endsection

@section('content')

<!-- end page title -->
@include('message')
<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-sm-12 col-xl-4">
                        <div class="card shadow-none m-0 border-bottom border-start">
                            <div class="card-body text-center">
                                <i class="dripicons dripicons-device-desktop text-muted fs-icon-home"></i>
                                <h3><span>
                                        @isset($courses){{count($courses)}} @else 0 @endisset
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0"> عدد الدورات</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-4">
                        <div class="card shadow-none m-0 border-bottom border-start">
                            <div class="card-body text-center">
                                <i class="dripicons dripicons-graduation text-muted fs-icon-home"></i>                                <h3>
                                    <span>
                                        @isset($courses)
                                        @php
                                            $count = 0;
                                            foreach ($courses as $course)
                                                $count += isset($course)?count($course->studentCourse) : 0 ;
                                        @endphp
                                        {{$count}}

                                        @else
                                        0
                                        @endisset

                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0"> عدد الطلاب</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-4">
                        <div class="card shadow-none m-0 border-start ">
                            <div class="card-body text-center">
                                <i class="mdi mdi-clock-outline  text-muted fs-icon-home"></i>
                                <h3>
                                    <span>
                                        @isset($courses)
                                        @php
                                            $countHours = 0;
                                            foreach ($courses as $course)
                                                $countHours += isset($course)?$course->hours_number : 0 ;
                                        @endphp
                                        {{$countHours}}
                                        @else
                                        0
                                        @endisset
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">عدد الساعات</p>
                            </div>
                        </div>
                    </div>


                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>

<!-- end row-->

@include("admin.trainer.trainer-courses")

<!-- end row-->

</div>
<!-- container -->

</div>


@endsection

@section('script')

@endsection

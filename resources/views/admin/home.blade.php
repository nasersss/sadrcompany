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

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-user-group text-muted fs-icon-home fs-icon-home" ></i>
                                <h3><span>

                                         @isset($users){{$users}} @else 0 @endisset
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0"> عدد المستخدمين</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons dripicons-graduation text-muted fs-icon-home" ></i>
                                <h3>
                                    <span>

                                        @isset($students){{$students}} @else 0 @endisset
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">عدد الطلاب</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="mdi mdi-teach text-muted fs-icon-home" ></i>
                                <h3>
                                    <span>

                                        @isset($trainers){{$trainers}} @else 0 @endisset
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">عدد المدربين</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons dripicons-device-desktop text-muted fs-icon-home" ></i>
                                <h3>
                                    <span>
                                        @isset($courses){{$courses}} @else 0 @endisset
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">عدد الكورسات</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons dripicons-photo-group text-muted fs-icon-home" ></i>
                                <h3>
                                    @isset($works){{$works}} @else 0 @endisset

                                </h3>
                                <p class="text-muted font-15 mb-0"> عدد الاعمال المرفوعة</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="uil uil-comment-message text-muted fs-icon-home" ></i>
                                <h3>
                                    <span>

                                        @isset($userComments){{$userComments}} @else 0 @endisset

                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0"> عدد التعليقات المضافة من المستخدمين</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons dripicons-article text-muted fs-icon-home" ></i>
                                <h3>
                                    <span>

                                        @isset($posts){{$posts}} @else 0 @endisset
                                    </span>
                                </h3>
                                <p class="text-muted font-15 mb-0">عدد  المقالات المرفوعة</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-graph-line text-muted fs-icon-home" ></i>
                                <h3>

                                    <span>@isset($visitors){{$visitors}}@else 0 @endisset</span>
                                     <i class="mdi mdi-arrow-up text-success"></i></h3>
                                <p class="text-muted font-15 mb-0"> عدد الزيارات للموقع</p>
                            </div>
                        </div>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<!-- end row-->


<!-- end row-->

</div>
<!-- container -->

</div>


@endsection

@section('script')

@endsection

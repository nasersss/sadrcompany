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
                    <div class="col-sm-6 col-xl-6">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="mdi mdi-bulletin-board text-muted" style="font-size: 24px;"></i>
                                <h3><span>@isset($courses) {{count($courses)}} @else 0 @endisset</span></h3>
                                <p class="text-muted font-15 mb-0">عدد الدورات المشارك فيها</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-6">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons dripicons-graduation text-muted fs-icon-home"></i>                                <h3><span>@isset($auctions){{count($auctions)}}@else 0 @endisset</span></h3>
                                <p class="text-muted font-15 mb-0"> الدورات التي اكملتها</p>
                            </div>
                        </div>
                    </div>





                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<!-- end row-->



@include("admin.dash-user-course-layout")


@endsection

@section('script')

@endsection

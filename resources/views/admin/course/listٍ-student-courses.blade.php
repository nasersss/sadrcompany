
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |دوراتك

@endsection
@section('first-css')


@endsection

@section('css')


@endsection
@section('breadcrumb-item')
    دوراتك
@endsection
@section('breadcrumb-item2')
    عرض دوراتك
@endsection
@section('breadcrumb-item-active')
    دوراتك
@endsection

@section('page-title')
    عرض جميع دوراتك
@endsection

@section('content')
    <div class="row">

        <div class="col-12">

            @include('message')

            <div class="card">
                <div class="card-body">
                    {{-- <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>اضافة دورة جديدة</a>
                        </div>

                    </div> --}}

                    @include("courses.courses-card");
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>



@endsection

@section('script')






@endsection



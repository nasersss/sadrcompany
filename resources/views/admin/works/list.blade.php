@extends('admin.layouts.main')

@section('title')
    عرض الاعمال

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
الاعمال
@endsection
@section('breadcrumb-item2')
عرض الاعمال
@endsection

@section('breadcrumb-item-active')
    الاعمال
@endsection

@section('page-title')
عرض الاعمال
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session()->get('success') }} </strong>
                    </div>
                    @endif --}}
                    @include('message')

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route("add_work") }}" class="btn btn-secondary mb-2"><i class="mdi mdi-plus-circle me-2"></i>إضافة عمل جديدة</a>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12">
                            <button data-tab="all" id="tab-all" class="btn btn-secondary mb-2 ms-2 tab">الكل</button>
                            <button data-tab="first" id="tab-first" class="btn btn-primary mb-2 ms-2 tab">تصميم معماري</button>
                            <button data-tab="second" id="tab-second" class="btn btn-primary mb-2 ms-2 tab">تصميم داخلي</button>
                            <button data-tab="third" id="tab-third" class="btn btn-primary mb-2 ms-2 tab">تصميم جرافيك</button>
                            <button data-tab="fourth" id="tab-fourth" class="btn btn-primary mb-2 ms-2 tab">موشين جرافيك</button>
                        </div>
                    </div>

                    @include("admin.works.table.all")
                    @include("admin.works.table.first")
                    @include("admin.works.table.second")
                    @include("admin.works.table.third")
                    @include("admin.works.table.fourth")
                    @include("admin.confirm")
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->



@endsection

@section('script')
    <!-- bundle -->

    <script src="{{asset('assets/js/modal/work/list-tab.js')}}"></script>
    <script src="{{asset('assets/js/modal/confirm-delete.js')}}"></script>



@endsection

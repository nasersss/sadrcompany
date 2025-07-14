
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |الدورات

@endsection
@section('first-css')


@endsection

@section('css')


@endsection

@section('breadcrumb-item-active')
عرض الدورات مع الطلاب
@endsection

@section('page-title')
    عرض جميع الدورات
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
        @include("admin.trainer.trainer-courses")
        </div>
    </div>
@endsection

@section('script')






@endsection



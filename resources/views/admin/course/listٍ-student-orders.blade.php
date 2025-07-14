
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |طلبات الاشتراك

@endsection
@section('first-css')
   

@endsection

@section('css')


@endsection
@section('breadcrumb-item')
    طلبات الاشتراك
@endsection
@section('breadcrumb-item2')
    عرض طلبات الاشتراك
@endsection
@section('breadcrumb-item-active')
    طلبات الاشتراك
@endsection

@section('page-title')
    عرض جميع طلبات الاشتراك
@endsection

@section('content')
    <div class="row">

        <div class="col-12">

            @include('message')

            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-12">
                            <button data-tab="not-active" id="tab-not-active" class="btn btn-primary mb-2 ms-2 tab">طلبات الاشتراك</button>
                            <button data-tab="active" id="tab-active" class="btn btn-primary mb-2 ms-2 tab">الإشتراكات</button>
                        </div>
                    </div>
                    @include("admin.course.ordersTables.not_active")
                    @include("admin.course.ordersTables.active")
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{asset('assets/js/modal/orderCourse/list-tab.js')}}"></script>

   



@endsection



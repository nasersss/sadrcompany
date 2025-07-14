
@extends('admin.layouts.main')

@section('title')
لوحة التحكم

@endsection

@section('css')
<script>

    window.addEventListener('load', (event) => {
     $('#showFeature').click();
     console.log('The page has fully loaded');

 });

 </script>

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
@isset($evaluation)
@else
@include('courses.evaluation')
@endisset

@include("message")
 <div class=" bg-white h-75" >
    <div class="container-fluid">
        <div class="container">
        <div class="row ">
            <div class="col-md-6 col-12">
                <img class="card-img-top h-md-75  h-sm-100" src="{{asset('assets/images/certificate_icon.svg')}}" alt="Card image cap">
            </div>
            <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
                <div class="text-center  py-3">
                    <h1 class="text-primary">تهانيناً لك @isset(Auth::user()->name){{Auth::user()->name}}@endisset</h1>
                    <h4 class="text-second">لقد اكملت دورة @isset($studentCourse->course->title){{$studentCourse->course->title}}@endisset</h4>
                    <p>سوف يتم التحقق من  جميع الواجبات وسوف يتم ارسال رابط الشهادة الخاصة بك عبر البريد الالكتروني</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- continue learn End -->
@endsection

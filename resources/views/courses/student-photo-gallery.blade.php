@extends('master-course')

@section('title')
{{__('home.studentWork')}}
@endsection
{{-- page css files or code  --}}
@section('css')

 @endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')


<div class="works  mb-3">
    <div class="container-fluid">
    <div class="pt-3">
            </div>
    <div class="container">
        <div class="section-header text-center my-4">
            <h2 class="main-c text-title">نماذج مخرجات الدورة</h2>
        </div>
        <div class="row d-flex justify-content-around align-items-center  p-0 wow bounceInUp" data-wow-duration="1s" data-wow-delay="0" style="visibility: visible; animation-duration: 1s; animation-name: bounceInUp;">
            @isset($works)
            @foreach ($works as $work)
            <div class="card mb-3 photo-gallery" style="width: 18rem;padding: 0;">
                <a href="@isset($work->img_url){{asset('/files/student/works/'.$work->img_url)}}@endisset" data-lightbox="portfolio">
                    <img class="card-img-top w-100" style="width: 350px;height: 200px;object-fit: cover" src="{{asset('/files/student/works/'.$work->img_url)}}" alt="Card image cap" height="255px">

                <div class="box">
                    <div class="py-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <button>
                                <i class="fas fa-search-plus fs-5"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center footer">
                            <img class="rounded-circle m-2 my-0  p-0 img-course-traner" src="/images/users/defaultImage.png " alt="">
                            <div><span>الطالب : </span> {{$work->student->name}}</div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            @endforeach

            @endisset
        </div>
        </div>
    </div>

</div>

 @endsection

@extends('master-course')

@section('title')
مراجع الدورة
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<!-- aboute -->
<div class="about-me">


    <div class="container-fluid p-5 mb-2 mt-2 ">
    <div class="row d-flex justify-content-around">
        @include('courses.sidbare-course')

        <div class="col-md-8 bg-white p-3 shadow mb-3">

            <div class="course-body my-3">
                <div class="box">
                    <h5 class="fs-5  pb-2 fw-bold title-top" style="width: fit-content;">مراجع دورة : @isset($appendixes[0]->course->title){{$appendixes[0]->course->title}}@endisset</h5>
                    @foreach ($appendixes as $appendix)
                    <div class="card m-2">
                        <div class="card-body">

                            <div>
                                <div>
                                    <p class="text-primary my-2 mb-3 ">
                                        @isset($appendix->description)
                                            {{$appendix->description}}
                                        @endisset
                                    </p>
                                    @isset($appendix->url_type)
                                        @if ($appendix->url_type == 2)
                                        <a class="btn btn-primary " href="@isset($appendix->url){{route('download_appendix',$appendix->url)}}@endisset">
                                            <i class="fa-sharp fa-solid fa-download me-2"></i>  تنزيل  الملف
                                        </a>
                                        @elseif($appendix->url_type == 3)
                                        <a href="@isset($appendix->url){{$appendix->url}}@endisset" class="link-primary"> حضور الجلسة</a>
                                        @else
                                            <a href="@isset($appendix->url){{$appendix->url}}@endisset" class="link-primary">زيارة الموقع</a>
                                        @endif
                                    @endisset

                                </div>

                            </div>


                        </div> <!-- end card-body-->
                    </div>
                    @endforeach



                </div>

            </div>
            <div class="course-footer my-5">


            </div>
        </div>

    </div>

</div>
</div>
<!-- aboute -->
@endsection

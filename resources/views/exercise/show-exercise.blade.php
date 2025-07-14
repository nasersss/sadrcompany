
@extends('master-course')

@section('title')
{{__('home.continuelearn')}}
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<!-- continue learn Start -->

<div class="container">
        <div class="row my-5 continue learn-page ">
            @include("courses.sidbare-course")

            @isset($lesson)
            <div class="col-md-8">
                <div class="mb-3">
                    <div class="bg-white   p-3">
                        <div class="row">
                            <div class="col-12">
                                @include('message')
                                <h4 class="fs-5  pb-2 fw-bold title-top" style="width: fit-content">تمارين درس :@isset($exercise[0]->lesson->title){{$exercise[0]->lesson->title}}@endisset</h4>

                                <div class="card">
                                    <div class="card-body">

                                        <div>
                                            <h6 class="text-danger">
يرجى تنزيل ملف التمرين وتطبيقة ثم رفع التمرين
                                            </h6>
                                            @foreach ($exercise as $exercise)
                                            @isset($exercise)

                                            <div class="border mt-2 p-3">

                                                <p class="text-primary">@isset($exercise->description){{$exercise->description}}@endisset</p>
                                                <a class="btn btn-primary" href="@isset($exercise->file_url){{route('download_exercise',$exercise->file_url)}}@endisset">
                                                <i class="fa-sharp fa-solid fa-download me-2"></i>  تنزيل  الملف
                                                </a>
                                                <button class="upload btn btn-secondary" data-bs-toggle="modal" data-bs-target="#upload_exercise"data-course_id="{{$courseId}}" data-lesson_id={{$exercise->lesson_id}} data-id="{{$exercise->id}}">
                                                    <i class="fa-sharp fa-solid fa-upload me-2"></i>
                                                    رفع التمرين </button>
                                            </div>
                                            @endisset

                                            @endforeach

                                        </div>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
            @endisset


          </div>
</div>
@include('exercise.upload-exercise')
<script>
    document.querySelectorAll('.upload').forEach(item => {
     item.addEventListener('click', e => {
        document.getElementById("exId").value = item.dataset.id;
        document.getElementById("courseId").value = item.dataset.course_id;
        document.getElementById("lessonId").value = item.dataset.lesson_id;

         $('#upload_exercise').modal('show');
     })
 })
</script>
<!-- continue learn End -->
@endsection



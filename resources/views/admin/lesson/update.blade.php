@extends('admin.layouts.main')

@section('title')
 تعديل درس
@endsection

@section('css')

@endsection
{{-- @section('breadcrumb-item')
الوصفات الظاهرة للمستخدمين
@endsection --}}
@section('breadcrumb-item2')
تعديل درس
@endsection

@section('breadcrumb-item-active')
    الدروس
@endsection

@section('page-title')
    تعديل درس للمحور: <span class="border-bottom-2">@isset($topic->title){{ $topic->title }}@endisset</span>
@endsection

@section('content')
        @if($errors->any())
        @foreach($errors->all() as $err)
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>
                    {{$err}}
                </p>
            </div>
            @endforeach
        @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('message')
                    <form method="post" action="{{route('lessons_update')}}" class=" form-disable"enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                            {{-- title arbic  --}}

                            {{-- title english  --}}
                            <input type="hidden" name="id" value="@isset($lesson->id){{ $lesson->id }}@endisset">
                            <div class="mb-3 col-md-12">
                                <label for="inputTitle" class="form-label">المحور</label>
                                <select class="form-control" name="topicId" required  >
                                    <option value="" disabled>اختر احد المحاور</option>
                                    @isset($topics)
                                    @foreach ($topics as $topic)
                                        @isset($topic)
                                            @if ($lesson->topic_id == $topic->id)
                                                <option value="{{$topic->id}}" selected>{{$topic->title}}</option>
                                            @else
                                                <option value="{{$topic->id}}">{{$topic->title}}</option>
                                            @endif
                                        @endisset
                                    @endforeach
                                    @endisset

                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">عنوان الدرس</label>
                                <input value="@if($lesson->title){{$lesson->title}}@endif" type="text"  class="form-control" name="title" id="inputComment" rows="5" placeholder="ادخل عنوان الدرس...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">وصف الدرس</label>
                                <textarea class="form-control" name="description" id="inputComment" rows="5" placeholder="ادخل وصف الدرس...">@if($lesson->description){{$lesson->description}}@endif</textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <div>
                                <video controls src="{{asset('storage/videos/'.$lesson->video_url)}}" type="video/mp4">
                                    هذا المتصفح لايدعم ملفات الفيديو
                                  </video>
                                </div>
                                <div>
                                <label for="comment_ar" class="form-label m-3">إذا اردت استبدال الفديو يرجى رفع فديو آخر</label>
                                {{-- <input value="@if($lesson->video_url){{$lesson->video_url}}@endif" type="file" class="form-control" name="videoUrl" id="inputComment" rows="5" placeholder="رابط الدرس على يوتيوب..."> --}}
                                <button type="button" class=" form-control  btn btn-secondary " data-toggle="modal" data-target="#updateLesson">
                                    رفع فديو جديد
                                    </button>
                                </div>
                                  
                            </div>

                            <div class="col-xl-12">
                                <div class="mb-3 mt-3 mt-xl-0">
                                    <label for="projectname" class="mb-0">ملحقات الدرس</label>
                                    <input class="form-control" name="file" type="file">
                                </div>
                            </div>

                            <input type="hidden" id="videoUrlPreviewUpdate" name="videoUrl">

                        <button type="submit" class="btn btn-primary form-btn-disable">تعديل</button>

                    </div>
                    </form>
                    @include('admin.lesson.modal.update-video-lesson')

                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>



@endsection

@section('script')

@endsection



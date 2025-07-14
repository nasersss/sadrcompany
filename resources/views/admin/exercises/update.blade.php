@extends('admin.layouts.main')

@section('title')
 تعديل التحدي
@endsection

@section('css')

@endsection
{{-- @section('breadcrumb-item')
الوصفات الظاهرة للمستخدمين
@endsection --}}
@section('breadcrumb-item2')
تعديل التحدي
@endsection

@section('breadcrumb-item-active')
    التحدي
@endsection

@section('page-title')
تعديل التحدي
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
                    <form method="post" action="{{route('exercises_update')}}"  class="form-disable" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                            {{-- title arbic  --}}

                            {{-- title english  --}}
                            <input type="hidden" name="id" value="@isset($exercise->id){{ $exercise->id }}@endisset">
                            <div class="mb-3 col-md-12">
                                <label for="inputTitle" class="form-label">الدرس</label>
                                <select class="form-control" name="lessonId" required  >
                                    <option value="" disabled>اختر احد الدروس</option>
                                    @isset($lessons)
                                    @foreach ($lessons as $lesson)
                                        @isset($lesson)
                                            @if ($exercise->lesson_id == $lesson->id)
                                                <option value="{{$lesson->id}}" selected>{{$lesson->title}}</option>
                                            @else
                                                <option value="{{$lesson->id}}">{{$lesson->title}}</option>
                                            @endif
                                        @endisset
                                    @endforeach
                                    @endisset

                                </select>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">وصف التحدي</label>
                                <textarea class="form-control" name="description" id="inputComment" rows="5" placeholder="ادخل وصف الدرس...">@if($exercise->description){{$exercise->description}}@endif</textarea>
                            </div>

                            <div class="col-xl-12">
                                <div class="mb-3 mt-3 mt-xl-0">
                                    <label for="projectname" class="mb-0">ملحقات التحدي</label>
                                    <input class="form-control" name="file" type="file">
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">درجة التحدي</label>
                                <input class="form-control" min="0" max="250" value="{{$exercise->mark}}" name="mark" type="number" placeholder="ادخل درجة التحدي...">
                            </div>



                        <button type="submit" class="btn btn-primary form-btn-disable">تعديل</button>

                    </div>
                    </form>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>



@endsection

@section('script')

@endsection



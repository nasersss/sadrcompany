@extends('admin.layouts.main')

@section('title')
تعديل بيانات الدورة
@endsection

@section('css')

@endsection
{{-- @section('breadcrumb-item')
الوصفات الظاهرة للمستخدمين
@endsection --}}
@section('breadcrumb-item2')
تعديل بيانات الدورة
@endsection

@section('breadcrumb-item-active')
    الدورات
@endsection

@section('page-title')
    تعديل بيانات الدورة
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
                    <form method="post" action="{{route('courses_update')}}" class="form-disable" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                            <input type="hidden" name="id" value="{{$course->id}}">
                            {{-- title arbic  --}}
                            <div class="mb-3 col-md-12">
                                <label for="inputTitle" class="form-label">المدرب</label>
                                <select class="form-control" name="trainerInfoId" required  >
                                    <option value="" disabled>اختر احد المدربين</option>
                                    @isset($trainers)
                                    @foreach ($trainers as $trainer)
                                        @isset($trainer)
                                            @if ($course->trainer->trainer_id == $trainer->id)
                                                <option value="{{$trainer->id}}" selected>{{$trainer->user->name}}</option>
                                            @else
                                                <option value="{{$trainer->id}}">{{$trainer->user->name}}</option>
                                            @endif
                                        @endisset
                                    @endforeach
                                    @endisset

                                </select>
                            </div>
                            {{-- title english  --}}
                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">عنوان الدورة باللغة العربية</label>
                                <input value="@if($course->title){{$course->title}}@endif" type="text" class="form-control" name="title" id="inputComment" rows="5" placeholder="ادخل عنوان الدورة...">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">عنوان الدورة باللغة الإنجليزية</label>
                                <input value="@if($course->title_en){{$course->title_en}}@endif" type="text" class="form-control" name="titleEn" id="inputComment" rows="5" placeholder="ادخل عنوان الدورة...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">وصف الدورة</label>
                                <textarea class="form-control" name="description" id="inputComment" rows="5" placeholder="ادخل وصف الدورة...">@if($course->description){{$course->description}}@endif</textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">سعر الدورة محلياً</label>
                                <input type="number" value="@if($course->local_price){{$course->local_price}}@endif" class="form-control" name="localPrice" id="inputComment" rows="5" placeholder="ادخل سعر الدورة محلياً...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">سعر الدورة عالمياً        </label>
                                <input type="number" value="@if($course->global_price){{$course->global_price}}@endif" class="form-control" name="globalPrice" id="inputComment" rows="5" placeholder="ادخل سعر الدورة عالمياً     ...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">عدد ساعات الدورة</label>
                                <input value="@if($course->global_price){{$course->global_price}}@endif" type="number" class="form-control" name="hoursNumber" id="inputComment" rows="5" placeholder="ادخل عدد ساعات الدورة...">
                            </div>

                            <div class="mb-3 col-md-8">
                                <label for="inputAddress" class="form-label">الصورة الرئيسية</label>
                                <input class="form-control" name='image' type="file" accept="image/*" >
                            </div>
                            <div class="col-auto ">
                                <img data-dz-thumbnail="" src="{{asset('/images/courses/'.$course->img_url)}}" class="avatar-lg rounded bg-light" style="width: 300px;height:300px" width="200"alt="">
                            </div>
                            <div class="col ps-0">
                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name=""></a>
                                <p class="mb-0" data-dz-size=""></p>
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">الرقم التعريفي للفديو على اليوتيوب </label>
                                <input type="text" value="@if($course->intro_video_url){{$course->intro_video_url}}@endif" class="form-control" name="introYouTubeVideoUrl" id="inputComment" rows="5" placeholder="ادخل رابط الفديو التعريفي  للدورة...">
                            </div>

                            <div class="col-xl-12">
                                <div class="mb-3 mt-3 mt-xl-0">
                                    <label for="projectname" class="mb-0">  خطة الدورة</label>
                                    <input class="form-control" value="{{asset('/files/courses/'.$course->appendix_url)}}" name="file" type="file">
                                </div>
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



@extends('admin.layouts.main')

@section('title')
 أضافة دورة
@endsection

@section('css')

@endsection
{{-- @section('breadcrumb-item')
الوصفات الظاهرة للمستخدمين
@endsection --}}
@section('breadcrumb-item2')
اضافة دورة
@endsection

@section('breadcrumb-item-active')
    الدورات
@endsection

@section('page-title')
    أضافة دورة
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
                    <form method="post" action="{{route('courses_store')}}" class=" form-disable" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                            {{-- title arbic  --}}
                            <div class="mb-3 col-md-12">
                                <label for="inputTitle" class="form-label">المدرب</label>
                                <select class="form-control" name="trainerInfoId" required  >
                                    <option value="" disabled selected>اختر احد المدربين</option>
                                    @isset($trainers)
                                    @foreach ($trainers as $trainer)
                                        @isset($trainer)
                                            @if($trainer->user->is_active==1)
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
                                <input type="text" class="form-control" name="title" id="inputComment" rows="5" placeholder="ادخل عنوان الدورة...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">عنوان الدورة باللغة الإنجليزية</label>
                                <input type="text" class="form-control" name="titleEn" id="inputComment" rows="5" placeholder="ادخل عنوان الدورة...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">وصف الدورة</label>
                                <textarea class="form-control" name="description" id="inputComment" rows="5" placeholder="ادخل وصف الدورة..."></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">سعر الدورة محلياً</label>
                                <input type="number" class="form-control" name="localPrice" id="inputComment" rows="5" placeholder="ادخل سعر الدورة محلياً...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">سعر الدورة عالمياً        </label>
                                <input type="number" class="form-control" name="globalPrice" id="inputComment" rows="5" placeholder="ادخل سعر الدورة عالمياً     ...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">عدد ساعات الدورة</label>
                                <input type="number" class="form-control" name="hoursNumber" id="inputComment" rows="5" placeholder="ادخل عدد ساعات الدورة...">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="inputAddress" class="form-label">الصورة الرئيسية</label>
                                <input class="form-control" name='image' type="file" accept="image/*" >
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">الرقم التعريفي للفديو على اليوتيوب </label>
                                <input type="text"  class="form-control" name="introYouTubeVideoUrl" id="inputComment" rows="5" placeholder="ادخل رابط الفديو التعريفي  للدورة...">
                            </div>

                            <div class="col-xl-12">
                                <div class="mb-3 mt-3 mt-xl-0">
                                    <label for="projectname" class="mb-0"> خطة الدورة</label>
                                    <input class="form-control" required name="file" type="file">
                                </div>
                            </div>



                        <button type="submit" class="btn btn-primary form-btn-disable">إضافة</button>

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



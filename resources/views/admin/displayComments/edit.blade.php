@extends('admin.layouts.main')

@section('title')
تعديل التعليق
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
التعليقات الظاهرة للمستخدمين
@endsection
@section('breadcrumb-item2')
تعديل التعليق
@endsection

@section('breadcrumb-item-active')
    التعليقات
@endsection

@section('page-title')
    تعديل  التعليق
@endsection

@section('content')
         @if($errors->any())
        @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session()->get('error') }} </strong>
                    </div>
                    @endif --}}
                    @include('message')

                    <form method="post" action="{{route('update_comment',$comment->id)}}" class="  form-disable">
                        @csrf
                        <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="inputName" class="form-label">اسم صاحب التعليق</label>
                                    <input type="text" name="name"  required class="form-control" id="inputAddress" placeholder="{{$comment->name}}" value="{{$comment->name}}">
                                </div>
                                {{-- title arbic  --}}
                                <div class="mb-3 col-md-12">
                                    <label for="inputTitle" class="form-label">العنوان عربي </label>
                                    <select class="form-control mb-3" name="title_ar" required  >
                                        <option value="{{$comment->title_ar}}">
                                            {{$comment->title_ar}}
                                        </option>
                                        <option value="تصميم شعار">
                                        تصميم شعار
                                        </option>
                                        <option value="تصميم داخلي">
                                        تصميم داخلي
                                        </option>
                                        <option value="تصميم تقرير">
                                        تصميم تقرير
                                        </option>
                                        <option value="تصميم هوية">
                                        تصميم هوية
                                        </option>
                                        <option value="تصميم معماري">
                                        تصميم معماري
                                        </option>
                                        <option value="تصميم  هندسي">
                                        تصميم هندسي
                                        </option>
                                        <option value=" موشين جرافيك">
                                        موشين جرافيك
                                        </option>
                                        </select>
                                </div>
                                {{-- title english  --}}
                                <div class="mb-3 col-md-12">
                                    <label for="inputTitle" class="form-label">العنوان أنجليزي </label>
                                    <select class="form-control mb-3" name="title_en" required  >
                                        <option value="{{$comment->title_en}}">
                                            {{$comment->title_en}}
                                        </option>
                                        <option value="Book Cover Design">
                                        Book Cover Design
                                        </option>
                                        <option value="Report Cover Design">
                                            Report Cover Design
                                        </option>
                                        <option value="Report Design">
                                        Report Design
                                        </option>
                                        <option value="Architectural Design">
                                        Architectural Design 
                                        </option>
                                        <option value="Logo Design">
                                        Logo Design                                        </option>
                                        <option value="ID Design">
                                        ID Design
                                        </option>
                                        <option value="Interior Design">
                                        Interior Design 
                                         </option>
                                         <option value="Motion Graphic Design">
                                            Motion Graphic Design  
                                             </option>
                                             <option value="Magazine Cover Design">
                                                Magazine Cover Design
                                             </option>
                                        </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="comment_ar" class="form-label">التعليق بالعربي </label>
                                    <textarea class="form-control" name="comment_ar" id="inputComment" rows="5" placeholder="التعليق باللغة العربية...">{{$comment->comment_ar}}</textarea>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="comment_en" class="form-label">التعليق بالإنجليزي </label>
                                    <textarea class="form-control" name="comment_en" id="inputComment" rows="5" placeholder="Write the comment ...">{{$comment->comment_en}}</textarea>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="star" class="form-label">التقييم</label>
                                    <select class="form-control mb-3" name="star" required  >
                                        <option value="{{$comment->star}}">
                                         {{$comment->star}}
                                        </option>
                                        <option value="1">
                                       1
                                        </option>
                                        <option value="2">
                                       2
                                        </option> <option value="3">
                                       3
                                        </option> <option value="4">
                                       4
                                        </option> <option value="5">
                                       5
                                        </option>
                                        </select> 
                                </div>
                        <div class="mb-1 col-md-12">
                            <label for="inputAddress" class="form-label">الحالة</label>
                            <select name="is_active" class="form-select mb-3">
                                <option @if($comment->is_active==1) selected @endif value="1">نشط</option>
                                <option @if($comment->is_active==-1) selected @endif value="-1">غير نشط</option>


                            </select>
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



@extends('admin.layouts.main')

@section('title')
    أضافة تعليق
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
التعليقات الظاهرة للمستخدمين
@endsection
@section('breadcrumb-item2')
اضافة تعليق جديدة
@endsection

@section('breadcrumb-item-active')
    التعليقات
@endsection

@section('page-title')
    أضافة تعليق
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
                    <form method="post" action="{{route('save_comment')}}" class="form-disable">
                        @csrf
                    <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="inputName" class="form-label">اسم صاحب التعليق</label>
                                <input type="text" name="name"  required class="form-control" id="inputAddress" placeholder="اسم صاحب العمل ..">
                            </div>
                            {{-- title arbic  --}}
                            <div class="mb-3 col-md-12">
                                <label for="inputTitle" class="form-label">العنوان عربي </label>
                                <select class="form-control mb-3" name="title_ar" required  >
                                    <option value="">
                                       ماهو عنوان العمل 
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
                                    <option value="">
                                    what is title ? 
                                    </option>
                                    <option value="logo Desing">
                                    logo Design 
                                    </option>
                                    <option value="Inner Design">
                                     Inner Design
                                    </option>
                                    <option value="Report Design">
                                    Report Design
                                    </option>
                                    <option value="تصميم هوية">
                                    تصميم هوية
                                    </option>
                                    <option value="تصميم معماري">
                                    تصميم معماري
                                    </option>
                                    <option value="Engineering Design">
                                     Engineering Design
                                    </option>
                                    <option value=" موشين جرافيك">
                                    موشين جرافيك
                                    </option>
                                    </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">التعليق بالعربي </label>
                                <textarea class="form-control" name="comment_ar" id="inputComment" rows="5" placeholder="التعليق باللغة العربية..."></textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="comment_en" class="form-label">التعليق بالإنجليزي </label>
                                <textarea class="form-control" name="comment_en" id="inputComment" rows="5" placeholder="Write the comment ..."></textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="star" class="form-label">التقييم</label>
                                <select class="form-control mb-3" name="star" required  >
                                    <option value="">
                                     التقييم
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

                                <option value="1" selected>نشط</option>
                                <option value="-1">غير نشط</option>

                            </select>
                        </div>
                        

                        <button type="submit" class="btn btn-primary   form-btn-disable">إضافة</button>

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



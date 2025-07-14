@extends('admin.layouts.main')

@section('title')
    الملف الشخصي | أضافة المعلومات

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
    الملف الشخصي
@endsection
@section('breadcrumb-item2')
    تعديل الملف الشخصي
@endsection

@section('breadcrumb-item-active')
    تعديل الملف الشخصي
@endsection

@section('page-title')
    الملف الشخصي
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div id="msg" class="alert alert-danger">
                <strong id="err-msg"></strong>
                </div>
                    {{-- @if($errors->any())
                    @foreach($errors->all() as $err)
                        <p class="alert alert-danger">{{$err}}</p>
                        @endforeach
                    @endif --}}
                    @include('message')
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">تعديل الملف الشخصي</h4>
                    <!--Start-->
                    <form method="POST" name="profile" class="validation form-disable" action="{{route('store_profile')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="inputAddress" class="form-label">اسم امستخدم</label>
                                <input name='name' value="{{$userInfo->name}}" type="text" class="form-control"  placeholder="مثال محمد سالم ...">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputAddress" class="form-label">الصورة الشخصية</label>
                                <input class="form-control" name='image' type="file" accept="image/*" >
                            </div>

                            <div class="mb-2 col-md-4">
                                <label for="inputAddress" class="form-label">الاسم الرباعي بالعربي</label>
                                <input name='ArFullName' type="text" class="form-control"  value="{{ old('ArFullName') }}" placeholder="ادخل اسمك الرباعي باللغة العربية">
                                @error('ArFullName')
                                <div class="alert alert-danger" role="alert">
                                    <strong>خطأ -</strong>{{ $message }}
                                </div>
                                 @enderror
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="inputAddress" class="form-label">الاسم الرباعي بالانجليزي</label>
                                <input name='EnFullName'  type="text" class="form-control"value="{{ old('EnFullName') }}" placeholder="ادخل اسمك باللغة الانجليزية" >
                                @error('EnFullName')
                                <div class="alert alert-danger" role="alert">
                                    <strong>خطأ -</strong>{{ $message }}
                                </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label  class="form-label">النوع</label>
                                    <select  name="gender" class="form-select" id="" >
                                        <option  disabled selected>يرجى اختيار النوع</option>
                                        <option value="1" >ذكر</option>

                                        <option value="0" >أُنثى</option>
                                    </select>
                                    @error('gender')
                                <div class="alert alert-danger" role="alert">
                                    <strong>خطأ -</strong>{{ $message }}
                                </div>
                                 @enderror
                             </div>
                            <label for="inputAddress" class="form-label mb-3 text-info">ادخل اسمك الرباعي بالعربي والانجليزي والجنس بشكل صحيح لكتابتها في الشهادة</label>



                            <div class="mb-3 col-md-6">
                                <label for="inputAddress" class="form-label">الجوال</label>
                                <input name='phone' value="" type="text" class="form-control" id="inputAddress" placeholder="مثال 7396...">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputAddress" class="form-label">العنوان</label>
                                <input name='address' value="" type="text" class="form-control" id="inputAddress" placeholder="مثال حضرموت-المكلا-...">
                            </div>
                            <h5 class="header-title">مواقع التواصل</h5>
                            <div class="mb-3 col-md-4">
                                <input name='facebook' type="text" class="form-control"  placeholder="الفيس بوك مثلا fb/ahmed">
                            </div>
                            <div class="mb-3 col-md-4">
                                <input name='twitter' type="text" class="form-control"  placeholder="تويتر">
                            </div>
                            <div class="mb-3 col-md-4">
                                <input name='instagram' type="text" class="form-control"  placeholder="انستقرام">
                            </div>


                        <button type="submit" class="btn btn-primary  form-btn-disable">حفظ</button>
                    </form>

                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->



@endsection

@section('script')
{{-- <script src="/assets/js/validation.js"></script> --}}

@endsection



@extends('admin.layouts.main')

@section('title')
تعديل الإعمال
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
أعمالنا
@endsection

@section('breadcrumb-item2')
تعديل العمل
@endsection

@section('breadcrumb-item-active')
    الأعمال
@endsection

@section('page-title')
   تعديل العمل
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

                    @include('message')

                    <form method="post" action="{{route('update_works',$work->id)}}" class="form-disable" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="item_brand" class="form-label">عنوان العمل  </label>
                            <select class="form-control mb-3" name="item_brand"  required  >;
                                @if($work->item_brand=='first')
                                <option value="first" selected>تصميم معماري</option>
                                <option value="second"> تصميم داخلي</option>
                                <option value="third">تصميم جرافيك</option>
                                <option value="fourth"> موشين جرافيك</option>
                                @elseif ($work->item_brand=='second')
                                <option value="first">تصميم معماري</option>
                                <option value="second" selected> تصميم داخلي</option>
                                <option value="third">تصميم جرافيك</option>
                                <option value="fourth"> موشين جرافيك</option>
                                @elseif($work->item_brand=='second')
                                <option value="first">تصميم معماري</option>
                                <option value="second"> تصميم داخلي</option>
                                <option value="third" selected>تصميم جرافيك</option>
                                <option value="fourth"> موشين جرافيك</option>
                                @elseif($work->item_brand=='third')
                                <option value="first">تصميم معماري</option>
                                <option value="second"> تصميم داخلي</option>
                                <option value="third">تصميم جرافيك</option>
                                <option value="fourth" selected> موشين جرافيك</option>
                                @endif
                            </select>
                            </div>
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">وصف مصغر للعمل </label>
                            <input type="text" name="description" value="{{ $work->description}}" class="form-control" maxlength="200" minlength="4" placeholder="اكتب عنوان او وصف للعمل    "/>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="image" class="form-label">الصورة أو الملف </label>
                            <input id="Files"  type="file" name="image" accept="image/*,video/*" />

                        </div>
                        <div class="mb-1 col-md-12">
                            <label for="inputAddress" class="form-label">الحالة</label>
                            <select name="is_active" class="form-select mb-3">
                                <option @if($work->is_active==1) selected @endif value="1">نشط</option>
                                <option @if($work->is_active==-1) selected @endif value="-1">غير نشط</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary form-btn-disable">تعديل </button>

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



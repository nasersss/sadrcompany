@extends('admin.layouts.main')

@section('title')
    تعديل مقال
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
المقالات
@endsection
@section('breadcrumb-item2')
تعديل مقال
@endsection

@section('breadcrumb-item-active')
    المقالات
@endsection

@section('page-title')
    تعديل مقال
@endsection

@section('content')
@include('message')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">تعديل المقال </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif



                            <form method="post" action="{{route('update_post',$post->id)}}" enctype="multipart/form-data" class=" form-disable">
                                @csrf

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a onclick="displayCategoryDiv()" class="nav-link active" id="category-tab" >الصنف</a>
                                    </li>
                                    <li class="nav-item">
                                        <a onclick="displayEnDiv()" class="nav-link " id="en-tab" >انجليزي</a>
                                    </li>
                                    <li class="nav-item">
                                        <a onclick="displayarDiv()" class="nav-link" id="ar-tab" >عربي</a>
                                    </li>
                                    <li class="nav-item">
                                        <a onclick="displayFile()" class="nav-link" id="file-tab" >الصور</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane " id="category-content" >
                                        <div class="form-group pt-2">
                                            <label for="category"></label>
                                            <select name="categoryId" id="" class="form-control" required>
                                                <option disabled>اختر احد اصناف المقالات</option>
                                                @foreach ($postCategories as $postCategory)
                                                @if ($postCategory->id == $post->category_id)
                                                <option selected value="{{$postCategory->id}}">{{$postCategory->ar_name}} - {{$postCategory->en_name}}</option>
                                                @else
                                                <option value="{{$postCategory->id}}">{{$postCategory->ar_name}} - {{$postCategory->en_name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="en-content" >
                                        <div class="form-group pt-2">
                                            <label for="title_en">العنوان انجليزي </label>
                                            <input type="text" name="title_en" value="@isset ($post->title_en){{$post->title_en;}}@endisset" class="form-control">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="form-group pt-2">
                                            <label for="body_en">الوصف انجليزي </label>
                                            <textarea name="body_en" class="form-control">@isset($post->body_en){{$post->body_en}}@endisset</textarea>
                                            @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="ar-content">
                                        <div class="form-group pt-2">
                                            <label for="title_ar">العنوان عربي </label>
                                            <input type="text" name="title_ar" value="@isset ($post->title_ar){{$post->title_ar;}}@endisset" class="form-control">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="form-group pt-2">
                                            <label for="body_ar pt-5">الوصف عربي </label>
                                            <textarea name="body_ar" class="form-control">@isset($post->body_ar){{$post->body_ar}}@endisset</textarea>
                                            @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="tab-pane pt-2" id="file-content">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="mb-3 mt-3 mt-xl-0">
                                                            <label for="projectname" class="mb-0">الصورة الاسياسية</label>
                                                            <p class="text-muted font-14">حجم الصورة الموصى به 800 × 400 (بكسل)</p>
                                                            <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                                                <div class="fallback">
                                                                    <input class="form-control"  name="mainImage" accept="image/*" type="file">
                                                                </div>

                                                                <div class="dz-message needsclick">
                                                                    <i class="dripicons-photo"></i>
                                                                    <h4>قم بسحب و إسقاط الصور هنا أو انقر هنا للتحميل</h4>
                                                                </div>
                                                            </div>


                                                        </div>


                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3 mt-3 mt-xl-0">
                                                            <label for="projectname" class="mb-0">صور اخرى</label>
                                                            <p class="text-muted font-14">حجم الصورة الموصى به 800 × 400 (بكسل)</p>
                                                            <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                                                <div class="fallback">
                                                                    <input class="form-control"  name="images[]" accept="image/*" type="file" multiple>
                                                                </div>

                                                                <div class="dz-message needsclick">
                                                                    <i class="dripicons-photo-group"></i>
                                                                    <h4>قم بسحب و إسقاط الصور هنا أو انقر هنا للتحميل</h4>
                                                                </div>
                                                            </div>


                                                        </div>


                                                    </div>
                                                    <!-- Preview -->
                                                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                                                    <!-- file preview template -->
                                                    <!-- file preview template -->
                            @isset($post->postImage)
                            @foreach($post->postImage as $image)
                            <div id="uploadPreviewTemplate">
                                <div class="card mt-1 mb-0 shadow-none border">
                                    <div class="p-2">
                                        <div class="row">
                                            <div class="col-auto">
                                                <img data-dz-thumbnail="" src="{{asset('images/posts/'.$image->image)}}" class="avatar-lg rounded bg-light" style="width: 300px;height:300px;" alt="">
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name=""></a>
                                                <p class="mb-0" data-dz-size=""></p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="#" data-route="{{route("delet_image",$image->id)}}"  class="btn btn-link btn-lg text-muted delete-item" data-dz-remove="">
                                                        <i class="dripicons-cross">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset
                                                    <!-- end file preview template -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group pt-2">
                                    <button type="submit" name="submit" class="btn btn-primary form-btn-disable">تعديل المقال </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("admin.confirm")

        <script>
            let category_tab = document.getElementById('category-tab');
            let en_tab = document.getElementById('en-tab');
            let ar_tab = document.getElementById('ar-tab');
            let file_tab = document.getElementById('file-tab');

            let category_content = document.getElementById('category-content');
            let en_content = document.getElementById('en-content');
            let ar_content = document.getElementById('ar-content');
            let file_content = document.getElementById('file-content');

            category_content.style.display = "block";

            function displayCategoryDiv() {
                category_content.style.display = "block";
                en_content.style.display = "none";
                ar_content.style.display = "none";
                file_content.style.display = "none";
                category_tab.classList.add('active');
                en_tab.classList.remove('active');
                ar_tab.classList.remove('active');
                file_tab.classList.remove('active');
            }

            function displayEnDiv() {
                category_content.style.display = "none";
                en_content.style.display = "block";
                ar_content.style.display = "none";
                file_content.style.display = "none";
                category_tab.classList.remove('active');
                en_tab.classList.add('active');
                ar_tab.classList.remove('active');
                file_tab.classList.remove('active');
            }
            function displayarDiv() {
                category_content.style.display = "none";
                en_content.style.display = "none";
                ar_content.style.display = "block";
                file_content.style.display = "none";
                category_tab.classList.remove('active');
                ar_tab.classList.add('active');
                file_tab.classList.remove('active');
                en_tab.classList.remove('active');

            }
                function displayFile() {
                category_content.style.display = "none";
                en_content.style.display = "none";
                ar_content.style.display = "none";
                file_content.style.display = "block";
                category_tab.classList.remove('active');
                file_tab.classList.add('active');
                ar_tab.classList.remove('active');
                en_tab.classList.remove('active');


            }

        </script>
@endsection

@section('script')
<script src="{{asset('assets/js/modal/confirm-delete.js')}}"></script>

@endsection



@extends('admin.layouts.main')

@section('title')
    عرض المقالات

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
المقالات
@endsection
@section('breadcrumb-item2')
عرض المقالات
@endsection

@section('breadcrumb-item-active')
    المقالات
@endsection

@section('page-title')
عرض المقالات
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('message')

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route("add_post") }}" class="btn btn-secondary mb-2"><i class="mdi mdi-plus-circle me-2"></i>إضافة مقال جديد</a>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>العنوان عربي</th>
                                <th>العنوان انجليزي</th>
                                <th >الوصف عربي </th>
                                <th >الوصف انجليزي </th>
                                <th >الصنف</th>
                                <th>مراجعة الصور </th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)


                            <tr>
                                <td class="table-user">
                                    {{ $loop->iteration }}
                                </td>
                                <td>@isset($post->title_ar){{$post->title_ar}}@endisset</td>
                                <td>@isset($post->title_en){{$post->title_en}}@endisset</td>
                                <td>@isset($post->body_ar){{$post->body_ar}}@endisset</td>
                                <td>@isset($post->body_en){{$post->body_en}}@endisset</td>
                                <td>
                                    <a href="{{route('list_post_category')}}">
                                        @isset($post->category->ar_name){{$post->category->ar_name}}@endisset
                                        <br>
                                        @isset($post->category->en_name){{$post->category->en_name}}@endisset
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route("edit_image",$post->id) }}" class="design-icon p-2"><i class="mdi mdi-folder-image"></i></a>

                                </td>
                                <td>
                                    @if($post->is_active==1)
                                    <span class="badge badge-success-lighten">نشط</span>
                                    @else
                                        <span class="badge badge-danger-lighten">غير نشط</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route("edit_post",$post->id) }}" class="design-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @isset($post->is_active)
                                    @if($post->is_active==1)
                                    <span class="badge badge-success-lighten"></span>
                                    <a href="{{ route("toggle_post",$post->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                                    @else
                                    <a href="{{ route("toggle_post",$post->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                                    @endif
                                    @endisset
                                    <a href="" class="design-icon delete-item" data-route="{{route("post_delete",$post->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    @include("admin.confirm")

@endsection

@section('script')
    <!-- bundle -->



    <script src="{{asset('assets/js/modal/confirm-delete.js')}}"></script>


@endsection

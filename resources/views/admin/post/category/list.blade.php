@extends('admin.layouts.main')

@section('title')
    عرض اصناف المقالات
    @isset($course)
{{$course->title}}
@endisset


@endsection

@section('css')

@endsection
@section('breadcrumb-item')

الاصناف

@endsection
@section('breadcrumb-item2')

عرض الاصناف

@endsection

@section('breadcrumb-item-active')
    الاصناف
@endsection

@section('page-title')
عرض اصناف المقالات
@isset($course)
{{$course->title}}
@endisset
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('message')

                    <div class="row mb-2">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add-postCategories"><i class="mdi mdi-plus-circle ms-2"></i>
                            إضافة صنف جديد
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم الصنف بالعربي</th>
                                <th>اسم الصنف بالانجليزي</th>
                                <th>عدد المقالات</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @isset($postCategories)
                                @foreach($postCategories as $postCategory)
                                <tr>
                                    <td class="table-user">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        @isset($postCategory->ar_name)
                                            {{$postCategory->ar_name}}
                                        @endisset
                                    </td>
                                    <td>
                                        @isset($postCategory->en_name)
                                            {{$postCategory->en_name}}
                                        @endisset
                                    </td>
                                    <td>
                                        @isset($postCategory->post)
                                            {{$postCategory->post}}
                                        @else
                                            0
                                        @endisset
                                    </a>
                                    </td>

                                    <td>
                                        @if($postCategory->is_active==1)
                                        <span class="badge badge-success-lighten">نشط</span>
                                        @else
                                            <span class="badge badge-danger-lighten">غير نشط</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a
                                        href="#" class="design-icon edit" data-bs-toggle="modal" data data-bs-target="#update-postCategories" data-ar_name="{{$postCategory->ar_name}}" data-en_name="{{$postCategory->en_name}}" data-id="{{$postCategory->id}}"> <i class="mdi mdi-square-edit-outline"></i>
                                        </a>
                                        @isset($postCategory->is_active)
                                        @if($postCategory->is_active==1)
                                        <span class="badge badge-success-lighten"></span>
                                        <a href="{{ route("toggle_post_category",$postCategory->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                                        @else
                                        <a href="{{ route("toggle_post_category",$postCategory->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                                        @endif
                                        <a href="" class="design-icon delete-item" data-category_delete="1" data-route="{{route("delete_post_category",$postCategory->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>
                                        @endisset
                                    </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    @include('admin.post.category.modal.add')
    @include('admin.post.category.modal.update')
    @include("admin.confirm")

    {{-- @include('admin.postCategories.modal.update') --}}
@endsection

@section('script')
    <!-- bundle -->

    <script src="{{asset('assets/js/modal/confirm-delete.js')}}"></script>

    <!-- third party js -->
    <script src="{{asset('assets/js/modal/update-post-category.js')}}"> </script>
    <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.checkboxes.min.js')}}"></script>
    <!-- third party js ends -->

    <!-- demo app -->

    <!-- end demo js-->


@endsection

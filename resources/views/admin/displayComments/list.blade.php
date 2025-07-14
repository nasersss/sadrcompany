@extends('admin.layouts.main')

@section('title')
    عرض التعليقات
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
التعليقات الظاهرة للمستخدمين
@endsection
@section('breadcrumb-item2')
    عرض التعليقات
@endsection

@section('breadcrumb-item-active')
    التعليقات
@endsection

@section('page-title')
    عرض التعليقات
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('message')

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route("add_display_comment") }}" class="btn btn-secondary mb-2"><i class="mdi mdi-plus-circle me-2"></i>إضافة تعليق جديدة</a>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>العنوان عربي</th>
                                <th>العنوان انجليزي</th>
                                <th >التعليق عربي </th>
                                <th >التعليق انجليزي </th>
                                <th >التقييم </th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)


                            <tr>
                                <td class="table-user">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->title_ar}}</td>
                                <td>{{$comment->title_en}}</td>
                                <td>{{$comment->comment_ar}}</td>
                                <td>{{$comment->comment_en}}</td>
                                <td>{{$comment->star}}</td>

                                <td>
                                    @if($comment->is_active==1)
                                    <span class="badge badge-success-lighten">نشط</span>
                                    @else
                                        <span class="badge badge-danger-lighten">غير نشط</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route("edit_comment",$comment->id) }}" class="design-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @isset($comment->is_active)
                                    @if($comment->is_active==1)
                                    <span class="badge badge-success-lighten"></span>
                                    <a href="{{ route("toggle_comment",$comment->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                                    @else
                                    <a href="{{ route("toggle_comment",$comment->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                                    @endif
                                    @endisset
                                    <a href="#" class="design-icon delete-item" data-route="{{route("delete_comment",$comment->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>
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

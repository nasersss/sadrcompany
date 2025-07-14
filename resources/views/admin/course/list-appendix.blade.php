@extends('admin.layouts.main')

@section('title')
    عرض ملحقات دورة
    @isset($course)
{{$course->title}}
@endisset


@endsection

@section('css')

@endsection

@section('p-link')
{{ route('course_review') }}
@endsection
@section('breadcrumb-item')

عرض الدورات مع الطلاب

@endsection

@section('breadcrumb-item-active')
    عرض الملحقات
@endsection


@section('page-title')
عرض ملحقات دورة
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
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add-appendix"><i class="mdi mdi-plus-circle me-2"></i>
                                إضافة ملحق  للدورة
                            </button>


                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الوصف</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @isset($appendixes)
                                @foreach($appendixes as $appendix)
                                <tr>
                                    <td class="table-user">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{$appendix->description}}
                                    </td>

                                    <td>
                                        @if($appendix->is_active==1)
                                        <span class="badge badge-success-lighten">نشط</span>
                                        @else
                                            <span class="badge badge-danger-lighten">غير نشط</span>
                                        @endif
                                    </td>
                                    <td class="d-flex" style="text-align: center">
                                        @if($appendix->url != "null" && $appendix->url_type == 2)
                                            <a id="download_file{{$appendix->id}}" href="
                                                                                @isset($appendix->url)
                                                                                    {{route('download_appendix',$appendix->url)}}
                                                                                @else
                                                                                    #
                                                                                @endisset
                                                                                    "title="تنزيل ملحق الدورة" class="design-icon"><i class="mdi mdi-download"></i></a>
                                        @else
                                            @isset($appendix->url)
                                                <a title="الذهاب الى الرابط" href="{{$appendix->url}}" class="design-icon"><i class="mdi mdi-link"></i></a>
                                            @endisset
                                        @endif

                                        @if($appendix->url != "null")
                                        <a href=""title="حذف الملحق" class="design-icon delete-item" data-route="{{route('course_appendix_delete',$appendix->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>

                                        {{-- <a  href="{{route('course_appendix_delete',$appendix->id)}}" class="design-icon"><i class="second-color mdi mdi-delete-empty"></i></a> --}}
                                        @endif
                                        <!-- Button trigger modal -->
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

    {{-- @include('admin.topics.modal.add') --}}
    @include('admin.topics.modal.add-appendix')
    @include("admin.confirm")


    {{-- @include('admin.topics.modal.update') --}}
@endsection

@section('script')
    <!-- bundle -->
    <script src="{{asset('assets/js/modal/confirm-delete.js')}}"></script>
@endsection

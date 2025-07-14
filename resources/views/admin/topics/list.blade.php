@extends('admin.layouts.main')

@section('title')
    عرض محاور دورة
    @isset($course)
{{$course->title}}
@endisset


@endsection

@section('css')

@endsection

@section('p-link')
{{ route('courses_list') }}
@endsection
@section('breadcrumb-item')

عرض الدورات

@endsection

@section('breadcrumb-item-active')
    المحاور
@endsection

@section('page-title')
عرض محاور دورة
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
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add-topics"><i class="mdi mdi-plus-circle me-2"></i>
                            إضافة محور جديد
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>الوصف</th>
                                <th>الحالة</th>
                                @if(Auth::user()->role==0)
                                <th style="width: 75px;">العمليات</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                                @isset($topics)
                                @foreach($topics as $topic)
                                <tr>
                                    <td class="table-user">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{$topic->title}}
                                    </td>
                                    <td>
                                        <a href="{{route('lessons_list',$topic->id)}}">
                                        {{$topic->description}}
                                    </a>
                                    </td>

                                    <td>
                                        @if($topic->is_active==1)
                                        <span class="badge badge-success-lighten">نشط</span>
                                        @else
                                            <span class="badge badge-danger-lighten">غير نشط</span>
                                        @endif
                                    </td>

                                    @if(Auth::user()->role==0)
                                    <td>
                                        <a
                                        href="#" class="design-icon edit" data-bs-toggle="modal" data data-bs-target="#update-topics" data-description="{{$topic->description}}" data-title="{{$topic->title}}" data-id="{{$topic->id}}"> <i class="mdi mdi-square-edit-outline"></i>
                                        </a>
                                        @isset($topic->is_active)
                                        @if($topic->is_active==1)
                                        <span class="badge badge-success-lighten"></span>
                                        <a href="{{ route("topics_toggle",$topic->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                                        @else
                                        <a href="{{ route("topics_toggle",$topic->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                                        @endif
                                        @endisset
                                                                                <a href="" class="design-icon delete-item" data-route="{{route("topic_delete",$topic->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>

                                    </td>
                                    @endif
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

    @include('admin.topics.modal.add')
    @include('admin.topics.modal.add-appendix')
    @include('admin.topics.modal.update')
@endsection

@section('script')
    <!-- bundle -->


    <!-- third party js -->
    <script src="{{asset('assets/js/modal/update-topic.js')}}"> </script>
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

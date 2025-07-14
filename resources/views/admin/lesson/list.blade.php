
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |الدروس

@endsection
@section('first-css')


@endsection

@section('css')


@endsection
@section('d-p-link')
{{ route('courses_list') }}
@endsection
@section('p-link')
{{ route('topics_list',$topic->courses_id) }}
@endsection
@section('breadcrumb-item2')

عرض الدورات

@endsection

@section('breadcrumb-item')
عرض المحاور
@endsection
@section('breadcrumb-item-active')
    الدروس
@endsection


@section('page-title')
    عرض جميع دروس محور: @isset($topic->title){{ $topic->title }}@endisset
@endsection

@section('content')
    <div class="row">

        <div class="col-12">

            @include('message')
            @isset($topic->id)
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('lessons_create',$topic->id)}}">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add-lessons"><i class="mdi mdi-plus-circle me-2"></i>
                                إضافة درس جديد
                              </button>
                            </a>
                            </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>المحور</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($topic->lesson as $lesson)

                            <tr>

                                <td>
                                    @isset($lesson->title)
                                    {{ $lesson->title }}
                                    @endisset

                                </td>
                                <td data-title="@isset($lesson->description){{ $lesson->description }}@endisset">
                                    @isset($lesson->description)
                                    <a href="{{route('exercises_list',$lesson->id)}}">
                                        {{ Illuminate\Support\Str::limit($lesson->description) }}
                                    </a>
                                    @endisset
                                </td>
                                <td>
                                @isset($lesson->topic->title)
                                    {{ $lesson->topic->title }}
                                @endisset
                                </td>
                                <td>
                                    @if($lesson->is_active==1)
                                    <span class="badge badge-success-lighten">نشط</span>

                                    @else
                                        <span class="badge badge-danger-lighten">غير نشط</span>
                                    @endif

                                <td class="d-flex">

                                    @isset($lesson->id)
                                    <a href="{{ route("lessons_edit",$lesson->id) }}" class="design-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @endisset
                                    @isset($lesson->is_active)
                                        @if($lesson->is_active==1)
                                        <span class="badge badge-success-lighten"></span>
                                        <a href="{{ route("lessons_toggle",$lesson->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                                        @else
                                        <a href="{{ route("lessons_toggle",$lesson->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                                        @endif
                                    @endisset
                                    @isset($lesson->video_url)
                                    <a title="عرض فديو الدرس" href="{{asset("storage/videos/$lesson->video_url")}}" class="design-icon"><i class="mdi mdi-television"></i></a>
                                    @endisset
                                    @isset($lesson->appendix_url)
                                    <a title="تنزيل ملحق الدرس" href="{{route('download_lesson_appendixes',$lesson->appendix_url)}}" class="design-icon"><i class="mdi mdi-download"></i></a>
                                    @endisset
                                    <a href="" class="design-icon delete-item" data-route="{{route("lesson_delete",$lesson->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>

                                </td>
                            </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            @endisset
        </div> <!-- end col -->
    </div>


    {{-- @include('admin.lesson.modal.add') --}}
    {{-- @include('admin.lesson.modal.update') --}}
@endsection

@section('script')






@endsection



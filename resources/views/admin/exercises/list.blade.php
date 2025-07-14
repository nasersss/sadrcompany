
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |التحديات

@endsection
@section('first-css')


@endsection

@section('css')


@endsection
@section('d-p-link')
{{ route('courses_list') }}
@endsection
@section('p-link')
{{ route('lessons_list',$lesson->topic_id) }}
@endsection
@section('breadcrumb-item2')

عرض الدورات

@endsection

@section('breadcrumb-item')
عرض الدروس
@endsection
@section('breadcrumb-item-active')
    التحديات
@endsection


@section('page-title')
    عرض جميع تحديات درس: @isset($lesson->title){{ $lesson->title }}@endisset
@endsection

@section('content')
    <div class="row">

        <div class="col-12">

            @include('message')

            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add-lessons"><i class="mdi mdi-plus-circle me-2"></i>
                                إضافة تحدي جديد
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>الوصف</th>
                                <th>درجة التحدي</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($lesson->exercise as $exercise)
                                        <tr>
                                            <td data-title="@isset($exercise->description){{ $exercise->description }}@endisset">
                                                @isset($exercise->description)
                                                <a href="{{route('exercises_list',$exercise->id)}}">
                                                    {{ Illuminate\Support\Str::limit($exercise->description) }}
                                                </a>
                                                @endisset
                                            </td>
                                            <td>
                                                {{$exercise->mark}}
                                            </td>
                                            <td>
                                                @if($exercise->is_active==1)
                                                <span class="badge badge-success-lighten">نشط</span>

                                                @else
                                                    <span class="badge badge-danger-lighten">غير نشط</span>
                                                @endif

                                            <td>
                                                @isset($exercise->id)
                                                <a href="{{ route("exercises_edit",$exercise->id) }}" class="design-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                @endisset
                                                @isset($exercise->is_active)
                                                    @if($exercise->is_active==1)
                                                    <span class="badge badge-success-lighten"></span>
                                                    <a href="{{ route("exercises_toggle",$exercise->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                                                    @else
                                                    <a href="{{ route("exercises_toggle",$exercise->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                                                    @endif
                                                    @endisset
                                                                                                        <a href="" class="design-icon delete-item" data-route="{{route("exercise_delete",$exercise->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>

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


    @include('admin.exercises.modal.add')
    @include('admin.exercises.modal.confirm')

    {{-- @include('admin.exercises.modal.update') --}}
@endsection

@section('script')





@endsection



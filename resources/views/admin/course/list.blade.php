
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |الدورات

@endsection
@section('first-css')


@endsection

@section('css')


@endsection

@section('breadcrumb-item-active')
عرض الدورات
@endsection

@section('page-title')
    عرض جميع الدورات
@endsection

@section('content')
    <div class="row">

        <div class="col-12">

            @include('message')

            <div class="card">
                <div class="card-body">
                     <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('courses_create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>اضافة دورة جديدة</a>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>المدرب</th>
                                <th>السعر داخل اليمن</th>
                                <th>السعر خارج اليمن</th>
                                <th>عدد الساعات</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                            <tr>
                                <td>
                                    @isset($course->title)
                                    {{ $course->title }}
                                    @endisset

                                </td>
                                <td data-title="@isset($course->description){{ $course->description }}@endisset">
                                    @isset($course->description)
                                    <a href="{{route('topics_list',$course->id)}}">
                                        {{ Illuminate\Support\Str::limit($course->description) }}
                                    </a>

                                    @endisset
                                </td>
                                <td>
                                @isset($course->trainer->trainer_id)
                                    @foreach ($users as $user)
                                        @if ($course->trainer->trainer_id == $user->id)
                                            {{ $user->name }}
                                        @endif
                                    @endforeach
                                @endisset
                                </td>
                                <td>
                                @isset($course->local_price)
                                {{$course->local_price}}
                                @endisset
                                </td>
                                <td>
                                    @isset($course->global_price)
                                    {{$course->global_price}}
                                    @endisset
                                </td>

                                <td>
                                    @isset($course->hours_number)
                                    {{$course->hours_number}}
                                    @endisset
                                </td>

                                <td>
                                    @if($course->is_active==1)
                                    <span class="badge badge-success-lighten">نشط</span>

                                    @else
                                        <span class="badge badge-danger-lighten">غير نشط</span>
                                    @endif

                                <td>
                                    @isset($course->trainer->id)
                                    <a href="{{ route("courses_edit",$course->id) }}" class="design-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @endisset
                                    @isset($course->is_active)
                                        @if($course->is_active==1)
                                        <span class="badge badge-success-lighten"></span>
                                        <a href="{{ route("courses_toggle",$course->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                                        @else
                                        <a href="{{ route("courses_toggle",$course->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                                        @endif
                                        @endisset
                                    <a href="" class="design-icon delete-item" data-route="{{route("course_delete",$course->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>
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



@endsection

@section('script')






@endsection



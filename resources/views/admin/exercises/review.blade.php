
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |تقييم الطلاب

@endsection
@section('first-css')
    <!-- third party css -->
    <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

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
    عرض الطلاب
@endsection


@section('page-title')
    عرض جميع  طلاب دورة: @isset($course->title){{ $course->title }}@endisset
@endsection

@section('content')
    <div class="row">

        <div class="col-12">

            @include('message')

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>الواجبات المرفوعة</th>
                                <th>الواجبات المتبقة</th>
                                <th>الواجبات المصححة</th>
                                <th>الواجبات غير المصححة</th>
                                <th>واجبات الطالب</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($course->studentCourse as $student)
                                @isset($student->student)
                                @isset($exerciseDone[$student->student->id])
                            <tr>

                                <td>
                                    @isset($student->student->name)
                                    {{ $student->student->name }}
                                    @endisset

                                </td>
                                <td>
                                    {{count($exerciseDone[$student->student->id])}}
                                </td>
                                <td>
                                    {{$exercise - count($exerciseDone[$student->student->id])}}
                                </td>
                                <td>
                                    @php
                                        $isct = 0;

                                        foreach ($exerciseDone[$student->student->id] as $exDone)
                                            if($exDone->is_checked_trainer == 1)
                                                $isct++
                                    @endphp
                                    {{-- @if ($isct > 0) --}}
                                        {{$isct}}
                                    {{-- @endif --}}
                                </td>
                                <td>
                                    @if (count($exerciseDone[$student->student->id]) - $isct > 0)
                                        <span class="badge badge-danger-lighten">{{count($exerciseDone[$student->student->id]) - $isct}}</span>
                                    @else
                                        {{count($exerciseDone[$student->student->id]) - $isct}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('exercise_student',['studentId'=>$student->student->id,
                                                                        'courseId'=>$course->id])}}">
                                    {{-- <a href="{{route('exercise_student',['id' => 1, 'photos' => 'yes'])}}"> --}}
                                        استعراض
                                    </a>
                                </td>
                            </tr>
                            @endisset

                            @endisset
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




    <!-- demo app -->
    <script src="assets/js/pages/demo.customers.js"></script>
    <!-- end demo js-->

@endsection



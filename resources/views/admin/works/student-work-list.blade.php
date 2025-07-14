@extends('admin.layouts.main')

@section('title')
    عرض أعمال الطلاب

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
عرض الاعمال
@endsection


@section('page-title')
عرض الاعمال
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session()->get('success') }} </strong>
                    </div>
                    @endif --}}
                    @include('message')

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="" class="btn btn-primary mb-2 add-student-word" @isset($students)data-student_id="-1" @else data-student_id="{{$studentId}}" @endisset data-course_id="{{$courseId}}" data-toggle="modal" data-target="#addStudentWork"><i class="mdi mdi-plus-circle me-2"></i> إضافة عمل للطالب</a>
                        </div>
                    </div>



                    @include("admin.works.table.student-works-all")


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->


    @include("admin.confirm")
    @include('admin.exercises.modal.add-student-work')

@endsection

@section('script')
    <!-- bundle -->

{{-- <script src="{{asset('assets/js/modal/work/list-tab.js')}}"></script> --}}
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
        
     document.querySelectorAll('.add-student-word').forEach(item => {
         item.addEventListener('click', e => {
           e.preventDefault();
           if(item.dataset.student_id !=-1 )  
            document.getElementById("studentId").value = item.dataset.student_id;

           document.getElementById("courseId").value = item.dataset.course_id;
           })              
       });
</script>
<script src="{{asset('assets/js/modal/confirm-delete.js')}}"></script>

@endsection


@extends('admin.layouts.main')

@section('title')
    لوحة التحكم | واجبات الطالب

@endsection
@section('first-css')
    <!-- third party css -->
    <link href="{{asset('assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
<style>

.modal-ajax{
    background: rgba(0,0,0,0.4);
}

</style>
@endsection

@section('css')


@endsection
@section('d-p-link')
{{ route('course_review') }}
@endsection
@section('p-link')
{{ route('exercise_review',$courseId) }}
@endsection

@section('breadcrumb-item2')
عرض الدورات مع الطلاب
@endsection

@section('breadcrumb-item')
عرض الطلاب
@endsection
@section('breadcrumb-item-active')
عرض الواجبات
@endsection


@section('page-title')
    عرض جميع  واجبات الطالب: @isset($studentName){{ $studentName }}@endisset
@endsection

@section('content')
@include('message')
    <div class="row">

        <div class="col-12">

            <div class="col-lg-12 alert alert-success alert-dismissible  text-white border-0 "id="alert_success"   role="alert">
                <button type="button" class="btn-close" id="closed_alert"></button>
                <strong id="massage_text"></strong>
            </div>

            <div class="card">

                <div class="card-body">
                    @if(Auth::user()->role==0)
                    <div class="row mb-2">
                        <div class="col-sm-4  ">
                            <a href="" class="btn btn-primary mb-2 add-student-word"  data-student_id="{{$studentId}}" data-course_id="{{$courseId}}" data-toggle="modal" data-target="#addStudentWork"><i class="mdi mdi-plus-circle me-2"></i> إضافة عمل للطالب</a>
                        </div>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>رقم الواجب </th>
                                <th style="text-align: center">وصف الواجب </th>
                                <th style="text-align: center">الملفات المرفوعة</th>
                                <th>علامة الواجب </th>
                                <th>علامة الطالب </th>
                                <th> تاريخ التسليم </th>
                                <th>الحالة</th>
                                <th>إضافة العلامة</th>

                            </tr>
                            </thead>
                            <tbody>
                                @php
                                $num=0;
                            @endphp
                                @foreach($exercises as $exercise)

                            <tr>

                                @isset($exercise)
                                    <td>
                                        {{$num+=1}}
                                    </td>
                                    <td style="text-align: center">
                                        @isset($exercise->exercise->description){{$exercise->exercise->description}}
                                        @else
                                        وصف الواجب
                                        @endisset</td>
                                    <td style="text-align: center">

                                        @if($exercise->home_work_url != "null")  <a id="download_file{{$exercise->id}}" href="@isset($exercise->home_work_url){{route('download_exercise_student',$exercise->home_work_url)}}@else # @endisset"title="تنزيل ملفات الواجب" class="design-icon p-2"><i class="mdi mdi-download"></i></a> @else -  @endif

                                        @if(Auth::user()->role==0)
                                        @if($exercise->home_work_url != "null")
                                        <span id="delete_file{{$exercise->id}}"
                                            data-id="{{$exercise->id}}"
                                            class="confirm  design-icon p-2">
                                            <i  class=" second-color mdi mdi-delete-empty"></i>
                                        </span>
                                        @else
                                        
                                        @endif

                                        @endif
                                        <!-- Button trigger modal -->
                                    </td>
                                    <td>
                                        @isset($exercise->exercise->mark)
                                            {{$exercise->exercise->mark}}
                                        @endisset
                                    </td>
                                    <td id="mark_degree{{$exercise->id}}">
                                        @isset($exercise->mark)
                                            {{$exercise->mark}}
                                        @endisset
                                    </td>
                                    <td>
                                        @isset($exercise->updated_at)
                                            {{$exercise->updated_at}}
                                        @endisset
                                    </td>
                                        <td id="is_chcked{{$exercise->id}}">
                                            @if($exercise->is_checked_trainer==1)
                                            <span class="badge badge-success-lighten">تم تقييمة</span>
                                            @else
                                                <span class="badge badge-danger-lighten">لم يتم تقييمة</span>
                                            @endif
                                        </td>
                                    <td>

                                        <i class="mdi mdi-plus-circle me-2  add-mark"
                                         data-ex_id="{{$exercise->id}}"
                                         data-max_mark="{{$exercise->exercise->mark}}"
                                         id="add-mark"
                                         style="font-size:30px"
                                         title="إضافة علامة للطالب"></i>
                                    </td>
                            </tr>
                            @endisset
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    @include('admin.exercises.modal.add-mark')
    @include('admin.exercises.modal.confirm')
    @include('admin.exercises.modal.add-student-work')

@endsection

@section('script')
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
     document.querySelectorAll('.add-student-word').forEach(item => {
         item.addEventListener('click', e => {
           e.preventDefault();
           document.getElementById("studentId").value = item.dataset.student_id;
           document.getElementById("courseId").value = item.dataset.course_id;
           })
       });
    // fech all data
  //  fetchAllExcerciseDone();
    function fetchAllExcerciseDone() {
        $.ajax({
            url: "{{route('fetch_all_exercise',['studentId'=>$studentId,'courseId'=>$courseId])}}",
            method:'get',
            success:function(res){
                 $('tbody').html('');
                 $.each(res.exercises,function(key ,item){
                    $('tbody').append(` <tr>
                            <td>85 </td>
                                   <td>${item.exercise.description}</td>
                                   <td>
                                        <a href="/trainer/exercise/review/download/${item.home_work_url}" class="design-icon p-2"><i class="mdi mdi-folder-image"></i></a>
                                    </td>
                                   <td>${item.mark}</td>
                                   <td>${item.created_at}</td>
                                    <td>
                                            <span class="badge badge-success-lighten">تم تقييمة</span>
                                    </td>
                                   <td><i class="mdi mdi-plus-circle me-2 main-bg add-mark" data-ex_id="${item.id}" id="add-mark" style="font-size:30px"title="إضافة علامة للطالب"></i></td>
                           </tr>`);
                 });
            }

        });

    }
    //hide massage box
    $('#alert_success').hide();
   document.querySelectorAll('.add-mark').forEach(item => {
     item.addEventListener('click', e => {
        e.preventDefault();
        document.getElementById("exerciseId").value = item.dataset.ex_id;
        // $('#mark_max').spinner('option', 'max', );
        $('#mark_max').attr("max", item.dataset.max_mark);
        $('#add-marks').show();
        $('#add-marks').addClass('show');
        $('#add-marks').addClass('modal-ajax');
     })
    });

   $(document).ready(function(){
    $('#ajax_form').submit(function(event){
            event.preventDefault();
            var $form = $(this);
            $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
            beforeSend:function(){
                $('#add-marks').hide();
                $('#add-marks').removeClass('show');
            },
            success: function(data) {
                        $('#alert_success').show();
                        $('#massage_text').text(data.msg);
                        $('#mark_degree'+data.id).text(data.mark);
                        $('#is_chcked'+data.id).html('<span class="badge badge-success-lighten">تم تقييمة</span>');
                        $('#add-marks').hide();
                        $('#add-marks').removeClass('show');
                        $('#ajax_form')[0].reset();
                if(data.status == true){
                    //fetchAllExcerciseDone();
                    $('#alert_success').removeClass('alert-danger');
                    $('#alert_success').addClass('alert-success');
                    $('#alert_success').addClass('bg-success');
                    }
                else{
                    $('#alert_success').removeClass('alert-success');
                    $('#alert_success').removeClass('bg-success');
                    $('#alert_success').addClass('alert-danger');
                    $('#alert_success').addClass('bg-danger');


                }
            },
            error: function(error) {
            // Do something with the error
            }
            });
});

});



$('#closed_alert').on('click',function(e){
    $('#alert_success').hide();
 });
$('.close_modal').on('click',function(e){
        $('#add-marks').hide();
         $('#add-marks').removeClass('show');
});



</script>
<script src="{{asset('assets/js/modal/confirm.js')}}"></script>
    <!-- third party js -->
    <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.checkboxes.min.js')}}"></script>

@endsection



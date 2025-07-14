@extends('master-course')

@section('title')
{{__('home.courses')}}
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')


<!-- Button trigger modal -->

<div class="about-me">
<!-- Modal -->
    <div class="modal-dialog rounded-0">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title main-c text-center" id="exampleModalLabel">تأكيد الإشتراك </h5>

            </div>
    <p class="alert second-bg rounded-0 center w-c">
        يرجى تسديد مبلغ <strong>  {{$course->local_price}} ر.ي </strong> على حسابنا في الكريمي <strong>546798464789</strong> او حوالة باسم  <strong> زيدان سفيان</strong>
        </p>
            <div class="modal-body">
                <form method="post" action="{{route('subscribe_store') }}" class="needs-validation"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="studentId" value="{{Auth::id()}}">
                        <input type="hidden" name="courseId" value="{{$course->id}}">
                        @include('courses.modal.image-preivew')

                    </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-subscribe" >إضافة</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

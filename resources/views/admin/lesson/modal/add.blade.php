
@extends('admin.layouts.main')

@section('title')
 أضافة درس
@endsection

@section('css')

@endsection

@section('breadcrumb-item2')
اضافة درس
@endsection

@section('breadcrumb-item-active')
    الدروس
@endsection

@section('page-title')
    أضافة درس جديد
@endsection

@section('content')
        @if($errors->any())
        @foreach($errors->all() as $err)
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>
                    {{$err}}
                </p>
            </div>
            @endforeach
        @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('message')
                    <form method="post" action="{{route('lessons_store')}}" class="form-disable" enctype="multipart/form-data">
                      @csrf
                        <div class="row">

                    <input type="hidden" name="topic_id" value="@isset($topic->id){{ $topic->id }}@endisset">
                    <div class="mb-3 col-md-12">
                        <label for="comment_ar" class="form-label">عنوان الدرس</label>
                        <input type="text" class="form-control" name="title" id="inputComment" rows="5" placeholder="ادخل عنوان الدرس...">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="comment_ar" class="form-label">وصف الدرس</label>
                        <textarea class="form-control" name="description" id="inputComment" rows="3" placeholder="ادخل وصف الدرس..."></textarea>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="projectname" class="mb-1">  فديو الدرس</label>

                        <button type="button" class=" form-control  btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                            رفع ملف الفديو
                            </button>
                        </div>


                    <div class="col-xl-12">
                        <div class="mb-3 mt-3 mt-xl-0">
                            <label for="projectname" class="mb-0">ملحقات الدرس</label>
                            <input class="form-control"  name="file" type="file">
                        </div>
                    </div>
                        <input type="hidden" class="form-control" name="videoUrl" id="videoUrlPreview"  placeholder="يرجى رفع ملف الفديو ...">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class=" form-control btn btn-primary form-btn-disable">إضافة</button>
              </div>
              </form>
              @include('admin.lesson.modal.upload_video')

                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>



@endsection

@section('script')

@endsection



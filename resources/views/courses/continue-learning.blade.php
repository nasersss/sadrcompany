@extends('master-course')

@section('title')
{{__('home.continuelearn')}}
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<!-- continue learn Start -->

<div class="container">
        @include("message")
        <div class="row my-5 continue learn-page ">
               @include("courses.sidbare-course")

            @isset($lesson)
            <div class="col-md-8">
                <div class="mb-3">
                    <div class="course-title mb-0 bg-white" style="border: 0">
                        <div><h4 class="m-0 text-uppercase font-weight-bold text-primary">@isset($lesson->title){{$lesson->title}}  @endisset</h4></div>
                        @isset($lesson->appendix_url)
                        <a class="btn-download  px-3 py-2"  href="@isset($lesson->appendix_url){{route('download_lesson_appendixes',$lesson->appendix_url)}}  @else # @endisset">
                            <span class=" w-75 " style="font-size: 16px;">تنزيل ملحقات الدرس</span>
                            <i class="fa-sharp fa-solid fa-download me-2"></i>
                        </a>
                        @endisset

                    </div>
                    <div class="bg-white  p-3">
                        <div>
                            <div >
                                <video class="w-100 mb-3" controls controlsList="nodownload">
                                    <source src="{{asset('/storage/videos/'.$lesson->video_url)}}" type="video/mp4">
                                    هذا المتصفح لايدعم ملفات الفيديو
                                  </video>
                            </div>
                            <div class="d-flex justify-content-around">
                                    <a class="more-link btn btn-primary btn-countinue-learn" href="{{route('get_previous_lesson',['courseId'=>$course->id,'lessonId'=>$lesson->id])}}"   style="font-size: 16px;">
                                    <i class="fa-sharp fa-solid fa-angle-right ms-2"></i>
                                    <span>السابق</span>
                                </a>
                                <a class="more-link btn btn-primary btn-countinue-learn  " href="{{route('haveExercise',['courseId'=>$course->id,'lessonId'=>$lesson->id])}}"    style="font-size: 16px;">
                                    <span>التالي</span>
                                    <i class="fa-sharp fa-solid fa-angle-left me-2"></i>
                                </a>
                            </div>
                            <h5 class="fs-5  pb-2 fw-bold title-top mt-5" style="width: 115px">وصف الدرس</h5>
                             <p>
                                {{-- @isset($lesson->description)
                                {{$lesson->description}}
                                @endisset --}}
                                @isset($lesson->description)
                                @foreach ($lesson->description as $txt)
                                    @foreach ($txt as $t)
                                    @if (filter_var($t, FILTER_VALIDATE_URL))
                                        <a style="color:blue;" target="_blank" href="{{$t}}">{{$t}}</a>
                                    @else
                                        {{$t}}
                                    @endif
                                    @endforeach
                                    <br>
                                @endforeach
                            @endisset 
                             </p>
                          </div>

                    </div>
                </div>
            </div>
            @endisset


          </div>


          

        </div>

<script type="text/javascript">
    let thumbnails = document.getElementsByClassName('thumbnail-continue learn')

    let activeImages = document.getElementsByClassName('active')
    for (var i=0; i < thumbnails.length; i++){
        thumbnails[i].addEventListener('click', function(){
            console.log(activeImages)
            if (activeImages.length > 0){
                activeImages[0].classList.remove('active')
            }
            this.classList.add('active')
            document.getElementById('featured').src = this.src
        })
    }
</script>
<script>

let loadMoreBtn = document.querySelector('#load-more');
let currentItem = 3;

loadMoreBtn.onclick = () =>{
   let boxes = [...document.querySelectorAll('.container .box-container .box')];
   for (var i = currentItem; i < currentItem + 3; i++){
      boxes[i].style.display = 'inline-block';
   }
   currentItem += 3;

   if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
   }
}

</script>
<!-- continue learn End -->
@endsection

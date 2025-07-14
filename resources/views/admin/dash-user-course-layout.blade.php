<div class="container-fluid">
    <div class="container" >
        <div class="section-header text-center my-4">
            <h2 class="main-c text-title">{{__('home.courses')}}</h2>
        </div>

        <div class="row d-flex justify-content-around align-items-start  p-0 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.2">
            @foreach ($courses as $course)
            <div class="card mb-3" style="width: 22rem;padding: 0;">
                <img class="card-img-top w-100 " src="{{asset('/images/courses/'.$course->course->img_url)}}" alt="Card image cap" >
                {{-- <div class="date">2022/2/1</div> --}}
                <div class="card-body">
                    <h5 class="h3 d-block mb-3 text-secondary text-uppercase font-weight-bold title-card card-title text-primary  text-center border-title  m-auto  pb-2 fw-bold width-title">
                        @isset($course->course->title)
                            {{$course->course->title}}
                        @endisset
                    </h5>
                    <div class="mt-1 py-2 pt-0 info-trainer-time">
                        <div class="d-flex align-items-center item-trainer-time">
                            <img class="rounded-circle m-2 mt-0  p-0 img-course-traner"  src="@isset($course->course->trainer->user->profile->image) {{$course->course->trainer->user->profile->image}} @else/images/users/defaultImage.png @endisset" width="25" height="25" alt="">
                            <div><span>المدرب.</span>@isset($course->course->trainer->user->name) {{$course->course->trainer->user->name}} @endisset</div>
                        </div>
                        <div class="d-flex align-items-center item-trainer-time">
                            <i class="mdi mdi-clock-outline  fs-2 mx-1 text-primary"></i>
                            <div class=" "><span>مدة  الدورة  </span><span class="fw-bold">@isset($course->course->hours_number) {{$course->course->hours_number}}@endisset</span><span> ساعات </span></div>
                        </div>
                    </div>
                    <div class="post-more my-3 text-center">
                        <a class="btn btn-primary text-light btn-read-more w-75 " href="{{route('continue_learn',$course->course->id)}}" style="font-size: 16px;"> مواصلة التعلم </a>
                       @if($course->is_completed==1 && ($course->degree !=null))
                        <a class="btn btn-secondary text-light btn-read-more w-75 mt-1 " href="{{route('printCertificate',['courseId'=>$course->course->id,'studentId'=>Auth::id()])}}" style="font-size: 16px;">  الحصول على الشهادة</a>

                        @endif
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</div>

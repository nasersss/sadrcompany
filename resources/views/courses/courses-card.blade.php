<div class="container-fluid">
    <div class="container" >
        <div class="section-header text-center my-4">
            <h2 class="main-c text-title">{{__('home.courses')}}</h2>
        </div>

        <div class="row d-flex justify-content-around align-items-center  p-0 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.2">


            @foreach ($courses as $course)
            @if (count($course->topic)!=0 )
             @foreach ($course->topic as $topic)
             @if (count($topic->lesson)!=0 )
            
            <div class="card mb-3" style="width: 22rem;padding: 0;">
                <img class="card-img-top w-100 " style="width: 350px;height: 313px;" src="{{asset('/images/courses/'.$course->img_url)}}" alt="Card image cap" >
                {{-- <div class="date">2022/2/1</div> --}}
                <div class="card-body">
                    <h5 class="h3 d-block mb-3 text-secondary text-uppercase font-weight-bold title-card card-title text-primary  text-center border-title  m-auto  pb-2 fw-bold width-title">
                        @isset($course->title)
                            {{$course->title}}
                        @endisset
                    </h5>
                    <div class="mt-1 py-2 pt-0">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle m-2 mt-0  p-0 img-course-traner"  src="@isset($course->trainer->user->profile->image) {{$course->trainer->user->profile->image}} @else/images/users/defaultImage.png @endisset" width="25" height="25" alt="">
                            <div><span>المدرب.</span>@isset($course->trainer->user->name) {{$course->trainer->user->name}} @endisset</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="far fa-clock fs-4 m-2 text-primary"></i>
                            <div class=" "><span>مدة  الدورة  </span><span class="fw-bold">@isset($course->hours_number) {{$course->hours_number}}@endisset</span><span> ساعات </span></div>
                        </div>
                    </div>
                    <div class="post-more my-3 text-center">
                        @isset($course->studentCourse)
                            @isset($course->studentCourse->is_active)
                            @if($course->studentCourse->is_active == 1)
                            <a class="more-link btn-primary btn-read-more w-75 " href="{{route('continue_learn',$course->id)}}" style="font-size: 16px;">بدء التعلم</a>
                            @else
                            <a class="more-link btn-primary btn-read-more w-75 " href="{{route('course_details',$course->id)}}" style="font-size: 16px;">عرض تفاصيل الدورة</a>
                            @endif
                            @endisset
                        @else
                            <a class="more-link btn-primary btn-read-more w-75 " href="{{route('course_details',$course->id)}}" style="font-size: 16px;">عرض تفاصيل الدورة</a>
                        @endisset
                    </div>
                </div>

            </div>
            @break
            @endif
            @endforeach
            @endif
            @endforeach

        </div>
    </div>
</div>

@extends('master-course')

@section('title')
@isset($course->title)
{{$course->title}}
@endisset
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<!-- aboute -->
<div class="about-me">

@isset($course)
@include("message")
<div class="container-fluid px-4 py-3 p-md-5 mb-2 mt-2  ">
    <div class="row d-flex justify-content-around">
        <div class="col-md-8 col-12 bg-white px-4 py-3 mt-0 shadow mb-3">
            <div class="row border-bottom pb-2 course-header">
                <div class="col-md-9 col-sm-6">
                    <div class="d-flex align-items-center fw-bold fs-4  text-primary ">
                      @isset($course->title)
                      {{$course->title}}
                      @endisset
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="d-flex align-items-center">
                        <i class="far fa-clock fs-4 m-2 text-primary"></i>
                        <div class=" "><span>مدة الدورة </span><span class="fw-bold"> @isset($course->hours_number)
                          {{$course->hours_number}}
                          @endisset</span><span>ساعات</span></div>
                    </div>
                </div>
            </div>
            <div class="course-body my-3">
                <div >
                  <iframe width="100%" height="450vh" src="https://www.youtube.com/embed/{{$course->intro_video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  {{-- <video class="w-100 mb-3" controls>
                      <source src="/files/lesson/video/" type="video/mp4">
                      هذا المتصفح لايدعم ملفات الفيديو
                    </video> --}}

            </div>
                <div class="box">
                    <h5 class="fs-5  pb-2 fw-bold title-top"> عن الدورة</h5>
                    <p class="my-3">
                      {{-- @isset($course->description)
                      {{$course->description}}
                      @endisset     --}}
                      @isset($course->description)
                                       @foreach ($course->description as $txt)
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
                <div class="box mt-5">
                    <h5 class="fs-5  pb-2 fw-bold title-top" style="width: 100px;">ماذا ستتعلم</h5>
                    <div id="accordion">
                      @isset($course->topic)
                      @foreach ($course->topic as $topic)
                        @if($topic->is_active==1)
                      <div class="card title-unit mb-1">
                        <div class="card-header py-0" id="heading{{$topic->id}}">
                          <h5 class="mb-0">
                            <button class="btn " data-toggle="collapse" data-target="#collapse{{$topic->id}}" aria-expanded="true" aria-controls="collapse{{$topic->id}}">
                              <span><i class="fa-solid fa-chevron-left  mx-2"></i></span>
                              <span class="fw-bold">@isset($topic->title) {{$topic->title}}@endisset</span>
                            </button>
                          </h5>
                        </div>
                        <div id="collapse{{$topic->id}}" class="collapse" aria-labelledby="heading{{$topic->id}}" data-parent="#accordion">
                          <div class="card-body me-5 py-0 ">
                              <ol>
                                @isset($topic->lesson)
                                @foreach($topic->lesson as $lesson)
                                @if($lesson->is_active==1)
                                  <li class="mb-2">
                                      <i class="fa-solid fa-circle-play px-2 text-primary"></i>
                                      <span>{{$lesson->title}}</span>
                                  </li>
                                  @endif
                                 @endforeach
                                 @endisset
                              </ol>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                     @endisset




                      </div>
                </div>
            </div>
            <div class="course-footer my-5 d-flex align-items-center flex-column d-md-inline-block">
            @if(Auth::user())
            @isset($studentCourse->is_active)
                @if ($studentCourse->is_active == 1)
                <a class="more-link btn-primary btn-read-more w-75  mb-2 " href="{{route('continue_learn',$course->id)}}"  style="font-size: 16px;">بدء التعلم</a>
                @else
                <a class="more-link btn-primary btn-read-more w-75  mb-2" href="#"  data-bs-toggle="modal" data-bs-target="#subscribe" style="font-size: 16px;">اشتراك في الدورة</a>
                @endif
            @else
            <a class="more-link btn-primary btn-read-more w-75  mb-2" href="#"  data-bs-toggle="modal" data-bs-target="#subscribe" style="font-size: 16px;">اشتراك في الدورة</a>
            @endisset
            @else

                <a class="more-link btn-primary btn-read-more w-75  mb-2"  href="{{route('subscribe_create',$course->id)}}" style="font-size: 16px;">انضم إلينا  في الدورة</a>

            @endif
            <a class="more-link btn-primary btn-read-more w-75  mb-2" href="@isset($course->appendix_url)/files/courses/{{$course->appendix_url}}@endisset"  target="_blank"style="font-size: 16px;">تنزيل خطة الدورة</a>

            </div>
        </div>
        <div class="col-md-3 col-12 p-0">

            {{-- <div class="row bg-white w-100 shadow">
                <div class="video-itro md-3 w-100 shadow p-2 ">
                    <iframe src="https://www.youtube.com/watch?v=VOpJtoUiPjs" class="w-100"></iframe>
                    <div class="row text-primary px-3 fw-bold text-center">
                        مقدمة تعريفية عن الدورة
                    </div>
                </div>
            </div> --}}

            <div class="row bg-white w-100 shadow m-0  info-traner ">
                <div class="card rounded-0 border-0 w-100" style="width: 18rem;">
                    <div class="d-flex justify-content-center align-items-center flex-column p-3">
                        <img class="card-img-top " src="@isset($course->trainer->user->profile->image) {{$course->trainer->user->profile->image}} @else/images/users/defaultImage.png @endisset" alt="Card image cap">
                    </div>
                    <h5 class="fs-5  py-2  text-center title-top w-100" style="border: 0"> <span>المدرب .</span> <span>@isset($course->trainer->user->name){{$course->trainer->user->name}}@endisset</span></h5>
                    <div class="card-body">
                        <h5 class="fs-5  pb-2 fw-bold title-top" style="width: 100px"> عن المدرب</h5>
                        <p class="card-text">

                             @isset($course->trainer->description)
                             {{-- {{$course->trainer->description}}  --}}
                          
                              @foreach ($course->trainer->description as $txt)
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
            <div class="row bg-white w-100 shadow mt-3 py-3 px-3  info-traner m-0">
                  <div class="row mb-1">
                      <div class="col-2 d-flex align-items-center">
                          <i class="far fa-clock traner-icon ml-3"></i>
                         <span class="fw-bold ml-2">@isset($course->hours_number){{$course->hours_number}} @else 0 @endisset</span><span class="ml-2"> ساعات </span>

                      </div>

                  </div>
                  <div class="row mb-1">
                      <div class="col-2 d-flex align-items-center">
                          <i class="mdi mdi-account-group traner-icon ml-3"></i>
                          <span class="ml-2 fw-bold"> @isset($course->studentCourse)
                            {{count($course->studentCourse)}}
                            @else 0
                            @endisset </span><span class="ml-2"> طالب </span>

                      </div>

                  </div>
                  <div class="row mb-1">
                      <div class="col-2 d-flex align-items-center">
                        <i class="mdi mdi-book-multiple traner-icon ml-3"></i>
                      <span class=" fw-bold ml-2"> {{$course->count}} </span><span> درس </span>

                      </div>

                  </div>
                  <div class="row mb-1">
                    <div class="col-2 d-flex align-items-center">
                        <i class="uil-dollar-alt traner-icon ml-3"></i>
                        @if($countryCode!='YE')
                        <span class="fw-bold ml-2">@isset($course->global_price) {{$course->global_price}} @else 0 @endisset</span><span> $ </span>
                        @else
                        <span class="fw-bold ml-2">@isset($course->local_price) {{$course->local_price}} @else 0 @endisset</span><span> $ </span>
                        @endif
                    </div>

                </div>
              </div>
              <a href="{{route('student_work_show_all')}}">
                <div class="border mb-1 course-box text-center d-flex align-items-center justify-content-center btn-primary  mt-3">
                    <div class=" py-3 px-2 text-center" >
                        <div class="course-title-unit px-2 fw-bold text-center text-white">
                             نماذج مخرجات الدورة
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endisset
</div>

  @include('courses.modal.subscribe')

<!-- aboute -->
@endsection

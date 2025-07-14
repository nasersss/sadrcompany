@extends('master-course')

@section('title')
{{__('home.courses')}}
@endsection
{{-- page css files or code  --}}
@section('css')

<script>

    window.addEventListener('load', (event) => {
     $('#showFeature').click();
     console.log('The page has fully loaded');

 });

 </script>
@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<!-- courses Start -->
<!-- Button trigger modal -->
<button type="button" style="display: none" class="btn btn-primary" id="showFeature" data-toggle="modal" data-target="#exampleModalLong">
  </button>

  <!-- Modal -->
  <div id="box-modal">
      <div class="modal fade bd-example-modal-lg " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
              <div class=" text-center title-featurs-courses">
                <h5 class=" text-black text-center fw-bold fs-3 pt-5 text-primary" id="exampleModalLongTitle">{{__('course.title')}}</h5>
                <p>
                    {{__('course.sub_title')}}
                </p>
                <button type="button" class="x-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 col-12">
                       <div class="box d-flex justify-content-around align-items-center d-flex flex-column px-3 ">
                        <i class="fa-solid fa-graduation-cap py-3 fs-1 text-primary"></i>
                        <h5 class=" text-black text-center  fs-3 text-primary">{{__('course.students')}}</h5>
                        <h3  class=" text-black text-center fw-bold py-3 pt-2 second-color">
                            <span  data-toggle="counter-up">280</span>
                            <span>+</span>
                        </h3>
                       </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="box d-flex justify-content-center align-items-center d-flex flex-column px-3 ">
                         <div class="icon">
                            <i class="fa-solid fa-person-chalkboard py-3 fs-1 text-primary"></i>
                         </div>
                         <h5 class=" text-black text-center  fs-3 text-primary">{{__('course.trainers')}}</h5>
                         <h3  class=" text-black text-center fw-bold py-3 pt-2 second-color">
                            <span  data-toggle="counter-up">15</span>
                            <span>+</span>
                        </h3>
                        </div>
                     </div>
                     <div class="col-md-4 col-12">
                        <div class="box d-flex justify-content-center align-items-center d-flex flex-column px-3 ">
                         <div class="icon">
                            <i class="fa-solid fa-book py-3 fs-1 text-primary"></i>
                         </div>
                         <h5 class=" text-black text-center  fs-3 text-primary">{{__('course.courses')}}</h5>
                         <h3  class=" text-black text-center fw-bold py-3 pt-2 second-color">
                            <span  data-toggle="counter-up">20</span>
                            <span>+</span>
                         </h3>
                        </div>
                     </div>

                </div>
                <div class="row">
                    <div class=" text-center">
                        <h5 class=" text-black text-center fw-bold fs-3 pt-5 pb-3 text-primary" >{{__('course.features')}}</h5>
                      </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-12 mb-3">
                       <div class="featurs-box d-flex justify-content-center align-items-center d-flex flex-column px-3 shadow-sm" >
                        <div class="d-flex justify-content-center align-items-center my-3 rounded-circle icon-circle" >
                            <i class="fa fa-book py-3 fs-3 text-white" aria-hidden="true"></i>
                        </div>
                        <p class=" fs-5 text-center">{{__('course.feature_lessons')}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-3">
                      <div class="featurs-box d-flex justify-content-center align-items-center d-flex flex-column px-3 shadow-sm" >
                       <div class="d-flex justify-content-center align-items-center my-3 rounded-circle icon-circle" >
                        <i class="fa fa-users py-3 fs-3 text-white" aria-hidden="true"></i>
                       </div>
                       <p class=" fs-5 text-center">{{__('course.feature_trainers')}}</p>
                       </div>
                   </div>
                   <div class="col-md-4 col-12 mb-3">
                    <div class="featurs-box d-flex justify-content-center align-items-center d-flex flex-column px-3 shadow-sm" >
                     <div class="d-flex justify-content-center align-items-center my-3 rounded-circle icon-circle" >
                      <i class="fa fa-desktop py-3 fs-3 text-white" aria-hidden="true"></i>
                     </div>
                     <p class=" fs-5 text-center">{{__('course.feature_meetings')}}</p>
                     </div>
                     </div>
                   <div class="col-md-4 col-12 mb-3">
                      <div class="featurs-box d-flex justify-content-center align-items-center d-flex flex-column px-3 shadow-sm" >
                       <div class="d-flex justify-content-center align-items-center my-3 rounded-circle icon-circle" >
                           <i class="fa fa-laptop py-3 fs-3 text-white" ></i>
                       </div>
                       <p class=" fs-5 text-center">{{__('course.feature_exercises')}}</p>
                       </div>
                   </div>
                   <div class="col-md-4 col-12 mb-3">
                    <div class="featurs-box d-flex justify-content-center align-items-center d-flex flex-column px-3 shadow-sm" >
                     <div class="d-flex justify-content-center align-items-center my-3 rounded-circle icon-circle" >
                         <i class="fa fa-check-circle py-3 fs-3 text-white" aria-hidden="true"></i>
                     </div>
                     <p class=" fs-5 text-center">{{__('course.feature_evaluation')}}</p>
                     </div>
                 </div>

                    <div class="col-md-4 col-12 mb-3">
                    <div class="featurs-box d-flex justify-content-center align-items-center d-flex flex-column px-3 shadow-sm" >
                        <div class="d-flex justify-content-center align-items-center my-3 rounded-circle icon-circle" >
                            <i class="fa fa-certificate py-3 fs-3 text-white" aria-hidden="true"></i>
                        </div>
                        <p class=" fs-5 text-center">{{__('course.feature_certificates')}}</p>
                        </div>
                    </div>
              </div>
            </div>
            </div>
          </div>
        </div>
  </div>





<div class="works  mb-3" >
    <div class="container-fluid">
    <div class="pt-3">
        {{-- @include("message") --}}
    </div>
    <div class="container" >
        <div class="section-header text-center my-4">
            <h2 class="main-c text-title">{{__('home.courses')}}</h2>
        </div>

        <div class="row d-flex justify-content-around align-items-center  p-0 wow bounceInUp" data-wow-duration="1s" data-wow-delay="0">
            @foreach ($courses as $cours)
            @if (count($cours->topic)!=0 )
            @foreach ($cours->topic as $topic)
            @if (count($topic->lesson)!=0 )
            <div class="card mb-3" style="width: 20rem;padding: 0;">
<img class="card-img-top w-100" style="width: 350px;height: 313px;" src="@isset($cours->img_url){{asset('/images/courses/'.$cours->img_url)}}@endisset" alt="Card image cap" height="255px">
{{-- <div class="date">2022/2/1</div> --}}
<div class="card-body">
    <h5 class="h3 d-block mb-3 text-secondary text-uppercase font-weight-bold title-card card-title text-primary  text-center border-title  m-auto  pb-2 fw-bold width-title">@isset($cours->title)
        {{$cours->title}}
    @endisset</h5>
    <div class="mt-1 py-2 pt-0">
        <div class="d-flex align-items-center">
            <img class="rounded-circle m-2 mt-0  p-0 img-course-traner"  src="@isset($cours->trainer->user->profile->image) {{$cours->trainer->user->profile->image}} @else/images/users/defaultImage.png @endisset" width="25" height="25" alt="">
            <div><span>المدرب.</span>@isset($cours->trainer->user->name) {{$cours->trainer->user->name}} @endisset</div>
        </div>
        <div class="d-flex align-items-center">
            <i class="far fa-clock fs-4 m-2 text-primary"></i>
            <div class=" "><span>مدة  الدورة  </span><span class="fw-bold">@isset($cours->hours_number) {{$cours->hours_number}}@endisset</span><span> ساعات </span></div>
        </div>
    </div>
    <div class="post-more my-3 text-center">
        @isset($cours->studentCourse)
            <a class="more-link btn-primary btn-read-more w-75 " href="{{route('continue_learn',$cours->id)}}" style="font-size: 16px;">بدء التعلم</a>
        @else
            <a class="more-link btn-primary btn-read-more w-75 " href="{{route('course_details',$cours->id)}}" style="font-size: 16px;">عرض تفاصيل الدورة</a>
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

</div>
<!-- courses End -->
@endsection
</div>

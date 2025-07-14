<div class="col-md-4">
    <div class="mb-3">
        <div class="course-title mb-0 bg-white">
            <div><h4 class="m-0 text-uppercase font-weight-bold text-primary">@isset($course) {{$course->title}}@endisset</h4></div>
            {{-- <div class="course-title-color">
                <span>%</span>
                <span>100</span>
            </div> --}}
        </div>
        <div class="bg-white border  p-3">
            <div id="accordion">
                <div class="bg-white">
                    @isset($course)
                        @foreach ($course->topic as $topic)
                        @isset($topic)
                        @if($topic->is_active==1)
                        <div class="border mb-1 course-box">
                            <div class=" py-3 px-2" id="heading{{$topic->id}}">
                                <div class="course-title-unit px-2 fw-bold" data-toggle="collapse" data-target="#collapse{{$topic->id}}" aria-expanded="true" aria-controls="collapse{{$topic->id}}">
                                <div>
                                    {{$topic->title}}
                                </div>
                                <div>
                                    <i class="fa-sharp fa-solid fa-angle-down second-color" style="font-size: 25px"></i>
                                </div>
                                </div>
                            </div>
                            <div id="collapse{{$topic->id}}" class="collapse @if($lesson->topic_id == $topic->id) show @endif" aria-labelledby="heading{{$topic->id}}" data-parent="#accordion">
                                {{-- {{ $lesson->topic_id }} --}}
                            {{-- <div id="collapse{{$topic->id}}" class="collapse" aria-labelledby="heading{{$topic->id}}" data-parent="#accordion"> --}}
                                <div class="card-body ">
                                    @isset($topic->lesson)
                                    @foreach ($topic->lesson as $lessonintopic)
                                        @if($lessonintopic->is_active==1)
                                                @if ($lessonintopic->topic_id > $studentCourse->lessonData->topic_id)
                                                    <div class="title-lesson-disable mb-1  shadow-sm d-flex justify-content-between px-2 py-3 text-primary">
                                                        <div class="title  ">
                                                            {{$lessonintopic->title}}
                                                        </div>
                                                        <div class=" fs-7 d-flex align-items-center justify-content-center course-title-color">
                                                            <span class=" text-primary">في الانتظار</span>
                                                        </div>
                                                    </div>
                                                @elseif ($lessonintopic->topic_id < $studentCourse->lessonData->topic_id)
                                                <a href="{{route('get_lesson',[$course->id,$lessonintopic->id])}}">
                                                    <div class="title-lesson mb-1  shadow-sm d-flex justify-content-between px-2 py-3 text-primary">
                                                        <div class="title  text-success">
                                                            {{$lessonintopic->title}}
                                                        </div>
                                                        <div class="fs-7 d-flex align-items-center justify-content-center course-title-color">
                                                            <span class="text-success">مكتمل</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                @else
                                                @if ($lessonintopic->id == $studentCourse->lesson)
                                                <a href="{{route('get_lesson',[$course->id,$lessonintopic->id])}}">
                                                    <div class="title-lesson-active mb-1  shadow-sm d-flex justify-content-between px-2 py-3 text-primary">
                                                        <div class="title  course-title-color">
                                                            {{$lessonintopic->title}}
                                                        </div>
                                                        <div class="fs-7 d-flex align-items-center justify-content-center course-title-color">
                                                            <span>قيد المشاهدة</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                @elseif ($lessonintopic->id < $studentCourse->lesson)
                                                <a href="{{route('get_lesson',[$course->id,$lessonintopic->id])}}">
                                                <div class="title-lesson mb-1  shadow-sm d-flex justify-content-between px-2 py-3 text-primary">
                                                    <div class="title  text-success">
                                                        {{$lessonintopic->title}}
                                                    </div>
                                                    <div class="fs-7 d-flex align-items-center justify-content-center course-title-color">
                                                        <span class="text-success">مكتمل</span>
                                                    </div>
                                                </div>
                                                </a>
                                                @else
                                                <div class="title-lesson-disable mb-1  shadow-sm d-flex justify-content-between px-2 py-3 text-primary">
                                                    <div class="title  ">
                                                        {{$lessonintopic->title}}
                                                    </div>
                                                    <div class=" fs-7 d-flex align-items-center justify-content-center course-title-color">
                                                        <span class=" text-primary">في الانتظار</span>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                        @endif
                                    @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                        @endif
                        @endisset
                        @endforeach
                        <a href="{{route('show_resources',$course->id)}}">
                            <div class="border mb-1 course-box text-center d-flex align-items-center justify-content-center btn-primary mt-3">
                                <div class=" py-3 px-2 text-center" >
                                    <div class="course-title-unit px-2 fw-bold text-center text-white">
                                        مراجع الدورة
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endisset



                </div>
            </div>
        </div>

    </div>
</div>
<a href="{{route('course-inquiries',$course->id)}}" target="_blanck" class="boxChat" title="الاستفسارات">
    <i class=" mdi mdi-comment-question-outline text-light" style=" line-height: 50px;  margin: auto; "></i>
</a>

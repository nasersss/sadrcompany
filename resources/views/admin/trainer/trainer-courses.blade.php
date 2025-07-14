                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>عنوان الدورة</th>
                                <th >الوصف</th>
                                <th class="text-center">عدد الساعات</th>
                                <th class="text-center">عدد الطلاب المشاركين</th>
                                {{-- <th>تقييم الطلاب</th> --}}
                                <th class="text-center">الحالة</th>
                                {{-- <th>الاستفسارات</th> --}}
                                <th class="text-center" style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @isset($courses)
                                @foreach($courses as $course)
                            <tr>
                                <td>
                                    @isset($course->title)
                                    {{ $course->title }}
                                    @endisset

                                </td>
                                <td data-title="@isset($course->description){{ $course->description }}@endisset">
                                    @isset($course->description)
                                    @if (Auth::user()->role == 0)
                                    <a href="{{route('topics_list',$course->id)}}">
                                        {{ Illuminate\Support\Str::limit($course->description) }}
                                    </a>
                                    @else
                                    {{ Illuminate\Support\Str::limit($course->description) }}
                                    @endif
                                    @endisset
                                </td>

                                <td class="text-center">
                                    @isset($course->hours_number)
                                    {{$course->hours_number}}
                                    @endisset
                                </td>

                                <td class="text-center">
                                    <a href="#">
                                        @isset($course->studentCourse)
                                        {{count($course->studentCourse)}}
                                        @endisset
                                    </a>
                                </td>
                                {{-- <td>
                                    <a title="استعراض تقييمات الطلاب" class="design-icon" href="{{route('exercise_review',$course->id)}}">
                                        <i class="uil uil-user-check"></i>
                                    </a>

                                </td> --}}
                                <td>
                                    @if($course->is_active==1)
                                    <span class="badge badge-success-lighten">نشط</span>

                                    @else
                                        <span class="badge badge-danger-lighten">غير نشط</span>
                                    @endif


                                </td>
                                {{-- <td class="text-center">
                                    <a title="استعراض استفسارات الطلاب" href="{{ route("course-inquiries",$course->id) }}" class="design-icon text-center"> <i class="mdi mdi-comment-question-outline"></i></a>
                                </td> --}}
                                <td class="d-flex">
                                    <a title="استعراض تقييمات الطلاب" class="design-icon" href="{{route('exercise_review',$course->id)}}">
                                        <i class="uil uil-user-check" style="font-size: 28px"></i>
                                    </a>
                                    <a title="استعراض استفسارات الطلاب" target="_blank" href="{{ route("course-inquiries",$course->id) }}" class="design-icon text-center">
                                         <i class="mdi mdi-comment-question-outline" style="font-size: 28px"></i>
                                    </a>
                                    <a class="design-icon text-center" title="استعراض ملحقات الدورة" href="{{route('course_appendix_list',$course->id)}}">
                                        <i class="uil uil-paperclip" style="font-size: 28px"></i>
                                    </a>
                                    
                                    @if (Auth::user()->role == 0)
                                    <a class="design-icon text-center" title="استعراض نماذج أعمال الطلاب" href="{{route('student_work_list',$course->id)}}">
                                        <i class="mdi mdi-folder-image" style="font-size: 28px"></i>
                                    </a>

                                    <a class="design-icon text-center" title="استعراض استبيانات الدورة" href="{{route('show-evaluation',$course->id)}}">
                                        <i class="uil uil-chart-pie" style="font-size: 28px"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>

                            @endforeach

                            @endisset


                            </tbody>
                        </table>
                    </div>

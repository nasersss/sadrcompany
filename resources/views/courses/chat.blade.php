@extends('master-course')

@section('title')
    {{ __('home.inquiry') }}
@endsection

{{-- page css files or code  --}}
@section('css')
@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
    <!-- continue learn Start -->
    @include('message')
    <div class="container">
        <div class="nav nav-tabs bg-white border continue  bg-white mx-auto   mt-5" id="nav-tab" role="tablist">

                <button class="nav-link active w-50 py-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">الاستفسارات العامة</button>
                <button class="nav-link w-50 py-3" id="nav-massege-spceial-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-massege-spceial" type="button" role="tab" aria-controls="nav-massege-spceial"
                    aria-selected="false">استفساراتي</button>

        </div>
        </nav>
        <div class="tab-content bg-white" id="nav-tabContent">


            <div class="tab-pane bg-white fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row mb-5 continue  bg-white mx-auto p-4 p-md-5 ">
                    @isset($inquiries)
                        @foreach ($inquiries->reverse() as $inquiry)
                            <div class="row border mb-3 py-3 shadow-sm m-0 px-2">
                                <div class="col-1  col-md-1 p-0">
                                    <img src="
                    @foreach ($users as $user)
                        @isset($inquiry->student_id)
                            @if ($inquiry->student_id == $user->id)
                                @isset($user->profile->image)
                                    {{ $user->profile->image }}
                                @else
                                    /images/users/defaultImage.png
                                @endisset
                            @break
                            @endif
                        @endisset @endforeach"
                                        width="60px" height="60px" class=" rounded-circle dropdown-toggle" href="#"
                                        id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                </div>
                                <div class="col-11  col-md-11 p-0">
                                    <div class="header-box me-5  me-md-0 me-lg-0">
                                        <div class="d-flex align-items-center ">
                                            <div
                                                class="info me-sm-3  me-md-0 me-lg-0 d-flex  justify-content-center flex-column py-3 ">
                                                <h1 class="text-primary fs-5 mb-1">
                                                    @isset($inquiry->student->name)
                                                        {{ $inquiry->student->name }}
                                                    @endisset
                                                </h1>
                                                <p class="m-0">
                                                    @isset($inquiry->created_at)
                                                        {{ $inquiry->created_at }}
                                                    @endisset
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body pl-4 mb-3">
                                        <p>
                                            @isset($inquiry->content_format)
                                                @foreach ($inquiry->content_format as $txt)
                                                    @foreach ($txt as $t)
                                                        @if (filter_var($t, FILTER_VALIDATE_URL))
                                                            <a style="color:blue;" target="_blank"
                                                                href="{{ $t }}">{{ $t }}</a>
                                                        @else
                                                            {{ $t }}
                                                        @endif
                                                    @endforeach
                                                    <br>
                                                @endforeach
                                            @endisset
                                        </p>
                                        @if ($user->id == Auth::id())
                                        @else
                                            <form action="{{ route('course-replies-store') }}" class="form-disable" method="post">
                                                @csrf
                                                @isset($courseId)
                                                    <input type="hidden" name="inquiryId" value="{{ $inquiry->id }}">
                                                @endisset
                                                <textarea name="content" class="form-control w-100 my-3" id="exampleFormControlTextarea3" rows="2"
                                                    placeholder="اضافة رد ..."></textarea>
                                                <button class="more-link btn-primary btn-read-more  border-0 form-btn-disable"
                                                    id="button-addon2">رد</button>
                                            </form>
                                        @endif
                                        @if ($user->id == Auth::id())
                                        <div class=" row d-flex justify-content-end">
                                                <span class="d-flex justify-content-end">
                                                    @if(count($inquiry->reply)==0)
                                                    <button class="btn more-link btn-primary  border-0 edit-inquiry"data-inquiry_id={{$inquiry->id}}  data-inquiry_content="{{$inquiry->content}}"   data-toggle="modal" data-target="#editInquiry">
                                                    تعديل <i class=" mdi  mdi-square-edit-outline "
                                                            style=" line-height: 20px;  margin: auto; "></i>
                                                    </button>
                                                    @endif
                                                        <button type="button" class="btn more-link btn-secondary border-0 mr-1 delete-inquiry" data-inquiry_id={{$inquiry->id}} data-toggle="modal" data-target="#deletInquiry">
                                                            حذف<i class=" mdi mdi-delete"
                                                                   style=" line-height: 20px;  margin: auto; "></i>
                                                           </button>


                                        </div>
                                    @endif
                                    </div>

                                    @foreach ($inquiry->reply->reverse() as $reply)
                                        @foreach ($users as $user)
                                            @isset($reply->replier_id)
                                                @if ($reply->replier_id == $user->id)
                                                    <div class="row reciver pe-0 pe-md-1 py-3 ml-0 ml-md-2 mb-2"
                                                        style="background-color: ghostwhite">
                                                        <div class="col-3  col-md-1 p-0">
                                                            <img src="@isset($user->profile->image){{ $user->profile->image }}@else/images/users/defaultImage.png @endisset"
                                                                width="72px" height="72px"
                                                                class=" rounded-circle dropdown-toggle" href="#"
                                                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                        </div>
                                                        <div class="col-9  col-md-11 p-0">
                                                            <div class="header-box">
                                                                <div class="d-flex align-items-center ">
                                                                    <div class="info me-sm-3  me-md-4 me-lg-2  py-3">
                                                                        <h1 class="text-primary fs-5 mb-1">
                                                                            @isset($user->name)
                                                                                {{ $user->name }}
                                                                            @endisset
                                                                        </h1>
                                                                        <p class="m-0">
                                                                            @isset($reply->created_at)
                                                                                {{ $reply->created_at }}
                                                                            @endisset
                                                                            @isset($user->role)
                                                                                @if ($user->role < 2)
                                                                                    <span
                                                                                        class="badge second-bg mr-2 position-absolute">مدرب</span>
                                                                                @endif
                                                                            @endisset
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="box-body pl-4 mb-3">
                                                                <p>
                                                                    @isset($reply->content_format)
                                                                        @foreach ($reply->content_format as $txt)
                                                                            @foreach ($txt as $t)
                                                                                @if (filter_var($t, FILTER_VALIDATE_URL))
                                                                                    <a style="color:blue;" target="_blank"
                                                                                        href="{{ $t }}">{{ $t }}</a>
                                                                                @else
                                                                                    {{ $t }}
                                                                                @endif
                                                                            @endforeach
                                                                            <br>
                                                                        @endforeach
                                                                    @endisset
                                                                </p>
                                                            </div>
                                                            @if ($user->id == Auth::id())
                                                            <div class=" row d-flex justify-content-end">
                                                                    <span class="d-flex justify-content-end">
                                                                        <button class="btn more-link btn-primary  border-0 edit-reply" data-reply_id={{$reply->id}} data-reply_content="{{$reply->content}}"   data-toggle="modal" data-target="#editReply">
                                                                        تعديل <i class=" mdi  mdi-square-edit-outline "
                                                                                style=" line-height: 20px;  margin: auto; "></i>
                                                                        </button>
                                                                            <button type="button" class="btn more-link btn-secondary border-0 mr-1 delete-reply " data-reply_id={{$reply->id}} data-toggle="modal" data-target="#deletreply">
                                                                                حذف<i class=" mdi mdi-delete"
                                                                                       style=" line-height: 20px;  margin: auto; "></i>
                                                                               </button>
                                                                    </span>

                                                            </div>
                                                        @endif
                                                        </div>
                                                    </div>
                                                @break

                                            @endif
                                        @endisset
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endisset
                    <form action="{{ route('course-inquiries-store') }}" class="form-disable" method="post">
                        @csrf
                        @isset($courseId)
                            <input type="hidden" name="courseId" value="{{ $courseId }}">
                        @endisset
                        <div class="form-group p-0  mt-4">
                            <label for="exampleFormControlTextarea3">اضافة استفسار </label>
                            <textarea class="form-control" id="exampleFormControlTextarea3" name="content" rows="7"
                                placeholder="اضافة استفسار ..."></textarea>
                        </div>
                        <div class="p-0">
                            <button class="more-link btn-primary btn-read-more border-0 form-btn-disable"
                                style="font-size: 16px;">ارسال</button>
                        </div>
                    </form>

            </div>
        </div>

            <div class="tab-pane bg-white  fade" id="nav-massege-spceial" role="tabpanel"
                aria-labelledby="nav-massege-spceial-tab">
                <div class="row mb-5 continue  bg-white mx-auto p-4 p-md-5 ">
                    @isset($myInquiries)
                        @foreach ($myInquiries->reverse() as $inquiry)
                            <div class="row border mb-3 py-3 shadow-sm m-0 px-0 px-md-2">
                                <div class="col-3  col-md-1 p-0">
                                    <img src="
                    @foreach ($users as $user)
                        @isset($inquiry->student_id)
                            @if ($inquiry->student_id == $user->id)@isset($user->profile->image){{ $user->profile->image }}@else/images/users/defaultImage.png @endisset
                            @break
                            @endif
                        @endisset @endforeach"
                                        width="72px" height="72px" class=" rounded-circle dropdown-toggle"
                                        href="#" id="navbarDropdownMenuLink" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                </div>
                                <div class="col-9  col-md-11 p-0">
                                    <div class="header-box">
                                        <div class="d-flex align-items-center ">
                                            <div
                                                class="info me-sm-3  me-md-4 me-lg-0 d-flex  justify-content-center flex-column py-3">
                                                <h1 class="text-primary fs-5 mb-1">
                                                    @isset($inquiry->student->name)
                                                        {{ $inquiry->student->name }}
                                                    @endisset
                                                </h1>
                                                <p class="m-0">
                                                    @isset($inquiry->created_at)
                                                        {{ $inquiry->created_at }}
                                                    @endisset
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body pl-4 mb-3">
                                        <p>
                                            @isset($inquiry->content_format)
                                                @foreach ($inquiry->content_format as $txt)
                                                    @foreach ($txt as $t)
                                                        @if (filter_var($t, FILTER_VALIDATE_URL))
                                                            <a style="color:blue;" target="_blank"
                                                                href="{{ $t }}">{{ $t }}</a>
                                                        @else
                                                            {{ $t }}
                                                        @endif
                                                    @endforeach
                                                    <br>
                                                @endforeach
                                            @endisset
                                        </p>
                                        @if ($user->id == Auth::id())
                                        @else
                                            <form action="{{ route('course-replies-store') }}" method="post">
                                                @csrf
                                                @isset($courseId)
                                                    <input type="hidden" name="inquiryId" value="{{ $inquiry->id }}">
                                                @endisset
                                                <textarea name="content"  minlength="10" required maxlength="500" class="form-control w-100 my-3" id="exampleFormControlTextarea3" rows="2"
                                                    placeholder="اضافة رد ..."></textarea>
                                                <button class="more-link btn-primary btn-read-more  border-0"
                                                    id="button-addon2">رد</button>
                                            </form>
                                        @endif
                                        @if ($user->id == Auth::id())
                                        <div class=" row d-flex justify-content-end">
                                                <span class="d-flex justify-content-end">
                                                    @if(count($inquiry->reply)==0)
                                                    <button class="btn more-link btn-primary  border-0 edit-inquiry"data-inquiry_id={{$inquiry->id}}  data-inquiry_content="{{$inquiry->content}}"   data-toggle="modal" data-target="#editInquiry">
                                                    تعديل <i class=" mdi  mdi-square-edit-outline "
                                                            style=" line-height: 20px;  margin: auto; "></i>
                                                    </button>
                                                    @endif
                                                        <button type="button" class="btn more-link btn-secondary border-0 mr-1 delete-inquiry" data-inquiry_id={{$inquiry->id}} data-toggle="modal" data-target="#deletInquiry">
                                                            حذف<i class=" mdi mdi-delete"
                                                                   style=" line-height: 20px;  margin: auto; "></i>
                                                           </button>


                                        </div>
                                    @endif
                                    </div>

                                    @foreach ($inquiry->reply->reverse() as $reply)
                                        @foreach ($users as $user)
                                            @isset($reply->replier_id)
                                                @if ($reply->replier_id == $user->id)
                                                    <div class="row reciver pe-0 pe-md-1 py-3 ml-0 ml-md-2 mb-2"
                                                        style="background-color: ghostwhite">
                                                        <div class="col-3  col-md-1 p-0">
                                                            <img src="
                                @isset($user->profile->image)
                                    {{ $user->profile->image }}
                                @else
                                    /images/users/defaultImage.png
                                @endisset"
                                                                width="72px" height="72px"
                                                                class=" rounded-circle dropdown-toggle" href="#"
                                                                id="navbarDropdownMenuLink" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                        </div>
                                                        <div class="col-9  col-md-11 p-0">
                                                            <div class="header-box  ">
                                                                <div class="d-flex align-items-center ">
                                                                    <div class="info me-sm-3  me-md-4 me-lg-2  py-3">
                                                                        <h1 class="text-primary fs-5 mb-1">
                                                                            @isset($user->name)
                                                                                {{ $user->name }}
                                                                            @endisset
                                                                        </h1>
                                                                        <p class="m-0">
                                                                            @isset($reply->created_at)
                                                                                {{ $reply->created_at }}
                                                                            @endisset
                                                                            @isset($user->role)
                                                                                @if ($user->role < 2)
                                                                                    <span
                                                                                        class="badge second-bg ml-1 position-absolute">مدرب</span>
                                                                                @endif
                                                                            @endisset
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="box-body pl-4 mb-3">
                                                                <p>
                                                                    @isset($reply->content_format)
                                                                        @foreach ($reply->content_format as $txt)
                                                                            @foreach ($txt as $t)
                                                                                @if (filter_var($t, FILTER_VALIDATE_URL))
                                                                                    <a style="color:blue;" target="_blank"
                                                                                        href="{{ $t }}">{{ $t }}</a>
                                                                                @else
                                                                                    {{ $t }}
                                                                                @endif
                                                                            @endforeach
                                                                            <br>
                                                                        @endforeach
                                                                    @endisset
                                                                </p>
                                                            </div>
                                                            @if ($user->id == Auth::id())
                                                            <div class=" row d-flex justify-content-end">
                                                                    <span class="d-flex justify-content-end">
                                                                        <button class="btn more-link btn-primary  border-0 edit-reply" data-reply_id={{$reply->id}} data-reply_content="{{$reply->content}}"   data-toggle="modal" data-target="#editReply">
                                                                        تعديل <i class=" mdi  mdi-square-edit-outline "
                                                                                style=" line-height: 20px;  margin: auto; "></i>
                                                                        </button>
                                                                            <button type="button" class="btn more-link btn-secondary border-0 mr-1 delete-reply " data-reply_id={{$reply->id}} data-toggle="modal" data-target="#deletreply">
                                                                                حذف<i class=" mdi mdi-delete"
                                                                                       style=" line-height: 20px;  margin: auto; "></i>
                                                                               </button>
                                                                    </span>

                                                            </div>
                                                        @endif
                                                        </div>
                                                    </div>
                                                @break

                                            @endif
                                        @endisset
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endisset
                    <form action="{{ route('course-inquiries-store') }}" class="form-disable" method="post">
                        @csrf
                        @isset($courseId)
                            <input type="hidden" name="courseId" value="{{ $courseId }}">
                        @endisset
                        <div class="form-group p-0  mt-4">
                            <label for="exampleFormControlTextarea3">اضافة استفسار </label>
                            <textarea class="form-control" id="exampleFormControlTextarea3" name="content" rows="7"
                                placeholder="اضافة استفسار ..."></textarea>
                        </div>
                        <div class="p-0">
                            <button class="more-link btn-primary btn-read-more border-0 form-btn-disable"
                                style="font-size: 16px;">ارسال</button>
                        </div>
                    </form>
            </div>
        </div>




</div>
</div>


@include('courses.modal.delete-inquiry')
@include('courses.modal.delete-reply')
@include('courses.modal.edit-inquiry')
@include('courses.modal.edit-reply')
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/modal/submit-disable.js')}}"> </script>
<script src="{{asset('assets/js/modal/confirm-delete.js')}}"></script>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/modal/inquiry-reply.js')}}"></script>


@endsection

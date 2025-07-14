<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-start mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
       <!--  </li> -->
        <!-- <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('assets/images/flags/ar.jpg')}}" alt="user-image" class="me-0 me-sm-1" height="12">
                <span class="align-middle d-none d-sm-inline-block">عربي</span> <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">
 -->
                <!-- item-->
               <!--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('assets/images/flags/us.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                </a>



            </div> -->
       <!--  </li> -->

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                @isset(Auth::user()->notificationTo)
                @foreach(Auth::user()->notificationTo as $notification)
                @if($notification->is_seen == -1)
                <span class="noti-icon-badge"></span>
                @break
                @endif
                @endforeach
                @endisset
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title d-flex justify-content-between align-items-center">
                    <h5 class="m-0">
                        <span class="float-start">

                        </span>الإشعارات
                    </h5>
                        @isset(Auth::user()->notificationTo)
                        @foreach(Auth::user()->notificationTo as $notification)
                        @if($notification->is_seen == -1)
                        <a href="{{route('clear_notification')}}" title="تنظيف جميع الاشعارات"><i class="mdi mdi-broom h3 m-0"></i></a>
                        @break
                        @endif
                        @endforeach
                        @endisset
                </div>

                <div style="max-height: 230px;" data-simplebar="">
                    <!-- item-->
                    @isset(Auth::user()->notificationTo)
                    @foreach(Auth::user()->notificationTo as $notification)
                    @if($notification->is_seen==-1)
                    <!-- <a href="{{route('makeNotificationSeen', $notification->id)}}" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div> -->
                        <!-- <p class="notify-details">تم اضافة مزاد جديد
                            <small class="text-muted">قبل 1 دقيقة</small>
                        </p> -->
                        <!-- <p class="notify-details">{{$notification->content}}
                            <small class="text-muted">قبل 1 دقيقة</small>
                        </p>
                    </a> -->
                    <a href="{{route('makeNotificationSeen', $notification->id)}}" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <img src="@isset($notification->fromUser->profile->image) {{$notification->fromUser->profile->image}} @else /images/users/defaultImage.png @endisset" class="img-fluid rounded-circle" alt="">
                        </div>
                        <p class="notify-details">{{ $notification->fromUser->name }}</p>
                        {{-- <p class="notify-details">{{ Auth::user()->name }}</p> --}}
                        <p style="padding-right: 46px;" class="text-muted mb-0 user-msg">
                            <small>{{$notification->content}}</small>
                        </p>
                        <p class="notify-details">
                            <small class="text-muted">@isset($notification->created_at) {{$notification->created_at}} @endisset</small>
                        </p>
                    </a>
                    @endif
                    @endforeach
                    @endisset

                </div>



            </div>
        </li>



        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="@isset(Auth::user()->profile->image){{Auth::user()->profile->image}}@else /images/users/defaultImage.png @endisset" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{ Auth::user()->name }}</span>
                    <span class="account-position">
                        @if(Auth::user()->role==0)
                        مسؤول النظام
                        @elseif(Auth::user()->role==1)
                        مدرب
                        @elseif(Auth::user()->role==2)
                        مستخدم
                        @else
                        غير معروف
                        @endif
                    </span>


                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                 <a href="{{route('index')}}" class="dropdown-item notify-item">
                    <i class="uil-home-alt me-1"></i>
                    <span> الصفحة الرئيسية</span>
                </a>
                <a href="{{route('edit_profile')}}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>إعدادات الحساب</span>
                </a>

                <!-- item-->

                <!-- item-->
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>تسجيل الخروج</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
    {{-- <div class="app-search dropdown d-none d-lg-block">
        <form>
            <div class="input-group">
                <input type="text" class="form-control dropdown-toggle" placeholder="بحث..." id="top-search">
                <span class="mdi mdi-magnify search-icon"></span>
                <button class="input-group-text btn-primary" type="submit">بحث</button>
            </div>
        </form>

        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
            <!-- item-->
            <div class="dropdown-header noti-title">
                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
            </div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-notes font-16 me-1"></i>
                <span>Analytics Report</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-life-ring font-16 me-1"></i>
                <span>How can I help you?</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-cog font-16 me-1"></i>
                <span>User profile settings</span>
            </a>

            <!-- item-->
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
            </div>

            <div class="notification-list">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="d-flex">
                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                        <div class="w-100">
                            <h5 class="m-0 font-14">Erwin Brown</h5>
                            <span class="font-12 mb-0">UI Designer</span>
                        </div>
                    </div>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="d-flex">
                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                        <div class="w-100">
                            <h5 class="m-0 font-14">Jacob Deo</h5>
                            <span class="font-12 mb-0">Developer</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div> --}}
</div>

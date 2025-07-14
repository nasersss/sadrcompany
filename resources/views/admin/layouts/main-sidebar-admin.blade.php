<div class="leftside-menu">

    <!-- LOGO -->
    {{-- <a href="{{route('index')}}" class="logo text-center logo-light"> --}}
        <a href="{{route('index')}}" class="logo text-center logo-light">
            <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-dash.png')}}" alt="" height="40">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('assets/images/logo_sm.png')}}" alt="" height="30">
                    </span>
    </a>

    <!-- LOGO -->
    <a href="{{route('index')}}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-dash.png')}}" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('assets/images/logo_sm.png')}}" alt="" height="16">
                    </span>
    </a>
    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">لوحة التحكم</li>
            <li class="side-nav-item">
                <a href="{{route('superAdmin')}}" class="side-nav-link">
                     <i class="mdi mdi-application-settings"></i>
                    <span>لوحة التحكم</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="dripicons dripicons-photo-group"></i>
                    {{-- <i class="mdi mdi-car-back"></i> --}}
                    <span> الأعمال </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('list_works')}}">عرض  الاعمال</a>
                        </li>
                        <li>
                            <a href="{{route('add_work')}}">إضافة عمل جديد</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> المستخدمين </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('list-user')}}">عرض المستخدمين</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#trainer" aria-expanded="false" aria-controls="trainer" class="side-nav-link">
                    <i class="dripicons dripicons-user"></i>
                    {{-- <i class="mdi mdi-car-back"></i> --}}
                    <span> المدرين </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="trainer">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('trainers_list')}}">عرض  المدربين</a>
                        </li>
                        <li>
                            <a href="{{route('trainers_create')}}">إضافة وصف المدرب</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#course" aria-expanded="false" aria-controls="course" class="side-nav-link">
                    <i class="dripicons dripicons-device-desktop"></i>
                    {{-- <i class="mdi mdi-car-back"></i> --}}
                    <span> الدورات </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="course">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('courses_list')}}">عرض  الدورات</a>
                        </li>
                        <li>
                            <a href="{{route('courses_create')}}">إضافة دورة</a>
                        </li>
                        <li>
                            <a href="{{route('listUnActiveStudentsCourses')}}">استعراض طلبات الاشتراك</a>
                        </li>
                        <li>
                            <a href="{{route('course_review')}}">استعراض الدورات مع الطلاب</a>
                        </li>
                    </ul>
                </div>
            </li>
{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">--}}
{{--                    <i class="uil-envelope"></i>--}}
{{--                    <span> التقارير </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarPages">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="#">تقارير يومية</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">تقارير اسبوعية</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">تقارير شهرية</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="uil uil-comment-message"></i>
                    <span> التعليقات  </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">

                        <li>
                            <a href="{{ route('list_display_comments') }}"> التعليقات الظاهرة للمستخدمين </a>
                        </li>
                        <li>
                            <a href="{{ route('list_user_comment') }}">  تعليقات المستخدمين  </a>
                        </li>
                        <li>
                            <a href="{{ route('add_display_comment') }}"> اضافة تعليق جديد</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                    <i class="dripicons dripicons-article"></i>
                    <span>المقالات</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('list_posts')}}">عرض جميع المقالات </a>
                        </li>
                        <li>
                            <a href="{{route('add_post')}}">إضافة مقال  </a>
                        </li>
                        <li>
                            <a href="{{route('list_post_category')}}">عرض أصناف المقالات </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                               <a data-bs-toggle="collapse" href="#subscribe" aria-expanded="false" aria-controls="subscribe" class="side-nav-link">
                                   <i class="uil-envelope"></i>
                                   <span> رسالة الإشتراك </span>
                                   <span class="menu-arrow"></span>
                              </a>
                               <div class="collapse" id="subscribe">
                                   <ul class="side-nav-second-level">
                                       <li>
                                           <a href="{{route('settings_list')}}"> عرض رسالة الاشتراك</a>
                                       </li>


                                   </ul>
                               </div>
                           </li>
{{--            <li class="side-nav-item">--}}
{{--                <a href="#" class="side-nav-link">--}}
{{--                    <i class="uil-database"></i>--}}
{{--                    <span>نسخة احتياطية </span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a href="#" class="side-nav-link">--}}
{{--                    <i class="dripicons-gear"></i>--}}
{{--                    <span>الإعدادات</span>--}}
{{--                </a>--}}
{{--            </li>--}}







        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->



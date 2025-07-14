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
                <a href="{{route('dash-user')}}" class="side-nav-link">
                   
                      <i class="mdi mdi-application-settings"></i>
                    <span>لوحة التحكم</span>
               
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-file-alt"></i>
                    <span> الدورات  </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('subscribedCourses')}}">الدورات المشترك فيها</a>
                        </li>
                        <li>
                            <a href="{{route('completedCourses')}}">الدورات اللتي اكماتها</a>
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


            <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->



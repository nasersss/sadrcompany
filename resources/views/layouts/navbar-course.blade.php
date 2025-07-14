<nav class="navbar navbar-expand-lg navbar-light main-Bg navbar-my  pl-5 pr-5">
    <div class="container-fluid">
        <div>
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/img/logo/Logo.png') }}"
                    style="width:100px" alt=""></a>
        </div>
        <button class="navbar-toggler text-light main-bg border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
            aria-label="Toggle navigation">
            <span><i class="fas fa-bars pt-2 ml-2" style="font-size:25px;"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <div  class="px-5  d-flex flex-column align-items-start  flex-lg-row align-items-lg-center  justify-content-between w-100">
                <ul class="navbar-nav mb-2 mb-lg-0 navbar-nav-my en-text-left">
                    <li class="nav-item  mx-3">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('index') }}">{{ __('home.home') }}</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{ route('about') }}">{{ __('home.about') }}</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{ route('services') }}">{{ __('home.service') }}</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{ route('works') }}">{{ __('home.work') }}</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{ route('course') }}">{{ __('home.courses') }}</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{ route('home_posts') }}">{{ __('home.posts') }}</a>
                    </li>
                </ul>
                @guest
                    <div class=" py-4 py-lg-0">
                        <a href="{{ route('login') }}" class="second-bg login-a border-0 text-light fw-bold">
                            {{ __('home.login') }}
                        </a>
                    </div>
                @else
                    <div class="rounded-circle"  style=" height: 40px; width: 40px; border: 4px solid #c97f5f;">
                        <img src="@isset(Auth::user()->profile->image) {{ Auth::user()->profile->image }}@else /images/users/defaultImage.png @endisset"
                            class="w-100 h-100 rounded-circle dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <ul class="dropdown-menu text-end nav-en nav-ar main-bg rounded-0"
                            aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('profile') }}" class="dropdown-item notify-item text-white main-bg-hover">
                                <i class="mdi mdi-account-circle me-1"></i> الملف الشخصي</a>

                            <a href="
                            @isset(Auth::user()->role)
                                @if (Auth::user()->role == 0)
                                    {{ route('superAdmin') }}
                                @elseif (Auth::user()->role == 1)
                                    {{ route('admin') }}
                                @else
                                    {{ route('dash-user') }}
                                @endif
                            @endisset
                            " class="dropdown-item notify-item text-white main-bg-hover">
                                <i class="mdi mdi-application-settings"></i> لوحة التحكم</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"
                                class="dropdown-item notify-item text-white main-bg-hover">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>تسجيل الخروج</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </ul>

                    </div>
                @endguest
            </div>
        </div>

    </div>
</nav>

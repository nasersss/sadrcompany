@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="assetsassets/images/favicon.ico"> --}}

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app-dark.min.ar.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="{{asset('assets/css/app.min.ar.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body id="ar" class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    <div class="auth-fluid ">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <a href="{{route('index')}}" class="logo-dark">
                            <span><img src="assets/images/BlogonDark.png" alt="" height="18"></span>
                        </a>
                        <a href="{{route('index')}}" class="logo-dark">
                            {{-- <span><img src="assets/images/logo.png" alt=""></span> --}}
                        </a>
                    </div>
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session()->get('error') }} </strong>
                    </div>
                    @endif

                    <!-- title-->
                    <h4 class="mt-1 heading">تسجيل الدخول</h4>
                    <p class="text-muted ">فضلا قم بتسجيل الدخول بحسابك لتستطيع  التفاعل مع المنصة</p>

                    <!-- form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">البريد الاكتروني</label>
                            <input class="form-control" type="email" id="emailaddress" required="" placeholder="ادخل بريدك الاكتروني" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                <strong> خطأ -</strong>{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input class="form-control" type="password" id="password" placeholder="ادخل كلمة المرور" name="password" required autocomplete="current-password">
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                <strong>خطأ -</strong>{{ $message }}
                            </div>
                            @enderror
                            <a href="{{ route('password.request') }}" class="text-muted float-end"><small>هل نسيت كلمة المرور؟</small></a>
                        </div>

                        <div class="mb-3">
                            {{-- <div class="form-check">
                                <input type="checkbox" class="form-check-input checkBox" id="checkbox-signin" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkbox-signin">تذكرني</label>
                            </div> --}}
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary text-light" type="submit"><i class="mdi mdi-login"></i> تسجيل الدخول </button>
                        </div>

                        {{-- <!-- social-->
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">تسجيل حسابك بواسطة</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-instagram"></i></a>
                                </li>
                            </ul>
                        </div> --}}
                        {{-- <footer class="footer footer-alt bg-white"> --}}
                            @if (Route::has('password.request'))
                            <!-- {{ route('password.request') }} -->
                            <p class="text-muted mt-3">لا تمتلك اي حساب قم بانشاء حسابك الان ؟ <a href="{{ route('register') }}" class="text-muted ms-1"><b>انشاء حساب</b></a></p>
                            @endif
                        {{-- </footer> --}}
                    </form>
                    <!-- end form-->

                    <!-- Footer-->


                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid auth-fluid-right text-center main-bg">

        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>

</html>

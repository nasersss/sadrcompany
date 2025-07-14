<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>اعادة تعيين كلمة المرور</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
    content="شركة رائدة في تقديم الخدمات الهندسية والإعلانية,نعمل بأعلى مستويات الجودة وبإشراف طاقم ذو خبرة وكفاءة عالية"/>
    <meta name="keywords"  content="التصميم الهندسي,
    ,التصاميم, والمخططات المعمارية والتنفيذية,التصميم الجرافيكي
    ,تصميم هوية الشركات, تصميم الكتب,تصميم الأغلفة,تصميم المجلات
        ,التصميم الداخلي
    ,تصميم الديكور, تصيم الاثاث بطريقة عصرية
        الموشين جرافيك
    "/>
    <meta name="author" content="Go Up"/>
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app-dark.min.ar.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="{{asset('assets/css/app.min.ar.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <a href="{{route('index')}}" class="logo-dark">
                            <span><img src="../../assets/images/BlogonDark.png" alt="" height="18"></span>
                        </a>
                        <a href="{{route('index')}}" class="logo-light">
                            <span><img src="../../assets/images/BlogonDark.png" alt="" height="18"></span>
                        </a>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">إعادة تعيين كلمة المرور</h4>
                    <p class="text-muted mb-1">أدخل عنوان بريدك الإلكتروني وسنرسل إليك ارشادات عبر البريد الاكتروني تحتوي على تعليمات لإعادة تعيين كلمة المرور الخاصة بك.</p>

                    <!-- form -->
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-1">
                            <label for="emailaddress" class="form-label">البريد الاكتروني</label>
                            <input class="form-control" type="email" id="emailaddress" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="ادخل بريدك الاكتروني">
                            @error('email')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input class="form-control" type="password" name="password" required autocomplete="new-password" id="password" placeholder="ادخل كلمة المرور">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="password" class="form-label"> تاكيد كلمة المرور</label>
                            <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" id="password" placeholder="تاكيد كلمة المرور ">
                        </div>
                        <div class="mb-0 text-center d-grid">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-lock-reset"></i> إعادة تعيين كلمة المرور </button>
                        </div>
                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    <footer class="footer footer-alt bg-white">
                        <p class="text-muted">العودة الى <a href="{{ route('login') }}" class="text-muted ms-1"><b>تسجيل الدخول</b></a></p>
                    </footer>

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

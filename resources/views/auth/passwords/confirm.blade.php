@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>انشاء حساب</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
            content="شركة رائدة في تقديم الخدمات الهندسية والإعلانية,نعمل بأعلى مستويات الجودة وبإشراف طاقم ذو خبرة وكفاءة عالية" />
        <meta name="keywords"
            content="التصميم الهندسي,
    ,التصاميم, والمخططات المعمارية والتنفيذية,التصميم الجرافيكي
    ,تصميم هوية الشركات, تصميم الكتب,تصميم الأغلفة,تصميم المجلات
        ,التصميم الداخلي
    ,تصميم الديكور, تصيم الاثاث بطريقة عصرية
        الموشين جرافيك
    " />
        <meta name="author" content="Go Up" />
        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}

        <!-- App css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-dark.min.ar.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
        <link href="{{ asset('assets/css/app.min.ar.css') }}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
                            <!-- Logo -->
                            <div class="auth-brand text-center text-lg-start">
                                <a href="{{ route('index') }}" class="logo-dark">
                                    <span><img src="assets/images/BlogonDark.png" alt="" height="18"></span>
                                </a>
                                <a href="{{ route('index') }}" class="logo-light">
                                    <span><img src="assets/images/logo.png" alt="" height="18"></span>
                                </a>
                            </div>
                            <div class="mb-1">
                                <label for="password" class="form-label">كلمة المرور</label>
                                <input class="form-control" type="password" name="password" required
                                    autocomplete="new-password" id="password" placeholder="ادخل كلمة المرور">
                                @error('password')
                                    <span class="alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-0 d-grid text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-account-circle"></i> انشاء
                                    حساب </button>
                            </div>
                            <!-- social-->

                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt bg-white">
                            <p class="text-muted">هل تمتلك حساب بالفعل سجل دخولك الان <a href="{{ route('login') }}"
                                    class="text-muted ms-1"><b>سجل حسابك الان</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <!-- Auth fluid right content -->
            <div class="auth-fluid auth-fluid-right text-center main-bg">

            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <!-- <script src="assets/js/vendor.min.js"></script>
                <script src="assets/js/app.min.js"></script> -->

    </body>

    </html>

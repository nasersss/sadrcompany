<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>تاكيد الايميل</title>


    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                            <span><img src="{{asset('assets/images/BlogonDark.png')}}" alt="" height="50"></span>
                        </a>
                        <a href="{{route('index')}}" class="logo-light">
                            <span><img src="assets/images/logo.png" alt=""></span>
                        </a>
                    </div>

                    <!-- email send icon with text-->
                    <div class="text-center m-auto">
                        <img src="{{asset('assets/images/mail_sent.svg')}}" alt="mail sent image" height="64" />
                        <h4 class="text-dark-50 text-center mt-4 fw-bold">يرجى تاكيد الايميل</h4>
                        <p class="text-muted mb-4">
                            {{__('auth.massage_email')}}
                            <b>{{ Auth::user()->email }}</b>

                        </p>
                    </div>
                    @if(Auth::user()->email_verified_at===null && !session('resent'))
                    <div class="alert alert-danger" role="alert">
                        {{__('auth.notify_email')}}
                    </div>
                    @endif
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('auth.verify_email') }}
                    </div>
                    @endif
                    لم تستلم الايميل ؟؟
                    <!-- form -->
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="mb-0 d-grid text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i> اضغط هنا لاعادة ارسال رسالة جديدة </button>
                        </div>
                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    <footer class="footer footer-alt bg-white">

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
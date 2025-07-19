<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/errorpage.css">
    <link rel="stylesheet" href="/assets/css/notFound.css">
    <title>@yield('title')</title>

</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="error-msg">
                <div class='error-img'>
                    <img src="/assets/images/error/error.png" alt="">
                </div>
                <div class="content">
                    <div class="title">
                        <h1>@yield('message-title')</h1>
                        <h4>@yield('message')
                            {{ __('error-page-handel.explain-message') }}
                        </h4>


                    </div>
                </div>
                <a href="{{ route('index') }}" class="btn btn-primary text-white btn-home-back">
                    <span>{{ __('home.home') }}</span>
                </a>
            </div>

        </div>

    </div>
</body>

</html>

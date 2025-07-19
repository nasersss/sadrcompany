<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/errorpage.css">
    <link rel="stylesheet" href="/assets/css/notFound.css">

    <title>error</title>
</head>

<body>
    <div class="container">
        <div class="error-msg">
            <div class='error-img'>
                <img src="/assets/images/error/error.png" alt="">
            </div>
            <h1>@isset($error_title){{$error_title}}@else{{__('message.error_public_title')}}@endisset</h1>
            <h4>@isset($error_body){{$error_body}}@else{{__('message.error_not_find_body')}}@endisset</h4>

            <a href="{{ route('index') }}" class="btn btn-primary text-white btn-home-back">
                <span>{{__('home.home')}}</span>
            </a>
        </div>

    </div>
</body>

</html>

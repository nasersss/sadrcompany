<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: "Helvetica AR";
            src: url({{asset('assets/fonts/alfont_com_AlFont_com_helveticaneueltarabicroman1.ttf')}});
            src: url({{asset('assets/fonts/helveticaneuelt-arabic-55-roman.ttf')}});
        }
    </style>
</head>
<body style="background-image: url('{{asset('assets/images/360_F_302886316_WamcFr1AD9oTIL5Kfm2uWMZ4crfqbhYy.jpg')}}');
                background-repeat:no-repeat;
                background-size: 100vw 100vh">
    @include('message')
    <!-- About Start -->
        <div class="w-100 d-flex flex-column">
            <p class="m-auto" style="font-size: 10vw; padding: 10vh 0 0 0">&#x26D4;</p>
            <p class="m-auto text-danger" style="font-size: 10vw; padding: 0 0 10vh 0">حسابك موقف</p>
            <a href="{{route('index')}}" class="btn btn-danger m-auto rounded-0" style="width: 100px;">الرئيسية</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

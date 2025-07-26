<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="من أول سطر نرسم رؤية هندسية إبداعية
    تصاميــم | تراخيــص | إشـــراف | تنفيـــذ" />
    <meta name="keywords"
        content="التصميم الهندسي,
    ,التصاميم, والمخططات المعمارية والتنفيذية
    ,التراخيص الهندسية,التراخيص الهندسية في السعودية,
    ,التراخيص الهندسية في الرياض,
    تصاميــم , تراخيــص,إشـــراف, تنفيـــذ
        ,التصميم الداخلي
    " />
    <meta name="author" content="Go Up" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/assets/img/image/As2.png') }}" />
    <link rel="shortcut" href="{{ asset('/assets/img/image/As2.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('/assets/img/image/As2.png') }}" />
    <!--
    for facebook sharing
    -->
    <meta property="og:title" content="sadrcompany" />
    <meta property="og:description"
        content="من أول سطر نرسم رؤية هندسية إبداعية
    تصاميــم | تراخيــص | إشـــراف | تنفيـــذ" />
    <meta property="og:image" content="{{ asset('/assets/img/4844_Page_02.jpg') }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:url" content="https://sadrcompany.com/" />
    <meta property="og:type" content="website" />
    <!-- for facebook twitter -->

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@sadrcompanyy" />
    <meta name="twitter:creator" content="@AL_Ghaithweb" />
    <meta property="og:url" content="https://sadrcompany.com/" />
    <meta property="og:title" content="sadrcompany" />
    <meta property="og:description"content="من أول سطر نرسم رؤية هندسية إبداعية
    تصاميــم | تراخيــص | إشـــراف | تنفيـــذ" />
    <meta name="twitter:image:src" content="{{ asset('/assets/img/4844_Page_02.jpg') }}" />

    {{-- page css files or code  --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">



    <link href="{{ asset('assets/css/addcomment.css') }}" rel="stylesheet">

    {{-- page css files or code !!!! --}}
    <title>إضافة تعليق</title>

    {{-- content of page  --}}
    <div id="thanks">
        <span class="close" style="">&times;</span>
        <p style="font-size:20px;">شكرا لوقتك معنا</p>
    </div>
    <div class="loginPup " style="padding: 5px;">
        <div id="my-modal" class="modal" style="padding: 5px;">
            <div class="modal-content" style="padding: 10px;">
                <div class="modal-header">
                    <div class="img" style="width:45%">
                        <img src="{{ asset('/assets/img/logo/Logo2.png') }}" alt="logo">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        @include('message')

                        <form method="POST" action="{{ route('save_user_comment') }}" class="form-disable"
                            id="form" dir="rtl">
                            @csrf
                            <div class="inputBox">
                                <label for="name">الاسم</label>
                                <br>
                                <input name="name" type="text" maxlength="30" id="name"
                                    placeholder="ادخل اسمك هنا " required>
                            </div>
                            <div class="inputBox">
                                <label for="msg">التعليق:</label>
                                <br>
                                <textarea name="comment" id="msg" maxlength="300"placeholder=" اكتب تعليقك... " required></textarea>
                            </div>
                            <button id="btn" class="form-btn-disable"> إرسال التعليق </button>
                        </form>

                    </div> <!--<div class="content" id="content" dir="rtl">-->
                </div>
                <!--<a class href="../login/login.php"style="color:#fff;" target="_blank"> <button style="background-color: #b59276;margin-bottom: 10px;" > إنشاء حساب لدينا</buttom></a>-->

            </div>
        </div>
        <div>

        </div>
        <script>
            // Get DOM Elements

            const modal = document.querySelector('#my-modal');
            //  const modalBtn = document.querySelector('#modal-btn');
            const closeBtn = document.querySelector('.close');
            const reload = document.querySelector('#reload');



            // Events
            addEventListener("load", openModal);
            //  modalBtn.addEventListener('click', openModal);
            closeBtn.addEventListener('click', closeModal);
            //  window.addEventListener('click', outsideClick);

            // Open
            function openModal() {
                modal.style.display = 'block';
            }


            // Close
            function closeModal() {
                modal.style.display = 'none';
                window.close();
            }
        </script>
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/modal/submit-disable.js') }}"></script>
        <script src="{{ asset('assets/js/modal/confirm-delete.js') }}"></script>

        <!-- third party js -->
        <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script>

        </body>

</html>

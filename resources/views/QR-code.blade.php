
    <style>
        #qrcode {
            width:100%;
            height:100%;
            /* margin-top:15px; */
        }

        #qrcode img{
            display: none !important;
        }

        #qrcode canvas{
            background: #00000000;
            width: 100%;
            height: 100%;
            display: block !important;
        }
    </style>


    <input id="text" type="hidden" value="{{route('printCertificate',[$courseId,$studentId])}}"/>
    <div id="qrcode"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script>
        var qrcode = new QRCode("qrcode",{
     width: 128,
    height: 128,
    colorDark : "#1c385e",
    colorLight : "transparent",
    correctLevel : QRCode.CorrectLevel.H
});

        function makeCode () {
            var elText = document.getElementById("text");

            // if (!elText.value) {
            //     alert("Input a text");
            //     elText.focus();
            //     return;
            // }

            qrcode.makeCode(elText.value);
        }

        makeCode();

        // $("#text").
        // on("blur", function () {
        //     makeCode();
        // }).
        // on("keydown", function (e) {
        //     if (e.keyCode == 13) {
        //     makeCode();
        //     }
        // });
    </script>

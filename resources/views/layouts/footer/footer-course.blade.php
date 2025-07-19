</div>
<!-- Footer Start -->
<div class="footer wow fadeIn mt-0 pt-3 main-Bg" data-wow-delay="0.3s">
    <div class="container">
        <div class="content ">
            <div class="item logofooter">
                <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logo/Logo2.png') }}"
                        alt="footer logo image"></a>
            </div>
            <div class="item list">
                <ul>
                    <a href="{{ route('index') }}">
                        <li>{{ __('home.home') }}</li>
                    </a>
                    <a href="{{ route('about') }}" target="_blank">
                        <li>{{ __('home.about') }}</li>
                    </a>
                    <a href="{{ route('services') }}">
                        <li>{{ __('home.service') }}</li>
                    </a>
                    <a href="{{ route('works') }}">
                        <li>{{ __('home.work') }}</li>
                    </a>
                </ul>
            </div>
            <div class="item contac">
                <h4>{{ __('home.contact') }}</h4>
                <ul>
                    <li><span><img src="{{ asset('assets/img/sotioal/Email.png') }}" alt="Email image">
                        </span>Sadrcompanyy@gmail.com</li>
                    <li><span><img src="{{ asset('assets/img/sotioal/phon.png') }}" alt="phone image">
                        </span>6555087348
                        967+</li>
                    <li><span><img src="{{ asset('assets/img/sotioal/location.png') }}" alt="location image">
                        </span>Under sky , Above Earth </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<div class=" copyright text-center bg-dark text-white py-2">
    <a href="#first" class="back-to-top" style="font-size:25px;"><i class="fa fa-chevron-up"></i></a>
    <p class="font-rale font-size-14">Copyrights SadrCompany 2022&copy;. Desing By <br> <a href="https://goupdev.net"
            class="second-c">goup dev</a></p>
</div>

<script src="{{ asset('/assets/scriptfilter.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/modal/submit-disable.js') }}"></script>
<script src="{{ asset('assets/js/modal/confirm-delete.js') }}"></script>


<script>
    $(document).on('click', 'ul li ', function() {
        $(this).addClass('active').siblings().removeClass('active');
    });
</script>

<!-- JavaScript Libraries -->

<script src="{{ asset('/assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('/assets/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('/assets/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('/assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('/assets/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('/assets/lib/slick/slick.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('/assets/js/main.js') }}"></script>
<script src="{{ asset('/assets/js/javascript.js') }}"></script>
<script src="{{ asset('/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
    integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
</script>
<!-- !start #footer -->

<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!--  isotope plugin cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
    integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

<!-- Custom Javascript -->
<script src="{{ asset('/assets/js/index.js') }}"></script>
</body>

</html>

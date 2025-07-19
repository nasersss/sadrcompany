<!-- Portfolio Start -->
<div class="works" id="portfolio">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="main-c  text-title pt-2 pb-2">{{ __('home.work') }}</h2>
        </div>
    </div>
    <!-- filter box -->
    <div class="filter-box">
        <ul style="justify-content: center;">
            <!--<li >-->
            <!--    <a href="#" class="btn " data-filter="all">All</a>-->
            <!--</li>-->
            <li class="active">
                <a href="#" class="btn btn-work" data-filter="first">{{ __('home.arch_title') }}</a>
            </li>
            <li>
                <a href="#" class="btn btn-work" data-filter="second">{{ __('home.interior_title') }}</a>
            </li>
            {{-- <li>
                <a href="#" class="btn btn-work" data-filter="third">{{ __('home.supervision_title') }}</a>
            </li>
            <li>
                <a href="#" class="btn btn-work" data-filter="fourth">{{ __('home.motion_title') }}</a>
            </li> --}}
        </ul>
    </div>
    <!-- filter box -->
</div>
<div class="scrol-work" style=" padding: 0;">
    <div class="slide-container" style="">
        <section class="container" id="slider" style="margin: 0px auto;justify-content: flex-start;">

            <img id="slide-left" class="arrow arrow-left" src="{{ asset('/assets/img/arrow-left.png') }}"
                style="left: 0;">
            @foreach ($works as $work)
                @if ($work->is_active == 1)
                    @isset($work->item_brand)
                        @if ($work->item_brand === 'fourth')
                            <div class="thumbnail   col-lg-7  col-sm-12 fourth">
                                <video src="@isset($work->image)images/works/{{ $work->image }}@endisset"
                                    controls style="width:100%"></video>
                            </div>
                        @else
                            <div class="thumbnail  col-lg-4 col-md-6 col-sm-12 col-12 {{ $work->item_brand }}">
                                <a href="@isset($work->image)images/works/{{ $work->image }}@endisset"
                                    data-lightbox="portfolio">
                                    <img src="@isset($work->image)images/works/{{ $work->image }}@endisset"
                                        alt="product1" class="img-fluid">
                                </a>
                            </div>
                        @endif
                    @endisset
                @endif
                {{-- end if condition to check of work is active --}}
            @endforeach
            {{-- end for each --}}

            <img id="slide-right" class="arrow arrow-right" src="{{ asset('/assets/img/arrow-right.png') }}"
                alt="row-left" style="position: absolute;top: 50%;z-index: 1000;right:0">
        </section>
    </div>

</div>


<!-- Portfolio end -->

 <!-- Testimonial Start -->
<div class="testim mt-5 mb-0">
    <div class="container">
        <div class="section-header text-center main-Bg pt-3 pb-2">
            <h2 class="text-title w-c" >{{__('home.ourclient')}}</h2>
        </div>
    </div>
    <div dir="ltr" id="testimonial" class="testimonial wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider-nav"></div>
                </div>
            </div>
            <div class="row">
                  <div class="col-12">
                      <div class="testimonial-slider ">
                          <!-- Special Price -->
                        @foreach($comments as $comment)
                        @if ($comment->is_active == 1)
                        <div class="slider-item">
                            <div class="comment">
                                <div class="cardComment">
                                    <div class="cardComment-header mt-2">
                                        <div class="cuser">
                                            <i class="fas fa-user-circle user main-c mr-2 "></i>
                                        </div>
                                        <div class="content pt-2" style="width:70%;">
                                            <h3 class="main-c pr-2">@isset($comment->name){{$comment->name;}}@endisset</h3>
                                            <h4 class="second-c pr-2">
                                                    @if (config('locales.languages')[app()->getLocale()]['lang'] == 'ar')
                                                    @isset($comment->title_ar) {{$comment->title_ar}}@endisset
                                                    @else
                                                    @isset($comment->title_en) {{$comment->title_en}}@endisset
                                                    @endif
                                                <br />

                                            </h4>
                                        </div>
                                        <div class="steart " style="width:30%;padding-left:10px">
                                            @php for($i=$comment->star;$i>0;$i--){
                                                echo '
                                            <i class="fas fa-star start" style="text-algin:leftt;color: color: #f7bf07;"></i>';
                                            }
                                        @endphp
                                            </div>
                                    </div>
                                    <div class="cardComment-comment p-3">
                                        <i class="fas fa-quote-right comment-right second-c"style=" padding: 0px 5px 5px 5px;font-size:25px;float: right;"></i>
                                            <p class=" main-c" style="color:#35537D;">
                                            <br>
                                            @if (config('locales.languages')[app()->getLocale()]['lang'] == 'ar')
                                            @isset($comment->comment_ar){{$comment->comment_ar}}@endisset
                                            @else
                                            @isset($comment->comment_en){{$comment->comment_en}}@endisset
                                            @endif
                                        </p>
                                            <i class="fas fa-quote-left comment-left second-c" style=" padding: 0px 5px 5px 5px;font-size:25px;float: left; margin-top: -20px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    <!-- !Special Price -->
    </div>
</div>
</div>
</div>
</div>
</div>

 <div class="owl-carousel owl-theme owl-loaded owl-drag">
<div class="owl-dots">
      <span role="button" class="owl-dot">
      <span></span></span>
      <span role="button" class="owl-dot active" >
      <span style="background:#35537D; border-radius: 50%;"></span></span>
      <span role="button" class="owl-dot">
      <span></span></span>
</div>
</div>
</div> 
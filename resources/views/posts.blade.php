 <!-- posts Start -->
 <div class="service  mb-3 " >
   <div class="container-fluid">
   <div class="container" >
       <div class="section-header text-center">
           <h2 class="w-c text-title">{{__('home.posts')}}</h2>
       </div>
       <div class="row wow slideInRight" data-wow-duration="1s" data-wow-delay="0s">
         @foreach ($posts as $post)

         <div class="col-md-6 ">
            <div class="row news-lg mx-0 mb-3">
                <div class="col-lg-6 col-md-12 px-0 bg-white" style="height: auto">
                    @foreach($post->postImage as $image)
                                    @php
                                    $im = explode('_',$image->image);
                                    @endphp
                                    @if($im[1]=='main')
                                        <img   src="{{asset('/images/posts/'.$image->image)}}" class="img-fluid" style="width: auto;height: 300px;">
                                    @endif
                                    @endforeach
                </div>
                <div class="col-lg-6 col-md-12 d-flex justify-content-between flex-column border bg-white  px-0" style="  height: auto">
                    <div class="mt-1 p-3">

                        @if (config('locales.languages')[app()->getLocale()]['lang'] == 'en')
                        <div class="mb-2">
                            <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($post->category->en_name){{$post->category->en_name}}@endisset</div>
                            <a class="text-body" href=""><small>{{$post->updated_at->format('M d, Y')}}</small></a>
                        </div>
                        <a class="h5 d-block mb-3 title-post-color text-uppercase font-weight-bold title-card en-text-left" href="">{{$post->title_en}}</a>
                        <div class="m-0" style="font-size: 13px;">
                            <p class="post-content post-content-home">
                           {{$post->body_en,200}}
                            </p>
                            <span>...</span>
                        </div>
                        @else
                        <div class="mb-2">
                            <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($post->category->ar_name){{$post->category->ar_name}}@endisset</div>
                            <a class="text-body" href=""><small>{{$post->updated_at->format('M d, Y')}}</small></a>
                        </div>
                        <a class="h5 d-block mb-3 title-post-color text-uppercase font-weight-bold title-card" href="">{{$post->title_ar}}</a>
                        <div class="m-0" style="font-size: 13px;">
                            <p class="post-content post-content-home">
                           {{$post->body_ar,200}}
                            </p>
                            <span>...</span>
                        </div>
                        @endif
                        <div class="post-more mt-3"><a class="more-link btn-primary btn-read-more" href="{{route('show_post',$post->id)}}">{{__('home.read_more')}}</a></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center bg-white border-top mt-1 p-2">
                        <div class="d-flex align-items-center">
                            {{-- <i class="fa-sharp fa-solid fa-thumbs-up like fs-4"></i> --}}
                            <small class="ml-3 "><i class="fa-sharp fa-solid fa-thumbs-up fs-5 mx-3"></i>@isset($post->like){{count($post->like)}}@endisset</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ml-3 "><i class="far fa-eye m-2"></i>@isset($post->views){{$post->views}}@endisset</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         @endforeach

       </div>
       </div>
   </div>
   <div class="butt ">
    <a href="{{route('home_posts')}}" class="second-bg login-a border-0 text-light fw-bold btn-secondary" target="_blanck">
        {{__('home.see_more')}}
      </a>
  </div>
</div>
<!-- posts End -->

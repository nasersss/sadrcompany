@extends('master')

@section('title')
{{__('home.posts')}}
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<!-- Posts Start -->

<div class="container">



@include('message')
   <div class="container-fluid">
    <div class="container">
        <div class="row my-5 post-page">
            <div class="col-md-4">
                <div class="mb-3">
                    <form action="{{route('searching_post')}}" method="GET">
                        @csrf
                        <div class="input-group mb-2" style="width: 100%;">
                            <input type="text" name="data" class="form-control form-control-lg px-3 rounded-0" placeholder="{{__('posts.search_here')}}">
                            <div class="input-group-append">
                                <button class="btn btn-primary font-weight-bold px-3" style="height: 48px">{{__('posts.search')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
                @foreach ($postCategories as $postCategory)
                @if (count($postCategory->post)>0)
                @if (config('locales.languages')[app()->getLocale()]['lang'] == 'en')
                <div class="mb-3">
                    <div class="section-title mb-0" id="heading{{$postCategory->id}}">
                        <div class="course-title-unit px-2 fw-bold w-100" data-toggle="collapse" data-target="#collapse{{$postCategory->id}}" aria-expanded="true" aria-controls="collapse{{$postCategory->id}}">
                        <div>
                            {{$postCategory->en_name}}
                        </div>
                        <div>
                            <i class="fa-sharp fa-solid fa-angle-down second-color" style="font-size: 25px"></i>
                        </div>
                        </div>
                    </div>
                    <div id="collapse{{$postCategory->id}}" class="bg-white border  p-3 collapse @if($singlePost->category_id == $postCategory->id) show @endif">

                        @foreach ($postCategory->post as $post)
                        @if($post->is_active==1)
                        <div class="d-flex align-items-center bg-white mb-3 border py-2" style="height: 120px;">
                                    @foreach($post->postImage as $image)
                                            @php
                                            $im = explode('_',$image->image);
                                            @endphp
                                        @if($im[1]=='main')
                                        <img class="img-fluid" src="{{asset('/images/posts/'.$image->image)}}" style="object-fit: cover;max-width: 110px;">
                                        @endif
                                    @endforeach
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center   text-align-ar-right align-box">
                                <div class="mb-2">
                                    <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($singlePost->category->en_name){{$singlePost->category->en_name}}@endisset</div>
                                    <a class="text-body" href=""><small>{{$singlePost->updated_at->format('M, d')}}</small></a>
                                </div>
                                @if (config('locales.languages')[app()->getLocale()]['lang'] == 'en')
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold en-text-left main-color" href="{{route('show_post',$post->id)}}">{{$post->title_en}}</a>
                                @else
                                <a  class="h6 m-0 text-secondary text-uppercase font-weight-bold main-color " href="{{route('show_post',$post->id)}}">{{$post->title_ar}}</a>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach


                    </div>
                </div>
                @else
                <div class="mb-3">
                    <div class="section-title mb-0" id="heading{{$postCategory->id}}">
                        <div class="course-title-unit px-2 fw-bold w-100" data-toggle="collapse" data-target="#collapse{{$postCategory->id}}" aria-expanded="true" aria-controls="collapse{{$postCategory->id}}">
                        <div>
                            {{$postCategory->ar_name}}
                        </div>
                        <div>
                            <i class="fa-sharp fa-solid fa-angle-down second-color" style="font-size: 25px"></i>
                        </div>
                        </div>
                    </div>
                    <div id="collapse{{$postCategory->id}}" class="bg-white border  p-3 collapse @if($singlePost->category_id == $postCategory->id) show @endif">

                        @foreach ($postCategory->post as $post)
                        @if($post->is_active==1)
                        <div class="d-flex align-items-center bg-white mb-3 border py-2" style="height: 120px;">
                                    @foreach($post->postImage as $image)
                                            @php
                                            $im = explode('_',$image->image);
                                            @endphp
                                        @if($im[1]=='main')
                                        <img class="img-fluid" src="{{asset('/images/posts/'.$image->image)}}" style="object-fit: cover;max-width: 110px;">
                                        @endif
                                    @endforeach
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center   text-align-ar-right align-box">
                                <div class="mb-2 ">
                                    <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($singlePost->category->ar_name){{$singlePost->category->ar_name}}@endisset</div>
                                    <a class="text-body" href=""><small>{{$singlePost->updated_at->format('M, d')}}</small></a>
                                    </div>
                                @if (config('locales.languages')[app()->getLocale()]['lang'] == 'en')
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold en-text-left main-color" href="{{route('show_post',$post->id)}}">{{$post->title_en}}</a>
                                @else
                                <a  class="h6 m-0 text-secondary text-uppercase font-weight-bold main-color " href="{{route('show_post',$post->id)}}">{{$post->title_ar}}</a>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach


                    </div>
                </div>
                @endif
                @endif
                @endforeach



            </div>
            @isset($singlePost)
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 text-align-ar-right">
                        <div class="row news-lg mx-0 mb-3">
                            <div class=" col-lg-12 col-md-12 px-0 bg-white " >
                                <div class="column col-12 d-flex ">

                                    @foreach($singlePost->postImage as $image)
                                    @php
                                    $im = explode('_',$image->image);
                                    @endphp
                                    @if($im[1]=='main')
                                        <img id=featured src="{{asset('/images/posts/'.$image->image)}}" class="col-md-8">
                                    @endif
                                    @endforeach

                                    <div id="slide-wrapper-post" class="col-md-4">
                                      <div id="slider-post">
                                            @foreach($singlePost->postImage as $image)
                                            <img class="thumbnail-post active" src="{{asset('/images/posts/'.$image->image)}}">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            <div class=" col-lg-12 col-md-12 d-flex justify-content-between flex-column  bg-white  px-0 text-align-ar-right" style="  height: auto">
                                <div class="mt-1 p-4 text-align-ar-right">

                                    @if (config('locales.languages')[app()->getLocale()]['lang'] == 'en')
                                    <div class="mb-2 align-box">
                                        <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($singlePost->category->en_name){{$singlePost->category->en_name}}@endisset</div>
                                        <a class="text-body" href=""><small>{{$singlePost->updated_at->format('M d, Y')}}</small></a>
                                    </div>
                                    <h5 class="h5 d-block mb-3 text-secondary text-uppercase font-weight-bold title-card py-3 border-bottom en-text-left main-color title-post-color" >{{$singlePost->title_en}}</h5>
                                    <p class="m-0 en-text-left" style="font-size: 13px;">
                                       {{-- {{$singlePost->body_en}} --}}
                                       @isset($singlePost->body_en)
                                        @foreach ($singlePost->body_en as $txt)
                                            @foreach ($txt as $t)
                                            @if (filter_var($t, FILTER_VALIDATE_URL))
                                                <a style="color:blue;" target="_blank" href="{{$t}}">{{$t}}</a>
                                            @else
                                                {{$t}}
                                            @endif
                                            @endforeach
                                            <br>
                                        @endforeach
                                    @endisset
                                    </p>
                                    @else
                                    <div class="mb-2">
                                        <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($singlePost->category->ar_name){{$singlePost->category->ar_name}}@endisset</div>
                                        <a class="text-body" href=""><small>{{$singlePost->updated_at->format('M d, Y')}}</small></a>
                                    </div>
                                    <h5 class="h5 d-block mb-3 text-secondary text-uppercase  main-color font-weight-bold title-card py-3 border-bottom title-post-color" >{{$singlePost->title_ar}}</h5>
                                    <p class="m-0" style="font-size: 16px;" >
                                       {{-- {{$singlePost->body_ar}} --}}
                                       @isset($singlePost->body_ar)
                                       @foreach ($singlePost->body_ar as $txt)
                                           @foreach ($txt as $t)
                                           @if (filter_var($t, FILTER_VALIDATE_URL))
                                               <a style="color:blue;" target="_blank" href="{{$t}}">{{$t}}</a>
                                           @else
                                               {{$t}}
                                           @endif
                                           @endforeach
                                           <br>
                                       @endforeach
                                   @endisset
                                    </p>
                                    @endif

                                </div>
                                <div class="d-flex justify-content-between align-items-center bg-white border-top mt-1 p-4">
                                    <div class="d-flex align-items-center">
                                        {{-- <i class="fa-sharp fa-solid fa-thumbs-up like fs-4"></i> --}}
                                        @if(Auth::check())
                                        <small class="ml-3 " id="saveLike" data-id="{{$singlePost->id}}"><i id="like_font"
                                            class="
                                            @isset($singlePost->like)
                                                @foreach($singlePost->like as $like)
                                                    @if($like->user_id==Auth::id()) main-color @endif
                                                @endforeach
                                             @endisset
                                              fa-sharp fa-solid fa-thumbs-up like fs-5 mx-3"></i><span id="likeText"> @isset($singlePost->like){{count($singlePost->like)}}@endisset</span></small>
                                       @else
                                       <a href="{{route('save-like',$singlePost->id)}}">
                                       <small class="ml-3 " ><i class="fa-sharp fa-solid fa-thumbs-up like fs-5 mx-3"></i><span> @isset($singlePost->like){{count($singlePost->like)}}@endisset</span></small>
                                    </a>
                                        @endif

                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3 "><i class="far fa-eye m-2"></i>@isset($singlePost->views){{$singlePost->views}}@endisset</small>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </div>
</div>


</div>
<script type="text/javascript">
    let thumbnails = document.getElementsByClassName('thumbnail-post')

    let activeImages = document.getElementsByClassName('active')
    for (var i=0; i < thumbnails.length; i++){
        thumbnails[i].addEventListener('click', function(){
            console.log(activeImages)
            if (activeImages.length > 0){
                activeImages[0].classList.remove('active')
            }
            this.classList.add('active')
            document.getElementById('featured').src = this.src
        })
    }
</script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<script>

    $(document).on('click','#saveLike',function(){
        var vm=$(this);
        var id = $(this).data('id');


        // Run Ajax
        $.ajax({
            url:"{{ route('save-like',$singlePost->id) }}",
            type:"get",
            dataType:'json',
            data:{
                id:id,
                json_true:true,
                _token:"{{ csrf_token() }}"
            },
            success:function(res){
                if(res.bool==true){
                    vm.removeClass('disabled').addClass('active');
                    vm.removeAttr('id');
                    var _prevCount=$("#likeText").text();
                    $('#like_font').addClass('main-color')
                    _prevCount++;
                    $("#likeText").text(_prevCount);
                }
            }
        });
    });

</script>
<script>

let loadMoreBtn = document.querySelector('#load-more');
let currentItem = 3;

loadMoreBtn.onclick = () =>{
   let boxes = [...document.querySelectorAll('.container .box-container .box')];
   for (var i = currentItem; i < currentItem + 3; i++){
      boxes[i].style.display = 'inline-block';
   }
   currentItem += 3;

   if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
   }
}

</script>
<!-- Posts End -->
@endsection

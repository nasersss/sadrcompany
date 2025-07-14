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




   <div class="container-fluid">
    <div class="container">
        <div class="row my-5">
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
                    {{-- <div class="section-title mb-0 ">
                        <h4 class="m-0 text-uppercase font-weight-bold text-secondary ">@isset($postCategory->en_name){{$postCategory->en_name}}@endisset</h4>
                    </div> --}}
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
                    <div id="collapse{{$postCategory->id}}" class="bg-white border  p-3 collapse">

                        @foreach ($postCategory->post as $post)
                        <div class="d-flex align-items-center bg-white mb-3 border py-2" style="height: 120px;">
                                    @foreach($post->postImage as $image)
                                            @php
                                            $im = explode('_',$image->image);
                                            @endphp
                                        @if($im[1]=='main')
                                        <img class="img-fluid" src="{{asset('/images/posts/'.$image->image)}}" style="object-fit: cover;max-width: 110px;">
                                        @endif
                                    @endforeach
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center   text-align-ar-right">
                                <div class="mb-2">
                                    <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($post->category->en_name){{$post->category->en_name}}@endisset</div>
                                    <a class="text-body" href=""><small>{{$post->updated_at->format('M, d')}}</small></a>
                                </div>
                                @if (config('locales.languages')[app()->getLocale()]['lang'] == 'en')
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold en-text-left main-color" href="{{route('show_post',$post->id)}}">{{$post->title_en}}</a>
                                @else
                                <a  class="h6 m-0 text-secondary text-uppercase font-weight-bold main-color " href="{{route('show_post',$post->id)}}">{{$post->title_ar}}</a>
                                @endif
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                @else
                <div class="mb-3 border mb-1 course-box">
                    {{-- <div class="section-title mb-0 ">
                        <h4 class="m-0 text-uppercase font-weight-bold text-secondary">@isset($postCategory->ar_name){{$postCategory->ar_name}}@endisset</h4>
                    </div> --}}
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
                    <div id="collapse{{$postCategory->id}}" class="bg-white border  p-3 collapse">

                        @foreach ($postCategory->post as $post)
                        <div class="d-flex align-items-center bg-white mb-3 border py-2" style="height: 120px;">
                                    @foreach($post->postImage as $image)
                                            @php
                                            $im = explode('_',$image->image);
                                            @endphp
                                        @if($im[1]=='main')
                                        <img class="img-fluid" src="{{asset('/images/posts/'.$image->image)}}" style="object-fit: cover;max-width: 110px;">
                                        @endif
                                    @endforeach
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center   text-align-ar-right">
                                <div class="mb-2">
                                    <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($post->category->ar_name){{$post->category->ar_name}}@endisset</div>
                                    <a class="text-body" href=""><small>{{$post->updated_at->format('M, d')}}</small></a>
                                    </div>
                                @if (config('locales.languages')[app()->getLocale()]['lang'] == 'en')
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold en-text-left main-color" href="{{route('show_post',$post->id)}}">{{$post->title_en}}</a>
                                @else
                                <a  class="h6 m-0 text-secondary text-uppercase font-weight-bold main-color " href="{{route('show_post',$post->id)}}">{{$post->title_ar}}</a>
                                @endif
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
            <div class="col-md-8">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-12 text-align-ar-right">
                        <div class="row news-lg mx-0 mb-3">
                            <div class=" col-lg-6 col-md-12 px-0 bg-white" style="  height: auto">
                                @foreach($post->postImage as $image)
                                @php
                                $im = explode('_',$image->image);
                                @endphp
                                @if($im[1]=='main')
                                <img class="img-fluid" src="{{asset('/images/posts/'.$image->image)}}" style="object-fit: cover;" alt="post image">
                                @endif
                                @endforeach
                            </div>
                            <div class=" col-lg-6 col-md-12 d-flex justify-content-between flex-column  bg-white  px-0 text-align-ar-right" style="  height: auto">
                                <div class="mt-1 p-4 text-align-ar-right">

                                    @if (config('locales.languages')[app()->getLocale()]['lang'] == 'en')
                                    <div class="mb-2">
                                        <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($post->category->en_name){{$post->category->en_name}}@endisset</div>
                                        <a class="text-body" href=""><small>{{$post->updated_at->format('M d, Y')}}</small></a>
                                    </div>
                                    <a  href="{{route('show_post',$post->id)}}" class="h5 d-block fw-bold mb-3  text-uppercase font-weight-bold title-card en-text-left title-post-color">
                                        {{$post->title_en}}
                                    </a>
                                    <div class="m-0" style="font-size: 13px;">
                                        <p class="post-content">
                                       {{$post->body_en,200}}
                                        </p>
                                        <span>...</span>
                                    </div>
                                    @else
                                    <div class="mb-2">
                                        <div class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">@isset($post->category->ar_name){{$post->category->ar_name}}@endisset</div>
                                        <a class="text-body" href=""><small>{{$post->updated_at->format('M d, Y')}}</small></a>
                                    </div>
                                    <a  href="{{route('show_post',$post->id)}}" class="h5 d-block mb-3   text-uppercase font-weight-bold title-card title-post-color">
                                        {{$post->title_ar}}
                                    </a>
                                    <div class="m-0" style="font-size: 13px;">
                                        <p class="post-content">
                                       {{$post->body_ar,200}}
                                        </p>
                                        <span>...</span>
                                    </div>
                                    @endif
                                    <div class="post-more mt-3 en-text-left"><a href="{{route('show_post',$post->id)}}" class="more-link btn-primary btn-read-more">{{__('home.read_more')}}</a></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center bg-white border-top mt- p-4">
                                    <div class="d-flex align-items-center">
                                       <small class="ml-3 " ><i class="fa-sharp fa-solid fa-thumbs-up like fs-5 mx-3"></i><span> @isset($post->like){{count($post->like)}}@endisset</span></small>
                                        {{-- @endif --}}

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
            {!! $posts->withQueryString()->links('pagination') !!}
        </div>
    </div>
</div>


</div>

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

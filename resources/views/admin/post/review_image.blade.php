@extends('admin.layouts.main')

@section('title')
    تعديل صور المقال
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
المقالات
@endsection
@section('breadcrumb-item2')
تعديل مقال 
@endsection

@section('breadcrumb-item-active')
    المقالات
@endsection

@section('page-title')
    تعديل صور المقال
@endsection

@section('content')
@include('message')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    {{-- @isset($postImage) --}}
                    @foreach($postImage as $image)
                    <div id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail="" src="{{asset('/images/posts/'.$image->image)}}" class="avatar-lg rounded bg-light" style="width: 400px;height:400px" alt="">
                                    </div>
                                    <div class="col ps-0">
                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name=""></a>
                                        <p class="mb-0" data-dz-size=""></p>
                                    </div>
                                    <div class="col-auto">
                                    <form action="{{route('delet_image',$image->id)}}" method="POST">
                                        @csrf
                                      <button class=" btn btn-link btn-lg text-muted" type="submit">
                                            <i class="dripicons-cross">
                                            </i> 
                                      </button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- @endisset --}}
                </div>
            </div>
        </div>   
@endsection

@section('script')

@endsection



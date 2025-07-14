@extends('admin.layouts.main')

@section('title')
 تعديل وصف للمدرب
@endsection

@section('css')

@endsection
{{-- @section('breadcrumb-item')
الوصفات الظاهرة للمستخدمين
@endsection --}}
@section('breadcrumb-item2')
تعديل وصف للمدرب
@endsection

@section('breadcrumb-item-active')
    المدربين
@endsection

@section('page-title')
    تعديل وصف للمدرب
@endsection

@section('content')
        @if($errors->any())
        @foreach($errors->all() as $err)
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>
                    {{$err}}
                </p>
            </div>
            @endforeach
        @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('message')
                    <form method="post" action="{{route('trainers_update')}}" class="form-disable">
                        @csrf
                    <div class="row">
                            {{-- title arbic  --}}
                            <input type="hidden" name="id" value="{{$trainerInfo->id}}">
                            <div class="mb-3 col-md-12">
                                <label for="inputTitle" class="form-label">المدرب</label>
                                <select class="form-control mb-3" name="trainerId" required  >
                                    <option disabled>اختر احد المدربين</option>
                                    @isset($users)
                                    @foreach ($users as $user)
                                        @isset($user)
                                            @if ($trainerInfo->trainer_id == $user->id)
                                                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                            @else
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endisset
                                    @endforeach
                                    @endisset

                                </select>
                            </div>
                            {{-- title english  --}}

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">وصف المدرب</label>
                                <textarea class="form-control" name="description" id="inputComment" rows="5" placeholder="ادخل وصف المدرب...">@isset($trainerInfo->description){{$trainerInfo->description}}@endisset</textarea>
                            </div>


                        <button type="submit" class="btn btn-primary form-btn-disable">تعديل</button>

                    </div>
                    </form>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>



@endsection

@section('script')

@endsection




@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |المدربين

@endsection
@section('first-css')
   

@endsection

@section('css')


@endsection
@section('breadcrumb-item')
    المدربين
@endsection
@section('breadcrumb-item2')
    عرض المدربين
@endsection
@section('breadcrumb-item-active')
    المدربين
@endsection

@section('page-title')
    عرض جميع المدربين
@endsection

@section('content')
    <div class="row">

        <div class="col-12">

            @include('message')

            <div class="card">
                <div class="card-body">
                    <!-- <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>اضافة مستخدم جديد</a>
                        </div>

                    </div> -->

                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                               
                                <th>الاسم</th>
                                <th>الجوال</th>
                                <th>الايميل</th>
                                <th>الوصف</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)

                            <tr>
                                <td class="table-user">
                                    
                                    <a href="@isset($user->trainer->id){{route('trainers_show',$user->trainer->id)}} @else # @endisset" class="text-body fw-semibold">
                                    <img src="@isset($user->profile->image){{ $user->profile->image }} @else /images/users/defaultImage.png @endisset" alt="table-user" class="me-2 rounded-circle">
                                        @isset($user->name) {{ $user->name }} @endisset
                                    </a>
                                </td>
                                <td>
                                    @isset($user->profile->phone)
                                    {{ $user->profile->phone }}
                                    @endisset

                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                
                                <td data-title="@isset($user->trainer->description){{$user->trainer->description}}@endisset">
                                @isset($user->trainer->description)
                                {{Illuminate\Support\Str::limit($user->trainer->description,40)}}
                                @endisset
                                </td>

                                <td>
                                    @if($user->is_active==1)
                                    <span class="badge badge-success-lighten">نشط</span>

                                    @else
                                        <span class="badge badge-danger-lighten">غير نشط</span>
                                    @endif

                                <td>
                                    @isset($user->trainer->id)
                                    <a href="{{ route("trainers_edit",$user->trainer->id) }}" class="design-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @endisset
                                    @isset($user->is_active)
                                        @if($user->is_active==1)
                                        <span class="badge badge-success-lighten"></span>
                                        <a href="{{ route("toggle_users",$user->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                                        @else
                                        <a href="{{ route("toggle_users",$user->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                                        @endif
                                        @endisset
                                </td>
                                
                            </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>



@endsection

@section('script')


   



@endsection



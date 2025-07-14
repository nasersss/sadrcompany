@extends('admin.layouts.main')

@section('title')
رسالة الاشتراك
@endsection

@section('css')

@endsection

@section('p-link')

@endsection
@section('breadcrumb-item')

عرض كلمات الموقع

@endsection

@section('breadcrumb-item-active')
    رسالة الإشتراك
@endsection

@section('page-title')
عرض رسالة الشكر
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('message')
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>الوصف</th>

                                @if(Auth::user()->role==0)
                                <th style="width: 75px;">العمليات</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                                @isset($settings)
                                @foreach($settings as $setting)
                                <tr>
                                    <td class="table-user">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{$setting->key}}
                                    </td>
                                    <td>
                                        {{$setting->value}}
                                    </td>



                                    @if(Auth::user()->role==0)
                                    <td>
                                        <a
                                        href="#" class="design-icon edit-setting" data-bs-toggle="modal" data data-bs-target="#update-settings" data-key="{{$setting->key}}" data-value="{{$setting->value}}" data-id="{{$setting->id}}"> <i class="mdi mdi-square-edit-outline"></i>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    @include('admin.setting.modal.update')

@endsection

@section('script')
    <!-- bundle -->


    <!-- third party js -->
    <script src="{{asset('/assets/js/modal/setting.js')}}"></script>
    {{-- <script src="{{asset('assets/js/modal/update-setting.js')}}"> </script> --}}
    <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.checkboxes.min.js')}}"></script>
    <!-- third party js ends -->

    <!-- demo app -->

    <!-- end demo js-->


@endsection

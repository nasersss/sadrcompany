@extends('admin.layouts.main')

@section('title')
    عرض تعليقات المستخدمين
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
 عرض تعليقات  زوار الموقع
@endsection
@section('breadcrumb-item2')
    عرض التعليقات
@endsection

@section('breadcrumb-item-active')
    التعليقات
@endsection

@section('page-title')
    عرض تعليقات الزوار
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('message')

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route("add_display_comment") }}" class="btn btn-secondary mb-2"><i class="mdi mdi-plus-circle me-2"></i>إضافة تعليق جديدة</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>التعليق</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)


                            <tr>
                                <td class="table-user">
                                    {{ $loop->iteration }}
                                </td>
                                <td>@isset($comment->name)
                                    {{$comment->name}}
                                @endisset</td>
                                <td>@isset($comment->comment){{$comment->comment}}@endisset</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->



@endsection

@section('script')
    <!-- bundle -->





@endsection

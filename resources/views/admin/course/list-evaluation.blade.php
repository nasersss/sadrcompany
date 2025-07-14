
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |الاستبيانات

@endsection
@section('first-css')


@endsection

@section('css')


@endsection

@section('p-link')
{{ route('course_review') }}
@endsection
@section('breadcrumb-item')

عرض الدورات مع الطلاب

@endsection

@section('breadcrumb-item-active')
عرض الاستبيانات
@endsection

@section('page-title')
    عرض جميع استبيانات دورة @isset($evaluations[0]->course->title){{$evaluations[0]->course->title}}@endisset
@endsection

@section('content')
    <div class="row">

        <div class="col-12">

            @include('message')


            <div class="row row-cols-1 row-cols-md-3 justify-content-around">
                <div class="card text-white bg-light mb-3 col-10 col-lg-5">
                    <div class="card-body d-flex">
                        <div class="col-5 d-flex flex-column justify-content-start">
                            <div class="d-flex justify-content-start align-items-center mb-2 mt-4">
                                <div class="color-pointer bg-excellent"></div>
                                <div class="text-primary pe-2">ممتاز <span>@isset($evaluationCount['content']['excellent']){{$evaluationCount['content']['excellent']}}@endisset%</span></div>
                            </div>
                            <div class="d-flex justify-content-start align-items-center mb-2">
                                <div></div>
                                <div class="color-pointer bg-good"></div>
                                <div class="text-primary pe-2">جيد <span>@isset($evaluationCount['content']['good']){{$evaluationCount['content']['good']}}@endisset%</span></div>
                            </div>
                            <div class="d-flex justify-content-start align-items-center mb-2">
                                <div></div>
                                <div class="color-pointer"></div>
                                <div class="text-primary pe-2">ضعيف <span>@isset($evaluationCount['content']['week']){{$evaluationCount['content']['week']}}@endisset%</span></div>
                            </div>
                        </div>
                        <div class="col-7">

                            <div  style="
                                width: 150px; height: 150px;
                                border-radius: 50%;
                                margin:auto;

                                background: conic-gradient(
                                    #c02323 0deg {{$evaluationCount['content']['weekDeg']}}deg,
                                    #b37053 {{$evaluationCount['content']['weekDeg']}}deg {{$evaluationCount['content']['weekDeg'] + $evaluationCount['content']['goodDeg']}}deg,
                                    #35537d {{$evaluationCount['content']['weekDeg'] + $evaluationCount['content']['goodDeg']}}deg {{$evaluationCount['content']['weekDeg'] + $evaluationCount['content']['goodDeg'] + $evaluationCount['content']['excellentDeg']}}deg
                                );">
                            </div>
                        <h5 class="text-center text-primary">محتوى الدورة</h5>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-light mb-3 col-10 col-lg-5">
                    <div class="card-body d-flex">
                        <div class="col-5 d-flex flex-column justify-content-start">
                            <div class="d-flex justify-content-start align-items-center mb-2 mt-4">
                                <div class="color-pointer bg-excellent"></div>
                                <div class="text-primary pe-2">ممتاز <span>@isset($evaluationCount['trainer']['excellent']){{$evaluationCount['trainer']['excellent']}}@endisset%</span></div>
                            </div>
                            <div class="d-flex justify-trainer-start align-items-center mb-2">
                                <div></div>
                                <div class="color-pointer bg-good"></div>
                                <div class="text-primary pe-2">جيد <span>@isset($evaluationCount['trainer']['good']){{$evaluationCount['trainer']['good']}}@endisset%</span></div>
                            </div>
                            <div class="d-flex justify-trainer-start align-items-center mb-2">
                                <div></div>
                                <div class="color-pointer"></div>
                                <div class="text-primary pe-2">ضعيف <span>@isset($evaluationCount['trainer']['week']){{$evaluationCount['trainer']['week']}}@endisset%</span></div>
                            </div>
                        </div>
                        <div class="col-7">

                            <div  style="
                                width: 150px; height: 150px;
                                border-radius: 50%;
                                margin:auto;

                                background: conic-gradient(
                                    #c02323 0deg {{$evaluationCount['trainer']['weekDeg']}}deg,
                                    #b37053 {{$evaluationCount['trainer']['weekDeg']}}deg {{$evaluationCount['trainer']['weekDeg'] + $evaluationCount['trainer']['goodDeg']}}deg,
                                    #35537d {{$evaluationCount['trainer']['weekDeg'] + $evaluationCount['trainer']['goodDeg']}}deg {{$evaluationCount['trainer']['weekDeg'] + $evaluationCount['trainer']['goodDeg'] + $evaluationCount['trainer']['excellentDeg']}}deg
                                );">
                            </div>
                        <h5 class="text-center text-primary">مدرب الدورة</h5>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-light mb-3 col-10 col-lg-5">
                    <div class="card-body d-flex">
                        <div class="col-5 d-flex flex-column justify-content-start">
                            <div class="d-flex justify-content-start align-items-center mb-2 mt-4">
                                <div class="color-pointer bg-excellent"></div>
                                <div class="text-primary pe-2">ممتاز <span>@isset($evaluationCount['exercises']['excellent']){{$evaluationCount['exercises']['excellent']}}@endisset%</span></div>
                            </div>
                            <div class="d-flex justify-exercises-start align-items-center mb-2">
                                <div></div>
                                <div class="color-pointer bg-good"></div>
                                <div class="text-primary pe-2">جيد <span>@isset($evaluationCount['exercises']['good']){{$evaluationCount['exercises']['good']}}@endisset%</span></div>
                            </div>
                            <div class="d-flex justify-exercises-start align-items-center mb-2">
                                <div></div>
                                <div class="color-pointer"></div>
                                <div class="text-primary pe-2">ضعيف <span>@isset($evaluationCount['exercises']['week']){{$evaluationCount['exercises']['week']}}@endisset%</span></div>
                            </div>
                        </div>
                        <div class="col-7">

                            <div  style="
                                width: 150px; height: 150px;
                                border-radius: 50%;
                                margin:auto;

                                background: conic-gradient(
                                    #c02323 0deg {{$evaluationCount['exercises']['weekDeg']}}deg,
                                    #b37053 {{$evaluationCount['exercises']['weekDeg']}}deg {{$evaluationCount['exercises']['weekDeg'] + $evaluationCount['exercises']['goodDeg']}}deg,
                                    #35537d {{$evaluationCount['exercises']['weekDeg'] + $evaluationCount['exercises']['goodDeg']}}deg {{$evaluationCount['exercises']['weekDeg'] + $evaluationCount['exercises']['goodDeg'] + $evaluationCount['exercises']['excellentDeg']}}deg
                                );">
                            </div>
                        <h5 class="text-center text-primary">واجبات الدورة</h5>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-light mb-3 col-10 col-lg-5">
                    <div class="card-body d-flex">
                        <div class="col-5 d-flex flex-column justify-content-start">
                            <div class="d-flex justify-content-start align-items-center mb-2 mt-4">
                                <div class="color-pointer bg-excellent"></div>
                                <div class="text-primary pe-2">ممتاز <span>@isset($evaluationCount['platformEase']['excellent']){{$evaluationCount['platformEase']['excellent']}}@endisset%</span></div>
                            </div>
                            <div class="d-flex justify-platformEase-start align-items-center mb-2">
                                <div></div>
                                <div class="color-pointer bg-good"></div>
                                <div class="text-primary pe-2">جيد <span>@isset($evaluationCount['platformEase']['good']){{$evaluationCount['platformEase']['good']}}@endisset%</span></div>
                            </div>
                            <div class="d-flex justify-platformEase-start align-items-center mb-2">
                                <div></div>
                                <div class="color-pointer"></div>
                                <div class="text-primary pe-2">ضعيف <span>@isset($evaluationCount['platformEase']['week']){{$evaluationCount['platformEase']['week']}}@endisset%</span></div>
                            </div>
                        </div>
                        <div class="col-7">

                            <div  style="
                                width: 150px; height: 150px;
                                border-radius: 50%;
                                margin:auto;

                                background: conic-gradient(
                                    #c02323 0deg {{$evaluationCount['platformEase']['weekDeg']}}deg,
                                    #b37053 {{$evaluationCount['platformEase']['weekDeg']}}deg {{$evaluationCount['platformEase']['weekDeg'] + $evaluationCount['platformEase']['goodDeg']}}deg,
                                    #35537d {{$evaluationCount['platformEase']['weekDeg'] + $evaluationCount['platformEase']['goodDeg']}}deg {{$evaluationCount['platformEase']['weekDeg'] + $evaluationCount['platformEase']['goodDeg'] + $evaluationCount['platformEase']['excellentDeg']}}deg
                                );">
                            </div>
                        <h5 class="text-center text-primary">سهولة استخدام المنصة</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>التوصيات والمقترحات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($evaluations as $evaluation)
                            <tr>
                                <td>
                                    @isset($evaluation->recommendation)
                                    {{ $evaluation->recommendation }}
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



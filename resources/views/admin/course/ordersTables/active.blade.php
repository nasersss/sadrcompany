<div class="table-responsive" id="active">
    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
        <thead>
        <tr>
            <th>الطالب</th>
            <th>الدورة</th>
            <th>السعر داخل اليمن</th>
            <th>السعر خارج اليمن</th>
            <th>صورة السند</th>
            {{-- <th>الحالة</th> --}}
            <th style="width: 75px;">العمليات</th>
        </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                @isset($order)
                @isset($order->is_active)
                    @if($order->is_active==1)
                        <tr>
                            <td>
                                @isset($order->student->name)
                                {{ $order->student->name }}
                                @endisset

                            </td>
                            <td>
                                @isset($order->course->title)
                                {{ $order->course->title }}
                                @endisset

                            </td>

                            <td>
                            @isset($order->course->local_price)
                            {{$order->course->local_price}}
                            @endisset
                            </td>
                            <td>
                                @isset($order->course->global_price)
                                {{$order->course->global_price}}
                                @endisset
                            </td>

                            <td>
                                @isset($order->receipt_img_url)
                                <a href="{{asset("receipt/$order->receipt_img_url")}}" traget="_blanck" data-lightbox="portfolio">

                                <img height="100px" src="{{asset("receipt/$order->receipt_img_url")}}" alt="">
                                </a>
                                @endisset
                            </td>

                           

                            <td>
                                @isset($order->is_active)
                                @if($order->is_active==-1)
                                    <a href="{{ route("student_course_toggle",[$order->id,true]) }}" class="btn btn-success" style="width:70px;">تفعيل</a>
                                    <a href="{{ route("student_course_toggle",[$order->id,0]) }}" class="btn btn-danger w-100 mt-1">رفض</a>
                                `@endif
                                    @endisset
                            </td>
                        </tr>
                    @endif
                @endisset
                @endisset
        @endforeach

        </tbody>
    </table>
</div>
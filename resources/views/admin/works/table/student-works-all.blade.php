<div class="table-responsive" >
    <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
        <thead class="table-light">
        <tr>
            <th>#</th>
            <th>الصورة</th>
            <th>الحالة</th>
            <th style="width: 75px;">العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($works as $work)

        {{-- @if ($work->item_brand == 'first') --}}
            <tr>
                <td class="table-user">
                    {{ $loop->iteration }}
                </td>
                <td>
                    @isset($work->img_url)
                    {{-- @if($work->item_brand==="fourth")
                    <video src="{{asset('/files/student/works'.$work->image)}}"
                        controls
                        style="width:200px"></video>
                    @else --}}
                    <img src="{{asset('/files/student/works/'.$work->img_url)}}"
                    alt="nothing"
                    style="width:200px" >
                    {{-- @endif --}}
                    @endisset
                </td>
                <td>
                    @if($work->is_active==1)
                    <span class="badge badge-success-lighten">نشط</span>
                    @else
                        <span class="badge badge-danger-lighten">غير نشط</span>
                    @endif
                </td>
                <td>
                    <a href="" class="design-icon delete-item" data-route="{{route("student_work_delete",$work->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>

                    @isset($work->is_active)
                    @if($work->is_active==1)
                    <span class="badge badge-success-lighten"></span>
                    <a href="{{ route("student_work_active",$work->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                    @else
                    <a href="{{ route("student_work_active",$work->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                    @endif
                    @endisset
                </td>
            </tr>
        {{-- @endif --}}

        @endforeach
        </tbody>
    </table>
</div>

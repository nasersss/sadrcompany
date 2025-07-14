<div class="table-responsive" id="third">
    <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
        <thead class="table-light">
        <tr>
            <th>#</th>
            <th>الصورة</th>
            <th>الوصف</th>
            <th>الحالة</th>
            <th style="width: 75px;">العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($works as $work)

        @if ($work->item_brand == 'third')
            <tr>
                <td class="table-user">
                    {{ $loop->iteration }}
                </td>
                <td>
                    @isset($work->image)
                    @if($work->item_brand==="fourth")
                    <video src="{{asset('/images/works/'.$work->image)}}"
                        controls
                        style="width:200px"></video>
                    @else
                    <img src="{{asset('/images/works/'.$work->image)}}"
                    alt="nothing"
                    style="width:200px" >
                    @endif
                    @endisset
                </td>
                <td>{{$work->description}}</td>
                <td>
                    @if($work->is_active==1)
                    <span class="badge badge-success-lighten">نشط</span>
                    @else
                        <span class="badge badge-danger-lighten">غير نشط</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route("edit_work",$work->id) }}" class="design-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                    @isset($work->is_active)
                    @if($work->is_active==1)
                    <span class="badge badge-success-lighten"></span>
                    <a href="{{ route("active",$work->id) }}" class="design-icon"> <i class="uil-eye-slash" ></i></a>
                    @else
                    <a href="{{ route("active",$work->id) }}" class="design-icon"> <i class="mdi mdi-eye"></i></a>
                    @endif
                    <a href="" class="design-icon delete-item" data-route="{{route("work_delete",$work->id)}}"> <i class=" second-color mdi mdi-delete-empty"></i></a>

                    @endisset
                </td>
            </tr>
        @endif

        @endforeach
        </tbody>
    </table>
</div>

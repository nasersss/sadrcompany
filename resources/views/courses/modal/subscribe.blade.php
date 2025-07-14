<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade text-align-ar-right" id="subscribe" tabindex="-1" aria-labelledby="subscribeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title main-c" id="exampleModalLabel">تأكيد الإشتراك </h5>
                <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin:0 !important"></button>
            </div>
    <p class="alert second-bg rounded-0 center w-c">
        يرجى تسديد مبلغ <strong>{{$course->local_price }} $ </strong>
        @isset($settings)
            @foreach ($settings as $setting)
            @isset($setting->key)
                @if($setting->key=='رسالة الاشتراك')
                    {{$setting->value}}
                @endif
            @endisset
            @endforeach
        @endisset
    </p>
            <div class="modal-body">
                <form method="post" action="{{route('subscribe_store') }}" class="needs-validation   form-disable"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="studentId" value="{{Auth::id()}}">
                        <input type="hidden" name="courseId" value="{{$course->id}}">
                        @include('courses.modal.image-preivew')

                    </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-subscribe" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary btn-subscribe form-btn-disable" >إضافة</button>
                </div>
            </form>

        </div>
    </div>
</div>

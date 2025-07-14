<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="add-appendix" tabindex="-1" aria-labelledby="add-appendixLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة ملحق جديد للدورة</h5>
                <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin:0 !important"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('course_appendix_store') }}" class="needs-validation   form-disable"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">وصف الملحق</label>
                                <input type="text" class="form-control" name="description" rows="5"
                                    placeholder="ادخل وصف للملحق..." required>
                                <div class="fv-plugins-message-container invalid-feedback ">
                                    الرجاء اضافة وصف للملحق
                                </div>
                            </div>
                        <div class="mb-3 col-md-12">
                            <input type="hidden" name="courseId" value="{{ $course->id }}">
                            <label for="comment_ar" class="form-label">اختر نوع الملحق</label>
                            <select name="appendix_type" id="type-appendix" class="form-control">
                                <option value="" selected disabled>الرجاء اختيار النوع</option>
                                <option value="1"> رابط فديو او مقال</option>
                                <option value="2">إرفاق ملف </option>
                                <option value="3">رابط جلسة زوم </option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback ">
                                الرجاء اضافة الملحق
                            </div>
                        </div>
                        <div class="mb-3 col-md-12" id="content-appendix">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary form-btn-disable">إضافة</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('/assets/js/modal/appendix.js') }}"></script>

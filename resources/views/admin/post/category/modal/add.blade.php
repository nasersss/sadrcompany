<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="add-postCategories" tabindex="-1" aria-labelledby="add-topicsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة صنف جديد</h5>
                <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin:0 !important" ></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('store_post_category')}}" class="needs-validation form-disable" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">اسم الصنف يالعربي</label>
                                <input type="text" class="form-control" name="ar_name" id="inputComment" rows="5" placeholder="ادخل اسم الصنف يالعربي..." required>
                                <div class="fv-plugins-message-container invalid-feedback ">
                                    الرجاء اضافة اسم للصنف بالعربي
                                </div>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="comment_ar" class="form-label">اسم الصنف بالانجليزي</label>
                                <input type="text" class="form-control" name="en_name" id="inputComment" rows="5" placeholder="ادخل اسم الصنف بالانجليزي..." required>
                                <div class="fv-plugins-message-container invalid-feedback ">
                                    الرجاء اضافة اسم للصنف بالانجليزي
                                </div>
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

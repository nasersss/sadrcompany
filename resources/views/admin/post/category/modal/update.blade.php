<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="update-postCategories" tabindex="-1" aria-labelledby="update-postCategoriesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل صنف </h5>
                <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin:0 !important" ></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('update_post_category')}}" class="needs-validation form-disable">
                    @csrf
                <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="comment_ar" class="form-label">اسم الصنف بالعربي</label>
                            <input type="text" class="form-control" name="ar_name" id="ar_name_category" placeholder="ادخل اسم الصنف بالعربي..." required>

                        </div>

                        <div class="mb-3 col-md-12">
                            <input type="hidden" name="id" id="categoryId">
                            <label for="comment_ar" class="form-label">اسم الصنف بالانجليزي</label>
                            <input type="text" class="form-control" name="en_name" id="en_name_category" placeholder="ادخل اسم الصنف بالانجليزي..." required>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-primary form-btn-disable">تعديل</button>
            </div>
            </form>

        </div>
    </div>
</div>

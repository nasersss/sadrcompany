<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="add-lessons" tabindex="-1" aria-labelledby="add-lessonsLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">إضافة تحدي جديد</h5>
        <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin:0 !important" ></button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{route('exercises_store')}}" class="  form-disable" enctype="multipart/form-data">
            @csrf
        <div class="row">

            <input type="hidden" name="lessonId" value="@isset($lesson->id){{ $lesson->id }}@endisset">

            <div class="mb-3 col-md-12">
                <label for="comment_ar" class="form-label">وصف التحدي</label>
                <textarea class="form-control" name="description" id="inputComment" rows="3" placeholder="ادخل وصف التحدي..."></textarea>
            </div>

            <div class="col-xl-12">
                <div class="mb-3 mt-3 mt-xl-0">
                    <label for="projectname" class="mb-0">ملحقات التحدي</label>
                    <input class="form-control" name="file" type="file">
                </div>
            </div>

            <div class="mb-3 col-md-12">
                <label for="comment_ar" class="form-label">درجة التحدي</label>
                <input class="form-control" min="0" max="250" name="mark" type="number" placeholder="ادخل درجة التحدي...">
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

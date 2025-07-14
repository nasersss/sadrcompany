<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade text-align-ar-right" id="upload_exercise" tabindex="-1" aria-labelledby="upload_exerciseLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title main-c" id="exampleModalLabel">رفع الواجب </h5>
                <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin:0 !important"></button>
            </div>
               
            <div class="modal-body">
                <form method="post" action="{{route('upload_exercise')}}" class="needs-validation"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="exId" name="exerciseId" value="">
                        <input type="hidden" id="courseId" name="courseId" value="">
                        <input type="hidden" id="lessonId" name="lessonId" value="">
                        <label for="Image"   class="form-label">يرجى رفع ملف الواجب على شكل ملف مضغوط</label>
                        <input class="form-control" type="file" name="file">                
                    </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-subscribe" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary btn-subscribe" >إضافة</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="add-marks" tabindex="-1" aria-labelledby="add-marksLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة علامة للطالب</h5>
                    <button type="button"class="btn-close close_modal"  style="margin:0 !important" ></button>
                </div>
                <div class="modal-body">
                    <form id="ajax_form" action="{{route('markStore')}}" class="form-disable" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <input type="hidden" id="exerciseId" name="exerciseId" value="">
                                <label for="mark" >الرجاء ادخال العلامة</label>
                                <input type="number" min="0" max="50"  class="form-control"name="mark" id="mark_max">
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close_modal" >إلغاء</button>
                        <button type="submit" id="addMark" class="btn btn-primary form-btn-disable">إضافة</button>
                    </div>
                </form>
        </div>
    </div>
</div>

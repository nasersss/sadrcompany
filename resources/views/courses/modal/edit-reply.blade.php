<!-- Modal -->
<div class="modal fade" id="editReply" tabindex="-1" role="dialog" aria-labelledby="editReplyLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title second-color" id="editReplyLabel">تعديل الرد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
          <form  id="edit_reply" action="{{route('course-replies-edit')}}" class="form-disable" method="POST">
            @csrf
            <textarea class="form-control" id="replyContentEdit" name="content" rows="7"
                                ></textarea>
            <input type="hidden" name="replyId" id="replyIdEdit">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
          <button type="submit" class="btn btn-primary  form-btn-disable">تعديل</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<!-- continue learn End -->
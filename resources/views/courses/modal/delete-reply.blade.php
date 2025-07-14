<!-- Modal -->
<div class="modal fade" id="deletreply" tabindex="-1" role="dialog" aria-labelledby="deletreplyLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title second-color" id="deletreplyLabel"> حذف الرد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
            <p>
             هل أنت متأكد من حذف الرد؟
            </p>
          <form  id="delete_reply" class="form-disable" action="{{route('course-replies-delete')}}" method="POST">
            @csrf
          <input type="hidden" name="replyId" id="replyId">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
          <button type="submit" class="btn btn-primary form-btn-disable ">نعم</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<!-- continue learn End -->
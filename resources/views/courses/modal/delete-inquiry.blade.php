<!-- Modal -->
<div class="modal fade" id="deletInquiry" tabindex="-1" role="dialog" aria-labelledby="deletInquiryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title second-color" id="deletInquiryLabel"> حذف الاستفسار</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
            <p>
                هل أنت متأكد من حذف الاستفسار؟
            </p>
          <form  id="delete_inquiry" class="form-disable" action="{{route('course-inquiries-delete')}}" method="POST">
            @csrf
          <input type="hidden" name="inquiryId" id="inquiryId">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
          <button type="submit" class="btn btn-primary form-btn-disable">نعم</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<!-- continue learn End -->
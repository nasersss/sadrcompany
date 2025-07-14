<!-- Modal -->
<div class="modal fade" id="editInquiry" tabindex="-1" role="dialog" aria-labelledby="editInquiryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title second-color" id="editInquiryLabel">تعديل الاستفسار</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
          <form  id="edit_inquiry" action="{{route('course-inquiries-edit')}}" class=" form-disable " method="POST">
            @csrf
            {{-- <input class="form-control" type="text" name="content" id="inquiryContentEdit"> --}}
            <textarea class="form-control" id="inquiryContentEdit" name="content" rows="7"
                                placeholder="اضافة استفسار ..."></textarea>
            <input type="hidden" name="inquiryId" id="inquiryIdEdit">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
          <button type="submit" class="btn btn-primary form-btn-disable">تعديل</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<!-- continue learn End -->
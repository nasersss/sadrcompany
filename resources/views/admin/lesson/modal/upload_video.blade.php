<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">رفع الفديو</h5>
         
        </div>
        <div class="modal-body">
          @include('upload-video')
        </div>
        <div class="modal-footer">
          <a href="" id="canceledUploadVideo" class="btn btn-secondary" >إلغاء</a>
          <button type="button" class="btn btn-primary" data-dismiss="modal">حفظ </button>
        </div>
      </div>
    </div>
  </div>
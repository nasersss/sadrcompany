
  <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="confirmLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header justfiy-content-between">
          <h1 class="modal-title fs-5 main-color " id="confirmLabel">رسالة تأكيد</h1>
        </div>
        <form id="delete_file_ajax" action="{{route('exercises_delete_file')}}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <h1 class="modal-title fs-5 second-color " id="confirmLabel">هل أنت متأكد من حذف هذا الملف؟؟ </h1>
          <input type="hidden" id="id" name="id">
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="cancel_confirm">إلغاء</button>
            <button type="submit" class="btn btn-primary">تأكيد</button>
          </div>
         </form>
      </div>
    </div>
  </div>
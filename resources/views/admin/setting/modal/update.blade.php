<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="update-settings" tabindex="-1" aria-labelledby="add-appendixLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
          <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin:0 !important" ></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('settings_update')}}" class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="row">


                    <input type="hidden" name="settingId" id="settingId">
                    {{-- <input type="text" name="key" id="settingKey"> --}}
                    <input class="form-control"type="text" name="value" id="settingValue">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </div>
        </form>

      </div>
    </div>
  </div>

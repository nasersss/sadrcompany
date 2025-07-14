<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="add-topics" tabindex="-1" aria-labelledby="add-topicsLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">إضافة محور جديد</h5>
          <button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin:0 !important" ></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('topics_store')}}" class="needs-validation form-disable" enctype="multipart/form-data">
                @csrf
            <div class="row">
                    
                    <div class="mb-3 col-md-12">
                        <input type="hidden" name="courseId" value="{{$course->id}}">
                        <label for="comment_ar" class="form-label">عنوان المحور</label>
                        <input type="text" class="form-control" name="title" id="inputComment" rows="5" placeholder="ادخل عنوان المحور..." required>
                        <div class="fv-plugins-message-container invalid-feedback ">
الرجاء اضافة عنوان للمحور      
                  </div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="comment_ar" class="form-label">وصف المحور</label>
                        <input type="text" class="form-control" name="description" id="inputComment" rows="5" placeholder="ادخل وصف المحور..." required>
                        <div class="fv-plugins-message-container invalid-feedback ">
                          الرجاء اضافة وصف للمحور      
                        </div>
                    </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">إلغاء</button>
          <button type="submit" class="btn btn-primary form-btn-disable">إضافة</button>
        </div>
        </form>

      </div>
    </div>
  </div>
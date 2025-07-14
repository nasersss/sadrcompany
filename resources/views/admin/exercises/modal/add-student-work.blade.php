<!-- Modal -->
<div class="modal fade" id="addStudentWork" tabindex="-1" role="dialog" aria-labelledby="addStudentWorkLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title second-color" id="addStudentWorkLabel">إضافة نموذج عمل للطالب</h5>
        </div>
        <div class="modal-body"> 
           
          <form  id="delete_inquiry" action="{{ route("student_work_store")}}" class=" form-disable"  method="POST" enctype="multipart/form-data">
            @csrf
            @isset($students)
            <div class="container col-md-10">
            <label for="">يرجى اختيار اسم الطالب</label>
                <select required name="studentId" class="form-select mt-2 " id="studentId2"> 
                @foreach ($students as $student)
                <option class="form-control" value="{{$student->student->id}}">{{$student->student->name}}</option>
                @endforeach
                </select>
            </div>
              @else
              <input type="hidden" name="studentId" id="studentId">
            @endisset
            <input type="hidden" name="courseId" id="courseId">
            <div class="container col-md-10">
            <div >
                <label for="Image" class="form-label">يرجى رفع صورة </label>
                <input class="form-control" type="file" name="Image" id="formFile" onchange="preview()">
                <button  id="closed-img" onclick="clearImage()" style="display: none" type="button"class="btn-close mt-3"></button>
            </div>
            <img id="frame" src="" class="img-fluid" />
        </div>
        
        <script>
        
            function preview() {
                document.getElementById("closed-img").style.display="block";
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
                document.getElementById("closed-img").style.display="none";
            }
        </script>
         
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
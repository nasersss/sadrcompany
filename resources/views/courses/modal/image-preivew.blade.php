<div class="container col-md-10">
    <div >
        <label for="Image" class="form-label">يرجى رفع صورة السند او الحوالة</label>
        <input class="form-control" type="file" name="receiptImage" id="formFile" onchange="preview()">
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
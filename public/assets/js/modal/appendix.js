let type_appendix = document.getElementById("type-appendix");
let content_appendix = document.getElementById("content-appendix");

        type_appendix.addEventListener('change', ()=> {

            if(type_appendix.value == 2)
            {
                content_appendix.innerHTML =`<label for="file" class="form-label"> ارفاق ملف</label>
                <input type="file" class="form-control" name="file" id="inputComment">
                <div class="fv-plugins-message-container invalid-feedback ">
                الرجاء إرفاق الملف
                </div>`;
            }
            else{
                content_appendix.innerHTML = ` <label for="url" class="form-label"> ارفاق ارابط</label>
                <input type="url" class="form-control" name="url" id="url-link-appendix"  placeholder="ادخل الرابط..." required>
                <div class="fv-plugins-message-container invalid-feedback ">
                الرجاء اضافة الرابط
                </div>`;
            }

        })

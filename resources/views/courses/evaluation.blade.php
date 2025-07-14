

<button type="button" class="btn btn-secondary" style="display: none" id="showFeature" data-bs-toggle="modal" data-bs-target="#add-lessons"><i class="mdi mdi-plus-circle me-2"></i>
</button>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="add-lessons" tabindex="-1" aria-labelledby="add-lessonsLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-valudation">
    <div class="modal-content">
        <form action="{{route('course-evaluations-store')}}" method="post" class="form-disable">
            @csrf
            <input type="hidden" name="courseId" value="@isset($studentCourse->course_id){{$studentCourse->course_id}}@endisset">
        <div class="modal-header bg-primary">
            <h5 class="modal-title  fsn text-white" id="exampleModalLabel">تقييم الدورة</h5>
            <button type="button"class="bg-primary border-0" data-bs-dismiss="modal" aria-label="Close" style="margin:0 !important" >
                <span class="" style='font-size:22px;color:white; back'>&#10006;</span>

            </button>
        </div>
    <div class="modal-body" style="background: #f7f8fb">
        <div class="row">
            <div class="col-md-6 col-12-murad-sm mt-3">
                <div class="box d-flex justify-content-around align-items-start d-flex flex-column px-3 ">
                <h5 class=" text-black   fsn text-primary">محتوى الدورة</h5>
                </div>
                <div class="box me-3 d-flex justify-content-around align-items-start d-flex flex-column px-2 ">
                <div class=" text-black fs-5 text-primary">
                    <div class="form-check">
                        <input class="form-check-input form-check-input-right"  type="radio" name="content" id="content1" value="1" required>
                        <label class="form-check-label me-3  " for="content1">
                            ممتاز
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input form-check-input-right"  type="radio" name="content" id="content2" value="2">
                        <label class="form-check-label me-3  " for="content2">
                            جيد
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input form-check-input-right"  type="radio" name="content" id="content3" value="3" >
                        <label class="form-check-label me-3  " for="content3">
                            ضعيف
                        </label>
                        </div>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-12-murad-sm mt-3">
                <div class="box d-flex justify-content-around align-items-start d-flex flex-column px-3 ">
                    <h5 class=" text-black   fsn text-primary">مدرب الدورة</h5>
                </div>
                <div class="box me-3 d-flex justify-content-around align-items-start d-flex flex-column px-2 ">
                    <div class=" text-black fs-5 text-primary">
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="trainer" id="trainer1" value="1"  required>
                            <label class="form-check-label me-3  " for="trainer1">
                            ممتاز
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="trainer" id="trainer2" value="2">
                            <label class="form-check-label me-3  " for="trainer2">
                            جيد
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="trainer" id="trainer3" value="3" >
                            <label class="form-check-label me-3  " for="trainer3">
                            ضعيف
                            </label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6 col-12-murad-sm mt-3">
                <div class="box d-flex justify-content-around align-items-start d-flex flex-column px-3 ">
                    <h5 class=" text-black   fsn text-primary">تمارين الدورة</h5>
                </div>
                <div class="box me-3 d-flex justify-content-around align-items-start d-flex flex-column px-2 ">
                    <div class=" text-black fs-5 text-primary">
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="exercises" id="exercises1" value="1"  required>
                            <label class="form-check-label me-3  " for="exercises1">
                            ممتاز
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="exercises" id="exercises2" value="2">
                            <label class="form-check-label me-3  " for="exercises2">
                            جيد
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="exercises" id="exercises3" value="3" >
                            <label class="form-check-label me-3  " for="exercises3">
                            ضعيف
                            </label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6 col-12-murad-sm mt-3">
                <div class="box d-flex justify-content-around align-items-start d-flex flex-column px-3 ">
                    <h5 class=" text-black   fsn text-primary">سهولة التعامل مع المنصة</h5>
                </div>
                <div class="box me-3 d-flex justify-content-around align-items-start d-flex flex-column px-2 ">
                    <div class=" text-black fs-5 text-primary">
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="platformEase" id="exampleRadios1" value="1"  required>
                            <label class="form-check-label me-3  " for="exampleRadios1">
                            ممتاز
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="platformEase" id="exampleRadios2" value="2">
                            <label class="form-check-label me-3  " for="exampleRadios2">
                            جيد
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input form-check-input-right"  type="radio" name="platformEase" id="exampleRadios3" value="3" >
                            <label class="form-check-label me-3  " for="exampleRadios3">
                            ضعيف
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <div class="row mt-4 ">
            <div class="mb-3 col-md-12 px-3">
                <h5 class=" text-black   fsn text-primary">التوصيات والمقترحات</h5>
                <textarea class="form-control" name="recommendation" id="inputComment" rows="5" placeholder="ادخل التوصيات والمقترحات هنا ..."></textarea>
            </div>

        </div>

        </div>
    <div class="modal-footer" style="background: #f7f8fb">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        <button type="submit" class="btn btn-primary form-btn-disable">ارسال</button>
    </div>
    </form>
    </div>
</div>
</div>

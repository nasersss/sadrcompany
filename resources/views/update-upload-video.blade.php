{{-- <div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="secondary-color"> رفع ملف الفديو</h5>
                </div> --}}

                <div class="card-body p-0">
                    <div class="container ">
                        <div class="row ">
                                 <div class="col-md-12">
                                        <div id="upload-container" class="text-center">
                                            <button id="browseFileUpdate" class="btn btn-primary">اختر فديو</button>
                                        </div>
                                        <div  style="display: none" class="progress mt-3" style="height: 25px">
                                            <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                                        </div>
                                        <div class="card-footer p-2" style="display: none">
                                            <video id="videoPreviewUpdate" src="" controls style="width: 100%; height: auto"></video>
                                        </div> 
                                    </div>
                         </div>
                    </div>
                </div>
            {{-- </div>
        </div>
    </div>
</div> --}}


<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script type="text/javascript">
    let browseFileUpdate = $('#browseFileUpdate');
    let resumable = new Resumable({
        target: '{{ route('uploadVideo') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['mp4'],
        chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });
    
    resumable.assignBrowse(browseFileUpdate[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreviewUpdate').attr('src', response.path);
        $('#videoUrlPreviewUpdate').val(response.filename);
        var url = '{{ route("deleted_video", ":id") }}';
        url = url.replace(':id', response.filename);
        $('#canceledUploadVideoUpate').attr('href',url);
        $('.card-footer').show();
        $('#browseFileUpdate').hide();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>
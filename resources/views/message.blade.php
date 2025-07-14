@if(session()->has('success'))
<div class="col-lg-12 alert alert-success alert-dismissible bg-success text-white border-0 fade show"id="alert_success"  role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ session()->get('success') }} </strong>
</div>
@elseif(session()->has('error'))
<div class="col-lg-12 alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"   role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ session()->get('error') }} </strong>
</div>
@endif

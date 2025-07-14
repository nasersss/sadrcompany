
document.querySelectorAll('.confirm').forEach(item => {
    item.addEventListener('click', e => {
    $('#id').val(item.dataset.id);
    $('#confirm').show();
    $('#confirm').addClass('show');
    $('#confirm').addClass('modal-ajax');
})
})
$(document).ready(function(){
    $('#delete_file_ajax').submit(function(event){
        event.preventDefault();
        var $form = $(this);
        $.ajax({
        type: 'POST',
        url: $form.attr('action'),
        data: $form.serialize(),
        success: function(data) {
                    $('#alert_success').show();
                    $('#massage_text').text(data.msg);
                    $('#delete_file_ajax')[0].reset();
                   
                    $('#confirm').hide();
                    $('#confirm').removeClass('show');
            if(data.status == true){
                $('#delete_file'+data.id).remove(); 
                $('#download_file'+data.id).remove();
                $('#alert_success').removeClass('alert-danger');
                $('#alert_success').addClass('alert-success');
                $('#alert_success').addClass('bg-success');
                }
            else{
                $('#alert_success').removeClass('alert-success');
                $('#alert_success').removeClass('bg-success');
                $('#alert_success').addClass('alert-danger');
                $('#alert_success').addClass('bg-danger');
            }
        },
        error: function(error) {
                    $('#alert_success').show();
                    $('#massage_text').text(data.msg);
                    $('#delete_file_ajax')[0].reset();
                    $('#confirm').hide();
                    $('#confirm').removeClass('show');
                    $('#alert_success').removeClass('alert-success');
                    $('#alert_success').removeClass('bg-success');
                    $('#alert_success').addClass('alert-danger');
                    $('#alert_success').addClass('bg-danger');
        }
        });
});
   
});

$('#cancel_confirm').on('click',function(e){
    $('#confirm').hide();
 $('#confirm').removeClass('show');
 });

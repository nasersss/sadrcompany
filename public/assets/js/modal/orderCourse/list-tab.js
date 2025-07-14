
$('#not-active').show();
$('#active').hide();
$('#tab-not-active').addClass('btn-secondary');
$('#tab-not-active').removeClass('btn-primary');
$('.tab').click(function () {

    switch ($(this).data('tab')) {
        
        case 'not-active':
            $('#active').hide();
            $('#not-active').show();
            $('#tab-not-active').addClass('btn-secondary');
            $('#tab-not-active').removeClass('btn-primary');
            $('#tab-active').addClass('btn-primary');
            $('#tab-active').removeClass('btn-secondary'); 
            break;
        case 'active':
            $('#not-active').hide();
            $('#active').show();
            $('#tab-active').addClass('btn-secondary');
            $('#tab-active').removeClass('btn-primary');
            $('#tab-not-active').addClass('btn-primary');
            $('#tab-not-active').removeClass('btn-secondary'); 
            break;

        default:
            break;
    }
})

// alert('hi');

$('#first').hide();
$('#second').hide();
$('#third').hide();
$('#fourth').hide();

$('.tab').click(function () {
    switch ($(this).data('tab')) {
        case 'all':
            $('#all').show();
            $('#first').hide();
            $('#second').hide();
            $('#third').hide();
            $('#fourth').hide();
            $('#tab-all').removeClass('btn-primary');
            $('#tab-all').addClass('btn-secondary');
            $('#tab-first').removeClass('btn-secondary');
            $('#tab-first').addClass('btn-primary');
            $('#tab-second').removeClass('btn-secondary');
            $('#tab-second').addClass('btn-primary');
            $('#tab-third').removeClass('btn-secondary');
            $('#tab-third').addClass('btn-primary');
            $('#tab-fourth').removeClass('btn-secondary');
            $('#tab-fourth').addClass('btn-primary');

            break;
        case 'first':
            $('#all').hide();
            $('#first').show();
            $('#second').hide();
            $('#third').hide();
            $('#fourth').hide();
            $('#tab-first').removeClass('btn-primary');
            $('#tab-first').addClass('btn-secondary');
            $('#tab-all').removeClass('btn-secondary');
            $('#tab-all').addClass('btn-primary');
            $('#tab-second').removeClass('btn-secondary');
            $('#tab-second').addClass('btn-primary');
            $('#tab-third').removeClass('btn-secondary');
            $('#tab-third').addClass('btn-primary');
            $('#tab-fourth').removeClass('btn-secondary');
            $('#tab-fourth').addClass('btn-primary');
            break;
        case 'second':
            $('#all').hide();
            $('#first').hide();
            $('#second').show();
            $('#third').hide();
            $('#fourth').hide();
            $('#tab-second').removeClass('btn-primary');
            $('#tab-second').addClass('btn-secondary');
            $('#tab-first').removeClass('btn-secondary');
            $('#tab-first').addClass('btn-primary');
            $('#tab-all').removeClass('btn-secondary');
            $('#tab-all').addClass('btn-primary');
            $('#tab-third').removeClass('btn-secondary');
            $('#tab-third').addClass('btn-primary');
            $('#tab-fourth').removeClass('btn-secondary');
            $('#tab-fourth').addClass('btn-primary');
            break;
        case 'third':
            $('#all').hide();
            $('#first').hide();
            $('#second').hide();
            $('#third').show();
            $('#fourth').hide();
            $('#tab-third').removeClass('btn-primary');
            $('#tab-third').addClass('btn-secondary');
            $('#tab-first').removeClass('btn-secondary');
            $('#tab-first').addClass('btn-primary');
            $('#tab-second').removeClass('btn-secondary');
            $('#tab-second').addClass('btn-primary');
            $('#tab-all').removeClass('btn-secondary');
            $('#tab-all').addClass('btn-primary');
            $('#tab-fourth').removeClass('btn-secondary');
            $('#tab-fourth').addClass('btn-primary');
            break;

        case 'fourth':
            $('#all').hide();
            $('#first').hide();
            $('#second').hide();
            $('#third').hide();
            $('#fourth').show();
            $('#tab-fourth').removeClass('btn-primary');
            $('#tab-fourth').addClass('btn-secondary');
            $('#tab-first').removeClass('btn-secondary');
            $('#tab-first').addClass('btn-primary');
            $('#tab-second').removeClass('btn-secondary');
            $('#tab-second').addClass('btn-primary');
            $('#tab-third').removeClass('btn-secondary');
            $('#tab-third').addClass('btn-primary');
            $('#tab-all').removeClass('btn-secondary');
            $('#tab-all').addClass('btn-primary');
            break;

        default:
            break;
    }
})


// Добавление нового объекта работ по договору

jQuery('body').on('click', '#add_raboti', function () {

    var dog_number = jQuery('#dogovor_number').val();
 // alert('dog_number=   '+dog_number);
    jQuery.ajax({
        type: 'POST',
        url: '/vidrabotpodogovoru/create/',
        data: {dog_id: dog_number},
        success: function (response) {
            jQuery('#modal-body-dialog').empty().html(response);
            jQuery('#modal-dialog').css('z-index', '22000');
            jQuery('#modal-dialog').css('height', 'auto');
            jQuery('#modal-dialog').css('max-height', '100%');
            jQuery('#modal-dialog').css('width', 'auto');
            //   jQuery.noConflict();
            jQuery('#modal-dialog').modal('show');
            return false;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + xhr);
        }
    });
    return false;
});

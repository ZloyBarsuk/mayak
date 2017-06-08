
// Добавление нового объекта работ по договору

jQuery('body').on('click', '#new_bank_ispolnitel', function () {

    var id_ispolnitel = jQuery('#Ispolnitel_id').val();
    jQuery.ajax({
        type: 'POST',
        url: '/bank/create/',
        data: {id_ispolnitel: id_ispolnitel},
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

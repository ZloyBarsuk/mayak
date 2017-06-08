

jQuery('body').on('click', '#print_barcode', function () {

    var dog_number = jQuery('#dogovor_number').val();
    jQuery.ajax({
        type: 'POST',
        url: '/universaldocument/Barcodes/',
        data: {
            dog_number: dog_number,

        },
        success: function (response) {
            jQuery('#modal-body-dialog').empty().html(response);
            jQuery("#modal-dialog").css("z-index", "22002");
            jQuery("#modal-dialog").css("height", "auto");
            jQuery("#modal-body-dialog").css("overflow-y", "auto");
            jQuery("#modal-dialog").css("max-height", "100%");
            jQuery("#modal-dialog").css("width", "auto");
            jQuery("#modal-dialog").modal("show");
            return false;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + xhr);
        }
    });


});
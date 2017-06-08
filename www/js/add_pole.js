// Добавление нового поля

jQuery('body').on('click', '#object-grid a.add_pole', function () {

    var object_id = jQuery(this).closest("tr").attr("id");

     // alert("Adress id is   "+object_id);


    jQuery.ajax({
        type: 'POST',
        url: '/soprovoditelniylist/create/',
        data: {object_id: object_id},
        success: function (response) {
            jQuery('#modal-body-dialog').empty().html(response);
            jQuery("#modal-dialog").css("z-index", "22002");
            jQuery("#modal-dialog").css("height", "auto");
            jQuery("#modal-body-dialog").css("overflow-y", "auto");
            jQuery("#modal-dialog").css("max-height", "100%");
            jQuery("#modal-dialog").css("width", "auto");
            jQuery("#modal-dialog").modal("show");

            //   jQuery.noConflict();

            return false;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + xhr);
        }
    });
    return false;
});

// Добавление нового объекта работ по договору
jQuery('document').ready(function () {
    jQuery('body').on('click', '#object-rabot-adress-grid a.add_etap_rabot_modal', function (event) {


        var url = jQuery(this).attr("href");


        var object_id = jQuery(this).closest("tr").attr("id");


        jQuery.ajax({
            type: 'POST',
            url: '/etaprabotpoobjectu/create/',
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
                //  alert(JSON.stringify(response) );
                return false;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("Произошла ошибка , возможно у вас нет прав " + xhr);
                alert(JSON.stringify(xhr));
                alert(JSON.stringify(ajaxOptions));
                alert(JSON.stringify(thrownError));
            }
        });
        return false;
    });


});








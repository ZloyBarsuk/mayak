



jQuery("body").on("click", "#bank-grid a.update_bank", function () {
//
    var url = $(this).attr("href");
    jQuery.get(url, function (r) {


        jQuery("#modal-body-dialog").empty().html(r);
        jQuery("#modal-dialog").css("z-index", "10001");
        jQuery("#modal-dialog").css("height", "auto");
        jQuery("#modal-body-dialog").css("overflow-y", "auto");
        jQuery("#modal-dialog").css("max-height", "100%");
        jQuery("#modal-dialog").css("width", "auto");
        jQuery("#modal-dialog").modal("show");

    });

    return false;

});
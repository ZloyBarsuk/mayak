
jQuery("body").on("click", "#schet-grid a.update_item_schet", function(){
//
    var url = $(this).attr("href");
    jQuery.get(url, function(r){

        jQuery("#modal-body-dialog").empty().html(r);
        jQuery("#modal-dialog").css("z-index", "22002");
        jQuery("#modal-dialog").css("height", "auto");
        jQuery("#modal-body-dialog").css("overflow-y", "auto");
        jQuery("#modal-dialog").css("max-height", "100%");
        jQuery("#modal-dialog").css("width", "auto");
        jQuery("#modal-dialog").modal("show");

    });

    return false;

});

jQuery("body").on("click", "#schet-grid a.print_item_schet", function(){
//
    var url = $(this).attr("href");
    jQuery.get(url, function(r){

        jQuery("#modal-body-dialog").empty().html(r);
        jQuery("#modal-dialog").css("z-index", "22002");
        jQuery("#modal-dialog").css("height", "auto");
        jQuery("#modal-body-dialog").css("overflow-y", "auto");
        jQuery("#modal-dialog").css("max-height", "100%");
        jQuery("#modal-dialog").css("width", "auto");
        jQuery("#modal-dialog").modal("show");

    });

    return false;

});

jQuery("body").on("click", "#schet-grid a.email_item_schet", function(){
//
    var url = $(this).attr("href");
    jQuery.get(url, function(r){

        jQuery("#modal-body-dialog").empty().html(r);
        jQuery("#modal-dialog").css("z-index", "22002");
        jQuery("#modal-dialog").css("height", "auto");
        jQuery("#modal-body-dialog").css("overflow-y", "auto");
        jQuery("#modal-dialog").css("max-height", "100%");
        jQuery("#modal-dialog").css("width", "auto");
        jQuery("#modal-dialog").modal("show");

    });



    return false;

});

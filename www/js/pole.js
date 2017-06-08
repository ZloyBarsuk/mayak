
jQuery("body").on("click", "#pole-grid a.update_item_pole", function(){
//
    var url = $(this).attr("href");
   //  alert(url);
    jQuery.get(url, function(r){

        jQuery("#modal-body-dialog-third").empty().html(r);
        jQuery("#modal-dialog-third").css("z-index", "22010");
        jQuery("#modal-dialog-third").css("height", "auto");
        jQuery("#modal-body-dialog-third").css("overflow-y", "auto");
        jQuery("#modal-dialog-third").css("max-height", "100%");
        jQuery("#modal-dialog-third").css("width", "auto");
        jQuery("#modal-dialog-third").modal("show");

    });

    return false;

});
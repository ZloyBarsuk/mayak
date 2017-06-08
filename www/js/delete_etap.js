jQuery("body").on("click", "#etap_rabot_grid a.delete_item_etap_rabot", function () {
//
    /*jQuery.ajax({
     type: 'POST',
     url: '/vidrabotpodogovoru/delete',
     dataType:'json',
     data: {item_id:row_ids},
     success: function (response) {
     //jQuery.noConflict();
     alert(response.status);
     },
     error: function (xhr, ajaxOptions, thrownError) {
     alert(xhr.status);

     }

     });*/


    var url = jQuery(this).attr("href");
    jQuery.post(url, function (response) {

     //   alert(response);
        jQuery.fn.yiiGridView.update("etap_rabot_grid");
    }).fail(function () {
        alert("Произошла ошибка удаления, возможно нет прав у вас");
    });


    return false;

});
jQuery("body").on("click", "#dopsoglasheniye-grid a.delete_soglasheniye", function () {
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
        jQuery.fn.yiiGridView.update("dopsoglasheniye-grid");
    }).fail(function () {
        alert("Произошла ошибка удаления, возможно нет прав у вас");
    });


    return false;

});
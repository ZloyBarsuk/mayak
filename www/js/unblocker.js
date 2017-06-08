/**
 * Created by Andrew on 13.01.2016.
 */

jQuery(document).ready(function () {
    var unblocker = function unblock_dogovor() {
        var dog_numb = window.DogovorGlodalID;
        jQuery.ajax({
            type: 'POST',
            data: {id_dogovor_block: dog_numb},
            url: '/dogovor/unblock',
            dataType: 'json',
            success: function (data) {
                setTimeout(function () {
                }, 3000)


            },
            error: function (xhr, ajaxOptions, thrownError) {

                error(xhr.status);
                error(thrownError);
            }
        });
    }
    window.dogovor_unblocker = unblocker;


});
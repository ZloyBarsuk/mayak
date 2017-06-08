jQuery(document).ready(function () {
    // Загрузка модалки при нажатии на кнопку добавить

    jQuery('body').on('click', '#new_contragent', function () {
            jQuery.ajax({
                type: 'POST',
                url: '/contragent/create/',
                //  data: {dog_id: dog_number},
                success: function (response) {
                    jQuery('#modal-body-dialog-contragent').empty().html(response);
                    jQuery('#modal-dialog-contragent').css('z-index', '22000');
                    jQuery('#modal-dialog-contragent').css('height', 'auto');
                    jQuery('#modal-dialog-contragent').css('max-height', '100%');
                    jQuery('#modal-dialog-contragent').css('width', 'auto');
                    jQuery('#modal-dialog-contragent').modal('show');
                    return false;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert("Произошла ошибка , возможно у вас нет прав " + xhr);
                }
            });


            // return false;
// Загрузка форм в модалку при переключении на табы
            /* jQuery('body').on('click', '#modal-dialog-contragent .tabs li a ', function () {

             var href_controller = jQuery(this).attr('href').replace('#', '');
             var id_contragent = jQuery('#Contragent_id').val();
             alert(href_controller);
             if (href_controller !== 'contragent') {
             var url = '/' + href_controller + '/' + 'create/'; //+ '/' + dogovor_ids;
             jQuery.post(url,{ id_contragent: id_contragent}, function (r) {
             jQuery('#' + href_controller).empty().html(r);
             });
             }
             });*/
        }
    );



    jQuery('body').on('click', '#modal-dialog-contragent .tabs li a ', function () {

    });



});

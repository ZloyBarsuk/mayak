// Добавление нового  договорa
jQuery(document).ready(function () {

    // Создание нового договора в модалке

    jQuery('body').on('click', '#new_dogovor', function () {

// var dog_number = jQuery('#dogovor_number').val();

        jQuery.ajax({
            type: 'POST',
            url: '/dogovor/create/',
            //   data: {dog_id: dog_number},
            success: function (response) {
                // jQuery('.modal-body-edit_dogovor').html(data);jQuery('#edit_dogovor').modal('show');
                jQuery('#modal-body-edit_dogovor').empty().html(response);
                jQuery('#edit_dogovor').modal('show');

                // отключаем кнопку сохранить, чтобы не тупили манагеры и не заводили одинаковых догвооров


                // jQuery('#modal-dialog').css('z-index', '22000');
                //  jQuery('#modal-dialog').css('height', 'auto');
                //  jQuery('#modal-dialog').css('max-height', '100%');
                //  jQuery('#modal-dialog').css('width', 'auto');
                //  jQuery.noConflict();
                //  jQuery('#modal-dialog').modal('show');
                return false;
            },
            error: function (xhr, ajaxOptions, thrownError) {

                alert('Произошла ошибка , возможно у вас нет прав ' + xhr);

            }
        });
        return false;
    });










});



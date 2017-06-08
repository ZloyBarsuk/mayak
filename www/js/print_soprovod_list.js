
// Добавление нового объекта работ по договору



    jQuery('body').on('click', '#print_soprovod_list', function () {

        var selected_adres = $("#object-grid").selGridView("getAllSelection");
        var dog_number = jQuery('#dogovor_number').val();


        jQuery.ajax({
            type: 'POST',
            url: '/universaldocument/printsoprovod/',
            data: {dogovor_id: dog_number,adres:selected_adres},
            success: function (response) {
                jQuery('#modal-body-dialog').empty().html(response);
                jQuery('#modal-dialog').css('z-index', '22000');
                jQuery('#modal-dialog').css('height', 'auto');
                jQuery('#modal-dialog').css('max-height', '100%');
                jQuery('#modal-dialog').css('width', 'auto');
                //   jQuery.noConflict();
                jQuery('#modal-dialog').modal('show');
                return false;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("Произошла ошибка!Причины:- возможно у вас нет прав, - вы не ввели данные о полевых работах" + xhr);

            }
        });


});

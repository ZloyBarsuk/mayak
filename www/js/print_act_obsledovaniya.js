// Добавление нового поля

jQuery('body').on('click', '#object-grid a.act_obsledovaliya', function () {

    var object_id = jQuery(this).closest("tr").attr("id");
    jQuery.ajax({
        type: 'POST',
        url: '/dogovor/actobsledovaniya/',
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

            return false;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + response.message);
        }
    });
    return false;
});


// обработка самой формы акта обследования


jQuery('body').on('click', '#print_act_obsl', function () {

    // var selected_adres = $("#object-grid").selGridView("getAllSelection");
    //  var dog_number = jQuery('#dogovor_number').val();
    //  var dog_number = jQuery('#dogovor_number').val();
    var object_rabot_id = jQuery('#object_rabot_id').val();
    var date_act = jQuery('#date_act').val();
    var kadastr_pasport_number = jQuery('#kadastr_pasport_number').val();
    var reestr_number = jQuery('#reestr_number').val();
    //  var date_number = jQuery('#date_number').val();

    var user_list=jQuery( "#users_list option:selected" ).val();

// alert(user_list);

    // вывод формы дя заполнения дат и списка сотрудников


    jQuery.ajax({
        type: 'POST',
        url: '/universaldocument/printactobsledovaniya/',
        data: {

            object_rabot_id: object_rabot_id,
            date_act: date_act,
            kadastr_pasport_number: kadastr_pasport_number,
            reestr_number: reestr_number,
            users_list: user_list

        },
        success: function (response) {
            jQuery('#modal-body-dialog-third').empty().html(response);
            jQuery('#modal-dialog-third').css('z-index', '22010');
            jQuery('#modal-dialog-third').css('height', 'auto');
            jQuery('#modal-dialog-third').css('max-height', '100%');
            jQuery('#modal-dialog-third').css('width', 'auto');
            //   jQuery.noConflict();
            jQuery('#modal-dialog-third').modal('show');
            return false;
            return false;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + xhr);
        }
    });


});
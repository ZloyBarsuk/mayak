// Добавление нового объекта работ по договору


jQuery('body').on('click', '#show_propusk_form', function () {


    jQuery.ajax({
        type: 'POST',
        url: '/dogovor/showpropuskform/',

        success: function (response) {
            jQuery('#modal-body-dialog').empty().html(response);
            jQuery("#modal-dialog").css("z-index", "22002");
            jQuery("#modal-dialog").css("height", "auto");
            jQuery("#modal-body-dialog").css("overflow-y", "auto");
            jQuery("#modal-dialog").css("max-height", "100%");
            jQuery("#modal-dialog").css("width", "auto");
            jQuery("#modal-dialog").modal("show");
            return false;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + xhr);
        }
    });


});


jQuery('body').on('click', '#print_propusk', function () {

    var selected_adres = $("#object-grid").selGridView("getAllSelection");
    var dog_number = jQuery('#dogovor_number').val();
    var dog_number = jQuery('#dogovor_number').val();
    var date_from = jQuery('#date_from').val();
    var date_to = jQuery('#date_to').val();
    var out_number = jQuery('#out_number').val();
    var date_number = jQuery('#date_number').val();
    var users = Array();
    $('#users_list option:selected').each(function () {
        users.push($(this).val());
    });
    var user_list = users.join(',');
    // вывод формы дя заполнения дат и списка сотрудников


    jQuery.ajax({
        type: 'POST',
        url: '/universaldocument/printpropusk/',
        data: {
            dogovor_id: dog_number,
            adres: selected_adres,
            date_from:date_from,
            date_to:date_to,
            users_list: user_list,
            out_number:out_number,
            date_number:date_number


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
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + xhr);
        }
    });


});

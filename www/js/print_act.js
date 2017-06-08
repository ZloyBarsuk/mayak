// Добавление нового поля

jQuery('body').on('click', '#dopsoglasheniye-grid a.print_act_dopsoglasheniye', function () {
    var dop_sogl_id = jQuery(this).closest("tr").attr("id");
    jQuery.ajax({
        type: 'POST',
        url: '/universaldocument/printact/',
        data: {dop_sogl_id: dop_sogl_id},
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

jQuery('body').on('click', '#print_act_by_dogovor', function () {

    var dog_number = jQuery('#dogovor_number').val();
    var stamp_parameter=$("#stamp_parameter option:selected").val();
    // вывод формы дя заполнения дат и списка сотрудников
    jQuery.ajax({
        type: 'POST',
        url: '/universaldocument/printact/',
        data: {
            dog_number: dog_number,
            stamp:stamp_parameter
        },
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
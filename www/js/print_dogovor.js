


jQuery('body').on('click', '#print_dogovor', function () {

    var dog_id = jQuery('#dogovor_number').val();


    var stamp_parameter=$("#stamp_parameter option:selected").val();

    alert(stamp_parameter);
    // вывод формы дя заполнения дат и списка сотрудников
    jQuery.ajax({
        type: 'POST',
        url: '/universaldocument/PrintDogovor/',
        data: {
            dog_id: dog_id,
            stamp: stamp_parameter
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
            alert("Произошла ошибка , возможно у вас нет прав " +JSON.stringify(xhr) );
            alert("Произошла ошибка , возможно у вас нет прав " + JSON.stringify(ajaxOptions));
            alert("Произошла ошибка , возможно у вас нет прав " + JSON.stringify(thrownError));

        }
    });


});
// Добавление нового поля

jQuery('body').on('click', '#object-grid a.item_obracheniye', function () {

    var object_id = jQuery(this).closest("tr").attr("id");



    jQuery.ajax({
        type: 'POST',
        url: '/dogovor/obracheniye/',
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


jQuery('body').on('click', '#print_obracheniye', function () {


    var object_rabot_id = jQuery('#object_rabot_id').val();
    var glava_rayona= jQuery('#glava_rayona').val();
    var tip_rabot=jQuery( "#tip_rabot option:selected" ).text();
    var out_number= jQuery('#out_number').val();
    var date_number= jQuery('#date_number').val();
    var format_lista= jQuery('#format_lista').val();
    var kvo_listov_prot= jQuery('#kvo_listov_prot').val();
    var kvo_listov_plan= jQuery('#kvo_listov_plan').val();

    var schema= jQuery('#schema').val();



    // вывод формы дя заполнения дат и списка сотрудников


    jQuery.ajax({
        type: 'POST',
        url: '/universaldocument/printobracheniye/',
        data: {

            object_rabot_id: object_rabot_id,
            tip_rabot: tip_rabot,
            glava_rayona:glava_rayona,
            out_number:out_number,
            date_number:date_number,
            format_lista:format_lista,
            kvo_listov_prot:kvo_listov_prot,
            kvo_listov_plan:kvo_listov_plan,
            schema:schema
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
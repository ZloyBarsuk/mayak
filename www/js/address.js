jQuery("body").on("change", "#address_actions", function () {

    var selected_option = $(this).val();
    $('#address_actions option').removeAttr('selected');
    var object_id = $("#object-grid").selGridView("getAllSelection");


    // alert(JSON.stringify(object_id));
    //  alert(typeof(object_id.length));
    // alert(typeof(controller_url));


    var url_array = {
        '': '',
        'update_my_adress': '/objectrabot/update/',
        'add_etap_rabot': '/etaprabotpoobjectu/create/',
        'add_pole': '/soprovoditelniylist/create/',
        'print_act_obsledovaniya': '/dogovor/actobsledovaniya/',
        'print_tehzadaniye': '/dogovor/tehzadaniye/',
        'print_dopsvedeniya': '/dogovor/dopsvedeniya/',
        'print_zayava_dopsvedeniya': '/dogovor/ZayavaDopsvedeniya/',
        'print_obracheniye': '/dogovor/obracheniye/',
        'delete': '/objectrabot/delete/'
    };
    var controller_url = url_array[selected_option];
    if (object_id.length > 1) {
        jQuery.fn.yiiGridView.update('object-grid');
        alert("Нельзя выбирать более одного адреса для данной операции!!!");
        // $("#address_actions option[value='']").attr("selected", "selected");
        return false;
    }

    if (controller_url == '/objectrabot/delete/') {
        var delete_adress = confirm('Вы действительно хотите удалить выбранный адрес?');
        if (delete_adress) {
            jQuery.post(controller_url, {object_id: object_id[0]}, function (data) {
                alert('Адрес и все связанные с ним документы были у спешно удалены!');
                jQuery.fn.yiiGridView.update('object-grid');
            });
            return false;
        }
        else {
            return false;
        }
    }




    if (controller_url == undefined) {

        return false;
    }

    jQuery.ajax({
        type: 'POST',
        url: controller_url,
        data: {object_id: object_id[0]},
        success: function (data) {
            jQuery("#modal-body-dialog").empty().html(data);
            jQuery("#modal-dialog").css("z-index", "22002");
            jQuery("#modal-dialog").css("height", "auto");
            jQuery("#modal-body-dialog").css("overflow-y", "auto");
            jQuery("#modal-dialog").css("max-height", "100%");
            jQuery("#modal-dialog").css("width", "auto");
            jQuery("#modal-dialog").modal("show");
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + xhr);
            //  alert(JSON.stringify(xhr) );
            //   alert(JSON.stringify(ajaxOptions));
            //  alert(JSON.stringify(thrownError));
        }
    });
    return false;
});
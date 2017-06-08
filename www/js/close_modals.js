/**
 * Created by Andrew on 13.01.2016.
 */

jQuery(document).ready(function () {


    // Закрытие маодальных окон

    // Редактирование договора
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

    jQuery('#edit_dogovor').on('hidden.bs.modal', function () {

        // удаление блокиовки договра при закрытии окна редактирования

        unblocker();

        // удаляем все данные из модальных окон при закрытии главного модального окна договора

        jQuery('#modal-body-edit_dogovor').empty();
        jQuery('#modal-body-edit_schet').empty();
        jQuery('#modal-body-edit_objectrabot').empty();
        jQuery('#modal-body-edit_vidrabot').empty();
        jQuery('#modal-body-edit_etaprabot').empty();
        jQuery('#modal-body-soglasheniye').empty();
        jQuery('#modal-body-act').empty();

        //закрываем все остальные открытые модалки
        jQuery('#modal-body-dialog').empty();
        jQuery('#modal-dialog').modal('hide');
        //обновление основной таблицы

        jQuery.fn.yiiGridView.update('dogovor-grid');

    });


    // Закрытие третьего модального окна (Третий уровень при добавлении этапов работ и тд.)

    jQuery('#modal-dialog-third').on('hidden.bs.modal', function () {
        // удаляем все данные из модалки при ее закрытии
        jQuery('#modal-body-dialog-third').empty();
    });


    // Закрытие модалки для остальных операций с документом

    jQuery('#modal-dialog').on('hidden.bs.modal', function () {
        // удаляем все данные из модалки при ее закрытии
        jQuery('#modal-body-dialog').empty();
        jQuery('.modal-body-dialog').empty();
        jQuery('#modal-dialog').modal('hide');
    });
});

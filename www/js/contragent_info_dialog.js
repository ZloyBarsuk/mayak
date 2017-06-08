/**
 * Created by Andrew on 13.01.2016.
 */

// Обработчик вывода данных контрагента по ID


jQuery(document).ready(function () {
        jQuery('#dogovor-grid .contragent').dblclick(function () {
                var controller_path = jQuery(this).attr('id');
                jQuery.get('/contragent/view/' + controller_path, function (data) {
                    jQuery('#modal-body-show_contragent').html(data);
                    jQuery.noConflict();
                    jQuery('#show_contragent').modal();
                });
                return false;
            }
        );
    }
);

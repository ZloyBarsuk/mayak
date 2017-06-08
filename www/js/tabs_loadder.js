/**
 * Created by Andrew on 13.01.2016.
 */

jQuery(document).ready(function () {

    // Загружаем данные по текущему договору в зависимости от нажатия на вкладку. Тоесть, при нажатии на вкладку выбираем из
// сводных таблиц данные и выводим пользователю.

    jQuery('body').on('click', '#edit_dogovor .tabs li a ', function () {
     //   alert("Закладки из главного файла");
        var href_controller = jQuery(this).attr('href').replace('#', '');
        var dogovor_ids = jQuery('#dogovor_number').val();
//alert('href_controller='+href_controller);
//alert(jQuery('#dogovor_number').val());
     //   alert(href_controller);
        if (href_controller !== 'dogovor' && href_controller !=='universaldocument') {

            var url = '/' + href_controller + '/' + 'infobydogovor' + '/' + dogovor_ids;
// alert(url);
            jQuery.get(url, function (r) {

                jQuery('#' + href_controller).html(r);
            });
        }
    });

});
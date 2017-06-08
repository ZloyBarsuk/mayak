
// Добавление нового объекта работ по договору
jQuery(document).ready(function () {
jQuery('body').on('click', '#load_calendar', function () {

   // var dog_number = jQuery('#dogovor_number').val();
    jQuery.ajax({
        type: 'POST',
        url: '/calendar/loadcalendar/',
        data: {dog: 'sad'},
        success: function (response) {

            jQuery('#modal-dialog').css('z-index', '22000');
            jQuery('#modal-dialog').css('height', '800px');
            jQuery('#modal-dialog').css('max-height', '100%');
            jQuery('#modal-dialog').css('width', 'auto');
            jQuery('.modal-header h4.modal-title-dialog').html('Ваш календарь событий на сегодня');


            //   jQuery.noConflict();
            jQuery('#modal-dialog').modal('show');
            jQuery('#modal-body-dialog').html(response);
           // return false;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Произошла ошибка , возможно у вас нет прав " + xhr);
        }
    });
    return false;
});
});
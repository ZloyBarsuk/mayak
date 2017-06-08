// Добавление  нового вида работ в справочник  через модалку
jQuery('document').ready(function () {
    jQuery('body').on('click', '#addvidrabot', function () {

        var naimenovaniye = jQuery('#SprVidRabot_naimenovaniye').val();

        if (naimenovaniye == '') {
            alert("значение не может быть пустым");
            return false;
        }


        jQuery.ajax({
            type: 'POST',
            url: '/SprVidRabot/CreateFromModal/',
            data: {naimenovaniye: naimenovaniye},
            success: function (option) {
                //  $('#VidRabotPoDogovoru_id_vid_rabot :selected').prop('selected', false);
                var select = $('#VidRabotPoDogovoru_id_vid_rabot');
                // select.prop("selected", false);
                select.append(option).prop('selected', true);

                //  alert( );
                return false;

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('Произошла ошибка , возможно у вас нет прав ' + xhr);
            }
        });
        return false;
    });
});
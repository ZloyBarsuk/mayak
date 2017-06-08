<?php
// Yii::app()->clientScript->scriptMap['jquery'] = false;
// Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

/*

 Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
Yii::app()->clientScript->scriptMap['bootstrap.min.js'] = false;
Yii::app()->clientScript->scriptMap['bootstrap.bootbox.min.js'] = false;
Yii::app()->clientScript->scriptMap['bootstrap.min.css'] = false;
Yii::app()->clientScript->scriptMap['bootstrap-responsive.min.css'] = false;
Yii::app()->clientScript->scriptMap['bootstrap-yii.css'] = false;
Yii::app()->clientScript->scriptMap['jquery-ui-bootstrap.css'] = false;

*/
?>
<?php
/*
$autocompleteConfig = array(
    'model' => Ispolnitel::model(), // модель
    'attribute' => 'name', // атрибут модели
    'htmlOptions' => array(
        'class' => '',
    ),
    //   'htmlOptions'=>array('class'=>'form-control'),
// "источник" данных для выборки
// может быть url, который возвращает JSON, массив
// или функция JS('js: alert("Hello!");')
    'source' => Yii::app()->createUrl('contragent/autocomplete'),
// параметры, подробнее можно посмотреть на сайте
// http://jqueryui.com/demos/autocomplete/
    'options' => array(
// минимальное кол-во символов, после которого начнется поиск
        'minLength' => '3',
        'showAnim' => 'fold',
// обработчик события, выбор пункта из списка
        'select' => 'js: function(event, ui) {
// действие по умолчанию, значение текстового поля
// устанавливается в значение выбранного пункта
this.value = ui.item.label;
// устанавливаем значения скрытого поля
$("#dogovor_id_firma").val(ui.item.id);
return false;
}',
    ),
    'htmlOptions' => array(
        'maxlength' => 50,
        'class' => 'form-control',
    ),
);*/
?>
<?php //Yii::app()->getClientScript()->registerCoreScript('add_dogovor'); ?>


<div class="wrapper wrapper-white">
    <div class="row">
        <?php

        $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
            //'themeCssFile'=>'cupertino/jquery-ui.min.css',
            'id' => 'fullcalendars',
            'options' => array(
                'lang' => 'ru',
                'lazyFetching' => true,
                'selectable' => true,
                'selectHelper' => false,
                'minTime' => '09:00:00',
                'maxTime' => '18:00:00',
                'height' => '500',
                'width' => '100%',

                // 'firstDay'=> '1',
                //  'allDaySlot' => false,
                'defaultView' => 'agendaWeek',
                'header' => array(
                    'left' => 'prev,next,today',
                    'center' => 'title',
                    'right' => 'month,agendaWeek,agendaDay',
                ),
                'events' => $this->createUrl('calendar/calendarEvents'), // URL to get event
                // 'events' => $events, // URL to get event
                'select' => 'js:function(startDate, endDate, jsEvent,view){

             $.post("' . Yii::app()->createUrl("/calendar/create") . '", function(data){
        jQuery("#modal-body-dialog-third").empty().html(data);
        jQuery("#modal-dialog-third").css("z-index", "22010");
        jQuery("#modal-dialog-third").css("height", "auto");
        jQuery("#modal-body-dialog-third").css("overflow-y", "auto");
        jQuery("#modal-dialog-third").css("max-height", "100%");
        jQuery("#modal-dialog-third").css("width", "auto");
        jQuery("#modal-dialog-third").modal("show");

        })}',
                'eventClick' => 'js:function(calEvent, jsEvent, view) {
               $.post("' . Yii::app()->createUrl("/calendar/update/id") . '"+"/"+calEvent.id, function(data){
        jQuery("#modal-body-dialog-third").empty().html(data);
        jQuery("#modal-dialog-third").css("z-index", "22010");
        jQuery("#modal-dialog-third").css("height", "auto");
        jQuery("#modal-body-dialog-third").css("overflow-y", "auto");
        jQuery("#modal-dialog-third").css("max-height", "100%");
        jQuery("#modal-dialog-third").css("width", "auto");
        jQuery("#modal-dialog-third").modal("show");

        })

          //  $("#myModalBody").load("' . Yii::app()->createUrl("/calendar/update/view/id/") . '"+calEvent.id);

        }',
            )));

        ?>
    </div>


</div>




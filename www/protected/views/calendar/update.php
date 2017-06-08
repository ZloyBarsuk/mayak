<?php
    /* @var $this CalendarController */
    /* @var $model EventFullcalendar */

$this->breadcrumbs=array(
	'Event Fullcalendars'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список EventFullcalendar', 'url'=>array('index')),
    array('label'=>'Создать EventFullcalendar', 'url'=>array('create')),
    array('label'=>'Просмотр EventFullcalendar', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление EventFullcalendar', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  EventFullcalendar <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
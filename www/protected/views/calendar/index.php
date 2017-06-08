<?php
/* @var $this CalendarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Fullcalendars',
);

$this->menu=array(
array('label'=>'Create EventFullcalendar', 'url'=>array('create')),
array('label'=>'Manage EventFullcalendar', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Event Fullcalendars</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

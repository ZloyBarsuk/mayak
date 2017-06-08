<?php
/* @var $this SprPrilojeniyaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spr Prilojeniyas',
);

$this->menu=array(
array('label'=>'Create SprPrilojeniya', 'url'=>array('create')),
array('label'=>'Manage SprPrilojeniya', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Spr Prilojeniyas</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

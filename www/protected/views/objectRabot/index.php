<?php
/* @var $this ObjectRabotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Object Rabots',
);

$this->menu=array(
array('label'=>'Create ObjectRabot', 'url'=>array('create')),
array('label'=>'Manage ObjectRabot', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Object Rabots</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

<?php
/* @var $this SprVidRabotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spr Vid Rabots',
);

$this->menu=array(
array('label'=>'Create SprVidRabot', 'url'=>array('create')),
array('label'=>'Manage SprVidRabot', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Spr Vid Rabots</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

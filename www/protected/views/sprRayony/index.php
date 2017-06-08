<?php
/* @var $this SprRayonyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spr Rayonies',
);

$this->menu=array(
array('label'=>'Create SprRayony', 'url'=>array('create')),
array('label'=>'Manage SprRayony', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Spr Rayonies</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

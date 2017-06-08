<?php
/* @var $this SprEtapRabotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spr Etap Rabots',
);

$this->menu=array(
array('label'=>'Create SprEtapRabot', 'url'=>array('create')),
array('label'=>'Manage SprEtapRabot', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Spr Etap Rabots</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

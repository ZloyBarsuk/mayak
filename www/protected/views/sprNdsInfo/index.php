<?php
/* @var $this SprNdsInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spr Nds Infos',
);

$this->menu=array(
array('label'=>'Create SprNdsInfo', 'url'=>array('create')),
array('label'=>'Manage SprNdsInfo', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Spr Nds Infos</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

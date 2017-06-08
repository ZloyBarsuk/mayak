<?php
/* @var $this SprZatratController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spr Zatrats',
);

$this->menu=array(
array('label'=>'Create SprZatrat', 'url'=>array('create')),
array('label'=>'Manage SprZatrat', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Spr Zatrats</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

<?php
/* @var $this SprGosOrganController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spr Gos Organs',
);

$this->menu=array(
array('label'=>'Create SprGosOrgan', 'url'=>array('create')),
array('label'=>'Manage SprGosOrgan', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Spr Gos Organs</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

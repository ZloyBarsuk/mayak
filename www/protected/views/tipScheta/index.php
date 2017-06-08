<?php
/* @var $this TipSchetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tip Schetas',
);

$this->menu=array(
array('label'=>'Create TipScheta', 'url'=>array('create')),
array('label'=>'Manage TipScheta', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Tip Schetas</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

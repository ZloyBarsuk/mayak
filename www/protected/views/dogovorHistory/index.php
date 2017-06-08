<?php
/* @var $this DogovorHistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dogovor Histories',
);

$this->menu=array(
array('label'=>'Create DogovorHistory', 'url'=>array('create')),
array('label'=>'Manage DogovorHistory', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Dogovor Histories</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

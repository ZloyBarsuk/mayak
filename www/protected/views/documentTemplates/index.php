<?php
/* @var $this DocumentTemplatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Document Templates',
);

$this->menu=array(
array('label'=>'Create DocumentTemplates', 'url'=>array('create')),
array('label'=>'Manage DocumentTemplates', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Document Templates</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

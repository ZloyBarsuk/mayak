<?php
/* @var $this VidRaborPoDogovoruController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vid Rabor Po Dogovorus',
);

$this->menu=array(
array('label'=>'Create VidRaborPoDogovoru', 'url'=>array('create')),
array('label'=>'Manage VidRaborPoDogovoru', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Vid Rabor Po Dogovorus</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

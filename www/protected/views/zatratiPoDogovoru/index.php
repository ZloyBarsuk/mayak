<?php
/* @var $this ZatratiPoDogovoruController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zatrati Po Dogovorus',
);

$this->menu=array(
array('label'=>'Create ZatratiPoDogovoru', 'url'=>array('create')),
array('label'=>'Manage ZatratiPoDogovoru', 'url'=>array('admin')),
);
?>
<div class="col-md-12">
    <h1>Zatrati Po Dogovorus</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

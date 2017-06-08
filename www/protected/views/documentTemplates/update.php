<?php
    /* @var $this DocumentTemplatesController */
    /* @var $model DocumentTemplates */

$this->breadcrumbs=array(
	'Document Templates'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список DocumentTemplates', 'url'=>array('index')),
    array('label'=>'Создать DocumentTemplates', 'url'=>array('create')),
    array('label'=>'Просмотр DocumentTemplates', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление DocumentTemplates', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  DocumentTemplates <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
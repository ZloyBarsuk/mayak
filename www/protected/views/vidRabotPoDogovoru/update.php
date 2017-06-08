<?php
    /* @var $this VidRaborPoDogovoruController */
    /* @var $model VidRaborPoDogovoru */

$this->breadcrumbs=array(
	'Vid Rabor Po Dogovorus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список VidRaborPoDogovoru', 'url'=>array('index')),
    array('label'=>'Создать VidRaborPoDogovoru', 'url'=>array('create')),
    array('label'=>'Просмотр VidRaborPoDogovoru', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление VidRaborPoDogovoru', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  VidRaborPoDogovoru <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
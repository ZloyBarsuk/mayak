<?php
    /* @var $this ZatratiPoDogovoruController */
    /* @var $model ZatratiPoDogovoru */

$this->breadcrumbs=array(
	'Zatrati Po Dogovorus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список ZatratiPoDogovoru', 'url'=>array('index')),
    array('label'=>'Создать ZatratiPoDogovoru', 'url'=>array('create')),
    array('label'=>'Просмотр ZatratiPoDogovoru', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление ZatratiPoDogovoru', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  ZatratiPoDogovoru <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
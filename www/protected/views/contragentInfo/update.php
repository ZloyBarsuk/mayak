<?php
    /* @var $this ContragentInfoController */
    /* @var $model ContragentInfo */

$this->breadcrumbs=array(
	'Contragent Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'Список ContragentInfo', 'url'=>array('index')),
    array('label'=>'Создать ContragentInfo', 'url'=>array('create')),
    array('label'=>'Просмотр ContragentInfo', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление ContragentInfo', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  ContragentInfo <?php echo $model->id; ?></h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
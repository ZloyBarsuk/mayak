<?php
    /* @var $this SprNdsInfoController */
    /* @var $model SprNdsInfo */

$this->breadcrumbs=array(
	'Справочник ставок НДС'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Обновить',
);

    $this->menu=array(
  //  array('label'=>'Список SprNdsInfo', 'url'=>array('index')),
    array('label'=>'Создать', 'url'=>array('create')),
 //   array('label'=>'Просмотр SprNdsInfo', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  "<?php echo $model->stavka_nds; ?>"</h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
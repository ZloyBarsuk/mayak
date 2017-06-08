<?php
    /* @var $this SprGosOrganController */
    /* @var $model SprGosOrgan */

$this->breadcrumbs=array(
    'Гос. органы'=>array('admin'),

);

    $this->menu=array(
  //  array('label'=>'Список SprGosOrgan', 'url'=>array('index')),
    array('label'=>'Создать ', 'url'=>array('create')),
  //  array('label'=>'Просмотр SprGosOrgan', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Управление ', 'url'=>array('admin')),
    );
    ?>
    <div class="col-md-12">
        <h1>
            Обновить  орган "<?php echo $model->uchreghdenie; ?>"</h1>
    </div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
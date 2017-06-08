<?php
/* @var $this TipSchetaController */
/* @var $model TipScheta */

$this->breadcrumbs = array(
    'Тип счета' => array('admin'),
    'Создать',
);

$this->menu = array(
    // array('label'=>'List TipScheta', 'url'=>array('index')),
    array('label' => 'Управление', 'url' => array('admin')),
);
?>

<div class="col-md-10">
    <h1>Создать новый элемет</h1>
</div>
<?php $this->renderPartial('_form', array('model' => $model)); ?>

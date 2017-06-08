<?php
/* @var $this ContragentController */
/* @var $model Contragent */

$this->breadcrumbs = array(
    'Contragents' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Contragent', 'url' => array('index')),
    array('label' => 'Create Contragent', 'url' => array('create')),
    array('label' => 'View Contragent', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Contragent', 'url' => array('admin')),
);
?>

    <h1>Update Contragent <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
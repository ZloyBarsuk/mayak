<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Ошибочка';
$this->breadcrumbs = array(
    'Ошибочка',
);
?>

<h2>Ошибочка прав доступа <?php echo $code; ?></h2>





<div class="error">
    <img alt="" style="margin-top: 69px;" src="/img/chimpmedia.jpg" width="300" height="255">

    <?php echo CHtml::encode($message); ?>
</div>
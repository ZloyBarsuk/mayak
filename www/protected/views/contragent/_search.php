<?php
/* @var $this ContragentController */
/* @var $model Contragent */
/* @var $form CActiveForm */
?>

    <div class="col-md-10">
        <div class="col-md-6">
        <div class="form-group">

            <?php $form = $this->beginWidget('CActiveForm', array(
                'action' => Yii::app()->createUrl($this->route),
                'method' => 'get',
            ), array('class' => 'form-control')); ?>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <?php echo $form->label($model, 'id'); ?>
                <?php echo $form->textField($model, 'id', array('class' => 'form-control')); ?>
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <?php echo $form->label($model, 'name'); ?>
                <?php echo $form->textField($model, 'name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            </div>
        </div>

            <div class="col-md-6">
                <div class="form-group">
                <?php echo $form->label($model, 'type'); ?>
                <?php echo $form->textField($model, 'type', array('size' => 7, 'maxlength' => 7, 'class' => 'form-control')); ?>
            </div>
    </div>

            <div class="form-group">
                <?php echo CHtml::submitButton('Поиск', array('type' => 'submit', 'class' => 'btn btn-default')); ?>
            </div>
</div>
            <?php $this->endWidget(); ?>

        </div>


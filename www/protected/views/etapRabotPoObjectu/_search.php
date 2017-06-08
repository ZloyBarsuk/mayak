<?php
/* @var $this EtapRaborPoObjectuController */
/* @var $model EtapRaborPoObjectu */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>








                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php //  echo $form->label($dataProvider_etap,'adress'); ?>
                    <?php // echo $form->textField($dataProvider_etap,'adress',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                </div>
            </div>
        </div>


        <div class="row">

    </div>
    <div class="col-md-5">
        <div class="form-group">
            <div class="row buttons">
                <?php echo CHtml::submitButton('Поиск',array('class'=>'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- search-form -->
<div class="row">

</div>
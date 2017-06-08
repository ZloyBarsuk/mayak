<?php
/* @var $this SoprovoditelniylistController */
/* @var $model SoprovoditelniyList */
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
                    <?php echo $form->label($model,'id'); ?>
                    <?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id_objecta'); ?>
                    <?php echo $form->textField($model,'id_objecta',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id_polevik_1'); ?>
                    <?php echo $form->textField($model,'id_polevik_1',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id_polevik_2'); ?>
                    <?php echo $form->textField($model,'id_polevik_2',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id_kameralka'); ?>
                    <?php echo $form->textField($model,'id_kameralka',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id_mejevoy'); ?>
                    <?php echo $form->textField($model,'id_mejevoy',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id_proveril_pole'); ?>
                    <?php echo $form->textField($model,'id_proveril_pole',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id_proveril_mejevoy'); ?>
                    <?php echo $form->textField($model,'id_proveril_mejevoy',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'id_proveril_kameralka'); ?>
                    <?php echo $form->textField($model,'id_proveril_kameralka',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'data_vidachi_pole'); ?>
                    <?php echo $form->textField($model,'data_vidachi_pole',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'data_sdachi_pole'); ?>
                    <?php echo $form->textField($model,'data_sdachi_pole',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'data_sdachi_mejevoy'); ?>
                    <?php echo $form->textField($model,'data_sdachi_mejevoy',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'data_vidachi_kameralka'); ?>
                    <?php echo $form->textField($model,'data_vidachi_kameralka',array('class'=>'form-control')); ?>
                </div>
            </div>
        </div>

                    <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $form->label($model,'data_sdachii_kameralka'); ?>
                    <?php echo $form->textField($model,'data_sdachii_kameralka',array('class'=>'form-control')); ?>
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
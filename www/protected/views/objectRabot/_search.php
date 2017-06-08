<?php
/* @var $this ObjectRabotController */
/* @var $model ObjectRabot */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl('/objectrabot/infobydogovor'),
        'method' => 'post',
    )); ?>



    <div class="row">

        <table border="0">
            <tr>
                <td scope="col" style="vertical-align: middle;">
                    <div class="form-group">
                        <?php // echo $form->labelEx($model,'Поиск по адресу'); ?>
                        <?php // echo $form->label('','Поиск по адресу'); ?>
                        <?php echo $form->textField($model, 'adress', array('class' => 'form-control')); ?>
                    </div>
                </td>
                <td>
                    &nbsp;
                </td>
                <td>
                    &nbsp;
                </td>
                <td scope="col">
                    <div class="form-group">
                        <?php echo CHtml::submitButton('Найти', array('class' => 'btn btn-primary')); ?>
                    </div>
                </td>
            </tr>
        </table>


    </div>



    <?php $this->endWidget(); ?>

</div><!-- search-form -->
<div class="row">

</div>
<?php
/* @var $this IspolnitelController */
/* @var $model Ispolnitel */
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>upload image</h4>
</div>


<div class="modal-body ajaxuploader">

    <?php $form = $this->beginWidget('CActiveForm',
        array(
            'action' => CHtml::normalizeUrl(array('ajaxuploader/upload/process')),
            'method' => 'post',
            'htmlOptions' => array('id' => 'MyUploadForm', 'enctype' => 'multipart/form-data', 'onSubmit' => 'return false')
        ));

    ?>

    <?php echo $form->fileField($model, 'ImageFile', array('id' => 'imageInput')); ?>

    <div class="form-group">
        <?php echo CHtml::submitButton('Создать', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>
    <?php  echo '<div id="progressbox" style="display:none;">'; ?>
    <?php echo'<div id="statustxt">0%</div></div>'?>

    <!---<div id="output"></div>  --uncomment this line to get the output on the modal or name another DOM element to have an id of #output>   -->
    <div id="alerter"></div>
</div>
<div class="modal-footer" style="background-color:inherit;">
</div>

<div class="row">

</div>
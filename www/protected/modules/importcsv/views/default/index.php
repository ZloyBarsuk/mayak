<?php
/**
 * ImportCSV Module
 *
 * @author Artem Demchenkov <lunoxot@mail.ru>
 * @version 0.0.3
 *
 * module form
 */

$this->breadcrumbs = array(
    Yii::t('importcsvModule.importcsv', 'Import') . " таблиц Access из файла CSV",
);
?>
<div class="row">
    <div class="wrapper wrapper-white">

        <div class="row">
            <div class="col-md-8">
                <div id="importCsvSteps">
                    <h1><?php echo Yii::t('importcsvModule.importcsv', 'Import'); ?> CSV</h1>

                    <strong><?php echo Yii::t('importcsvModule.importcsv', 'File'); ?> :</strong> <span
                        id="importCsvForFile">&nbsp;</span><br/>
                    <strong><?php echo Yii::t('importcsvModule.importcsv', 'Fields Delimiter'); ?> :</strong> <span
                        id="importCsvForDelimiter">&nbsp;</span><br/>
                    <strong><?php echo Yii::t('importcsvModule.importcsv', 'Text Delimiter'); ?> :</strong> <span
                        id="importCsvForTextDelimiter">&nbsp;</span><br/>
                    <strong><?php echo Yii::t('importcsvModule.importcsv', 'Table'); ?> :</strong> <span
                        id="importCsvForTable">&nbsp;</span><br/><br/>

                    <?php echo CHtml::beginForm('', 'post', array('enctype' => 'multipart/form-data')); ?>
                    <?php echo CHtml::hiddenField("fileName", ""); ?>
                    <?php echo CHtml::hiddenField("thirdStep", "0"); ?>

                    <div id="importCsvFirstStep">
                        <div id="importCsvFirstStepResult">
                            &nbsp;
                        </div>
                        <?php echo CHtml::button(Yii::t('importcsvModule.importcsv', 'Select CSV File'), array("id" => "importStep1", 'class' => 'btn btn-success')); ?>
                    </div>

                    <div id="importCsvSecondStep">
                        <div id="importCsvSecondStepResult">
                            &nbsp;
                        </div>
                        <div class="col-md-3">
                            <strong><?php echo Yii::t('importcsvModule.importcsv', 'Fields Delimiter'); ?></strong>
                            <span class="require">*</span><br/>
                            <?php echo CHtml::textField("delimiter", $delimiter, array('class' => 'form-control')); ?>
                            <br/><br/>
                        </div>
                        <div class="col-md-3">
                            <strong><?php echo Yii::t('importcsvModule.importcsv', 'Text Delimiter'); ?></strong><br/>
                            <?php echo CHtml::textField("textDelimiter", $textDelimiter, array('class' => 'form-control')); ?>
                            <br/><br/>
                        </div>
                        <div class="col-md-3">
                            <strong><?php echo Yii::t('importcsvModule.importcsv', 'Table'); ?></strong> <span
                                class="require">*</span><br/>
                            <?php echo CHtml::dropDownList('table', '', $tablesArray, array('class' => 'form-control')); ?>
                            <br/><br/></div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="col-md-2">
                                    <?php
                                    echo CHtml::ajaxSubmitButton(Yii::t('importcsvModule.importcsv', 'Next'), '', array(
                                        'update' => '#importCsvSecondStepResult',
                                    ), array('class' => 'btn btn-warning'));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php echo CHtml::endForm(); ?>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div id="importCsvThirdStep">
                                <?php echo CHtml::beginForm('', 'post'); ?>
                                <?php echo CHtml::hiddenField("thirdStep", "1"); ?>
                                <?php echo CHtml::hiddenField("thirdDelimiter", ""); ?>
                                <?php echo CHtml::hiddenField("thirdTextDelimiter", ""); ?>
                                <?php echo CHtml::hiddenField("thirdTable", ""); ?>
                                <?php echo CHtml::hiddenField("thirdFile", ""); ?>
                                <div id="importCsvThirdStepResult">
                                    &nbsp;
                                </div>
                                <div id="importCsvThirdStepColumnsAndForm">
                                    <div id="importCsvThirdStepColumns">&nbsp;</div>
                                    <br/>
                                    <?php
                                    echo CHtml::ajaxSubmitButton(Yii::t('importcsvModule.importcsv', 'Import'), '', array(
                                        'update' => '#importCsvThirdStepResult',
                                    ),array('class'=>'btn btn-danger'));

                                    ?>
                                    <?php echo CHtml::endForm(); ?>
                                </div>

                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                            <span  id="importCsvBread1">&laquo; <?php echo CHtml::link(Yii::t('importcsvModule.importcsv', 'Start over'), array("/importcsv")); ?></span>
                        <span id="importCsvBread2"> &laquo; <a href="javascript:void(0)"
                                                               id="importCsvA2"><?php echo Yii::t('importcsvModule.importcsv', 'Fields Delimiter') . ", " . Yii::t('importcsvModule.importcsv', 'Text Delimiter') . " " . Yii::t('importcsvModule.importcsv', 'and') . " " . Yii::t('importcsvModule.importcsv', 'Table'); ?></a></span>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
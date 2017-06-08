<?php
/* @var $this SchetController */
/* @var $model Schet */

$this->breadcrumbs = array(
    'Счета ' => array('admin'),
    'Управление',
);

$this->menu = array(
    array('label' => 'Управление Изменениями договора', 'url' => array('admin')),
);
?>

<?php

// создание нового счета из модалки

/*Yii::app()->clientScript->registerScript('new_schet', "
$('#add_schet').click(function(){
jQuery.noConflict();
  // alert('Вы нажали на элемент ');
  var dog_number=$('#dogovor_number').val();
$.get('/schet/create/',{ dog_id:dog_number}, function(request){

$('#modal-body-dialog').empty().html(request);
$('#modal-dialog').css('z-index', '22002');
$('#modal-dialog').css('height', 'auto');
$('#modal-body-dialog').css('overflow-y', 'auto');
$('#modal-dialog').css('max-height', '100%');
$('#modal-dialog').css('width', 'auto');
jQuery.noConflict();
  $('#modal').modal('show');

});





// alert(dog_number);
$('#Schet_id_dogovor').val(dog_number);

return false;
}

);
");*/
?>


<?php
// обновление выюранного счета
/*Yii::app()->clientScript->registerScript('load_schet', "
$('#schet-grid').on('click', 'a.update', function(){
// alert('sdf');
var url = $(this).attr('href');
$.get(url, function(r){

$('#modal-body-dialog').empty().html(r);
$('#modal-dialog').css('z-index', '22002');
$('#modal-dialog').css('height', 'auto');
$('#modal-body-dialog').css('overflow-y', 'auto');
$('#modal-dialog').css('max-height', '100%');
$('#modal-dialog').css('width', 'auto');
jQuery.noConflict();
  $('#modal').modal('show');
});
return false;
}
);
");*/
?>






<?php
/*$update_schet = <<<'EOT'
function() {

$('#schet-grid a.update').off('click');
var href_controller = $(this).attr('href') ;
  alert('до аджакс');
$.get(href_controller, function(r){

  alert(' после аджакс');
  // alert(' Содержимое счета'+r);


 jQuery.noConflict();
$('#modal-body-update_schet').html(r);
$('#update_schet').css('z-index', '22000');
  $('#update_schet').modal();

});


return false;
}
EOT;
*/ ?>




<?php // Yii::app()->getClientScript()->registerCoreScript('add_schet'); ?>
<?php // Yii::app()->getClientScript()->registerCoreScript('schet'); ?>
<?php // Yii::app()->getClientScript()->registerCoreScript('delete_schet'); ?>


<div class="col-md-12">


</div>
<style>

    .history {
        /* height: 100%; */
        height: 500px;
        /* width:500px;*/
        overflow: scroll;
        overflow-x: hidden;
    }
</style>

<div class="wrapper wrapper-white">
    <p class="btn-toolbar btn-toolbar-demo">

        <?php // echo CHtml::button('+ счет', array('class' => 'btn btn-success', 'id' => 'add_schet_', 'style' => ' display:block-inline;')); ?>

    </p>

    <div class="col-md-10">
        <div class="search-form" style="display:none">

        </div>
        <!-- search-form -->

    </div>

    <div class="row row-wider">

        <!-- <div class="col-md-12">-->

        <!-- <div class="panel panel-default">
             <div class="panel-heading">

                 <ul class="panel-btn">
                     <li><a href="#" class="btn btn-danger"
                            onclick="dev_panel_fullscreen($(this).parents('.panel')); return false;"><i
                                 class="fa fa-compress"></i></a></li>
                 </ul>
             </div>

             <div class="panel-body">-->
        <div class="col-md-6 history">

            <div class="page-subtitle">
                <h3> Здесь отображается история изменений договора</h3>

            </div>

            <?php
            $dataProvider_logger = array_reverse($dataProvider_logger);
            for ($i = 0; $i < count($dataProvider_logger); $i++) {
                echo '<ul class="timeline-simple">';
                echo '<li class="primary"><div class="timeline-simple-wrap">';
                foreach ($dataProvider_logger[$i] as $key => $value) {
                    if ($key !== "Изменен") {
                        echo "<b style='color:red'>" . $key . "</b>" . ": " . $value . "<br>";
                    } else {
                        //  continue;
                    }
                }

                echo '<span class="timeline-simple-date"><i>' . date("дата  d.m.Y  время  H:m:s ", strtotime($dataProvider_logger[$i]['Изменен'])) . '</i></span></div> </li></ul>';
            }





            ?>


        </div>


    </div>
</div>

</div>

</div>



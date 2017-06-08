<?php
/* @var $this EtapRaborPoObjectuController */
/* @var $model EtapRaborPoObjectu */

$this->breadcrumbs = array(
    'Etap Rabor Po Objectus' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List EtapRaborPoObjectu', 'url' => array('index')),
    array('label' => 'Create EtapRaborPoObjectu', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('#search_info').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#etap-rabor-po-objectu-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="col-md-12">
    <h1>Управление Etap Rabor Po Objectus</h1>

</div>


<div class="wrapper wrapper-white">
    <div class="col-md-10">
        <?php echo CHtml::link('Поиск', '#', array('class' => 'btn btn-primary', 'id' => 'search_info')); ?>
        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search', array(
                'model' => $model,
            )); ?>
        </div><!-- search-form -->

    </div>

    <div class="row row-wider">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">

                    <ul class="panel-btn">
                        <li><a href="#" class="btn btn-danger"
                               onclick="dev_panel_fullscreen($(this).parents('.panel')); return false;"><i
                                    class="fa fa-compress"></i></a></li>
                    </ul>
                </div>

                <div class="panel-body">

                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'itemsCssClass' => 'table table-bordered table-striped table-sortable',
                        'cssFile' => Yii::app()->baseUrl . '/css/table_users.css',
                        'template' => "\n{summary}\n{items}\n{pager}",
                        'summaryText' => false,
                        'enablePagination' => true,
                        'pager' => array(
                            'pageSize' => 5,
                            'header' => '',
                            'prevPageLabel' => '&laquo; назад',
                            'nextPageLabel' => 'далее &raquo;',
                            'maxButtonCount' => 10,
                            'htmlOptions' => array('class' => 'pagination'),
                            'selectedPageCssClass' => 'paginate_button current',
                            'cssFile' => Yii::app()->baseUrl . '/css/pagination.css',
                        ),
                        'id' => 'etap-rabor-po-objectu-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(
                           /* 'id',*/
                            /*'id_objecta',*/
                            array('name'=>'document_number',
                                'htmlOptions'=>array('width'=>'25%'),
                            ),
                            array('name'=>'contract_number',
                                'value' => 'Dogovor::model()->findByPK(ObjectRabot::model()->findByPK($data->id_objecta)->id_dogovor)->dogovor_number',
                                'htmlOptions'=>array('width'=>'25%'),
                            ),
                            array('name'=>'objects',
                                'value' => 'ObjectRabot::model()->findByPK($data->id_objecta)->archiv_number',
                                'htmlOptions'=>array('width'=>'25%'),
                            ),


                        /*    'id_spr_etap_rabot',*/
                            /*	'id_otvetstvennogo',*/

                            array('name'=>'data_nachala_rabot',
                                'type'=>'raw',
                                //  'value' => 'ObjectRabot::model()->findByPK($data->id_objecta)->archiv_number',
                                  'value' => function($data)
                                  {

                                      if($data->data_nachala_rabot=='0000-00-00')
                                      {

                                          return null;

                                      }
                                      else{

                                          return Yii::app()->dateFormatter->format("d.MM.yyyy", $data->data_nachala_rabot);
                                      }




                                  },
                            ),


                            array('name'=>'data_nachala_rabot',
                                  'type'=>'raw',
                                //  'value' => 'ObjectRabot::model()->findByPK($data->id_objecta)->archiv_number',
                                  'value' => function($data)
                                  {

                                      if($data->data_okonchaniya_rabot=='0000-00-00')
                                      {

                                          return null;

                                      }
                                      else{

                                          return Yii::app()->dateFormatter->format("d.MM.yyyy", $data->data_okonchaniya_rabot);
                                      }




                                  },
                            ),
                           // 'data_nachala_rabot',
                           // 'data_okonchaniya_rabot',
                            /*
                            'document_number',
                            'srok_dney',
                            'comment',
                            'status',
                            */
                            array(
                                'class' => 'CButtonColumn',
                                'htmlOptions' => array('width' => '100%'),
                                'header' => 'Управление',
                                'buttons' => array
                                (

                                    'delete' => array
                                    (
                                        'imageUrl' => Yii::app()->baseUrl . '/img/delete.png',
                                    ),
                                    'update' => array
                                    (
                                        'imageUrl' => Yii::app()->baseUrl . '/img/edit.png',
                                    ),

                                    'view' => array
                                    (
                                        'imageUrl' => Yii::app()->baseUrl . '/img/search.png',
                                    ),
                                ),
                            ),
                        ),
                    )); ?>


                </div>


            </div>
        </div>

    </div>

</div>

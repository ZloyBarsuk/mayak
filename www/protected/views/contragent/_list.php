

        <div class="wrapper wrapper-white">
            <div class="row">
                <?php echo CHtml::link('Расширенный поиск', '#', array('class' => 'btn btn-primary', 'id' => 'search_contragent')); ?>
                <div class="search-form" style="display:none">
                    <?php $this->renderPartial('_search', array(
                        'model' => $model,
                    )); ?>
                </div>
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
                                'id' => 'user-grid',
                                'dataProvider' => $model->search(),
                                'filter' => $model,
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
                                'id' => 'contragent-grid',
                                'dataProvider' => $model->search(),
                                'filter' => $model,
                                'columns' => array(
                                    'id',
                                    array('name' => 'name',
                                        'value' => '$data->name',
                                        'visible' => '1',
                                        'htmlOptions' => array('width' => '100%'),
                                    ),

                                    'type',
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
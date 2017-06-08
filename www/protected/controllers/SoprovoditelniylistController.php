<?php

class SoprovoditelniylistController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    /* public function accessRules()
     {
         return array(
             array('allow',  // allow all users to perform 'index' and 'view' actions
                 'actions' => array('index', 'view', 'infobydogovor'),
                 'users' => array('*'),
             ),
             array('allow', // allow authenticated user to perform 'create' and 'update' actions
                 'actions' => array('create', 'update'),
                 'users' => array('@'),
             ),
             array('allow', // allow admin user to perform 'admin' and 'delete' actions
                 'actions' => array('admin', 'delete'),
                 'users' => array('admin'),
             ),
             array('deny',  // deny all users
                 'users' => array('*'),
             ),
         );
     }*/


    public function actionInfoByDogovor($id)
    {


        $dataProvider = SoprovoditelniyList::model()->PoleByObjectu($id);

        if (Yii::app()->request->isAjaxRequest) {


            echo $datas = $this->renderPartial('pole_list_for_dogovor_modal', array('dataProvider_pole' => $dataProvider,), false, true);

            // $this->renderPartial('/objectRabot/admin', array('model' => $dataProvider2 = ObjectRabot::model(),), false, true);


        } else {
            $this->renderPartial('pole_list_for_dogovor_modal', array('dataProvider_pole' => $dataProvider,), false, true);

            //  $this->render('list_for_dogovor_modal', array('dataProvider' => $dataProvider,));

        }


    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */

    public function actionCreate()
    {
        $model = new SoprovoditelniyList;
        //проверка на наличие запроса из модалки посредством ajax
        if (Yii::app()->request->isAjaxRequest) {
            //проверка передачи айди договора при первом открытии формы если есть- то выводим саму форму
            if (isset($_POST['object_id'])) {
                $object_id = $_POST['object_id'];
                $model->id_objecta = $object_id;
                // $outputJs = Yii::app()->request->isAjaxRequest;
                $this->renderPartial('_form', array('model' => $model,), false, true);
            } else {
                $this->performAjaxValidation($model);
                if (isset($_POST['SoprovoditelniyList'])) {
                    $model->attributes = $_POST['SoprovoditelniyList'];
                    // $model->record_date = new CDbExpression('NOW()');

                    if (isset($_POST['select_all']) && $_POST['select_all'] === 'no') {


                        if ($model->save()) {
                            echo CJSON::encode(array(
                                'status' => 'true',
                                'message' => 'Данные успешно записаны'
                            ));
                            Yii::app()->end();
                        } else {
                            echo CJSON::encode(array(
                                'status' => 'false',
                                'message' => $model->getErrors(),
                            ));
                            Yii::app()->end();
                        }


                    } elseif (isset($_POST['select_all']) && $_POST['select_all'] === 'yes') {


                        $model_find_dogovor = ObjectRabot::model()->findByPK($_POST['SoprovoditelniyList']['id_objecta']);


                        $model_all_adresses = ObjectRabot::model()->findAllByAttributes(array(
                            'id_dogovor' => (int)$model_find_dogovor->id_dogovor,
                        ));

                        $item = 0;

                        foreach ($model_all_adresses as $adress) {
                            $model_pole = new SoprovoditelniyList();

                            $model_pole->attributes = $_POST['SoprovoditelniyList'];

                            $model_pole->id_objecta = $adress->id;
                            //  var_dump($model_pole);
                            //   exit();
                            $model_pole->save();

                            $item++;
                        }
                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны ' . $item . ' адресов'
                        ));
                        Yii::app()->end();


                        //   $model_bank_info->setScenario('insert');

                    } else {

                    }

                } else {

                }
            }

        } //обычная проверка по умолчанию
        /* else {
             if (isset($_GET['dog_id'])) {
                 $dog_id = $_GET['dog_id'];
                 $model->id_dogovor = $dog_id;
                 $this->renderPartial('_form', array('model' => $model,), false, true);
             }

             if(isset($_POST['ObjectRabot']))
             {
                 $model->attributes=$_POST['ObjectRabot'];
                 if($model->save())
                     $this->redirect(array('admin','id'=>$model->id));
             }

             $this->render('create',array( 'model'=>$model,));



         }*/
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Проверяем обновляем мы данные или нет, если существует списокпеременных то да
        if (isset($_POST['SoprovoditelniyList'])) {
            //  echo "ObjectRabot";
            if (Yii::app()->request->isAjaxRequest) {
                $this->performAjaxValidation($model);
                if (isset($_POST['SoprovoditelniyList'])) {
                    $model->attributes = $_POST['SoprovoditelniyList'];

                    if ($model->save()) {
                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны'
                        ));
                        Yii::app()->end();

                    } else {
                        echo CJSON::encode(array(
                            'status' => 'false',
                            'message' => $model->getErrors(),
                        ));
                        Yii::app()->end();


                    }
                }


            }


        } else {
            // загрузка отобраения
            if (Yii::app()->request->isAjaxRequest) {
                $this->renderPartial('_form', array('model' => $model,), false, true);


            } else {
                $this->render('update', array('model' => $model,));
            }

        }

    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('SoprovoditelniyList');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new SoprovoditelniyList('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SoprovoditelniyList']))
            $model->attributes = $_GET['SoprovoditelniyList'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return SoprovoditelniyList the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = SoprovoditelniyList::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param SoprovoditelniyList $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'soprovoditelniy-list-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

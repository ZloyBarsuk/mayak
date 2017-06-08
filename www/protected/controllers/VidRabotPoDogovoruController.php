<?php

class VidRabotPoDogovoruController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
   /* public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            // 'ajaxOnly + Create',
        );
    }*/

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
   /* public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'infobydogovor', 'update', 'create'),
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
        $model = new VidRabotPoDogovoru;
        $model_vid_rabot=new SprVidRabot;
        //проверка на наличие запроса из модалки посредством ajax
        if (Yii::app()->request->isAjaxRequest) {
            //проверка передачи айди договора при первом открытии формы если есть- то выводим саму форму


            if (isset($_POST['dog_id'])) {
                $dog_id = $_POST['dog_id'];
                $model->id_dogovor = $dog_id;
                // $outputJs = Yii::app()->request->isAjaxRequest;
                $this->renderPartial('_form', array('model' => $model,'model_vid_rabot'=>$model_vid_rabot), false, true);

            } else {
                $this->performAjaxValidation($model);
                if (isset($_POST['VidRabotPoDogovoru'])) {
                    $model->attributes = $_POST['VidRabotPoDogovoru'];
                    $model->data = new CDbExpression('NOW()');
                    $model->RaschetSumm();

                    if ($model->save()) {
                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны',
                            'nds' => $model->nds,
                            'nds_summa' => $model->nds_summa,
                        ));
                        Yii::app()->end();

                    }
                    else {
                        echo CJSON::encode(array(
                            'status' => 'false',
                            'message' => $model->getErrors(),
                        ));
                        Yii::app()->end();

                    }


                }
            }


        } //обычная проверка по умолчанию
        else {


            //  $this->render('create',array( 'model'=>$model,));


        }
    }


    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {

        $model = $this->loadModel($id);
        $model_vid_rabot=new SprVidRabot;


        // Проверяем обновляем мы данные или нет, если существует списокпеременных то да
        if (isset($_POST['VidRabotPoDogovoru'])) {
            //  echo "ObjectRabot";
            if (Yii::app()->request->isAjaxRequest) {
                $this->performAjaxValidation($model);
                if (isset($_POST['VidRabotPoDogovoru'])) {
                    $model->attributes = $_POST['VidRabotPoDogovoru'];
                    $model->data = new CDbExpression('NOW()');
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
               // $this->renderPartial('_form', array('model' => $model,), false, true);
                $this->renderPartial('_form', array('model' => $model,'model_vid_rabot'=>$model_vid_rabot), false, true);

                // $this->renderPartial('admin', array('model' => VidRabotPoDogovoru::model(),), false, true);


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
        if (Yii::app()->request->isAjaxRequest) {
            echo 'Запись успешно удалена ';
            Yii::app()->end();
        }

       /* if (isset($_POST['item_id'])) {
            $this->loadModel((int)trim($_POST['item_id']))->delete();
            echo CJSON::encode(array(
                'status' => 'true',
                'message' => 'Запись успешно удалена '
            ));
            Yii::app()->end();
        }*/

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        /*if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
    }


    /**
     * Lists all models.
     */


    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('VidRabotPoDogovoru');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new VidRabotPoDogovoru('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VidRabotPoDogovoru']))
            $model->attributes = $_GET['VidRabotPoDogovoru'];

        $this->render('admin', array('model' => $model,));


    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return VidRabotPoDogovoru the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = VidRabotPoDogovoru::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param VidRabotPoDogovoru $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'vid_rabot_po_dogovoru_form_') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


    /*
     * Мои самописные методы класса
     */


    public function actionInfoByDogovor($id)
    {

        /*
                $model=Schet::model()->findAll(array(
                    'condition'=>'id_dogovor=:id',
                    'params'=>array(':id'=>$id),
                    'order'=>'id_dogovor',
                ));


        */
        /*$criteria = new CDbCriteria;
        $criteria->condition='id_dogovor='.$id;
        $criteria->select='id_dogovor,id,author_id,id_dopsoglasheniya';
        $dataProvider= new CActiveDataProvider('Schet', array('criteria' => $criteria, ));
        $this->renderPartial('list_for_dogovor_modal', array('dataProvider' => $dataProvider,),false,true);*/
        $dataProvider = VidRabotPoDogovoru::model()->VidRabotByDogovor($id);

        if (Yii::app()->request->isAjaxRequest) {

            $this->renderPartial('raboti_list_for_dogovor_modal', array('dataProvider_raboti' => $dataProvider,), false, true);

        } else {
            $this->renderPartial('raboti_list_for_dogovor_modal', array('dataProvider_raboti' => $dataProvider,), false, true);

            //  $this->render('list_for_dogovor_modal', array('dataProvider' => $dataProvider,));

        }


    }


}

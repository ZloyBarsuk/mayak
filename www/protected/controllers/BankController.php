<?php

class BankController extends Controller //Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    /*public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('index', 'view','BankByContragentID'),
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



    public function actionBankByContragentID()
    {
        $sdf=$_POST;
        $sdf=$_GET;
       // $data=Bank::model()->findAllByAttributes('id_contragenta=:id', array(':id'=>(int) $_POST['country_id']));
      //  $data=Bank::model()->findAll('id_contragenta=:id', array(':id'=>(int) $_POST['Dogovor']['id_contragent']));
        if(isset($_POST['Dogovor']['id_contragent']))
        {
              $data=Bank::model()->findAll('id_contragenta=:id', array(':id'=>(int) $_POST['Dogovor']['id_contragent']));

        }
        else{
            $data=Bank::model()->findAll('id_contragenta=:id', array(':id'=>(int) $_POST['contragent_id']));

        }

        $data=CHtml::listData($data,'id','name');
        echo CHtml::tag('option',
            array('value'=>null),CHtml::encode('Выбор банка'),true);
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($name),true);
        }
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model_bank = new Bank;

        $model_bank_info = new BankDetails;
        isset($_POST['id_contragenta'])?$model_bank->id_contragenta=$_POST['id_contragenta']:$model_bank->id_contragenta='';
        isset($_POST['id_ispolnitel'])?$model_bank->id_ispolnitel=$_POST['id_ispolnitel']:$model_bank->id_ispolnitel='';

        if (isset($_POST['Bank'])) {

            if (Yii::app()->request->isAjaxRequest) {
                $this->performAjaxValidation($model_bank);
                $this->performAjaxValidation($model_bank_info);
                if (isset($_POST['Bank']) && isset($_POST['BankDetails']) ) {
                    $model_bank->attributes = $_POST['Bank'];
                    $model_bank->record_date = date('Y-m-d');
                   // $model_bank->id_contragenta =(int) $_POST['id_contragenta'] ;
                    $model_bank_info->attributes = $_POST['BankDetails'];
                    $model_bank_info->record_date = date('Y-m-d');
                    $model_bank_info->id_author = Yii::app()->user->id;


                    if ($model_bank->save()) {
                        $model_bank_info->id_bank = $model_bank->getPrimaryKey();

                        if ($model_bank_info->save()) {

                            echo CJSON::encode(array(
                                'status' => 'true',
                                'message' => 'Данные успешно обновлены',
                            ));
                            Yii::app()->end();


                        } else {
                            echo CJSON::encode(array(
                                'status' => 'false',
                                'message' => $model_bank->getErrors(),
                            ));
                            Yii::app()->end();


                        }
                    } else {
                        echo CJSON::encode(array(
                            'status' => 'false',
                            'message' => $model_bank->getErrors(),
                        ));
                        Yii::app()->end();


                    }


                }


            } else {
                echo CJSON::encode(array(
                    'status' => 'false',
                    'message' => 'Что-то пошло не так ((',
                ));
                Yii::app()->end();

            }
        } else {
            if (Yii::app()->request->isAjaxRequest) {
                $this->renderPartial('_form', array('model_bank' => $model_bank, 'model_bank_info' => $model_bank_info), false, true);


            } else {
                $this->render('update', array('model_bank' => $model_bank, 'model_bank_info' => $model_bank_info));
            }
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model_bank = $this->loadModel($id);
        $model_bank_info = new BankDetails;
        $model_bank_info = $model_bank_info->model()->findAllByAttributes(array('id_bank' => $id), array(
            'order' => 'id desc',
            'limit' => '1',
        ));
        $model_bank_info = $model_bank_info[0];
        // Проверяем обновляем мы данные или нет, если существует списокпеременных то да
        if (isset($_POST['Bank'])) {

            if (Yii::app()->request->isAjaxRequest) {
                $this->performAjaxValidation($model_bank);
                $this->performAjaxValidation($model_bank_info);
                if (isset($_POST['Bank']) && isset($_POST['BankDetails'])) {
                    $model_bank->attributes = $_POST['Bank'];


                    // просто обновляем данные банка
                    if (isset($_POST['registerMode']) && $_POST['registerMode'] === 'no') {
                        $model_bank_info = new BankDetails;
                        $model_bank_info->setScenario('insert');

                    }
                    $model_bank_info->attributes = $_POST['BankDetails'];
                    $model_bank_info->id_author = Yii::app()->user->id;
                    $model_bank_info->record_date = date('Y-m-d');

                    if ($model_bank->save()) {
                        if ($model_bank_info->save()) {
                            echo CJSON::encode(array(
                                'status' => 'true',
                                'message' => 'Данные успешно обновлены',
                            ));
                            Yii::app()->end();


                        } else {
                            echo CJSON::encode(array(
                                'status' => 'false',
                                'message' => $model_bank->getErrors(),
                            ));
                            Yii::app()->end();


                        }
                    } else {
                        echo CJSON::encode(array(
                            'status' => 'false',
                            'message' => $model_bank->getErrors(),
                        ));
                        Yii::app()->end();


                    }


                }


            } else {


            }
        } else {
            if (Yii::app()->request->isAjaxRequest) {
                $this->renderPartial('_form', array('model_bank' => $model_bank, 'model_bank_info' => $model_bank_info), false, true);


            } else {
                $this->render('update', array('model_bank' => $model_bank, 'model_bank_info' => $model_bank_info));
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
        /*$dataProvider=new CActiveDataProvider('Bank');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));*/
        $this->actionAdmin();
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Bank('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Bank']))
            $model->attributes = $_GET['Bank'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Bank the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Bank::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Bank $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bank-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

<?php

class ContragentController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';


    /**
     * @return array action filters
     *
     *
     */


    public function actionGlobalInfo()
    {

        $term = Yii::app()->getRequest()->getParam('term');

        if (Yii::app()->request->isAjaxRequest && $term) {
            $criteria = new CDbCriteria;
            // формируем критерий поиска
            $criteria->addSearchCondition('name', $term);
            $contragents = Contragent::model()->findAll($criteria);
            // обрабатываем результат
            $result = array();
            foreach ($contragents as $contragent) {
                $lable = '№' . $contragent['id'] . ' ' . $contragent['name'];
                $result[] = array('id' => $contragent['id'], 'label' => $lable, 'value' => $lable);
            }
            echo CJSON::encode($result);
            Yii::app()->end();
        }


    }

    public function actionAutocomplete()
    {

        $term = Yii::app()->getRequest()->getParam('term');

        if (Yii::app()->request->isAjaxRequest && $term) {
            $criteria = new CDbCriteria;
            // формируем критерий поиска
            $criteria->addSearchCondition('name', $term);
            $contragents = Contragent::model()->findAll($criteria);
            // обрабатываем результат
            $result = array();
            foreach ($contragents as $contragent) {
                $lable = $contragent['name'];
                $result[] = array('id' => $contragent['id'], 'label' => $lable, 'value' => $lable);
            }
            echo CJSON::encode($result);
            Yii::app()->end();
        }


    }


   /* public function filters()
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
    /*  public function accessRules()
      {
          return array(
              array('allow',  // allow all users to perform 'index' and 'view' actions
                  'actions' => array('index', 'view', 'autocomplete', 'test', 'globalinfo', 'loadform'),
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
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('view', array(
                'model' => $this->loadModel($id),
            ), false, true);
        } else {
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */

    public function actionLoadForm()
    {
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['id'])) {
                $this->actionUpdate($_POST['id']);
            } else {
                $this->actionCreate();
            }

        }

    }


    public function actionCreate()
    {

        // Устал писать. Как есть

        $model_contragent = new Contragent;
        $model_contragent_info = new ContragentInfo;
        $model_bank = new Bank;
        $model_bank_info = new BankDetails;


        if (Yii::app()->request->isAjaxRequest) {

            // Записываем нового контрагента

            if (isset($_POST['Contragent'])) {
                $this->performAjaxValidation($model_contragent);
                $model_contragent->attributes = $_POST['Contragent'];

                if ($model_contragent->save()) {

                    echo CJSON::encode(array(
                        'status' => 'true',
                        'message' => 'Данные успешно записаны',
                        'id_contragent' => $model_contragent->getPrimaryKey(),
                        'id_ispolnitel' => null,
                    ));

                    Yii::app()->end();

                } else {
                    echo CJSON::encode(array(
                        'status' => 'false',
                        'message' => $model_contragent->getErrors(),
                        'id' => '',
                    ));
                    Yii::app()->end();
                }


            }
            if (isset($_POST['ContragentInfo'])) {
                $this->performAjaxValidationContragentInfo($model_contragent_info);
                $model_contragent_info->attributes = $_POST['ContragentInfo'];
                // $model_contragent_info->id_contragent=$model_contragent->id;
                $model_contragent_info->id_author = Yii::app()->user->id;
                $model_contragent_info->record_date = date('Y-m-d');


                if ($model_contragent_info->save()) {

                    echo CJSON::encode(array(
                        'status' => 'true',
                        'message' => 'Данные успешно записаны',
                        // 'id' => $model_contragent_info->getPrimaryKey(),
                    ));
                    Yii::app()->end();

                } else {
                    echo CJSON::encode(array(
                        'status' => 'false',
                        'message' => $model_contragent_info->getErrors(),
                        'id' => '',
                    ));
                    Yii::app()->end();
                }


            }
            if (isset($_POST['Bank']) && isset($_POST['BankDetails'])) {
                $this->performAjaxValidationBank($model_bank);
                $this->performAjaxValidationBank($model_bank_info);
                $model_bank->attributes = $_POST['Bank'];
                $model_bank_info->attributes = $_POST['BankDetails'];

                // $model_contragent_info->id_contragent=$model_contragent->id;
                //  $model_bank_info->id_contragenta = $model_bank->id_contragenta;

                $model_bank->record_date = date('Y-m-d');
                $model_bank_info->record_date = date('Y-m-d');


                if ($model_bank->save()) {
                    $model_bank_info->id_bank = $model_bank->getPrimaryKey();
                    $model_bank_info->id_author = Yii::app()->user->id;


                    if ($model_bank_info->save()) {
                        echo CJSON::encode(array(
                            'status' => 'true',
                            'message' => 'Данные успешно записаны',
                            // 'id' => $model_contragent_info->getPrimaryKey(),
                        ));
                        Yii::app()->end();
                    } else {
                        echo CJSON::encode(array(
                            'status' => 'false',
                            'message' => $model_contragent_info->getPrimaryKey(),
                            'id' => '',
                        ));
                        Yii::app()->end();
                    }

                }


            }


            // выводим модалку с формами контрагента, его инфы, банков

            $this->renderPartial('create_in_modal', array(
                'model_contragent' => $model_contragent,
                'model_contragent_info' => $model_contragent_info,
                'model_bank' => $model_bank,
                'model_bank_info' => $model_bank_info,

            ), false, true);


        } else {
            // создание контрагента

        }


    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model_contragent = $this->loadModel($id);

        $model_contragent_info = new ContragentInfo;
        $model_info = $model_contragent_info->findAllByAttributes(array('id_contragent' => $id), array('order' => 'id DESC'));
        $model_contragent_info = !empty($model_info[0])?$model_info[0]:$model_contragent_info;

        // $model_bank = new Bank;
        $model_bank = Bank::model()->findAllByAttributes(array('id_contragenta' => $id));
        $model_bank = new CArrayDataProvider($model_bank, array(
            //  'criteria' => $criteria,
            'id' => 'id',
            'pagination' => array(
                'pageSize' => 8,
            ),));


        if (Yii::app()->request->isAjaxRequest) {

            // Записываем нового контрагента

            if (isset($_POST['Contragent'])) {
                $this->performAjaxValidation($model_contragent);
                $model_contragent->attributes = $_POST['Contragent'];

                if ($model_contragent->save()) {

                    echo CJSON::encode(array(
                        'status' => 'true',
                        'message' => 'Данные успешно записаны',
                        'id' => $model_contragent->getPrimaryKey(),
                        'id_contragent' => $model_contragent->getPrimaryKey(),
                        'id_ispolnitel' => null,
                    ));

                    Yii::app()->end();

                } else {
                    echo CJSON::encode(array(
                        'status' => 'false',
                        'message' => $model_contragent->getErrors(),
                        'id' => '',
                    ));
                    Yii::app()->end();
                }


            }
            if (isset($_POST['ContragentInfo'])) {
                $this->performAjaxValidationContragentInfo($model_contragent_info);
                $model_contragent_info->attributes = $_POST['ContragentInfo'];
                // $model_contragent_info->id_contragent=$model_contragent->id;
                $model_contragent_info->id_author = Yii::app()->user->id;
                $model_contragent_info->record_date = date('Y-m-d');


                if ($model_contragent_info->save()) {

                    echo CJSON::encode(array(
                        'status' => 'true',
                        'message' => 'Данные успешно записаны',
                        // 'id' => $model_contragent_info->getPrimaryKey(),
                    ));
                    Yii::app()->end();

                } else {
                    echo CJSON::encode(array(
                        'status' => 'false',
                        'message' => $model_contragent_info->getErrors(),
                        'id' => '',
                    ));
                    Yii::app()->end();
                }


            }
        }
$role=Yii::app()->getModule('user')->getRole();

        $this->renderPartial('update_in_modal', array(
            'model_contragent' => $model_contragent,
            'model_contragent_info' => $model_contragent_info,
            'model_bank' => $model_bank,
            'role'=>$role,
            //   'model_bank_info' => $model_bank_info,

        ), false, true);


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


    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Contragent');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }


    public function actionTest()
    {
        $model = new Contragent('search');


        if (isset($_POST['Contragent'])) {
            $model->attributes = $_POST['Contragent'];
            if ($model->save()) {
                if (Yii::app()->request->isAjaxRequest) {
                    echo 'success';
                    Yii::app()->end();
                } else
                    $this->actionAdmin();
                //$this->redirect(array('view','id'=>$model->id));
            }
        }
        if (Yii::app()->request->isAjaxRequest) {
            // $this->renderPartial('dialog_view',array('dogovor_model'=>$model), false, true);
            $this->renderPartial('admin', array('model' => $model,), false, true);
        } else {
            $this->renderPartial('admin', array('model' => $model,), false, true);
        }

    }


    public function actionAdmin()
    {
        $model = new Contragent('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Contragent']))
            $model->attributes = $_GET['Contragent'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Contragent the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Contragent::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Contragent $model the model to be validated
     */
    protected function performAjaxValidation($contragent)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contragent-form') {
            echo CActiveForm::validate($contragent);
            Yii::app()->end();
        }
    }

    protected function performAjaxValidationContragentInfo($contragent_info)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contragent-info-form') {
            echo CActiveForm::validate($contragent_info);
            Yii::app()->end();
        }
    }

    protected function performAjaxValidationBank($contragent_info)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bank-form') {
            echo CActiveForm::validate($contragent_info);
            Yii::app()->end();
        }
    }


}

<?php

class IspolnitelController extends Controller //Controller
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
        );
    }*/


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
                $lable = '№' . $contragent['id'] . ' ' . $contragent['name'];
                $result[] = array('id' => $contragent['id'], 'label' => $lable, 'value' => $lable);
            }
            echo CJSON::encode($result);
            Yii::app()->end();
        }


    }
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    /*public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
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

        // Устал писать. Как есть

        $model_contragent = new Ispolnitel;
        $model_contragent_info = new IspolnitelInfo;
        $model_bank = new Bank;
        $model_bank_info = new BankDetails;


        if (Yii::app()->request->isAjaxRequest) {

            // Записываем нового контрагента

            if (isset($_POST['Ispolnitel'])) {
                $this->performAjaxValidation($model_contragent);
                $model_contragent->attributes = $_POST['Ispolnitel'];

                if ($model_contragent->save()) {

                    echo CJSON::encode(array(
                        'status' => 'true',
                        'message' => 'Данные успешно записаны',
                        'id_ispolnitel' => $model_contragent->getPrimaryKey(),
                        'id_contragent' => null,
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
            if (isset($_POST['IspolnitelInfo'])) {
                $this->performAjaxValidationContragentInfo($model_contragent_info);
                $model_contragent_info->attributes = $_POST['IspolnitelInfo'];
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


        } else {
            // создание контрагента

        }

        $this->renderPartial('create_in_modal', array(
            'model_contragent' => $model_contragent,
            'model_contragent_info' => $model_contragent_info,
            'model_bank' => $model_bank,
            'model_bank_info' => $model_bank_info,

        ), false, true);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model_contragent = $this->loadModel($id);

        $model_contragent_info = new IspolnitelInfo;
        $model_info = $model_contragent_info->findAllByAttributes(array('id_ispolnitel' => $id));
        $model_contragent_info = !empty($model_info[0]) ? $model_info[0] : $model_contragent_info;


        // $model_bank = new Bank;
        $model_bank = Bank::model()->findAllByAttributes(array('id_ispolnitel' => $id));
        $model_bank = new CArrayDataProvider($model_bank, array(
            //  'criteria' => $criteria,
            'id' => 'id',
            'pagination' => array(
                'pageSize' => 8,
            ),));


        if (Yii::app()->request->isAjaxRequest) {

            // Записываем нового контрагента

            if (isset($_POST['Ispolnitel'])) {
                $this->performAjaxValidation($model_contragent);
                $model_contragent->attributes = $_POST['Ispolnitel'];

                if ($model_contragent->save()) {

                    echo CJSON::encode(array(
                        'status' => 'true',
                        'message' => 'Данные успешно записаны',
                        'id_ispolnitel' => $model_contragent->getPrimaryKey(),
                        'id_contragent' => null,
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
            if (isset($_POST['IspolnitelInfo'])) {
                $this->performAjaxValidationContragentInfo($model_contragent_info);
                $model_contragent_info->attributes = $_POST['IspolnitelInfo'];
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


        $this->renderPartial('update_in_modal', array(
            'model_contragent' => $model_contragent,
            'model_contragent_info' => $model_contragent_info,
            'model_bank' => $model_bank,
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

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        /*$dataProvider=new CActiveDataProvider('Ispolnitel');
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
        $model = new Ispolnitel('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ispolnitel']))
            $model->attributes = $_GET['Ispolnitel'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }


    public function actionDogovora($id_isp)
    {
        if (isset($id_isp) && is_numeric($id_isp)) {


            $filtersForm = new FiltersForm;
            if (isset($_GET['FiltersForm']))
                $filtersForm->filters = $_GET['FiltersForm'];

// Get rawData and create dataProvider
            // $rawData=User::model()->findAll();
            $dogovor_by_ispolnitel = Ispolnitel::model()->getDogovora($id_isp);
            $filteredData = $filtersForm->filter($dogovor_by_ispolnitel);
            //   $dataProvider=new CArrayDataProvider($filteredData);
            $count = count($dogovor_by_ispolnitel);
            $model = new CArrayDataProvider($filteredData,
                array(

                    'keyField' => 'dogovor_number',
                    'id' => 'dogovor_number',
                    'totalItemCount' => (int)$count,
                    'sort' => array(
                        'attributes' => array(
                            'name', 'dogovor_number', 'created_date', 'summa_dogovora_nachalnaya', 'contragent_name',

                        ),
                        'defaultOrder' => array(
                            'dogovor_number' => CSort::SORT_ASC, //default sort value
                        ),
                    ),
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));
// Render

            /* $this->render('index', array(
                 'filtersForm' => $filtersForm,
                 'dataProvider' => $dataProvider,
             ));*/


            $this->render('dogovora', array(

                'filtersForm' => $filtersForm,
                'dogovor_info' => $model,
            ));

        } else {
            $this->actionAdmin();

        }


        // var_dump($dogovor_by_ispolnitel);
        //  exit();
        /*
                    $posts = new CSqlDataProvider($posts, array(
                        'keyField' => 'dogovor_number',
                        'id' => 'dogovor_number',
                        'totalItemCount' => (int)391,
                        'sort' => array(
                            'attributes' => array(
                                'dogovor_number', 'created_date', 'id_contragent',
                            ),
                            'defaultOrder' => array(
                                'dogovor_number' => CSort::SORT_ASC, //default sort value
                            ),
                        ),
                        'pagination' => array(
                            'pageSize' => 20,
                        ),
                    ));
        */


    }


    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Ispolnitel the loaded model
     * @throws CHttpException
     */


    public function loadModel($id)
    {
        $model = Ispolnitel::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Ispolnitel $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ispolnitel-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    protected function performAjaxValidationContragentInfo($contragent_info)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ispolnitel-info-form') {
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


    public function actionUpload()
    {

        Yii::import("ext.EAjaxUpload.qqFileUploader");

        if (isset($_GET['ispolnitel'])) {
            $folder = Yii::getPathOfAlias('application') . '/img/signatures/';// folder for uploaded files
            $allowedExtensions = array("jpg", "jpeg", "png", "gif", "exe", "mov", "mp4");//array("jpg","jpeg","gif","exe","mov" and etc...
            $sizeLimit = 100 * 1024 * 1024 * 1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);
            $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
            $fileSize = filesize($folder . $result['filename']);//GETTING FILE SIZE
            $fileName = $result['filename'];//GETTING FILE NAME
            //$img = CUploadedFile::getInstance($model,'image');

            $model_ispolnitel = Ispolnitel::model()->findByPk((int)$_GET['ispolnitel']);
            $srting = array(";", "'", '"', "^", "|", "<", ">", "<<", ">>", ")", "(", " ", "  ", "/");
            $folder = trim(str_replace($srting, "\\", $folder));
            $model_ispolnitel->signature_path = $folder . $fileName;

            if ($model_ispolnitel->save()) {
                echo $return;// it's array

            }


        }


    }










}

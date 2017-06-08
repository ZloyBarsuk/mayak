<?php

class DocumentTemplatesController extends Controller
{




    public $layout = '//layouts/column1';


   /* public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }*/



   /* public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','copy','printtemplate'),
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
        $model = new DocumentTemplates;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['DocumentTemplates'])) {
            $model->attributes = $_POST['DocumentTemplates'];
            $model->date=date('Y-m-d');
            if ($model->save())
                $this->redirect(array('admin'));

             //   $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['DocumentTemplates'])) {
            $model->attributes = $_POST['DocumentTemplates'];
            if ($model->save())
             //   $this->redirect(array('view', 'id' => $model->id));
                $this->redirect(array('admin'));
        }

        $this->render('update', array('model' => $model,));


    }

    public function actionCopy($id)
    {
        $model = $this->loadModel($id);
        $new_copy= new DocumentTemplates;
        $new_copy->attributes=$model->attributes;
        $new_copy->parent_id=$model->id;
         $new_copy->parent_title=$model->title;
        $new_copy->date=date('Y-m-d');
        if($new_copy->save())
        {
            echo CJSON::encode(array(
                'status' => 'true',
                'message' => 'Шаблон успешно скопирован'
            ));
            Yii::app()->end();
        }
        else{
            echo CJSON::encode(array(
                'status' => 'false',
                'message' => $model->getErrors(),
            ));
            Yii::app()->end();
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
        $dataProvider = new CActiveDataProvider('DocumentTemplates');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new DocumentTemplates('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['DocumentTemplates']))
            $model->attributes = $_GET['DocumentTemplates'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return DocumentTemplates the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = DocumentTemplates::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Запрашиваемая страница не найдена');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param DocumentTemplates $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'document-templates-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

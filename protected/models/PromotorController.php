<?php

class PromotorController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', /* Acciones Permitidas */
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'listmunicipalities', 'listparishes'),
                'users' => array('*'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public $modulo = "";

    /**
     * 
     * 
     */
    public function actionView() {
        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_view')) {

            $sql = new CDbCriteria;

            $sql->params = array(':id' => Yii::app()->user->id);
            $sql->condition = "t.user_id = :id";
            $sql->with = array('user', 'state', 'municipality', 'parishe', 'promotorType');

            $model = Promotor::model()->find($sql);


            $this->render('view', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_create')) {
            $model = new Promotor;
            
            
            

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Promotor'])) {
                $model->attributes = $_POST['Promotor'];
                $model->date = Date('Y-m-d');
                $model->time = Date('H:i:s');
                $model->user_id = Yii::app()->user->id;
                $model->active = 1;
                
                $photos = CUploadedFile::getInstancesByName('files');
                
                foreach ($photos as $image => $pic) {
                    
                     if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/document/'.$pic->name)) {
                         
                     }
                }


                 if ($model->save()) {
                  $this->redirect(array('site/calendario'));
                  } 
            }

            $this->render('create', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_update')) {

            $model = $this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Promotor'])) {
                $model->attributes = $_POST['Promotor'];
                if ($model->save()) {
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }

            $this->render('update', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {

        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_delete')) {
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_index')) {
            $model = new Promotor('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Promotor'])) {
                $model->attributes = $_GET['Promotor'];
            }
            $this->render('index', array(
                'model' => $model,
            ));
        } else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        if (Yii::app()->authRBAC->checkAccess($this->modulo . '_admin')) {
            $dataProvider = new CActiveDataProvider('Promotor');
            $this->render('admin', array(
                'dataProvider' => $dataProvider,
            ));
        } else {
            throw new CHttpException(403, Yii::app()->params['ErrorAccesoDenegado']);
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Promotor the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Promotor::model()->find(array('condition' => 'id = :id', 'params' => array(':id' => $id)));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Promotor $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'promotor-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionListmunicipalities() {

        if (isset($_POST['Promotor']['state_id'])) {

            if ($_POST['Promotor']['state_id'] != NULL) {

                $id = $_POST['Promotor']['state_id'];

                $consulta = Municipalities::getListMunicipalities($id);

                echo CHtml::tag('option', array('value' => ''), 'Seleccione', true);
                foreach ($consulta as $value => $nombre) {
                    echo CHtml::tag('option', array('value' => $value), CHtml::encode($nombre), true);
                }
            }
        }
    }

    public function actionListparishes() {

        if (isset($_POST['Promotor']['municipality_id'])) {

            if ($_POST['Promotor']['municipality_id'] != NULL) {

                $id = $_POST['Promotor']['municipality_id'];

                $consulta = Parishes::getListParishes($id);

                echo CHtml::tag('option', array('value' => ''), 'Seleccione', true);
                foreach ($consulta as $value => $nombre) {
                    echo CHtml::tag('option', array('value' => $value), CHtml::encode($nombre), true);
                }
            }
        }
    }

}

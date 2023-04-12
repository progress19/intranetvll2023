<?php

class ReglamentosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/dashboard_admin';

	public function actions() {
    return array(
	    'toggle' => array(
	    'class'=>'booster.actions.TbToggleAction',
	    'modelName' => 'Reglamentos',));
    }

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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','toggle'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

public function actionUpload()
{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 
 		$folder=Yii::app()->basePath.'/../../pics/reglamentos/';
        //$folder=Yii::getPathOfAlias('webroot').'/upload/';// folder for uploaded files
        $allowedExtensions = array("mp3");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 100 * 1024 * 10024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
        //$img = CUploadedFile::getInstance($model,'image');
 
        echo $return;// it's array
}

public function actionCreate()
    {
        $model=new Reglamentos;  // this is my model related to table
        if(isset($_POST['Reglamentos']))
        {
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes=$_POST['Reglamentos'];
  
            $uploadedFile=CUploadedFile::getInstance($model,'archivo');
            $fileName = "{$uploadedFile}";  // random number + file name
            $model->archivo = $fileName;
  
            if($model->save())
            {
                $uploadedFile->saveAs(Yii::app()->basePath.'/../pics/reglamentos/'.$fileName);  // image will uplode to rootDirectory/banner/
                $this->redirect(array('admin'));
            }
        }
        $this->render('create',array(
            'model'=>$model,
        ));
    }


	public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        if(isset($_POST['Reglamentos']))
        {
            $rnd = rand(10000,99999);  // Generamos un numero aleatorio entre 0-9999
            $_POST['Reglamentos']['archivo'] = $model->archivo;
           // print_r($_POST['Promos']);die;
            $model->attributes=$_POST['Reglamentos'];

            $subiendoArchivo=CUploadedFile::getInstance($model,'archivo');
            if($subiendoArchivo)
            {
	            $fileName = "{$subiendoArchivo}";  // numero aleatorio  + nombre de archivo
	            $model->archivo = $fileName;
            }

            if($model->save()){

                if(!empty($subiendoArchivo)) {
                    $subiendoArchivo->saveAs(Yii::app()->basePath.'/../pics/reglamentos/'.$fileName);
                } 
 				$this->redirect(array('admin'));       
            }
        }
        $this->render('update',array(
            'model'=>$model,
        ));
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
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Reglamentos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Reglamentos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reglamentos']))
			$model->attributes=$_GET['Reglamentos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Reglamentos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Reglamentos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Reglamentos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reglamentos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

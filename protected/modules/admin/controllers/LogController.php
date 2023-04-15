<?php

class LogController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/dashboard_admin';

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

	public function actions() { }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('logView'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()	{
		$model=new Personal;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Personal']))	{
			$model->password=md5($model->password);
			$rnd = rand(10000,99999);  // Generamos un numero aleatorio entre 0-9999
			$model->attributes=$_POST['Personal'];

			$model->password=md5($model->password);

			$uploadedFile=CUploadedFile::getInstance($model,'foto');
            if($uploadedFile)
            {
	            $fileName = "{$rnd}.jpg";  // numero aleatorio  + nombre de archivo
	            $model->foto = $fileName;
            }

            if($model->save())
            {
                if(!empty($uploadedFile))  // checkeamos si el archivo subido esta seteado o no
                {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../pics/personal/'.$fileName);
				    $image = Yii::app()->image->load(Yii::app()->basePath.'/../pics/personal/'.$model->foto);
				    $image->resize(400, 400);
				    $image->save(Yii::app()->basePath.'/../pics/personal/'.$model->foto);  
                }
 				
 				$this->redirect(array('admin'));        
            }
 
            if($model->save())
 				$this->redirect(array('admin'));        
        }
 
        $this->render('create',array(
            'model'=>$model,
        ));
    } 

	public function loadModel($id)
	{
		$model=Personal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Personal $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='personal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionLogView()	{

		$model=new LogEventos('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['LogEventos']))
			$model->attributes=$_GET['LogEventos'];

		$this->render('logView',array(
			'model'=>$model,
		));

		/*
		$model=new Personal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personal']))
			$model->attributes=$_GET['Personal'];

		$this->render('logView',array(
			'model'=>$model,
		));
		*/
	}
	
}

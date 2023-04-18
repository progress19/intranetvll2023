<?php

class LogController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/dashboard_admin';

	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules() {
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('logView','hola'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('viewDetail'),
			'users'=>array('@'),
			'roles'=>array('administrador'),
		),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionViewDetail($id) {
		$model=$this->loadModel($id);
		$this->render('update',array( 'model'=>$model ));
	}

	public function loadModel($id)	{
		$model=LogEventos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model) {
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

		$this->render('logView',array('model'=>$model,));

	}
	
}

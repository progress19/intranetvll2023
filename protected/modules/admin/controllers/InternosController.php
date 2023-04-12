<?php

class InternosController extends Controller
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

	public function actions()
    {
	    return array(
	    'toggle' => array(
	    'class'=>'booster.actions.TbToggleAction',
	    'modelName' => 'Internos',
    ));
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
				'roles'=>array('administrador','supervisor-rrhh'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				'roles'=>array('administrador','supervisor-rrhh'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
				'roles'=>array('administrador','supervisor-rrhh'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Internos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Internos']))
		{
			$model->attributes=$_POST['Internos'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Internos']))
		{
			$model->attributes=$_POST['Internos'];
			if($model->save())
				$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('Internos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function actionAdmin()
	{
      
        $model = new Internos('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Internos']))
        {
                $model->attributes = $_GET['Internos'];
                Yii::app()->user->setState('InternosSearchParams', $_GET['Internos']);
        }
        else
        {
                $searchParams = Yii::app()->user->getState('InternosSearchParams');
                if ( isset($searchParams) )
                {
                        $model->attributes = $searchParams;
                }
        }

        if (isset($_GET['Internos_page']))
        {
                Yii::app()->user->setState('BarcosPage', $_GET['Internos_page']);
                //echo '1 '.$_GET['Internos_page'];
        }
        else
        { 		
                $page = Yii::app()->user->getState('BarcosPage');
               // echo '2 '.$page;
                if ( isset($page) )
                {
                        $_GET['Internos_page'] = $page;
               }
        }


        $this->render('admin',array('model'=>$model,));
		}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Internos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Internos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Internos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='internos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class HomeController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','estadisticas','refrescar_estadisticas'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('home','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),

		);
	}

/**
* Displays the home page
*/
public function actionIndex()
{
	//	$estadisticas = $this->estadisticas();
        
        //echo 'asdasda'.$total_empleados;
                $this->render('index');
      /*
        $this->render('index', array(
            'total_empleados' => $total_empleados,
            'activos' => $activos,
            'estados_array' => $estados_array,
            'estados' => $estados, 
             ));
	*/

}

	public function actionEstadisticas($fecha) {

		$wfec = explode("-",$fecha);
 		$fecha = "$wfec[2]-$wfec[1]-$wfec[0]";
 					
		if (!isset(Yii::app()->user->total_empleados)) { 

		/* total empleados */
        $results = Personal::model()->findAll();
        $total_empleados = count ( $results );

        /* total corp */
        $total_empleados_co = Personal::model()->count_tipo_sector(1);
        
		/* total no corp */
        $total_empleados_no_co = Personal::model()->count_tipo_sector(0);
        
        /* total activos */
        $activos = Personal::model()->findAllByAttributes(
            array(),
                array(
                    'condition'=>'activo=:estado', 
                    'params'=>array(':estado'=>1)
                ));

        $activos = count ( $activos );

        /* total por estados */
        $estados = Estados::model()->findAllByAttributes(
        	    array(),
                array('condition'=>'estado=1'));

        $estados_array = array();

        foreach ($estados as $key => $estado) {
        	        	
        	$total_por_estado = Asistencias::model()->findAllByAttributes(
            array(),
                array(
                    'condition'=>'fecha = :fecha AND idEstado = :idEstado', 
                    'params'=>array(':fecha' => $fecha,':idEstado' => $estado->idEstado)
                ));

        	$por_estados = count ( $total_por_estado );
        	$estados_array[$estado->nombre] = $por_estados;

        }

        $ultima_act = date('d-m-Y H:i:s');

        /* seteo a sesion */
        Yii::app()->user->setState('total_empleados_co', $total_empleados_co);
        Yii::app()->user->setState('total_empleados_no_co', $total_empleados_no_co);
        Yii::app()->user->setState('total_empleados', $total_empleados);
        Yii::app()->user->setState('activos', $activos);
        Yii::app()->user->setState('estados_array', $estados_array);
        Yii::app()->user->setState('estados', $estados);
        Yii::app()->user->setState('fecha', $fecha);
        Yii::app()->user->setState('ultima_act', $ultima_act);

    // si ya trajo los datos
    } else {

    	$total_empleados_co = Yii::app()->user->total_empleados_co;
		$total_empleados_no_co = Yii::app()->user->total_empleados_no_co;
    	$total_empleados = Yii::app()->user->total_empleados;
    	$activos = Yii::app()->user->activos;
    	$estados_array = Yii::app()->user->estados_array;
    	$estados = Yii::app()->user->estados;
    
    }

	return $this->renderPartial('_estadisticas',array(
		'total_empleados' => $total_empleados,
		'total_empleados_co' => $total_empleados_co,
		'total_empleados_no_co' => $total_empleados_no_co,
		'activos' => $activos,
    	'estados_array' => $estados_array,
    	'estados' => $estados,
		));

	}

	public function actionRefrescar_estadisticas($fecha) {

		Yii::app()->user->setState('total_empleados', null);
		$this->redirect(array('index', array('fecha' => $fecha)));

	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Config the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Config::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Config $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='config-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class AsistenciasArchivoController extends Controller
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
				'actions'=>array('desarchivarAsistencias'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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

	public function actionDesarchivarAsistencias() {

		echo 'desarchivo';

		//sleep(3000000);

		$asistenciasArchivo = AsistenciasArchivo::getAsistenciasDesarchivar( $_REQUEST['year'] );

		//echo count($asistenciasArchivo);

		foreach ($asistenciasArchivo as $asistenciaArchivo) {
			
			$asistencia = new Asistencias;
			$asistencia->idPersonal = $asistenciaArchivo->idPersonal;
			$asistencia->fecha = $asistenciaArchivo->fecha;
			$asistencia->legajo = $asistenciaArchivo->legajo;
			$asistencia->idEstado = $asistenciaArchivo->idEstado;
			$asistencia->save(false);	
	
		}

		//elimino registros de archivo

		$desde = $_REQUEST['year'].'-'.'01-01';
		$hasta = $_REQUEST['year'].'-'.'12-31';

		AsistenciasArchivo::model()->deleteAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        			'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
		);

		echo '<h3>Proceso terminado.</h3><h3>Se desarchivaron '.count($asistenciasArchivo).' registros.<h3>';
		
	
	}


}

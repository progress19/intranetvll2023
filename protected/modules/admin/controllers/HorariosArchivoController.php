<?php

class HorariosArchivoController extends Controller
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
				'actions'=>array('desarchivarHorarios'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionDesarchivarHorarios() {

		//sleep(3000000);

		$horariosArchivo = HorariosArchivo::getHorariosDesarchivar( $_REQUEST['year'] );

		//echo count($horariosArchivo);

		foreach ($horariosArchivo as $horarioArchivo) {

			$horario = new Horarios;
			$horario->tarjetaId = $horarioArchivo->tarjetaId;
			$horario->legajo = $horarioArchivo->legajo;
			$horario->idTipo = $horarioArchivo->idTipo;
			$horario->idSector = $horarioArchivo->idSector;
			$horario->fecha = $horarioArchivo->fecha;
			$horario->em = $horarioArchivo->em;
			$horario->sm = $horarioArchivo->sm;
			$horario->et = $horarioArchivo->et;
			$horario->st = $horarioArchivo->st;
			$horario->save(false);	
	
		}

		//elimino registros de archivo

		$desde = $_REQUEST['year'].'-'.'01-01';
		$hasta = $_REQUEST['year'].'-'.'12-31';

		HorariosArchivo::model()->deleteAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        			'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
		);

		echo '<h3>Proceso terminado.</h3><h3>Se desarchivaron '.count($horariosArchivo).' registros.<h3>';
		
	
	}



}

<?php

class HorariosController extends Controller
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
				'actions'=>array('index','view','cargarHorario'),
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','controlHorario','cargarHorarioAjax','controlHorarioAjax','horarioEmpleado','horarioEmpleadoPrint','exportar','horariosAjaxExcel','archivoHorarios','archivoHorariosAjax','archivarHorarios'),
				'users'=>array('@'),
				'roles'=>array('administrador','supervisor-rrhh'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {

		$horario = Horarios::model()->findByPk( $id );
		
		$em = Yii::app()->dateFormatter->format("HH:mm", $horario->em);
		$sm = Yii::app()->dateFormatter->format("HH:mm", $horario->sm);
		$et = Yii::app()->dateFormatter->format("HH:mm", $horario->et);
		$st = Yii::app()->dateFormatter->format("HH:mm", $horario->st);
		
		$detalle = '('.$horario->legajo.') '.$horario->personal_rel->nombre.', Fecha: '.Yii::app()->dateFormatter->format("dd-MM-yyyy", $horario->fecha).', Ent.Man: '.$em.', Sal.Man: '.$sm.', Ent.Tarde: '.$et.', Sal.Tarde: '.$st;

		LogEventos::addLog( 11, $detalle );

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Horarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Horarios']))
			$model->attributes=$_GET['Horarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	  public function actionUpdate($id)    {
        $model=$this->loadModel($id);

        if(isset($_POST['Horarios'])) {

            $model->attributes=$_POST['Horarios'];

			if ($_POST['Horarios']['em']=='') {$model->em = '';} else {$model->em = strtotime($_POST['Horarios']['em']);} 
			if ($_POST['Horarios']['sm']=='') {$model->sm = '';} else {$model->sm = strtotime($_POST['Horarios']['sm']);} 
			if ($_POST['Horarios']['et']=='') {$model->et = '';} else {$model->et = strtotime($_POST['Horarios']['et']);} 
			if ($_POST['Horarios']['st']=='') {$model->st = '';} else {$model->st = strtotime($_POST['Horarios']['st']);}  

            if($model->save()){
 				$this->redirect(array('admin'));       
            }
        }
        $this->render('update',array(
            'model'=>$model,
        ));
    } 

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Horarios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Horarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Horarios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tickets-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionControlHorario() {$this->render('control');}

	public function actionControlHorarioAjax() {

			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";
 			
 			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

            $desde = Yii::app()->dateFormatter->format("yyyy-MM-dd", $desde);
            $hasta = Yii::app()->dateFormatter->format("yyyy-MM-dd", $hasta);
			
			$registros = Horarios::model()->findAllByAttributes(
				array('legajo'=>$_REQUEST['legajo']),
				    array(
				    	'order' => 'fecha',
				        'condition' => 'DATE_FORMAT(`t`.`fecha`, "%Y-%m-%d")>=:desde AND DATE_FORMAT(`t`.`fecha`, "%Y-%m-%d")<=:hasta', 
        				'params' => array(':desde'=>$desde, ':hasta'=>$hasta))
				);

 			$empleado = Personal::getEmpleado($_REQUEST['legajo']);

 		return $this->renderPartial('_controlHorario', array(
            'desde' => $_REQUEST['desde'],
            'hasta' => $_REQUEST['hasta'],
            'empleado' => $empleado,
            'registros' => $registros,
 			));

	}

	public function actionCargarHorario() {sleep(2);$this->render('cargar');}

	public function actionCargarHorarioAjax() {

			$fecha_pas = $_REQUEST['fecha'];

			$fecha = explode("-", $_REQUEST['fecha']);
 			$fecha = "$fecha[2]-$fecha[1]-$fecha[0]";
 			
            $fecha = Yii::app()->dateFormatter->format("yyyy-MM-dd", $fecha);

			$empleado = Personal::getEmpleado($_REQUEST['legajo']);

			$horario = Horarios::getHorarioEmpleadoCarga($_REQUEST['legajo'],$fecha);

 		return $this->renderPartial('_cargarHorario', array(
            'empleado' => $empleado,
            'fecha' => $fecha_pas,
            'horario' => $horario,
            'fechaReg' => $fecha
        ),false,true);

	}

	public function actionCreate()	{
		$model=new Horarios;

			$model->attributes=$_POST['Horarios'];
			
			/* agrego nuevo registro asistencia */

			$date = date_create($_POST['Horarios']['fecha']);
			$date = date_format($date, 'Y-m-d H:i:s');
			
			$model->legajo = $_POST['Horarios']['legajo'];
			
			$model->fecha = $date;
			$model->legajo = $_POST['Horarios']['legajo'];
			$model->tarjetaId = $_POST['Horarios']['tarjetaId'];
			$model->idSector = $_POST['Horarios']['idSector'];
			$model->em = strtotime($_POST['Horarios']['em']);
			$model->sm = strtotime($_POST['Horarios']['sm']);
			$model->et = strtotime($_POST['Horarios']['et']);
			$model->st = strtotime($_POST['Horarios']['st']);
			$model->idTipo = 1;
  			$model->save(false);	

			$this->redirect(array('admin'));
	
	}

	public function actionHorarioEmpleadoPrint() {
		
			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";
			
 			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

            $desde = Yii::app()->dateFormatter->format("yyyy-MM-dd", $desde);
            $hasta = Yii::app()->dateFormatter->format("yyyy-MM-dd", $hasta);
			
			$registros = Horarios::model()->findAllByAttributes(
				array('legajo'=>$_REQUEST['legajo']),
				    array(
				    	'order' => 'fecha',
				        'condition' => 'DATE_FORMAT(`t`.`fecha`, "%Y-%m-%d")>=:desde AND DATE_FORMAT(`t`.`fecha`, "%Y-%m-%d")<=:hasta', 
        				'params' => array(':desde'=>$desde, ':hasta'=>$hasta))
				);

 			$empleado = Personal::getEmpleado($_REQUEST['legajo']);

			if ($empleado) {
				echo $this->render('_horarioEmpleado', array('desde' => $desde, 'hasta' => $hasta, 'registros' => $registros, 'empleado' => $empleado));
			} else {
				echo ':( No se encontró el N° de Legajo.';
			}

	}


	public function actionExportar() {

		//echo 'momoevadiana'; die();

		unset(Yii::app()->request->cookies['from_date']);  // first unset cookie for dates
		unset(Yii::app()->request->cookies['to_date']);

		$model=new Asistencias('search');  // your model
		$model->unsetAttributes();  // clear any default values

		if(!empty($_POST))	{
			Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
			Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
			$model->from_date = $_POST['from_date'];
			$model->to_date = $_POST['to_date'];
		}

		$model=new Asistencias('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Asistencias']))
			$model->attributes=$_GET['Asistencias'];

		$this->render('exportar',array(
			'model'=>$model,
			));

	}

	public function actionHorariosAjaxExcel() {

	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes

			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";

			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

 			$desde = Yii::app()->dateFormatter->format("yyyy-MM-dd", $desde);
            $hasta = Yii::app()->dateFormatter->format("yyyy-MM-dd", $hasta);

 			$ffecha = $_REQUEST['desde'];

 			$horarios = Horarios::model()->getHorariosExcel($desde, $hasta);

 			//print_r($horarios); die();

  Yii::import('ext.phpexcel.XPHPExcel');
  $objPHPExcel = XPHPExcel::createPHPExcel();
  
  $objPHPExcel->getProperties()->setCreator("Mauricio Lavilla")
                               ->setLastModifiedBy("Mauricio Lavilla")
                               ->setTitle("Horarios Personal - Valle de Las Leñas")
                               ->setSubject("VLL") //Asunto
                               ->setDescription("VLL") //Descripción
                               ->setKeywords("VLL") //Etiquetas
                               ->setCategory("Reporte excel"); //Categorias

		    $objPHPExcel->getActiveSheet(0)
		    ->setCellValue('A1', 'Fecha')
		    ->setCellValue('B1', 'Legajo')
		    ->setCellValue('C1', 'Apellido y Nombre')
		    ->setCellValue('D1', 'Sector')
            ->setCellValue('E1', 'Entrada Mañana')
            ->setCellValue('F1', 'Salida Mañana')
            ->setCellValue('G1', 'Entrada Tarde')
            ->setCellValue('H1', 'Salida Tarde');

		$i = 2;
        foreach($horarios as $record){

        	$fecha = Yii::app()->dateFormatter->format("dd-MM-yyyy", $record->fecha); 

            $objPHPExcel->getActiveSheet()->setCellValue('A'. $i,$fecha);

            $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,$record->legajo);
                           
            if (isset($record->personal_rel->nombre)) {
            	$objPHPExcel->getActiveSheet()->setCellValue('C'. $i,$record->personal_rel->nombre);
            }

			if (isset($record->personal_rel->sector_rel->nombre)) {
            	 $objPHPExcel->getActiveSheet()->setCellValue('D'. $i,$record->personal_rel->sector_rel->nombre);
            }

			if ($record->em>0) {
            	 $objPHPExcel->getActiveSheet()->setCellValue('E'. $i,date("H:i",$record->em));
            } else {$objPHPExcel->getActiveSheet()->setCellValue('E'. $i,'-');}

            if ($record->sm>0) {
            	 $objPHPExcel->getActiveSheet()->setCellValue('F'. $i,date("H:i",$record->sm));
            } else {$objPHPExcel->getActiveSheet()->setCellValue('F'. $i,'-');}

            if ($record->et>0) {
            	 $objPHPExcel->getActiveSheet()->setCellValue('G'. $i,date("H:i",$record->et));
            } else {$objPHPExcel->getActiveSheet()->setCellValue('G'. $i,'-');}

            if ($record->st>0) {
            	 $objPHPExcel->getActiveSheet()->setCellValue('H'. $i,date("H:i",$record->st));
            } else {$objPHPExcel->getActiveSheet()->setCellValue('H'. $i,'-');}            
             
            $i++;
        }

for($i = 'A'; $i <= 'H'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

$styleArray = array(
    'font'  => array(
        'size'  => 10,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:H10000')->applyFromArray($styleArray);

$styleArraya = array(
    'font'  => array(
        'bold'  => true,
        'name'  => 'Verdana'
    ));

$styleDerecha = array(
    'alignment' => array(
       'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
   ));

$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($styleArraya);

$objPHPExcel->getActiveSheet()->getStyle('E1:E50000')->applyFromArray($styleDerecha);
$objPHPExcel->getActiveSheet()->getStyle('F1:F50000')->applyFromArray($styleDerecha);
$objPHPExcel->getActiveSheet()->getStyle('G1:G50000')->applyFromArray($styleDerecha);
$objPHPExcel->getActiveSheet()->getStyle('H1:H50000')->applyFromArray($styleDerecha);


  // Rename worksheet
  //$objPHPExcel->getActiveSheet()->setTitle('Simple');
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  // Redirect output to a client’s web browser (Excel5)
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="horarios.xls"');
  header('Cache-Control: max-age=0');
  // If you're serving to IE 9, then the following may be needed
  header('Cache-Control: max-age=1');
  // If you're serving to IE over SSL, then the following may be needed
  header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
  header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
  header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
  header ('Pragma: public'); // HTTP/1.0
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
  $objWriter->save('php://output');
  exit;
  
	}


	public function actionArchivoHorarios() {
		return $this->render('archivoHorarios',array());
	}

	public function actionArchivoHorariosAjax() {
		
		return $this->renderPartial('_archivoHorarios');
	}

	public function actionArchivarHorarios() {

		//sleep(3000000);

		//muevo los registros

		$horarios = Horarios::getHorariosArchivar( $_REQUEST['year'] );

		//echo count($horarios);

		foreach ($horarios as $horario) {
			
			$archivo = new HorariosArchivo;
			$archivo->tarjetaId = $horario->tarjetaId;
			$archivo->legajo = $horario->legajo;
			$archivo->idTipo = $horario->idTipo;
			$archivo->idSector = $horario->idSector;
			$archivo->fecha = $horario->fecha;
			$archivo->em = $horario->em;
			$archivo->sm = $horario->sm;
			$archivo->et = $horario->et;
			$archivo->st = $horario->st;
			$archivo->save(false);	
	
		}

		//elimino registros de principal

		$desde = $_REQUEST['year'].'-'.'01-01';
		$hasta = $_REQUEST['year'].'-'.'12-31';

		Horarios::model()->deleteAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        			'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
		);

		echo '<h3>Proceso terminado.</h3><h3>Se archivaron '.count($horarios).' registros.<h3>';
		
	}



}

<?php

class AsistenciasController extends Controller
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
				'actions'=>array('index','view','francosGrafico','francosGraficoExcel','buscarAsistenciaAjax','asistenciasconsulta','asistenciasAjaxExcel','exportar','archivoAsistencias','archivoAsisAjax','archivarAsistencias'),
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
		$model=new Asistencias;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Asistencias']))
		{
			$model->attributes=$_POST['Asistencias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idAsistencia));
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

		if(isset($_POST['Asistencias']))
		{
			$model->attributes=$_POST['Asistencias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idAsistencia));
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
		$dataProvider=new CActiveDataProvider('Asistencias');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {

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

		$this->render('admin',array(
			'model'=>$model,
			));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Asistencias the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Asistencias::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Asistencias $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='asistencias-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionfrancosGrafico()	{
		$this->render('francosGrafico');
	}

	public function actionfrancosGraficoExcel()	{
		$this->render('francosGraficoExcel');
	}

	public function actionBuscarAsistenciaAjax($legajo,$fecha) {

		$asistencia = Asistencias::getAsistencia($legajo, $fecha); 
		echo Estados::getAbrEstado($asistencia['idEstado']);

      }


    public function actionAsistenciasConsulta()
	{
		$model=new Asistencias('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Asistencias']))
			$model->attributes=$_GET['Asistencias'];

		$this->render('asistenciaconsulta',array(
			'model'=>$model,
		));
	}

	public function actionExportar() {

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


public function actionAsistenciasAjaxExcel() {

	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes

			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";

			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

 			$ffecha = $_REQUEST['desde'];

 			$asistencias = Asistencias::model()->getAsistenciasExcel($desde, $hasta);

  Yii::import('ext.phpexcel.XPHPExcel');
  $objPHPExcel = XPHPExcel::createPHPExcel();
  
  $objPHPExcel->getProperties()->setCreator("Mauricio Lavilla")
                               ->setLastModifiedBy("Mauricio Lavilla")
                               ->setTitle("Domingos Personal - Valle de Las Leñas")
                               ->setSubject("VLL") //Asunto
                               ->setDescription("VLL") //Descripción
                               ->setKeywords("VLL") //Etiquetas
                               ->setCategory("Reporte excel"); //Categorias

		    $objPHPExcel->getActiveSheet(0)
		    ->setCellValue('A1', 'Fecha')
            ->setCellValue('B1', 'Sector')
            ->setCellValue('C1', 'Legajo')
            ->setCellValue('D1', 'Nombre')
            ->setCellValue('E1', 'Estado');

		$i = 2;
        foreach($asistencias as $record){

            $fecha = explode("-", $record->fecha); 
            $fecha = "$fecha[2]-$fecha[1]-$fecha[0]";

            $objPHPExcel->getActiveSheet()->setCellValue('A'. $i,$fecha);
            
            if (isset($record->personal_rel->sector_rel->nombre)) {
            	 $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,$record->personal_rel->sector_rel->nombre);
            }
           
            if (isset($record->personal_rel->nombre)) {
            	$objPHPExcel->getActiveSheet()->setCellValue('D'. $i,$record->personal_rel->nombre);
            }

            $objPHPExcel->getActiveSheet()->setCellValue('C'. $i,$record->legajo);
            $objPHPExcel->getActiveSheet()->setCellValue('E'. $i,$record->estado_rel->nombre);
              
            $i++;
        }

for($i = 'A'; $i <= 'G'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

$styleArray = array(
    'font'  => array(
        'size'  => 10,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:E10000')->applyFromArray($styleArray);

$styleArraya = array(
    'font'  => array(
        'bold'  => true,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArraya);

  // Rename worksheet
  //$objPHPExcel->getActiveSheet()->setTitle('Simple');
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  // Redirect output to a client’s web browser (Excel5)
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="asistencias.xls"');
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

	public function actionArchivoAsistencias() {
		return $this->render('archivoAsistencias',array());
	}

	public function actionArchivoAsisAjax() {
		
		return $this->renderPartial('_archivoAsistencias');
	}

	public function actionArchivarAsistencias() {

		//sleep(3000000);

		//muevo los registros

		$asistencias = Asistencias::getAsistenciasArchivar( $_REQUEST['year'] );

		foreach ($asistencias as $asistencia) {
			
			$archivo = new AsistenciasArchivo;
			$archivo->idPersonal = $asistencia->idPersonal;
			$archivo->fecha = $asistencia->fecha;
			$archivo->legajo = $asistencia->legajo;
			$archivo->idEstado = $asistencia->idEstado;
			$archivo->save(false);	
	
		}

		//elimino registros de principal

		$desde = $_REQUEST['year'].'-'.'01-01';
		$hasta = $_REQUEST['year'].'-'.'12-31';

		Asistencias::model()->deleteAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        			'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
		);

		echo '<h3>Proceso terminado.</h3><h3>Se archivaron '.count($asistencias).' registros.<h3>';

	}

}

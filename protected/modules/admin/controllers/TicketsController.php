<?php

class TicketsController extends Controller
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
				'actions'=>array('index','view','estadisticasComProveAjax','estadisticasComSectorAjax','ticketsAjaxExcel','ticketsProve','ticketsSector','archivoTickets','archivoTicketsAjax','archivarTickets'),
				'users'=>array('@'),
				'roles'=>array('administrador','supervisor-rrhh'),
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
				'actions'=>array('admin'),
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
		$model=new Tickets;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tickets']))
		{
			$model->attributes=$_POST['Tickets'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idTicket));
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

		if(isset($_POST['Tickets']))
		{
			$model->attributes=$_POST['Tickets'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idTicket));
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
	public function actionDelete($id) {

		$ticket = Tickets::model()->findByPk( $id );
		$detalle = '('.$ticket->legajo.') '.$ticket->nombre;

		if ($ticket->tipo==1) {$tipo = 'Desayuno';}
		if ($ticket->tipo==2) {$tipo = 'Almuerzo';}
		if ($ticket->tipo==3) {$tipo = 'Cena';}

		$detalle = 'Ticket Id: '.$ticket->idTicket.' ,
		Tarjeta id:'.$ticket->tarjetaId.' ,
		Empleado: ('.$ticket->legajo.') '.$ticket->personal_rel->nombre.', 
		Proveedor: '.$ticket->proveedor_rel->nombre.' ,
		Tipo: '.$tipo.',
		Fecha: '.$ticket->fecha;

		LogEventos::addLog( 10, $detalle );

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
		$dataProvider=new CActiveDataProvider('Tickets');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tickets('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tickets']))
			$model->attributes=$_GET['Tickets'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdminp() {
      
        $model = new Tickets('search');
       	$model->unsetAttributes();  // clear any default values
        if (isset($_GET['Tickets']))  {

                $model->attributes = $_GET['Tickets'];
                Yii::app()->user->setState('TicketsSearchParams', $_GET['Tickets']);
        
        } else {

                $searchParams = Yii::app()->user->getState('TicketsSearchParams');
                if ( isset($searchParams))  {
                    $model->attributes = $searchParams;
                }
        }
        
        $this->render('admin',array('model'=>$model,));
		
		}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tickets the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tickets::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tickets $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tickets-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionEstadisticasComProveAjax() {

            $desde = Yii::app()->dateFormatter->format("yyyy-MM-dd", $_REQUEST['desde']);
            $hasta = Yii::app()->dateFormatter->format("yyyy-MM-dd", $_REQUEST['hasta']);

            Yii::app()->user->setState('desdeSesion', $desde);
            Yii::app()->user->setState('hastaSesion', $hasta);
        
            $proveedores = Proveedores::getProveedores();

			echo $this->renderPartial('_estadisticasComProve', array('desde' => $desde, 'hasta' => $hasta, 'proveedores' => $proveedores));

        }

        public function actionEstadisticasComSectorAjax() {

            $desde = Yii::app()->dateFormatter->format("yyyy-MM-dd", $_REQUEST['desde']);
            $hasta = Yii::app()->dateFormatter->format("yyyy-MM-dd", $_REQUEST['hasta']);

            Yii::app()->user->setState('desdeSesion', $desde);
            Yii::app()->user->setState('hastaSesion', $hasta);
        
            $sectores = Sectores::getSectores();

			echo $this->renderPartial('_estadisticasComSector', array('desde' => $desde, 'hasta' => $hasta, 'sectores' => $sectores));

        }

    public function actionTicketsAjaxExcel() {

	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes

			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";

			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

 			$ffecha = $_REQUEST['desde'];

 			$tickets = Tickets::model()->getTicketsExcel($desde, $hasta);

 			//print_r($tickets);die();
 			
  Yii::import('ext.phpexcel.XPHPExcel');
  $objPHPExcel = XPHPExcel::createPHPExcel();
  
  $objPHPExcel->getProperties()->setCreator("Mauricio Lavilla")
                               ->setLastModifiedBy("Mauricio Lavilla")
                               ->setTitle("Tickets Personal - Valle de Las Leñas")
                               ->setSubject("VLL") //Asunto
                               ->setDescription("VLL") //Descripción
                               ->setKeywords("VLL") //Etiquetas
                               ->setCategory("Reporte excel"); //Categorias

		    $objPHPExcel->getActiveSheet(0)
		    ->setCellValue('A1', 'Fecha')
		    ->setCellValue('B1', 'Hora')
            ->setCellValue('C1', 'Ticket N°')
            ->setCellValue('D1', 'Proveedor')
            ->setCellValue('E1', 'Tipo')
            ->setCellValue('F1', 'Tarjeta N°')
            ->setCellValue('G1', 'Legajo')
            ->setCellValue('H1', 'Nombre')
            ->setCellValue('I1', 'Sector')
            ->setCellValue('J1', 'Tipo');
            
	$i = 2;
    foreach($tickets as $record){

        $objPHPExcel->getActiveSheet()->setCellValue('A'. $i,Yii::app()->dateFormatter->format('dd-MM-y',$record->fecha));

        $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,Yii::app()->dateFormatter->format('H:m',$record->fecha));

        
       	$objPHPExcel->getActiveSheet()->setCellValue('C'. $i,$record->idTicket);

        if (isset($record->proveedor_rel->nombre)) {
        	 $objPHPExcel->getActiveSheet()->setCellValue('D'. $i,$record->proveedor_rel->nombre);
        }
              
        if ($record->tipo==1) {$objPHPExcel->getActiveSheet()->setCellValue('E'. $i,'Desayuno');}
        if ($record->tipo==2) {$objPHPExcel->getActiveSheet()->setCellValue('E'. $i,'Almuerzo');}
        if ($record->tipo==3) {$objPHPExcel->getActiveSheet()->setCellValue('E'. $i,'Cena');} 

        $objPHPExcel->getActiveSheet()->setCellValue('F'. $i,$record->tarjetaId);

        $objPHPExcel->getActiveSheet()->setCellValue('G'. $i,$record->legajo);

        if (isset($record->personal_rel->nombre)) {
        	$objPHPExcel->getActiveSheet()->setCellValue('H'. $i,$record->personal_rel->nombre);
        }

        if (isset($record->personal_rel->sector_rel->nombre)) {
        	$objPHPExcel->getActiveSheet()->setCellValue('I'. $i,$record->personal_rel->sector_rel->nombre);
        }

        if (isset($record->personal_rel->sector_rel->tipo)) {
        
        	if ($record->personal_rel->sector_rel->tipo==1) {
        		$objPHPExcel->getActiveSheet()->setCellValue('J'. $i,'Corporativo');
            }	
        
	        if ($record->personal_rel->sector_rel->tipo==0) {
	        	$objPHPExcel->getActiveSheet()->setCellValue('J'. $i,'No Corporativo');
	        }	

        } else {
        	$objPHPExcel->getActiveSheet()->setCellValue('J'. $i,'error');
        }
          
        $i++;
        }



for($i = 'A'; $i <= 'J'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

$styleArray = array(
    'font'  => array(
        'size'  => 10,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:J10000')->applyFromArray($styleArray);

$styleArraya = array(
    'font'  => array(
        'bold'  => true,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($styleArraya);

  // Rename worksheet
  //$objPHPExcel->getActiveSheet()->setTitle('Simple');
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  // Redirect output to a client’s web browser (Excel5)
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="tickets.xls"');
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

	public function actionTicketsProve() {
	
			$desde = Yii::app()->user->getState('desdeSesion');
            $hasta = Yii::app()->user->getState('hastaSesion');

            $proveedores = Proveedores::getProveedores();

			$this->render('ticketsProve',array(
				'proveedores'=>$proveedores,'desde' => $desde, 'hasta' => $hasta
			));

		}

	public function actionTicketsSector() {
	
			$desde = Yii::app()->user->getState('desdeSesion');
            $hasta = Yii::app()->user->getState('hastaSesion');

            $sectores = Sectores::getSectores();

			$this->render('ticketsSector',array(
				'sectores'=>$sectores,'desde' => $desde, 'hasta' => $hasta
			));

	}

	public function actionArchivoTickets() {
		return $this->render('archivoTickets',array());
	}

	public function actionArchivoTicketsAjax() {
		
		return $this->renderPartial('_archivoTickets');
	}

	public function actionArchivarTickets() {

		//sleep(3000000);

		//muevo los registros

		$tickets = Tickets::getTicketsArchivar( $_REQUEST['year'] );
				
		foreach ($tickets as $ticket) {
			
			$archivo = new TicketsArchivo;
			$archivo->tarjetaId = $ticket->tarjetaId;			
			$archivo->legajo = $ticket->legajo;
			$archivo->idProveedor = $ticket->idProveedor;
			$archivo->idSector = $ticket->idSector;
			$archivo->tipo = $ticket->tipo;
			$archivo->fecha = $ticket->fecha;
			$archivo->save(false);	
	
		}

		//elimino registros de principal

		$desde = $_REQUEST['year'].'-'.'01-01';
		$hasta = $_REQUEST['year'].'-'.'12-31';

		Tickets::model()->deleteAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        			'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
		);

		echo '<h3>Proceso terminado.</h3><h3>Se archivaron '.count($tickets).' registros.<h3>';

	}


}

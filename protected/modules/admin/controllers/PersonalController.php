<?php

class PersonalController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/dashboard_admin';

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function actions() {

		/* log */
		$empleado = Personal::model()->findByPk( Yii::app()->request->getParam('pk') );
		if ( $empleado->activo == 1) { $idTipo = 9; } else { $idTipo = 8; }
		$detalle = '('.$empleado->legajo.') '.$empleado->nombre;
		LogEventos::addLog($idTipo, $detalle); 
		
	    return array(
			'toggle' => array(
				'class'=>'booster.actions.TbToggleAction',
				'modelName' => 'Personal',
			)
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
			array('allow',  
				'actions'=>array('carga'),
				'users'=>array('@'),
				'roles'=>array('administrador'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('asistenciadiaria','personalPorSector','asistenciaDiariaSector','domingos','domingosAjax','domingosAjaxExcel','domingosAjaxExcel1','comidas','comidasAjax','comidasAjaxExcel'),
				'users'=>array('@'),
				'roles'=>array('administrador','supervisor-rrhh'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('asistenciaDiariaSector','personalSector'),
				'users'=>array('@'),
				'roles'=>array('supervisor'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','buscarDiaLegajoAjax','francoForm'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete','toggle'),
				'users'=>array('@'),
				'roles'=>array('administrador','supervisor-rrhh'),
			),
			array('allow', 
				'actions'=>array('cargaMasivaAjax'),
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
	
	public function actionCreate()	{

		$model=new Personal;
				
		if(isset($_POST['Personal']))	{

			$detalle = $_POST['Personal'];

			$model->password=md5($model->password);
			$rnd = rand(10000,99999);  // Generamos un numero aleatorio entre 0-9999
			$model->attributes=$_POST['Personal'];

			$model->password=md5($model->password);

			$uploadedFile=CUploadedFile::getInstance($model,'foto');
            if($uploadedFile) {
	            $fileName = "{$rnd}.jpg";  // numero aleatorio  + nombre de archivo
	            $model->foto = $fileName;
            }

            if($model->save()) {
                if(!empty($uploadedFile))  // checkeamos si el archivo subido esta seteado o no
                {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../pics/personal/'.$fileName);
				    $image = Yii::app()->image->load(Yii::app()->basePath.'/../pics/personal/'.$model->foto);
				    $image->resize(400, 400);
				    $image->save(Yii::app()->basePath.'/../pics/personal/'.$model->foto);  
                }
				/*Log*/ 
				LogEventos::addLog( 5, $detalle );
 				$this->redirect(array('admin'));        
            }
       
        }
 
        $this->render('create',array( 'model'=>$model, ));
    } 

	public function actionUpdate($id) {
        
		$model = $this->loadModel($id);
		
        if ( isset($_POST['Personal']) ) {

			$detalle = $_POST['Personal'];
        	
			$model_old = $this->loadModel($id);

			//$model_old = [ 'nombre' => $model->nombre ];

			$old = $model->password;
            $rnd = rand(10000,99999);  // Generamos un numero aleatorio entre 0-9999
            $_POST['Personal']['foto'] = $model->foto;
            $model->attributes=$_POST['Personal'];

            if ( $old != $model->password ) { $model->password = md5( $model->password ); }

			//print_r( $model );die;
            
			$subiendoImagen=CUploadedFile::getInstance($model,'foto');
            if($subiendoImagen) {
	            $fileName = "{$rnd}.png";  // numero aleatorio  + nombre de archivo
	            $model->foto = $fileName;
            }

            if( $model->save() ) {
                if(!empty($subiendoImagen)) {
                    $subiendoImagen->saveAs(Yii::app()->basePath.'/../pics/personal/'.$fileName);
                    $image = Yii::app()->image->load(Yii::app()->basePath.'/../pics/personal/'.$model->foto);
				    $image->resize(400, 400);
				    //$image->crop(600,600);
				    $image->save(Yii::app()->basePath.'/../pics/personal/'.$model->foto);  

                } 
				
				LogEventos::addLog( 7, $detalle, $model_old );
 				$this->redirect(array('admin'));       
            }
        }
        $this->render('update',array('model'=>$model,));
    } 

	public function actionDelete($id) {
				
		$personal = Personal::model()->findByPk( $id );
		$detalle = '('.$personal->legajo.') '.$personal->nombre;
		LogEventos::addLog( 6, $detalle );
		
		$this->loadModel($id)->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex() {
		$dataProvider=new CActiveDataProvider('Personal');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin_OLD()  {
		$model=new Personal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personal']))
			$model->attributes=$_GET['Personal'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdmin() {
      
        $model = new Personal('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Personal']))  {
                $model->attributes = $_GET['Personal'];
                Yii::app()->user->setState('PersonalSearchParams', $_GET['Personal']);
        } else {
                $searchParams = Yii::app()->user->getState('PersonalSearchParams');
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
	 * @return Personal the loaded model
	 * @throws CHttpException
	 */
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

	public function actionAsistenciadiaria()
	{
		$model=new Personal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personal']))
			$model->attributes=$_GET['Personal'];

		$this->render('asistenciadiaria',array(
			'model'=>$model,
		));
	}

	public function actionAsistenciaDiariaSector()
	{
		$model=new Personal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personal']))
			$model->attributes=$_GET['Personal'];

		$this->render('asistenciaDiariaSector',array(
			'model'=>$model,
		));
	}


	public function actionPersonalPorSector($idSector)
	{
		
		$model = new Personal('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Personal']))
        {
                $model->attributes = $_GET['Personal'];
                Yii::app()->user->setState('PersonalSearchParams', $_GET['Personal']);
        }
        else
        {
                $searchParams = Yii::app()->user->getState('PersonalSearchParams');
                if ( isset($searchParams) )
                {
                        $model->attributes = $searchParams;
                }
        }
        $this->render('personalPorSector',array('model'=>$model,));
		}


	public function actionPersonalSector()
	{
		$model = new Personal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personal']))
			$model->attributes=$_GET['Personal'];

		$this->render('personalSector',array(
			'model'=>$model,
		));
	}

	public function actionFrancoForm()
	{
		$this->render('francoForm');
	}

	public function actionBuscarDiaLegajoAjax($legajo,$idEstado,$fecha=null,$idPersonal) {
			
		$check = '<i class="fa fa-fw fa-check"></i>';
		$warning = '<i class="fa fa-fw fa-warning"></i>';

		$fecha_formateada = '';

		if	(Yii::app()->user->roles!='supervisor') {
			$wfec = explode("-",$fecha);
			$fecha_format = "$wfec[2]-$wfec[1]-$wfec[0]";
			//code para comprobar si el supervisor-RRHH ingresa la fecha manualmente
			$current_date = date('Y-m-d');
			$fecha_formateada = date('Y-m-d', strtotime($fecha_format));
			$diferencia = strtotime($current_date) - strtotime($fecha_formateada);
			$diferencia_en_dias = $diferencia / 400;
		}

		if ( Yii::app()->user->roles=='supervisor-rrhh' && $diferencia_en_dias > 31 ) {
			echo $warning.' NO PERMITIDO! | '.$warning.' Error | '.$warning.' Error';
		} else {

			$estado = Estados::model()->findByPk($idEstado);	

			/* manual para administrador y supervisor-rrhh*/
			if (Yii::app()->user->roles=='administrador' or Yii::app()->user->roles=='supervisor-rrhh') {
				$hoy = $check.$fecha;
			}

			/* automatica del dia para supervisor*/
			if (Yii::app()->user->roles=='supervisor') {
				$hoy = $check.date('d-m-Y');
				$fecha_format = date('Y-m-d');
			}
			
			$buscar_asistencia = Asistencias::getAsistencia($legajo, $fecha_format); 

			/* busco frecuencia para el calculo */
			$empleado = Personal::getEmpleado($legajo);
			$frecuencia = $empleado->idFrecuencia;
			/* fin busco frecuencia */

			/* busco calculo */
			$calculo = Relfrecesta::getUnidadFrecuencia($frecuencia,$idEstado);
		
			/* grabo y muestro */

			if ($buscar_asistencia) { // encuentra y actualiza
			
				if(isset($calculo)) {
			
					$ult_estado = $buscar_asistencia->idEstado;
					//$ult_estado = $empleado->idEstado;
					$ult_calculo = Relfrecesta::getUnidadFrecuencia($frecuencia,$ult_estado);
					//echo 'ult_cal'.$ult_calculo;
					$saldo = $empleado->francos - ($ult_calculo->calculo) + $calculo->calculo;

					// actualizo datos en Empleado

					$empleado->idEstado = $idEstado;
					$empleado->fecha = $fecha_format;
					$empleado->francos = $saldo;
					$empleado->save(false);	

					$saldo = $check.$saldo;

					/* actualizo tabla asistencias */

					$buscar_asistencia->legajo = $legajo;
					$buscar_asistencia->fecha = $fecha_format;
					$buscar_asistencia->idEstado = $idEstado;
					$buscar_asistencia->idPersonal = $idPersonal;
					$buscar_asistencia->save(false);

					$estado = $check.$estado['nombre'];
					echo $estado.'|'.$hoy.'|'.$saldo;

					/*Log*/
					$detalle = '('.$empleado->legajo.') '.$empleado->nombre.' / '.$fecha.' / '.$empleado->estado_rel->nombre;
					LogEventos::addLog( 3, $detalle ); 

					} else {
						echo $warning.' Error | '.$warning.' Error | '.$warning.' Error';
					}
				
				} else {  // sino encuentra la asistencia del dia
			
				/* calculo */

				if(isset($calculo)) {

					$saldo = $empleado->francos + $calculo->calculo;

					$estado = $check.$estado['nombre'];
					echo $estado.'|'.$hoy.'|'.$saldo;

					/* agrego nuevo registro asistencia */
					$asistencia = new Asistencias;
					$asistencia->legajo = $legajo;
					$asistencia->fecha = $fecha_format;
					$asistencia->idEstado = $idEstado;
					$asistencia->idPersonal = $idPersonal;
					$asistencia->save(false);	

					// actualizo datos en Empleado
					$empleado->idEstado = $idEstado;
					$empleado->fecha = $fecha_format;
					$empleado->francos = $saldo;
					$empleado->save(false);		

					$detalle = '('.$empleado->legajo.') '.$empleado->nombre.' / '.$fecha.' / '.$empleado->estado_rel->nombre;
					LogEventos::addLog( 3, $detalle ); 

				} else {
					echo $warning.' Error | '.$warning.' Error | '.$warning.' Error';
				}
			}

		} 

    }

	public function actionComidas() {
	 		return $this->render('comidas');
	}

	public function actionComidasAjax() {
			
			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";
 			
 			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

 		return $this->renderPartial('_comidas',array('desde' => $desde,'hasta' => $hasta),false,true);
	}

	public function actionComidasAjaxExcel() {

			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";
 			
 			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

 			$fdesde = $_REQUEST['desde'];
 			$fhasta = $_REQUEST['hasta'];


  Yii::import('ext.phpexcel.XPHPExcel');
  $objPHPExcel = XPHPExcel::createPHPExcel();
  
  // Set document properties

  $objPHPExcel->getProperties()->setCreator("Mauricio Lavilla")
                               ->setLastModifiedBy("Mauricio Lavilla")
                               ->setTitle("Comidas Personal - Valle de Las Leñas")
                               ->setSubject("VLL") //Asunto
                               ->setDescription("VLL") //Descripción
                               ->setKeywords("VLL") //Etiquetas
                               ->setCategory("Reporte excel"); //Categorias

		    $objPHPExcel->getActiveSheet(0)
		    ->setCellValue('A1', 'N° Legajo')
            ->setCellValue('B1', 'Nombre')
            ->setCellValue('C1', 'Sector')
            ->setCellValue('D1', 'Comidas');

		$activos = Personal::getActivos();

        $i = 2;
        foreach($activos as $record){
            $objPHPExcel->getActiveSheet()->setCellValue('A'. $i,$record->legajo);
            $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,$record->nombre);
            $objPHPExcel->getActiveSheet()->setCellValue('C'. $i,$record->sector_rel->nombre);

              $pre = 0;
              $asistencias = Asistencias::getAsistenciasPorEmpleado($record->legajo,$desde,$hasta); 

              foreach ($asistencias as $asistencia) {
                  
                 $importe = Estados::model()->findByPk($asistencia->idEstado);

                 $pre = $pre + $importe->comidas;

              }

              $objPHPExcel->getActiveSheet()->getStyle('D'. $i)->getNumberFormat()->setFormatCode('0.00'); 

              if ($pre==0) 
              		{$objPHPExcel->getActiveSheet()->setCellValue('D'. $i,'0');} 
              			else 
              		{$objPHPExcel->getActiveSheet()->setCellValue('D'. $i, $pre);}
              
            $i++;
        }

for($i = 'A'; $i <= 'D'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

$styleArray = array(
    'font'  => array(
        'size'  => 10,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:D10000')->applyFromArray($styleArray);

$styleArraya = array(
    'font'  => array(
        'bold'  => true,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArraya);

  // Rename worksheet
  //$objPHPExcel->getActiveSheet()->setTitle('Simple');
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  // Redirect output to a client’s web browser (Excel5)
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="comidas-'.$fdesde.' al '.$fhasta.'.xls"');
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

  //return $this->renderPartial('_domingosExcel',array('desde' => $desde,'hasta' => $hasta));

	}

	public function actionDomingos() {
	 	return $this->render('domingos');
	}
	
	public function actionDomingosAjax() {

			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";
 			
 			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

 		return $this->renderPartial('_domingos',array(
            'desde' => $desde,
            'hasta' => $hasta,
 			));
	}

	public function actionDomingosAjaxExcel() {

			sleep(1);

			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";
 			
 			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

  			return $this->renderPartial('_domingosExcel',array('desde' => $desde,'hasta' => $hasta));

	}


	public function actionDomingosAjaxExcel1() {

			sleep(1);

			$desde = explode("-", $_REQUEST['desde']);
 			$desde = "$desde[2]-$desde[1]-$desde[0]";
 			
 			$hasta = explode("-", $_REQUEST['hasta']);
 			$hasta = "$hasta[2]-$hasta[1]-$hasta[0]";

 			$fdesde = $_REQUEST['desde'];
 			$fhasta = $_REQUEST['hasta'];


  Yii::import('ext.phpexcel.XPHPExcel');
  $objPHPExcel = XPHPExcel::createPHPExcel();
  
  // Set document properties

  $objPHPExcel->getProperties()->setCreator("Mauricio Lavilla")
                               ->setLastModifiedBy("Mauricio Lavilla")
                               ->setTitle("Domingos Personal - Valle de Las Leñas")
                               ->setSubject("VLL") //Asunto
                               ->setDescription("VLL") //Descripción
                               ->setKeywords("VLL") //Etiquetas
                               ->setCategory("Reporte excel"); //Categorias

		    $objPHPExcel->getActiveSheet(0)
		    ->setCellValue('A1', 'N° Legajo')
            ->setCellValue('B1', 'Nombre')
            ->setCellValue('C1', 'Sector')
            ->setCellValue('D1', 'Domingos');

		$activos = Personal::getActivos();

        $i = 2;
        foreach($activos as $record){
            $objPHPExcel->getActiveSheet()->setCellValue('A'. $i,$record->legajo);
            $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,$record->nombre);
            $objPHPExcel->getActiveSheet()->setCellValue('C'. $i,$record->sector_rel->nombre);

              $pre = 0;
              $asistencias = Asistencias::getAsistenciasPorEmpleado($record->legajo,$desde,$hasta); 

              foreach ($asistencias as $asistencia) {
                
                  $diasem = date('l', strtotime($asistencia->fecha));  

                  if ($asistencia->idEstado==1 OR $asistencia->idEstado==14) { // presente y comision
                       if ($diasem=="Sunday") {  
                       $pre = $pre + 1; }
                     }

                  if ($asistencia->idEstado==2 OR $asistencia->idEstado==4) { // sale franco y 1/2 franco 
                       if ($diasem=="Sunday") {  
                       $pre = $pre + 0.5; }
                     }   
              }

              if ($pre==0) 
              		{$objPHPExcel->getActiveSheet()->setCellValue('D'. $i,'-');} 
              			else 
              		{$objPHPExcel->getActiveSheet()->setCellValue('D'. $i,$pre);}
              
            $i++;
        }

for($i = 'A'; $i <= 'D'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

$styleArray = array(
    'font'  => array(
        'size'  => 10,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:D10000')->applyFromArray($styleArray);

$styleArraya = array(
    'font'  => array(
        'bold'  => true,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArraya);

  // Rename worksheet
  //$objPHPExcel->getActiveSheet()->setTitle('Simple');
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  // Redirect output to a client’s web browser (Excel5)
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="domingos-'.$fdesde.' al '.$fhasta.'.xls"');
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

  //return $this->renderPartial('_domingosExcel',array('desde' => $desde,'hasta' => $hasta));

	}

	public function actionCarga()
	{
		$dataProvider=new CActiveDataProvider('Personal');
		
		$saldo_inicial = ConfigComedor::model()->findByPk(1);

		$saldo_inicial_comidas = $saldo_inicial->inicial_comidas;
		$saldo_inicial_desayunos = $saldo_inicial->inicial_desayuno;

		$this->render('carga',array(
			'dataProvider'=>$dataProvider,
			'saldo_inicial'=>$saldo_inicial_comidas,
			'saldo_inicial_desayunos'=>$saldo_inicial_desayunos,
		));
	}

	public function actionCargaMasivaAjax() {

		sleep(3);

		$config = ConfigComedor::model()->findByPk(1);
		$saldo_inicial_desayunos = $config->inicial_desayuno;
		$saldo_inicial_comidas = $config->inicial_comidas;

        /* total activos */
        $activos = Personal::model()->findAllByAttributes(
            array(),
                array(
                    'condition'=>'activo=:estado', 
                    'params'=>array(':estado'=>1)
                ));

        foreach ($activos as $activo) {
        	
        	$empleado = Personal::model()->findByPk($activo->idPersonal);

    		$empleado->desayunos = $saldo_inicial_desayunos;
    		$empleado->comidas = $saldo_inicial_comidas;
    		$empleado->save(false);
        }

		echo count ($activos);

	}


}

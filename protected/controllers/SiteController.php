<?php

class SiteController extends Controller {

	/*bk start */

	public $tables = array();
	public $fp;
	public $file_name;
	public $file_name_init;
	public $path = 'backups/';
	public $back_temp_file = 'db_bk_intranet_';


	public function actionTestEmail() {
				
		$body = 'test';
		$mail = new YiiMailer();
		$mail->setView( 'contact' );
		$mail->setData( array('message' => '', 'name' => '', 'description' => $body) );

		$mail->setFrom('intranet@laslenas.com', 'Valle de las Leñas');

		$mail->AddAddress('mauriciolav@gmail.com');
		
		$mail->setSubject( 'test' );

		$mail->smtpConnect([
		    'ssl' => [
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    ]
		]);

		//send
		if ($mail->send()) { echo 'OK ;)'; } else { echo $mail->getError(); }

	}

	public function actionCreateBk() {

		ini_set('memory_limit', '512M');

		//https://localhost/intranetvll4/site/createBk?hash=77b170d881367f949c6b9c13b833ab9c
		
		if ( isset($_REQUEST['hash']) ) {

			if ( $_REQUEST['hash'] == '77b170d881367f949c6b9c13b833ab9c') {

				$response = 0;
				$tables = $this->getTables();

				if(!$this->StartBackup()) {
					//render error
					$this->render('create');
					return;
				}

				foreach($tables as $tableName) { $this->getColumns($tableName); }
				foreach($tables as $tableName) { $this->getData($tableName); }
				
				$this->EndBackup();
				
				sleep(0);
						
				if ( file_exists( $this->file_name ) ) { $response = 1;	} else { $response = 0;	}

				$file = $this->file_name;

				sendEmailBk($response, $file, filesize($file));
				
			}
			
		} else { echo 'no valid hash :('; }

	}

	public function getTables($dbName = null)	{
		$sql = 'SHOW TABLES';
		$cmd = Yii::app()->db->createCommand($sql);
		$tables = $cmd->queryColumn();
		return $tables;
	}

	public function StartBackup($addcheck = true)	{

		$this->file_name =  $this->path . $this->back_temp_file . date('Y.m.d_H.i.s') . '.sql';
		$this->fp = fopen( $this->file_name, 'w+');

		if ( $this->fp == null )
		return false;
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		if ( $addcheck ) {
			fwrite ( $this->fp,  'SET AUTOCOMMIT=0;' .PHP_EOL );
			fwrite ( $this->fp,  'START TRANSACTION;' .PHP_EOL );
			fwrite ( $this->fp,  'SET SQL_QUOTE_SHOW_CREATE = 1;'  .PHP_EOL );
		}

		fwrite ( $this->fp, 'SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;'.PHP_EOL );
		fwrite ( $this->fp, 'SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;'.PHP_EOL );
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		$this->writeComment('START BACKUP');
		return true;
	}

	public function writeComment($string)	{
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		fwrite ( $this->fp, '-- '.$string .PHP_EOL );
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
	}

	public function getColumns($tableName)	{
		$sql = 'SHOW CREATE TABLE '.$tableName;
		$cmd = Yii::app()->db->createCommand($sql);
		$table = $cmd->queryRow();

		$create_query = $table['Create Table'] . ';';

		$create_query  = preg_replace('/^CREATE TABLE/', 'CREATE TABLE IF NOT EXISTS', $create_query);
		//$create_query = preg_replace('/AUTO_INCREMENT\s*=\s*([0-9])+/', '', $create_query);
		if ( $this->fp)	{
			$this->writeComment('TABLE `'. addslashes ($tableName) .'`');
			$final = 'DROP TABLE IF EXISTS `' .addslashes($tableName) . '`;'.PHP_EOL. $create_query .PHP_EOL.PHP_EOL;
			fwrite ( $this->fp, $final );
		} else {
			$this->tables[$tableName]['create'] = $create_query;
			return $create_query;
		}
	}

	public function getData($tableName)	{
		
		$sql = 'SELECT * FROM '.$tableName;
		$cmd = Yii::app()->db->createCommand($sql);
		$dataReader = $cmd->query();

		$data_string = '';

		foreach($dataReader as $data) {
			$itemNames = array_keys($data);
			$itemNames = array_map("addslashes", $itemNames);
			$items = join('`,`', $itemNames);
			$itemValues = array_values($data);
			$itemValues = array_map("addslashes", $itemValues);
			$valueString = join("','", $itemValues);
			$valueString = "('" . $valueString . "'),";
			$values ="\n" . $valueString;
			
			if ($values != "")	{
				$data_string .= "INSERT INTO `$tableName` (`$items`) VALUES" . rtrim($values, ",") . ";" . PHP_EOL;
			}
		}

		if ( $data_string == '')
		return null;
			
		if ( $this->fp)	{
			$this->writeComment('TABLE DATA '.$tableName);
			$final = $data_string.PHP_EOL.PHP_EOL.PHP_EOL;
			fwrite ( $this->fp, $final );
		} else	{
			$this->tables[$tableName]['data'] = $data_string;
			return $data_string;
		}
	}

	public function EndBackup($addcheck = true)	{
		
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		fwrite ( $this->fp, 'SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;'.PHP_EOL );
		fwrite ( $this->fp, 'SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;'.PHP_EOL );

		if ( $addcheck ) {
			fwrite ( $this->fp,  'COMMIT;' .PHP_EOL );
		}
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		$this->writeComment('END BACKUP');
		fclose($this->fp);
		$this->fp = null;
		
	}

 	/* FIN BACKUP */


	/**
	 * Declares class-based actions.
	 */
	public function actions(){
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionRedimensionar($alto=235)	{

		Yii::import('application.extensions.image.Image');
		$image = new Image(Yii::app()->basePath.'/images/1.jpg');
		$image->resize(NULL, 235);
		$image->crop(235, 235);
		$image->render();
	}

	public function actionMaxresi($imagen,$alto,$ancho) {

	    $thumb=Yii::app()->phpThumb->create($imagen);
		$thumb->adaptiveResize($ancho, $alto);
		$thumb->show();

	}


	public function actionIndex()	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$noticias = Noticias::model()->findAllByAttributes(
    	array('estado'=>1),array('order'=>'idNoticia DESC'));

		$dataProvider = new CArrayDataProvider($noticias, array(
    		'keyField'=>'idNoticia',
    		'pagination'=>array(
     	    'pageSize'=>10,
    	),
		));

		/* INTERNOS */

		$internos = Internos::model()->findAllByAttributes(
    	array('estado'=>1),array('order'=>'nombre DESC'));

		$this->render('index',array('dataProvider'=>$dataProvider, 'internos'=>$internos));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the home page
	 */
	public function actionHome(){$this->render('index');}

	/**
	 * Displays the contact page
	 */
	public function actionContact()	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))	{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate()) {
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()	{
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm'])) {
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				// log event
				$log_evento = new Tickets;
				$ticket->tarjetaId = $_REQUEST['idCard'];
				$ticket->tipo = $_REQUEST['idTipo']; //1-desayuno o 2-almuerzo 3-cena
				$ticket->idProveedor = $_REQUEST['idProve'];
				$ticket->legajo = $_REQUEST['idLegajo'];
				$ticket->idSector = $ticket->personal_rel->idSector;
				$ticket->save(false);

		    	$this->redirect(Yii::app()->homeUrl.'admin/home');
		 	}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
		$this->redirect(Yii::app()->homeUrl.'site/login');
	}


	public function actionNoticia($idNoticia) {
		
		$noticia = Noticias::model()->findbyPK($idNoticia);

		/* FILTRO IMAGENES */
		$imagenes = Noticiasimagenes::model()->findAllByAttributes(array(),
	  		$condition = 'idNoticia = :idNoticia AND estado = 1',
	  		$params     = array(
	    	':idNoticia' => $_REQUEST['idNoticia'],
	    	));

		/* FILTRO VIDEOS */
		$videos = Noticiasvideos::model()->findAllByAttributes(array(),
	  		$condition = 'idNoticia = :idNoticia AND estado = 1',
	  		$params     = array(
	    	':idNoticia' => $_REQUEST['idNoticia'],
	    	));

		$this->render('noticia',array('noticia'=>$noticia,'imagenes'=>$imagenes, 'videos'=>$videos));

	}

	public function actionRootAdd() {
		$root = new Usuario;
		$root->id = 99999;
		$root->username = 'root';
		$root->password = md5($_REQUEST['pass']);
		$root->roles = 'administrador';
		$root->save(false);
	}

	public function actionRootDel() {

		$user = new  Usuario;
		$user=Usuario::model()->findbyPK(99999);
  		$user->delete();
	}

	public function actionReglamentos() {
	
		$reglamentos = Reglamentos::model()->findAllByAttributes(array(),
	  	$condition = 'estado = 1 ORDER BY idReglamento DESC');
		
		$this->render('reglamentos', array('reglamentos' => $reglamentos));
	
		}
	
	public function actionFormularios() {
		$formularios = Formularios::model()->findAllByAttributes(array(),
	  	$condition = 'estado = 1 ORDER BY idFormulario DESC');
		$this->render('formularios', array('formularios' => $formularios));
	}

	public function actionRecuperar() {$this->render('recuperar');}
	public function actionLector() {$this->render('lector');}
	public function actionComedor() {$this->render('comedor');}
	public function actionHorario() {$this->render('horario');}
	public function actionPistas() {$this->render('pistas');}
		
	public function actionBuscarPersonalIdCardAjax($idCard, $app) {

		sleep(0);
		$empleado = Personal::model()->findByAttributes(
			array(),
			$condition = 'activo = 1 AND tarjetaId = :idCard',
			$params = array(':idCard' => $idCard)
		);
		
		if ($empleado) {

			if ($app==1) { // 1 => comedor / 2 => horario
				
				/* HORARIOS CHECK */
				$desayuno_d = strtotime($empleado->desayuno_desde);
				$desayuno_h = strtotime($empleado->desayuno_hasta);

				$almuerzo_d = strtotime($empleado->almuerzo_desde);
				$almuerzo_h = strtotime($empleado->almuerzo_hasta);

				$cena_d = strtotime($empleado->cena_desde);
				$cena_h = strtotime($empleado->cena_hasta);

				$hoy = getdate();

				$hora_actual = $hoy['hours'].':'.$hoy['minutes'];
				$hora_actual = strtotime($hora_actual);

				$horario_corr = 0; //si va en 0, no puede imprimir ticket por que no esta dentro de ningun horario
				$simultaneos = 0;

				//Compruebo que tipo de ticket corresponde
				if ( $hora_actual >= $desayuno_d and $hora_actual <= $desayuno_h ) { $horario_corr = 1; }
				
				if ( $hora_actual >= $almuerzo_d and $hora_actual <= $almuerzo_h ) { $horario_corr = 2; }
				
				if ( $hora_actual >= $cena_d and $hora_actual <= $cena_h ) { $horario_corr = 3; }
				
				if  (( $horario_corr == 1 AND $empleado->desayunos > 0 ) OR 
					(( $horario_corr == 2 OR $horario_corr == 3 ) AND $empleado->comidas > 0 )) { //tiene saldo segun horario
					// SEARCH SIMULTANEOS
					$simultaneos = Tickets::getTicketsSimultaneos($empleado->legajo, $horario_corr, $empleado->desayunos, $empleado->comidas, $empleado->simultaneos); 
					Yii::app()->getSession()->add('tipo', $horario_corr); //llevo a sesion tipo desayuno o comida, para recuperar en saveTicket
					$saldo = 1;
				} else { //no tiene ni desayuno ni comidas a favor
					$saldo = 0;
				}
				
				if	( $empleado->sector_rel->tipo == 0 ) { $asistencia_comida = 1;
				} else { 
					$asistencia_comida = $empleado->estado_rel->comidas;
				}

				return $this->renderPartial('_lectorRes', array(
					'empleado' => $empleado,
					'saldo' => $saldo,
					'horario_corr' => $horario_corr,
					'simultaneos' => $simultaneos, // 0 - se paso con la cant de ticket | 1 - OK 
					'asistencia_comida' => $asistencia_comida,
				));

			}

			if ($app==2) { // 1 => comedor / 2 => horario

				//check puesto
				
				//echo get_client_ip_env();die();

				$msg_puesto = Puestos::checkPuesto($empleado->idSector);

				//10 habilitado
				//11 inhabilitado puesto a ese sector
				//12 no encuentra ip en Puestos
				//
				$puestosOk = $msgNo = $msg_noPuestos = '';
				
				switch ($msg_puesto) {
					case '10': //habilitado
								// busco registro de horario de ese dia x empleado 
								
								$horario = Horarios::model()->getHorarioEmpleado($empleado->legajo);

								if ($horario) {

									$em = $sm = $et = $st = 0;
									if ($horario->em) {$em = date("H:i",$horario->em);} 
									if ($horario->sm) {$sm = date("H:i",$horario->sm);}
									if ($horario->et) {$et = date("H:i",$horario->et);}
									if ($horario->st) {$st = date("H:i",$horario->st);}	
							
								} else { //no marca aun en el dia
									$em = $sm = $et = $st = '';
								}

								return $this->renderPartial('_horarioRes', array(
									'empleado' => $empleado,
									'em' => $em,
									'sm' => $sm,
									'et' => $et,
									'st' => $st,
								));									
						
						break;

					case '11':
							
							$puestos_habilitados = SectoresPuestos::model()->findAllByAttributes(array(
								'idSector' => $empleado->idSector
								 ));

							//print_r($puestos_habilitados); die();

							if ($puestos_habilitados) {

								$msgNo = 'Este Puesto, no está habilitado a tu Sector.';

								foreach ($puestos_habilitados as $puesto) {
									
									$puestosOk = $puestosOk.'<p> - '.$puesto->puesto->ubicacion.'</p>';
								
								}

							} else {

								$msg_noPuestos = 'El Sector '.$empleado->sector_rel->nombre.' no tiene asignados Puestos de marcación, por favor comuniquese con la oficina de Recursos Humanos, Gracias!';
							}

							return $this->renderPartial('_horarioResMsg', array(
									'empleado' => $empleado,
									'msgNo' => $msgNo,
									'puestosOk' => $puestosOk,
									'msg_noPuestos' => $msg_noPuestos
								));	
						break;

					case '12':	

						$msgNo = 'Puesto no encontrado según IP ('.get_client_ip_env().').';

						return $this->renderPartial('_horarioResMsg', array(
							'empleado' => $empleado,
							'msgNo' => $msgNo,
							'msg_noPuestos' => $msg_noPuestos,
							'puestosOk' => $puestosOk,
								));	


					default:
						
						break;
				}


				

			}

		}

		return $this->renderPartial('noCardFound', array('app' => $app));

	}


	public function actionAutenticacionCardAjax($idCard, $pass) {

 		$empleado = Personal::model()->find('LOWER(tarjetaId)=?',array($idCard));

 		if ( md5($pass)===$empleado->password) {
 			Yii::app()->getSession()->add('idCard', $idCard); //llevo idCard a session para recuperarla al grabar ticket
 			Yii::app()->getSession()->add('legajo', $empleado->legajo);
 			echo 1;
 		} else {echo 0;} 

	}

	public function actionRenderProveedores() {

		$proveedores = Proveedores::model()->findAllByAttributes(
    	array('estado'=>1),array('order'=>'nombre ASC'));
      	
		return $this->renderPartial('_ProveedorSelect', array('proveedores' => $proveedores ));
	
	}

	public function actionRenderRegistroHorarios() {

		return $this->renderPartial('_HorarioSelect');
	
	}

	public function actionRenderInputPass() {
		sleep(1);
		return $this->renderPartial('_autenticacion', array('tarjetaId' => $_REQUEST['idCard']));
	}

	public function actionSaveTicket() {
		sleep(0);

		$ticket = new Tickets;
		$ticket->tarjetaId = $_REQUEST['idCard'];
		$ticket->tipo = $_REQUEST['idTipo']; //1-desayuno o 2-almuerzo 3-cena
		$ticket->idProveedor = $_REQUEST['idProve'];
		$ticket->legajo = $_REQUEST['idLegajo'];
		$ticket->idSector = $ticket->personal_rel->idSector;
		$ticket->save(false);

		$idTicket = $ticket->idTicket;

		// descuento ticket a empleado
		 
		$empleado = Personal::getEmpleado($_REQUEST['idLegajo']);

		switch (Yii::app()->getSession()->get('tipo')) {
			case '1': // desayuno
				$desayunos = $empleado->desayunos - 1; 
				$empleado->desayunos = $desayunos;
				$empleado->save(false);
				break;
			case '2': // almuerzo
			case '3': // cena
				$comidas = $empleado->comidas - 1;
				$empleado->comidas = $comidas;
				$empleado->save(false);
				break; 
		}

		$desayunos = Tickets::getTicketsTipoPersonalMes(1,$_REQUEST['idLegajo']);
		$almuerzos = Tickets::getTicketsTipoPersonalMes(2,$_REQUEST['idLegajo']);
		$cenas = Tickets::getTicketsTipoPersonalMes(3,$_REQUEST['idLegajo']);

		echo $this->render('_printTicket', array(
			'idTicket' => $idTicket,
			'desayunos' => $desayunos,
			'almuerzos' => $almuerzos,
			'cenas' => $cenas,
		));
		
	}

	public function actionSaveHorario() {

		sleep(1);
		
		// 1-em, 2-sm, 3-et, 4-st

		$dia_registro = Horarios::model()->getHorarioEmpleado($_REQUEST['idLegajo']);

		$ahora = getdate();
		$hora_actual = $ahora['hours'].':'.$ahora['minutes'];
		$hora_actual = strtotime($hora_actual);

		if ($dia_registro) { //actualizo registro
			
			$hoy = date('Y-m-d');

			$horario = Horarios::model()->findByAttributes(
			array('legajo'=>$_REQUEST['idLegajo']),
			array(
				'condition' => 'DATE_FORMAT(fecha, "%Y-%m-%d") = :hoy',
				'params' => array(':hoy' => $hoy ),
				));

				switch ($_REQUEST['idTipo']) {
					case '1':
						$horario->em = $hora_actual;
						break;

					case '2':
						$horario->sm = $hora_actual;
						break;

					case '3':
						$horario->et = $hora_actual;
						break;

					case '4':
						$horario->st = $hora_actual;
						break;
						
				}

				$horario->save(false);

			} else { // nuevo registro
		
				$horario = new Horarios;
				$horario->tarjetaId = $_REQUEST['idCard'];
				$horario->idTipo = $_REQUEST['idTipo'];
				$horario->legajo = $_REQUEST['idLegajo'];
				$horario->idSector = $horario->personal_rel->idSector;

				switch ($_REQUEST['idTipo']) {
					case '1':
						$horario->em = $hora_actual;
						break;

					case '2':
						$horario->sm = $hora_actual;
						break;

					case '3':
						$horario->et = $hora_actual;
						break;

					case '4':
						$horario->st = $hora_actual;
						break;
						
				}

				$horario->save(false);

		} 

		//$idHorario = $horario->idHorario;
		//echo $this->render('_printHorario', array('idHorario' => $idHorario));
		
	}

public function actionBuscarPistasSectorAjax($id) {

	if ($id==1) {
		$pistas_s1 = Pistas::model()->findAllByAttributes(array(),
		$condition = 'idSector = 1 ORDER BY nombre ASC');

		$pistas_c1 = Pistas::model()->findAllByAttributes(array(),
		$condition = 'idSector = 2 ORDER BY nombre ASC');

		return $this->renderPartial('_pistas', array('pistas_s1' => $pistas_s1, 'pistas_c1' => $pistas_c1));
	}

	if ($id==2) {
		$pistas_s2 = Pistas::model()->findAllByAttributes(array(),
		$condition = 'idSector = 3 ORDER BY nombre ASC');

		// CONEXION SECTOR II
		$pistas_c2 = Pistas::model()->findAllByAttributes(array(),
		$condition = 'idSector = 4 ORDER BY nombre ASC');

		$pistas_s2_1 = array_slice($pistas_s2, 0,11);
		$pistas_s2_2 = array_slice($pistas_s2, 12,13);

		return $this->renderPartial('_pistas2', array(
			'pistas_s2_1' => $pistas_s2_1,
			'pistas_s2_2' => $pistas_s2_2,
			'pistas_c2' => $pistas_c2,
		));}

	if ($id==3) {
		$pistas_s3 = Pistas::model()->findAllByAttributes(array(),
		$condition = 'idSector = 5 ORDER BY nombre ASC');

		// CONEXION SECTOR III
		$pistas_c3 = Pistas::model()->findAllByAttributes(array(),
		$condition = 'idSector = 6 ORDER BY nombre ASC');

		return $this->renderPartial('_pistas3', array(
			'pistas_s3' => $pistas_s3,
			'pistas_c3' => $pistas_c3,
		));}

}

}
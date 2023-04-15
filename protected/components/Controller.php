<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/dashboard';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $titulo;

	/* activar menus */
	public $bot_home;
	public $bot_contacto;

	/* activar menus admin */
	public $menu_home;
	public $menu_personal;public $menu_personal_n;public $menu_personal_l;
	public $menu_sectores;public $menu_sectores_n;public $menu_sectores_l;
	public $menu_frecuencias;public $menu_frecuencias_n;public $menu_frecuencias_l;
	public $menu_estados;public $menu_estados_n;public $menu_estados_l;
	public $menu_noticias;public $menu_noticias_n;public $menu_noticias_l;
	public $menu_reglamentos;public $menu_reglamentos_n;public $menu_reglamentos_l;
	public $menu_formularios;public $menu_formularios_n;public $menu_formularios_l;
	public $menu_asistencias;
	public $menu_internos;public $menu_internos_n;public $menu_internos_l;
	public $menu_asistencias_consultas; public $menu_asistencias_diaria;
	public $menu_asistencias_domingos;
	public $menu_asistencias_exportar;
	public $menu_comidas;
	public $menu_tickets;
	public $menu_carga;
	public $menu_comidas_control; public $menu_comidas_parametros;
	public $menu_horarios; public $menu_horarios_registros; public $menu_horarios_control; public $menu_horarios_exportar; public $menu_horarios_cargar;
	public $menu_proveedores;public $menu_proveedores_n;public $menu_proveedores_l;
	public $menu_puestos;public $menu_puestos_n;public $menu_puestos_l;
	public $menu_usuarios;public $menu_usuarios_n;public $menu_usuarios_l;
	public $menu_suscripciones;
	public $menu_configuracion;
	public $menu_pistas;
	public $menu_archivo;
	public $menu_archivo_asistencias;
	public $menu_archivo_horarios;
	public $menu_archivo_tickets;
	public $menu_log;
	}

	define("URLRAIZ", Yii::app()->request->baseUrl);

	function recortar_texto($texto, $limite=100, $puntos='...'){  
	    $texto = trim($texto);
	    $texto = strip_tags($texto);
	    $tamano = strlen($texto);
	    $resultado = '';
	    if($tamano <= $limite){
	        return $texto;
	    }else{
	        $texto = substr($texto, 0, $limite);
	        $palabras = explode(' ', $texto);
	        $resultado = implode(' ', $palabras);
	        $resultado .= $puntos;
	    }  
	    return $resultado;
}


function urls_amigables($s) {
    $p = array('$','%','ú','á','Á',':','/','É','Í','Ó','Ú','é','ñ','Ñ','í','ó',' 1',' 2',' 3',' 4',' 5',' 6',' 7',' 8',' 9',' 0',' - ',' ','#','(',')','[',']','.','<','>','{','}','?','¿','!','¡','&',"'",'"',',');
    $r = array('','porciento','u','a','A','','-','e','i','o','u','e','n','n','i','o','1','2','3','4','5','6','7','8','9','0','-','-','','','','','','','','','','','','','','','y','','','');
    $s=str_replace($p, $r, $s);
    $s = strtolower($s);
    return $s;
}

function quitarPuntos($hora) { //para quitar puntos en la hora

		$hora = explode(':',$hora);
		$hora = $hora[0].$hora[1];
		return $hora;

}

function estado_abr($idEstado) {

/*
1 	Presente 	
2 	Sale de Franco 	
3 	Franco 	
4 	1/2 Franco 	
7 	Franco Compensatorio 	
8 	Franco Empresa 	
9 	1/2 Franco Empresa 	
10 	Enfermo 	
11 	Permiso 	
12 	Vacaciones 	
13 	Accidente 	
14 	Comisión 	
15 	Buenos Aires 	
16 	Licencia 	
17 	Baja 	
18 	Suspensión 	
19 	Reserva de Puesto 	
20 	Inasistencia 
*/

switch ($idEstado) {
	case '1': // presente
		$abr = '<span data-original-title="Presente" data-toggle="tooltip" title="Presente" class="badge bg-presente">P</span>';break;

	case '2': //Sale Franco
		$abr = '<span data-original-title="Sale Franco" data-toggle="tooltip" title="Sale Franco" class="badge bg-sale-franco">SF</span>';break;

	case '3': //Franco
		$abr = '<span data-original-title="Sale Franco" data-toggle="tooltip" title="Franco" class="badge bg-franco">F</span>';break;

	case '4': //1/2 Franco
		$abr = '<span data-original-title="1/2 Franco" data-toggle="tooltip" title="1/2 Franco" class="badge bg-medio-franco">1/2</span>';break;
	
	case '7': // Franco Compensa
		$abr = '<span data-original-title="Franco Compensatorio" data-toggle="tooltip" title="Franco Compensatorio" class="badge bg-franco-compensatorio">FC</span>';break;
	
	case '10':
		$abr = '<span data-original-title="Enfermo" data-toggle="tooltip" title="Enfermo" class="badge bg-franco-enfermo">E</span>';break;
		
	case '11':
		$abr = '<span data-original-title="Permiso" data-toggle="tooltip" title="Permiso" class="badge bg-franco-permiso">PP</span>';break;
			
	case '12':
		$abr = '<span data-original-title="Vacaciones" data-toggle="tooltip" title="Vacaciones" class="badge bg-franco-vacaciones">V</span>';break;

	case '13':
		$abr = '<span data-original-title="Accidente" data-toggle="tooltip" title="Accidente" class="badge bg-franco-accidente">A</span>';break;
	
	case '14':
		$abr = '<span data-original-title="Comisión" data-toggle="tooltip" title="Comisión" class="badge bg-franco-comision">C</span>';break;
	
	case '15':
		$abr = '<span data-original-title="Buenos Aires" data-toggle="tooltip" title="Buenos Aires" class="badge bg-franco-buenos-aires">BA</span>';break;

	case '17':
		$abr = '<span data-original-title="Baja" data-toggle="tooltip" title="Baja" class="badge bg-franco-baja">B</span>';break;
	
	case '16':
		$abr = '<span data-original-title="Licencia" data-toggle="tooltip" title="Liciencia" class="badge bg-franco-licencia">L</span>';break;

	case '9':
		$abr = '<span data-original-title="1/2 Franco Empresa" data-toggle="tooltip" title="1/2 Franco Empresa" class="badge bg-franco-medio-empresa">1/E</span>';break;
	
	case '8':
		$abr = '<span data-original-title="Franco Empresa" data-toggle="tooltip" title="Franco Empresa" class="badge bg-franco-empresa">FE</span>';break;

	case '18':
		$abr = '<span data-original-title="Suspención" data-toggle="tooltip" title="Suspención" class="badge bg-franco-empresa">S</span>';break;	
	
	case '19':
			$abr = '<span data-original-title="Reserva de Puesto" data-toggle="tooltip" title="Reserva de Puesto" class="badge bg-franco-empresa">RP</span>';break;	

	case '20':
			$abr = '<span data-original-title="Inasistencia" data-toggle="tooltip" title="Inasistencia" class="badge bg-franco-empresa">I</span>';break;	


	default:
		$abr = '-';
		break;
}

	return $abr;
}


function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

	function testEmail() {
				
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

	function sendEmailBk($response, $file, $size) {

		$size = $size / 1048576;
		
		switch ( $response ) {
			case '1':
				$subjet = 'Backup Intranet VLL - OK! :)';
				$body = "El backup se ha realizado correctamente :)"."<br>"."Archivo creado: ".$file." (".round($size, 2)."Mb)";
				break;

			case '0':
				$subjet = 'ATENCION : Backup Intranet NO REALIZADO :(';
				$body = "ATENCION : El proceso de backup NO se ha podido completar, por favor revise los registros log para determinar la falla.";
				break;
			
			default:
				$subjet = 'ATENCION : Backup Intranet NO REALIZADO :(';
				$body = "ATENCION : El proceso de backup NO se ha podido completar, por favor revise los registros log para determinar la falla.";
				break;
		}

		$mail = new YiiMailer();
		$mail->setView( 'contact' );
		$mail->setData( array('message' => '', 'name' => '', 'description' => $body) );

		$mail->setFrom('intranet@laslenas.com', 'Valle de las Leñas');

//		$mail->AddAddress('aleonforte@laslenas.com');
//		$mail->AddAddress('dbordon@laslenas.com');
		$mail->AddAddress('mauriciolav@gmail.com');
		
		$mail->setSubject( $subjet );

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



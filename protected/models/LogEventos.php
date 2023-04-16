<?php

class LogEventos extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_eventos';
	}

	public $desde;
	public $hasta;
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, fecha, idTipo, idUsuario, detalle', 'required'),
			array('id, idTipo, idUsuario', 'numerical', 'integerOnly'=>true),
			array('detalle', 'type', 'type' => 'text'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha, idTipo, idUsuario, detalle, puesto_ip', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'idUsuario'),
			'tipo' => array(self::BELONGS_TO, 'LogTipos', 'idTipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id Log',
			'idUsuario' => 'Usuario',
			'idTipo' => 'Tipo',
			'fecha' => 'Fecha',
            'detalle' => 'Detalle',
		);
	}

	public function search() {
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('`t`.`idTipo`',$this->idTipo);
		$criteria->compare('`t`.`idUsuario`',$this->idUsuario);
		$criteria->compare('`t`.`puesto_ip`',$this->puesto_ip, true);
		$criteria->compare('`t`.`detalle`',$this->detalle, true);
		$criteria->compare('DATE_FORMAT( `t`.`fecha`, "%Y-%m-%d")',$this->fecha,true);
				
		/*
        if((isset($this->desde) && trim($this->desde) != "") && (isset($this->hasta) && trim($this->hasta) != ""))
		$criteria->addBetweenCondition("DATE_FORMAT(`t`.`fecha`, '%Y-%m-%d')", ''.Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->desde).'', ''.Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->hasta).'');
        */

		$sort=new CSort();
		$sort->defaultOrder = '`t`.`id` DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
			'sort'=>$sort,
		));
	}

	public static function model($className=__CLASS__)	{ return parent::model($className); }

	public static function addLog( $idTipo, $detalle=null, $model_old=null ) {

		$paso = 1;$string='';

		if ( $idTipo == 5 ) { // Nuevo empleado

			foreach ( $detalle as $key => $value ) {

				if ( $key == 'legajo' ) { $string .= "Legajo: $value, ";}
				if ( $key == 'nombre' ) { $string .= "Nombre: $value, ";}
				if ( $key == 'cuil' && !empty($value) ) { $string .= "Cuil: $value, ";}
				if ( $key == 'idSector' ) {
					$sector = Sectores::model()->findByPk( $value );
					$string .= "Sector: $sector->nombre, ";
				}
				if ( $key == 'idFrecuencia' ) {
					$frecuencia = Frecuencias::model()->findByPk( $value );
					$string .= "Frecuencia: $frecuencia->nombre, ";
				}
				if ( $key == 'francos' && !empty($value) ) { $string .= "Francos: $value, ";}
				if ( $key == 'tarjetaId' && !empty($value) ) { $string .= "Tarjeta Id: $value, ";}
				if ( $key == 'desayunos' && !empty($value) ) { $string .= "Desayunos: $value, ";}
				if ( $key == 'comidas' && !empty($value) ) { $string .= "Comidas: $value, ";}
				if ( $key == 'simultaneos' && !empty($value) ) { $string .= "Simultaneos: $value, ";}
				if ( $key == 'desayuno_desde' && !empty($value) ) { $string .= ": $value, ";}
				if ( $key == 'desayuno_hasta' && !empty($value) ) { $string .= ": $value, ";}
				if ( $key == 'almuerzo_desde' && !empty($value) ) { $string .= "Alm.desde: $value, ";}
				if ( $key == 'almuerzo_hasta' && !empty($value) ) { $string .= "Alm.hasta: $value, ";}
				if ( $key == 'cena_desde' && !empty($value) ) { $string .= "Cena desde: $value, ";}
				if ( $key == 'cena_hasta' && !empty($value) ) { $string .= "cena hasta: $value, ";}
				if ( $key == 'em' && !empty($value) ) { $string .= "Ent.Man.: $value, ";}
				if ( $key == 'sm' && !empty($value) ) { $string .= "Sal.Man.: $value, ";}
				if ( $key == 'et' && !empty($value) ) { $string .= "Ent.tarde: $value, ";}
				if ( $key == 'st' && !empty($value) ) { $string .= "Sal.tarde: $value, ";}
				if ( $key == 'obs' && !empty($value) ) { $string .= "Obs: $value, ";}

			}
		
			$detalle = rtrim($string, ", "); // Eliminar la última coma y el espacio en blanco
		
		} // fin (5) Nuevo empleado

		if ( $idTipo == 7 ) { // Modificó empleado
			
			$pase = 0;
			//echo $detalle['nombre'];
			//print_r($detalle);
			//die();
			//$new_model->attributes = $detalle;
			
			
			if ( $model_old->legajo != $detalle['legajo'] ) { $string .= 'Legajo: '.$model_old->legajo.' -> '.$detalle['legajo'].', '; $pase = 1; } 
			if ( $model_old->nombre != $detalle['nombre'] ) { $string .= 'Nombre: '.$model_old->nombre.' -> '.$detalle['nombre'].', '; $pase = 1; } 
			if ( $model_old->cuil != $detalle['cuil'] ) { $string .= 'Cuil: '.$model_old->cuil.' -> '.$detalle['cuil'].', '; $pase = 1; } 
						
			if ( $model_old->idSector != $detalle['idSector'] ) {
				$sector_old = Sectores::model()->findByPk( $model_old->idSector );	 
				$sector_new = Sectores::model()->findByPk( $detalle['idSector'] );	 
				$string .= 'Sector: '.$sector_old->nombre.' -> '.$sector_new->nombre.', '; $pase = 1; 
			} 

			if ( $model_old->idFrecuencia != $detalle['idFrecuencia'] ) {
				$frecuencia_old = Frecuencias::model()->findByPk( $model_old->idFrecuencia );	 
				$frecuencia_new = Frecuencias::model()->findByPk( $detalle['idFrecuencia'] );	 
				$string .= 'Frecuencia: '.$frecuencia_old->nombre.' -> '.$frecuencia_new->nombre.', '; $pase = 1; 
			}
			
			if ( $model_old->francos != $detalle['francos'] ) { $string .= 'Francos: '.$model_old->francos.' -> '.$detalle['francos'].', '; $pase = 1; } 
			if ( $model_old->tarjetaId != $detalle['tarjetaId'] ) { $string .= 'TarjetaId: '.$model_old->tarjetaId.' -> '.$detalle['tarjetaId'].', '; $pase = 1; } 
			if ( $model_old->desayunos != $detalle['desayunos'] ) { $string .= 'Desayunos: '.$model_old->desayunos.' -> '.$detalle['desayunos'].', '; $pase = 1; } 
			if ( $model_old->comidas != $detalle['comidas'] ) { $string .= 'Comidas: '.$model_old->comidas.' -> '.$detalle['comidas'].', '; $pase = 1; } 
			if ( $model_old->desayuno_desde != $detalle['desayuno_desde'] ) { $string .= 'Desayuno desde: '.$model_old->desayuno_desde.' -> '.$detalle['desayuno_desde'].', '; $pase = 1; } 
			if ( $model_old->desayuno_hasta != $detalle['desayuno_hasta'] ) { $string .= 'Desayuno hasta: '.$model_old->desayuno_hasta.' -> '.$detalle['desayuno_hasta'].', '; $pase = 1; } 

			/*
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			if ( $model_old-> != $detalle[''] ) { $string .= ': '.$model_old->.' -> '.$detalle[''].', '; $pase = 1; } 
			*/
			
/*
    [almuerzo_desde] => 10:15 
    [almuerzo_hasta] => 18:30 
    [cena_desde] => 18:45 
    [cena_hasta] => 23:45 
    [em] => 12:00 
    [sm] => 12:00 
    [et] => 12:00 
    [st] => 12:00 
    [obs] => 
    [foto] => 40787.png 
    [activo] => 1 
*/ 

			$detalle = rtrim($string, ", "); // Eliminar la última coma y el espacio en blanco

			//echo 'ant '.$model_old->nombre.'-----';
			//echo 'nuevo: '.$detalle['nombre'];

			//echo $string;
			//echo $model_old;
			//die();


		}

		if ( $pase==1 ) {
			$log_evento = new LogEventos();
			$log_evento->idTipo = $idTipo;
			$log_evento->idUsuario = Yii::app()->user->id;
			$log_evento->puesto_ip = Yii::app()->request->getUserHostAddress();
			$log_evento->detalle = $detalle;
			$log_evento->save(false);	
		}
		

	}

}

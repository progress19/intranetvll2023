<?php

/**
 * This is the model class for table "tickets".
 *
 * The followings are the available columns in table 'tickets':
 * @property string $idTicket
 * @property integer $tarjetaId
 * @property integer $legajo
 * @property string $idProveedor
 * @property integer $tipo
 * @property string $fecha
 */
class Tickets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tickets';
	}

	public $desde;
	public $hasta;
	public $nombre_empleado;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tarjetaId, legajo, idProveedor, tipo, fecha, idSector', 'required'),
			array('tarjetaId, legajo, tipo', 'numerical', 'integerOnly'=>true),
			array('idProveedor', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTicket, idSector, tarjetaId, legajo, idProveedor, tipo, fecha, desde, hasta, nombre_empleado', 'safe', 'on'=>'search'),
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
			'proveedor_rel' => array(self::BELONGS_TO, 'Proveedores', 'idProveedor'),
			'personal_rel' => array(self::BELONGS_TO, 'Personal', array('legajo'=>'legajo')),
			'sector_rel' => array(self::BELONGS_TO, 'Sectores', 'idSector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTicket' => 'Id Ticket',
			'tarjetaId' => 'Tarjeta',
			'legajo' => 'Legajo',
			'idProveedor' => 'Id Proveedor',
			'tipo' => 'Tipo',
			'fecha' => 'Fecha',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

        $criteria->with = array('personal_rel');
         $criteria->compare('personal_rel.nombre',$this->nombre_empleado,true); 

		$criteria->compare('idTicket',$this->idTicket);
		$criteria->compare('`t`.`tarjetaId`',$this->tarjetaId);
		$criteria->compare('`t`.`legajo`',$this->legajo);
		$criteria->compare('`t`.`idProveedor`',$this->idProveedor);
		$criteria->compare('`t`.`idSector`',$this->idSector);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('DATE_FORMAT( `t`.`fecha`, "%Y-%m-%d")',$this->fecha,true);
		
		/*
		if (!empty($this->desde) && !empty($this->hasta)) {

			$criteria->condition = "DATE_FORMAT(`t`.`fecha`, '%Y-%m-%d') BETWEEN :desde AND :hasta";

			$criteria->params[':desde'] = Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->desde);
			$criteria->params[':hasta'] = Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->hasta);

		}*/

		if((isset($this->desde) && trim($this->desde) != "") && (isset($this->hasta) && trim($this->hasta) != ""))
			
			$criteria->addBetweenCondition("DATE_FORMAT(`t`.`fecha`, '%Y-%m-%d')", ''.Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->desde).'', ''.Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->hasta).'');

		$sort=new CSort();

		$sort->defaultOrder = '`t`.`idTicket` DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tickets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getTipoTicket($tipo) {

		switch ($tipo) {
			case '1':
				$tipo = 'Desayuno';
				break;

			case '2':
				$tipo = 'Almuerzo';
				break;
			case '3':
				$tipo = 'Cena';
				break;

		}

		return $tipo;

	}

	public static function getComProveedor($idProveedor, $desde, $hasta, $tipo, $tipo_sector) {

		$com = Tickets::model()->with('sector_rel')->findAllByAttributes(
				array('idProveedor'=>$idProveedor),
				    array(
				        'condition'=>'DATE_FORMAT(fecha, "%Y-%m-%d") BETWEEN :desde AND :hasta AND t.tipo = :tipo AND sector_rel.tipo = :tipo_sector', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta, ':tipo'=>$tipo, ':tipo_sector'=>$tipo_sector))
				);

		return count($com);

	}

	public static function getTotalComProveedor($idProveedor, $desde, $hasta) {

		$com = Tickets::model()->findAllByAttributes(
				array('idProveedor'=>$idProveedor),
				    array(
				        'condition'=>'DATE_FORMAT(fecha, "%Y-%m-%d") BETWEEN :desde AND :hasta AND (tipo = 2 OR tipo = 3)', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($com);

	}

	public static function getComSector($idSector, $desde, $hasta, $tipo) {

		$com = Tickets::model()->findAllByAttributes(
				array('idSector'=>$idSector),
				    array(
				        'condition'=>'DATE_FORMAT(fecha, "%Y-%m-%d") BETWEEN :desde AND :hasta AND tipo = :tipo', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta, ':tipo'=>$tipo))
				);

		return count($com);

	}

	public static function getTotalComSector($idSector, $desde, $hasta) {

	$com = Tickets::model()->findAllByAttributes(
			array('idSector'=>$idSector),
			    array(
			        'condition'=>'DATE_FORMAT(fecha, "%Y-%m-%d") BETWEEN :desde AND :hasta AND (tipo = 2 OR tipo = 3)', 
    				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
			);

		return count($com);

	}

	public static function getTicketsSimultaneos($legajo, $turno, $desayunos, $comidas, $simultaneos) {
	
		$hoy = date('Y-m-d');

		$tickets = Tickets::model()->findAllByAttributes(
			array('legajo'=>$legajo),
				array(
					'condition' => 'DATE_FORMAT(fecha, "%Y-%m-%d") = :hoy AND tipo = :turno',
					'params' => array(':hoy' => $hoy, ':turno' => $turno ),
				)
			);
	
			if (count($tickets) >= $simultaneos) {
				return 0; // ya generaste los tickets permitidos para este turno
			} else {
				return 1;
			}

	}


	public static function getTicketsTipoPersonalMes($tipo, $legajo) { //consumos del periodo

		$tickets = Tickets::model()->findAllByAttributes(
			array('legajo' => $legajo),
				array(
					'condition' => 'MONTH(fecha) = MONTH(NOW()) AND tipo = :tipo',
					'params' => array(':tipo' => $tipo),
				));
	
		return count($tickets);

	}

	public static function getTicketsDesayunosPersonalFechaTipo($legajo, $desde, $hasta) {

		$desCom = Tickets::model()->findAllByAttributes(
				array('legajo'=>$legajo),
				    array(
				        'condition'=>'DATE_FORMAT(fecha, "%Y-%m-%d") BETWEEN :desde AND :hasta AND tipo = 1', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($desCom);

	}

	public static function getTicketsComidasPersonalFechaTipo($legajo, $desde, $hasta) {

		$desCom = Tickets::model()->findAllByAttributes(
				array('legajo'=>$legajo),
				    array(
				        'condition'=>'DATE_FORMAT(fecha, "%Y-%m-%d") BETWEEN :desde AND :hasta AND (tipo = 2 or tipo = 3)', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($desCom);

	}

	public static function getTicketsExcel($desde, $hasta) { 
  		
		$tickets = Tickets::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'DATE_FORMAT(fecha, "%Y-%m-%d") BETWEEN :desde AND :hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $tickets;

	}

	public static function getTicketsPorAno($year) { 

			$desde = $year.'-'.'01-01';
			$hasta = $year.'-'.'12-31';
	   
		$tickets = Tickets::model()->findAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
       				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($tickets);

	}

	public static function getTicketsArchivar( $year ) { 
	   
		$desde = $year.'-'.'01-01';
		$hasta = $year.'-'.'12-31';

		$tickets = Tickets::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $tickets;

	}
	

}

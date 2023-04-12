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
class TicketsArchivo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ticketsArchivo';
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
		return array();
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

	public static function getTicketsPorAno($year) { 

		$desde = $year.'-'.'01-01';
		$hasta = $year.'-'.'12-31';
	   
		$tickets = TicketsArchivo::model()->findAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
       				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($tickets);

	}

	public static function getTicketsDesarchivar( $year ) { 
	   
		$desde = $year.'-'.'01-01';
		$hasta = $year.'-'.'12-31';

		$tickets = TicketsArchivo::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $tickets;

	}


}

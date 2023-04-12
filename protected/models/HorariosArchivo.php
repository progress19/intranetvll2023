<?php

/**
 * This is the model class for table "horarios".
 *
 * The followings are the available columns in table 'horarios':
 * @property string $idHorario
 * @property integer $tarjetaId
 * @property integer $legajo
 * @property string $idTipo
 * @property string $fecha
 */
class HorariosArchivo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horariosArchivo';
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
			array('idTipo', 'required'),
			array('tarjetaId, legajo', 'numerical', 'integerOnly'=>true),
			array('idTipo', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHorario, idSector, tarjetaId, legajo, idTipo, fecha, desde, hasta, nombre_empleado', 'safe', 'on'=>'search'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTicket' => 'Id Ticket',
			'tarjetaId' => 'Tarjeta',
			'legajo' => 'Legajo',
			'idTipo' => 'Id Proveedor',
			'fecha' => 'Fecha',
			'em' => 'Entrada Mañana',
			'sm' => 'Salida Mañana',
			'et' => 'Entrada Tarde',
			'st' => 'Salida Tarde'
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getHorariosPorAno($year) { 

			$desde = $year.'-'.'01-01';
			$hasta = $year.'-'.'12-31';
	   
		$horarios = HorariosArchivo::model()->findAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
       				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($horarios);

	}

	public static function getHorariosDesarchivar( $year ) { 
	   
		$desde = $year.'-'.'01-01';
		$hasta = $year.'-'.'12-31';

		$horarios = HorariosArchivo::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $horarios;

	}


}

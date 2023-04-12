<?php

/**
 * This is the model class for table "asistencias".
 *
 * The followings are the available columns in table 'asistencias':
 * @property integer $idAsistencia
 * @property string $idPersonal
 * @property string $fecha
 * @property integer $legajo
 * @property string $nombre
 * @property string $idSector
 * @property string $sector
 * @property string $estado
 * @property string $francos
 */
class Asistencias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asistencias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPersonal, fecha, legajo, nombre, idSector, sector, estado, francos', 'required'),
			array('legajo', 'numerical', 'integerOnly'=>true),
			array('idPersonal, idSector, idEstado', 'length', 'max'=>20),
			array('nombre, sector', 'length', 'max'=>40),
			array('estado', 'length', 'max'=>15),
			array('francos', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAsistencia, idPersonal, fecha, legajo, nombre, idSector, idEstado, sector, estado, francos, from_date, to_date', 'safe', 'on'=>'search'),
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
			'estado_rel' => array(self::BELONGS_TO, 'Estados', 'idEstado'),
			'personal_rel'=>array(self::BELONGS_TO, 'Personal', 'idPersonal'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAsistencia' => 'Id Asistencia',
			'idPersonal' => 'Id Personal',
			'fecha' => 'Fecha',
			'legajo' => 'Legajo',
			'nombre' => 'Nombre',
			'idSector' => 'Id Sector',
			'sector' => 'Sector',
			'estado' => 'Estado',
			'francos' => 'Francos',
			'idEstado' => 'Estado',
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
	
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idAsistencia',$this->idAsistencia);
		$criteria->compare('`t`.`idPersonal`',$this->idPersonal,true);
		$criteria->compare('`t`.`idEstado`',$this->idEstado);
		$criteria->compare('`t`.`fecha`',$this->fecha,true);
		$criteria->compare('`t`.`legajo`',$this->legajo);

		$sort=new CSort();

		$sort->defaultOrder = '`t`.`idAsistencia` DESC';

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
	 * @return Asistencias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getAsistencias($legajo,$ano) { 
	    
		$asistencias = Asistencias::model()->findAllByAttributes(
				array('legajo'=>$legajo));

		return $asistencias;

	}

	public static function getAsistencia($legajo,$fecha) { 
	    
		$asistencia = Asistencias::model()->findByAttributes(
				array('legajo'=>$legajo),
				    array(
				        'condition'=>'fecha=:fecha', 
        				'params'=>array(':fecha'=>$fecha))

				);

		return $asistencia;

	}

	public static function getGraficoExcel($legajo,$fecha) { 
	    
		$asistencia = Asistencias::model()->findByAttributes(
				array('legajo'=>$legajo),
				    array(
				        'condition'=>'fecha=:fecha', 
        				'params'=>array(':fecha'=>$fecha))

				);
		$estado = Estados::getAbrEstadoExcel($asistencia['idEstado']);
		return $estado;

	}

	public static function getNombre($legajo) { 
	    
	$nombre = Personal::model()->findByAttributes(
				array('legajo'=>$legajo));

	return $nombre->nombre;

	}


	public static function getAsistenciasPorEmpleado($legajo,$desde,$hasta) { 
	   
		$asistencia = Asistencias::model()->findAllByAttributes(
				array('legajo'=>$legajo),
				    array(
				        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $asistencia;

	}


	public static function getAsistenciasExcel($desde, $hasta) { 
  		
		$asistencias = Asistencias::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'fecha >= :desde AND fecha <=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $asistencias;

	}

		public static function getAsistenciasPorAno($year) { 

			$desde = $year.'-'.'01-01';
			$hasta = $year.'-'.'12-31';
	   
		$asistencias = Asistencias::model()->findAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
       				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($asistencias);

	}

	public static function getAsistenciasArchivar( $year ) { 
	   
		$desde = $year.'-'.'01-01';
		$hasta = $year.'-'.'12-31';

		$asistencias = Asistencias::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $asistencias;

	}


}
<?php

/**
 * This is the model class for table "asistencias".
 *
 * The followings are the available columns in table 'asistencias':
 * @property integer $idAsistencia
 * @property string $idPersonal
 * @property string $fecha
 * @property integer $legajo
 * @property string $estado
 */
class AsistenciasArchivo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asistenciasArchivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPersonal, fecha, legajo, estado', 'required'),
			array('legajo', 'numerical', 'integerOnly'=>true),
			array('idPersonal, idSector, idEstado', 'length', 'max'=>20),
			array('estado', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAsistencia, idPersonal, fecha, legajo, nombre, idEstado, estado', 'safe', 'on'=>'search'),
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
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			
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

	
	public static function getAsistenciasPorAno($year) { 

			$desde = $year.'-'.'01-01';
			$hasta = $year.'-'.'12-31';
	   
		$asistencias = AsistenciasArchivo::model()->findAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
       				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($asistencias);

	}

	public static function getAsistenciasDesarchivar( $year ) { 
	   
		$desde = $year.'-'.'01-01';
		$hasta = $year.'-'.'12-31';

		$asistencias = AsistenciasArchivo::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $asistencias;

	}


}
<?php

/**
 * This is the model class for table "relfrecesta".
 *
 * The followings are the available columns in table 'relfrecesta':
 * @property string $idRelacion
 * @property string $idFrecuencia
 * @property string $idEstado
 * @property string $calculo
 */
class Relfrecesta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'relfrecesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFrecuencia, idEstado, calculo', 'required'),
			array('idFrecuencia, idEstado', 'length', 'max'=>20),
			array('calculo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idRelacion, idFrecuencia, idEstado, calculo', 'safe', 'on'=>'search'),
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
			'frecuencia' => array(self::BELONGS_TO, 'Frecuencias', 'idFrecuencia'),
			'estado_rel' => array(self::BELONGS_TO, 'Estados', 'idEstado')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRelacion' => 'Id Relacion',
			'idFrecuencia' => 'Id Frecuencia',
			'idEstado' => 'Id Estado',
			'calculo' => 'Cálculo',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idRelacion',$this->idRelacion,true);
		$criteria->compare('idFrecuencia',$this->idFrecuencia,true);
		$criteria->compare('idEstado',$this->idEstado,true);
		$criteria->compare('calculo',$this->calculo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Relfrecesta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getUnidadFrecuencia($idFrecuencia,$idEstado) { 
	    
		$unidad = Relfrecesta::model()->findByAttributes(
				array('idFrecuencia'=>$idFrecuencia,
					  'idEstado'=>$idEstado	
					));
				
		return $unidad;

	}
}

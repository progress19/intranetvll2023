<?php

/**
 * This is the model class for table "config_comedor".
 *
 * The followings are the available columns in table 'config_comedor':
 * @property string $idConfig
 * @property string $desayuno_desde
 * @property string $desayuno_hasta
 * @property string $almuerzo_desde
 * @property string $almuerzo_hasta
 * @property string $cena_desde
 * @property string $cena_hasta
 * @property integer $inicial_desayuno
 * @property integer $inicial_comidas
 */
class ConfigComedor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'config_comedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desayuno_desde, desayuno_hasta, almuerzo_desde, almuerzo_hasta, cena_desde, cena_hasta, inicial_desayuno, inicial_comidas', 'required'),
			array('inicial_desayuno, inicial_comidas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idConfig, desayuno_desde, desayuno_hasta, almuerzo_desde, almuerzo_hasta, cena_desde, cena_hasta, inicial_desayuno, inicial_comidas', 'safe', 'on'=>'search'),
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
			'idConfig' => 'Id Config',
			'desayuno_desde' => 'Desayuno Desde',
			'desayuno_hasta' => 'Desayuno Hasta',
			'almuerzo_desde' => 'Almuerzo Desde',
			'almuerzo_hasta' => 'Almuerzo Hasta',
			'cena_desde' => 'Cena Desde',
			'cena_hasta' => 'Cena Hasta',
			'inicial_desayuno' => 'Inicial Desayuno',
			'inicial_comidas' => 'Inicial Comidas',
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

		$criteria->compare('idConfig',$this->idConfig,true);
		$criteria->compare('desayuno_desde',$this->desayuno_desde,true);
		$criteria->compare('desayuno_hasta',$this->desayuno_hasta,true);
		$criteria->compare('almuerzo_desde',$this->almuerzo_desde,true);
		$criteria->compare('almuerzo_hasta',$this->almuerzo_hasta,true);
		$criteria->compare('cena_desde',$this->cena_desde,true);
		$criteria->compare('cena_hasta',$this->cena_hasta,true);
		$criteria->compare('inicial_desayuno',$this->inicial_desayuno);
		$criteria->compare('inicial_comidas',$this->inicial_comidas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConfigComedor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

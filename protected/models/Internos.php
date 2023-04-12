<?php

/**
 * This is the model class for table "tblinternos".
 *
 * The followings are the available columns in table 'tblinternos':
 * @property integer $idInterno
 * @property string $numero
 * @property string $nombre
 * @property string $grupo
 * @property integer $estado
 */
class Internos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblinternos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('numero', 'length', 'max'=>15),
			array('nombre', 'length', 'max'=>27),
			array('grupo', 'length', 'max'=>19),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInterno, numero, nombre, grupo, estado', 'safe', 'on'=>'search'),
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
			'idInterno' => 'Id Interno',
			'numero' => 'Número',
			'nombre' => 'Nombre',
			'grupo' => 'Grupo',
			'estado' => 'Estado',
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

		$criteria->compare('idInterno',$this->idInterno);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('grupo',$this->grupo,true);
		$criteria->compare('estado',$this->estado);

		$sort=new CSort();
		$sort->defaultOrder = '`t`.`nombre` asc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination'=>array('pageSize'=>30),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Internos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

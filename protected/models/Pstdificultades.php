<?php

/**
 * This is the model class for table "pstdificultades".
 *
 * The followings are the available columns in table 'pstdificultades':
 * @property integer $idDificultad
 * @property string $nombre_es
 * @property string $nombre_pr
 * @property string $nombre_en
 */
class Pstdificultades extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pstdificultades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_es, nombre_pr, nombre_en', 'required'),
			array('nombre_es, nombre_pr, nombre_en', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idDificultad, nombre_es, nombre_pr, nombre_en', 'safe', 'on'=>'search'),
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
			'idDificultad' => 'Id Dificultad',
			'nombre_es' => 'Nombre Es',
			'nombre_pr' => 'Nombre Pr',
			'nombre_en' => 'Nombre En',
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

		$criteria->compare('idDificultad',$this->idDificultad);
		$criteria->compare('nombre_es',$this->nombre_es,true);
		$criteria->compare('nombre_pr',$this->nombre_pr,true);
		$criteria->compare('nombre_en',$this->nombre_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pstdificultades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

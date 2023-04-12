<?php

/**
 * This is the model class for table "sectorespuestos".
 *
 * The followings are the available columns in table 'sectorespuestos':
 * @property string $idSectorClase
 * @property integer $idSector
 * @property integer $idPuesto
 */
class SectoresPuestos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sectorespuestos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSector, idPuesto', 'required'),
			array('idSector, idPuesto', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idSectorPuesto, idSector, idPuesto', 'safe', 'on'=>'search'),
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
			'puesto' => array(self::BELONGS_TO, 'Puestos', 'idPuesto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSectorPuesto' => 'Id',
			'idSector' => 'Id Sector',
			'idPuesto' => 'Id Puesto',
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

		$criteria->compare('idSectorPuesto',$this->idSectorPuesto,true);
		$criteria->compare('idSector',$this->idSector);
		$criteria->compare('idPuesto',$this->idPuesto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SectoresPuestos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public static function getOficinaClase($idSector, $idPuesto)  {

		$oficinaClase = SectoresPuestos::model()->findAllByAttributes(
	        array(),
		        $condition = 'idSector = :idSector AND idPuesto = :idPuesto',
		        $params = array(
		        	':idSector' => $idSector,
		        	':idPuesto' => $idPuesto,
		        	)
	        ); 

		if ($oficinaClase) {
			return true;
		}

	}

}

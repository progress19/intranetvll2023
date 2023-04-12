<?php
/**
 * This is the model class for table "sectores".
 *
 * The followings are the available columns in table 'sectores':
 * @property string $idSector
 * @property string $nombre
 */
class Sectores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sectores';
	}

	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>40),
			array('tipo', 'length', 'max'=>1),
			array('sectoresPuestos', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idSector, nombre', 'safe', 'on'=>'search'),
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
			'sectoresPuestos' => array(self::HAS_MANY, 'SectoresPuestos', 'idSector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSector' => 'Id Sector',
			'nombre' => 'Nombre',
			'tipo' => 'Tipo',
			'sectoresPuestos' => 'Puestos de marcación horaria'
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

		$criteria->compare('idSector',$this->idSector,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('estado',$this->estado);

		$sort=new CSort();

		$sort->defaultOrder = 'nombre ASC';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination'=>array('pageSize'=>100),
			'sort' => $sort,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sectores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getBotonPersonal($idSector)	{    	   	
    	return "<a href='".URLRAIZ."/admin/personal/personalPorSector?idSector=".$idSector."'>
    		<button type='button' class='btn btn-primary btn-sm'>Ver Personal</button></a>";
	}

	public function getSectores()	{
    	 
		$sectores = Sectores::model()->findAll(array('order'=>'nombre asc'));

		return $sectores;

	}
}

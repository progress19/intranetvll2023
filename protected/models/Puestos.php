<?php
/**
 * This is the model class for table "puestos".
 *
 * The followings are the available columns in table 'puestos':
 * @property string $idPuesto
 * @property string $nombre
 */
class Puestos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'puestos';
	}

	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, ip, ubicacion', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('nombre, ubicacion', 'length', 'max'=>40),
			array('ip', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPuesto, nombre', 'safe', 'on'=>'search'),
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
			'idPuesto' => 'Id Sector',
			'nombre' => 'Nombre',
			'ubicacion' => 'Ubicación',
			'ip' => 'Ip',
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

		$criteria->compare('idPuesto',$this->idPuesto,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('ip',$this->ip,true);

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
	 * @return Puestos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getNombrePuesto($id) {

		$puesto = Puestos::model()->findByAttributes(array('idPuesto'=>$id));
		
		echo $puesto->nombre;

	}

		public static function getNombrePuestoIp($ip) {

		$puesto = Puestos::model()->findByAttributes(array('ip'=>$ip));
		
		if ($puesto) {
			echo $puesto->nombre;
		} else {echo 'Puesto no identificado.';}
		

	}

	public static function checkPuesto($idSector) { //checkeo si sector esta habilitado en sector

		//get_client_ip_env
		$ip = '192.168.1.20';

		$ip = get_client_ip_env();

		$puesto = Puestos::model()->findByAttributes(array('ip'=>$ip));  //busco idPuesto segun ip

			if ($puesto) { //si encontró puesto segun ip
				
				//echo $puesto->nombre; die();

				$sp = SectoresPuestos::model()->findByAttributes(array(
				'idPuesto' => $puesto->idPuesto,
				'idSector' => $idSector
				 ));

				if ($sp) {return 10;
				
				} else {return 11;}

			} else {  //no encontro puesto segun ip

				return 12;

			}

	}

}

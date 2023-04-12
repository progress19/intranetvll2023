<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $id
 * @property string $username
 * @property string $password
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, apellido, nombre, idSector', 'required'),
			array('username, password, apellido, nombre, avatar', 'length', 'max'=>128),
			array('username, apellido, email, roles, idSector', 'length', 'max'=>128),
			array('username, nombre', 'length', 'max'=>128),
			array('estado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, estado, avatar, idSector', 'safe', 'on'=>'search'),
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
			'sector_rel' => array(self::BELONGS_TO, 'Sectores', 'idSector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Usuario',
			'password' => 'Password',
			'apellido' => 'Apellido',
			'nombre' => 'Nombre',
			'avatar' => 'Avatar',
			'estado' => 'Estado',
			'idSector' => 'Sector',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('idSector',$this->idSector,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    	public function getAvatar() {
            return $this->AvatarOptions[$this->avatar];
        }
        
        public function getAvatarOptions() {
                return array(
                           // (!empty($data->logo))?CHtml::image(Yii::app()->baseUrl."/images/lineas/".$data->logo,"",array("style"=>"height:38px")):"no image"
                        1 => (CHtml::image(Yii::app()->baseUrl."/img/avatar1.jpg")),
                        2 => (CHtml::image(Yii::app()->baseUrl."/img/avatar2.jpg")),
                        3 => (CHtml::image(Yii::app()->baseUrl."/img/avatar3.jpg")),
                        4 => (CHtml::image(Yii::app()->baseUrl."/img/avatar4.jpg")),
                        5 => (CHtml::image(Yii::app()->baseUrl."/img/avatar5.jpg")),
                );
        }

		public function validatePassword($password)	 {
		 	return $this->hashPassword($password)===$this->password;
		 }
		 
		 public function hashPassword($password) {
		 	return md5($password);
		}	


}




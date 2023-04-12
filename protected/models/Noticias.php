<?php

/**
 * This is the model class for table "tblnoticias".
 *
 * The followings are the available columns in table 'tblnoticias':
 * @property string $idNoticia
 * @property string $nombre
 * @property string $descripcion
 * @property integer $orden
 * @property integer $estado
 */
class Noticias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblnoticias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, descripcion, estado', 'required'),
			array('orden, estado', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idNoticia, nombre, descripcion, orden, estado', 'safe', 'on'=>'search'),
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
			'idNoticia' => 'Id Noticia',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'orden' => 'Orden',
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

		$criteria->compare('idNoticia',$this->idNoticia,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('estado',$this->estado);

		$sort=new CSort();
		$sort->defaultOrder = '`t`.`idNoticia` DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Noticiaes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getImagenNoticia($idNoticia, $alto) {

		$foto = "";
		$imagenes = Noticiasimagenes::model()->find("idNoticia = $idNoticia ORDER BY idImagen DESC"); 
		
		if ($imagenes) {
			$foto = CHtml::image(Yii::app()->baseUrl."/pics/noticias/".$imagenes->imagen,"",array("style"=>$alto));
		} else {
			$foto = CHtml::image(Yii::app()->baseUrl."/img/noImage.jpg","",array("style"=>"height:70px"));
		}

		return $foto;
	}

	public static function getImagenNoticiaHome($idNoticia) {

		$foto = "";
		$imagenes = Noticiasimagenes::model()->find("idNoticia = $idNoticia ORDER BY idImagen DESC"); 
		
		if ($imagenes) {
			$foto = CHtml::image(Yii::app()->baseUrl."/pics/noticias/".$imagenes->imagen,"",array("class"=>"img-responsive thumbnail"));
		} else {
			$foto = "";
		}

		return $foto;
	}
	        
}
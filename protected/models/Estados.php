<?php

/**
 * This is the model class for table "estados".
 *
 * The followings are the available columns in table 'estados':
 * @property string $idEstado
 * @property string $nombre
 * @property string $comidas
 * @property string $desayunos
 * @property integer $estado
 */
class Estados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, estado, abr, colorFondo, colorFuente', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('nombre, abr, colorFondo, colorFuente, ', 'length', 'max'=>100),
			array('abr, comidas, desayunos', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEstado, nombre, estado, comidas, desayunos', 'safe', 'on'=>'search'),
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
			'idEstado' => 'Id Estado',
			'nombre' => 'Nombre',
			'estado' => 'Estado',
			'abr' => 'Abreviatura',
			'colorFondo' => 'Color de Fondo',
			'colorFuente' => 'Color de Fuente',
			'comidas' => 'Comidas',
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

		$criteria->compare('idEstado',$this->idEstado,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('comidas',$this->comidas);
		$criteria->compare('desayunos',$this->desayunos);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Estados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getAbrEstado($idEstado) {

		$abr = Estados::model()->findByPk($idEstado); 

		if ($abr) {

			$abr = '<span 
			data-original-title="'.$abr->nombre.'" 
			data-toggle="tooltip" 
			title="'.$abr->nombre.'" 
			style="background-color:'.$abr->colorFondo.';color:'.$abr->colorFuente.'" 
			class="badge">'.$abr->abr.'</span>';

		} else {
			$abr = '-';
		}
		
		return $abr;
	}

	public static function getAbrEstadoExcel($idEstado) {

		$abr = Estados::model()->findByPk($idEstado); 

		if ($abr) {

			$abr = $abr->abr;

		} else {
			$abr = '-';
		}
		
		return $abr;
	}

}

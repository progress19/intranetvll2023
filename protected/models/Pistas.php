<?php

/**
 * This is the model class for table "pstpistas".
 *
 * The followings are the available columns in table 'pstpistas':
 * @property string $idPista
 * @property integer $idSector
 * @property integer $idDificultad
 * @property string $nombre
 * @property string $idEstado
 * @property integer $idTipo
 *
 * The followings are the available model relations:
 * @property Pstsectores $idSector0
 */
class Pistas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pstpistas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSector, idDificultad, nombre, idEstado, idTipo', 'required'),
			array('idSector, idDificultad, idTipo', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>80),
			array('idEstado', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPista, idSector, idDificultad, nombre, idEstado, idTipo', 'safe', 'on'=>'search'),
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
			'estados_rel' => array(self::BELONGS_TO, 'Pstestados', 'idEstado'),
			'sector_rel' => array(self::BELONGS_TO, 'Sectorespst', 'idSector'),
			'dificultad_rel' => array(self::BELONGS_TO, 'Pstdificultades', 'idDificultad'),
			'tipo_rel' => array(self::BELONGS_TO, 'Psttiponieve', 'idTipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPista' => 'Id Pista',
			'idSector' => 'Sector',
			'idDificultad' => 'Dificultad',
			'nombre' => 'Nombre',
			'idEstado' => 'Estado',
			'idTipo' => 'Tipo de nieve',
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

		$criteria->compare('idPista',$this->idPista,true);
		$criteria->compare('idSector',$this->idSector);
		$criteria->compare('idDificultad',$this->idDificultad);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idEstado',$this->idEstado,true);
		$criteria->compare('idTipo',$this->idTipo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pistas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function getMenuEstados($idPista,$idEstado)	{
    	 
	$estados = Pstestados::model()->findAllByAttributes(array());
	$lista='';

	foreach ($estados as $estado) {

		if ($idEstado==$estado->idEstado) {
			$selected = "selected";
		} else {$selected="";}

		$lista .= "<option ".$selected." onclick='guardarEstadoPista(".$idPista.",".$estado->idEstado.")' value='".$estado->idEstado."'>".$estado->nombre_es."</option>";	
	}

return '
  <select class="form-control" id="sel1">
'.$lista.'
  </select>'
;

}

public function getMenuTipos($idPista,$idTipo)	{
    	 
	$tipos = PstTiponieve::model()->findAllByAttributes(array());
	$lista='';

	foreach ($tipos as $tipo) {

		if ($idTipo==$tipo->idTipo) {
			$selected = "selected";
		} else {$selected="";}

		$lista .= "<option ".$selected." onclick='guardarTipoPista(".$idPista.",".$tipo->idTipo.")' value='".$tipo->idTipo."'>".$tipo->nombre_es."</option>";	
	}

return '
<div class="">
  <select class="form-control" id="sel1">
'.$lista.'
  </select>
</div>'

;

}

}


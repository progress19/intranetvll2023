<?php

class LogEventos extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_eventos';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, fecha, idTipo, idUsuario, detalle', 'required'),
			array('id, idTipo, idUsuario', 'numerical', 'integerOnly'=>true),
			array('detalle', 'type', 'type' => 'text'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha, idTipo, idUsuario, detalle', 'safe', 'on'=>'search'),
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
			//'proveedor_rel' => array(self::BELONGS_TO, 'Proveedores', 'idProveedor'),
			//'personal_rel' => array(self::BELONGS_TO, 'Personal', array('legajo'=>'legajo')),
			//'sector_rel' => array(self::BELONGS_TO, 'Sectores', 'idSector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id Log',
			'idUsuario' => 'Usuario',
			'idTipo' => 'Tipo',
			'fecha' => 'Fecha',
            'detalle' => 'Detalle',
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
	public function search()	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

        //$criteria->with = array('personal_rel');
        //$criteria->with = array('sector_rel');
        //$criteria->compare('personal_rel.nombre',$this->nombre_empleado,true); 

		$criteria->compare('id',$this->id);
		$criteria->compare('`t`.`idTipo`',$this->idTipo);
		$criteria->compare('`t`.`idUsuario`',$this->idUsuario);
		$criteria->compare('`t`.`detalle`',$this->detalle);
		$criteria->compare('DATE_FORMAT( `t`.`fecha`, "%Y-%m-%d")',$this->fecha,true);
				

		/*
        if((isset($this->desde) && trim($this->desde) != "") && (isset($this->hasta) && trim($this->hasta) != ""))
		$criteria->addBetweenCondition("DATE_FORMAT(`t`.`fecha`, '%Y-%m-%d')", ''.Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->desde).'', ''.Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->hasta).'');
        */

		$sort=new CSort();

		$sort->defaultOrder = '`t`.`id` DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tickets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}

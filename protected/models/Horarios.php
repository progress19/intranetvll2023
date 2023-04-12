<?php

/**
 * This is the model class for table "horarios".
 *
 * The followings are the available columns in table 'horarios':
 * @property string $idHorario
 * @property integer $tarjetaId
 * @property integer $legajo
 * @property string $idTipo
 * @property string $fecha
 */
class Horarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horarios';
	}

	public $desde;
	public $hasta;
	public $nombre_empleado;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTipo', 'required'),
			array('tarjetaId, legajo', 'numerical', 'integerOnly'=>true),
			array('idTipo', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHorario, idSector, tarjetaId, legajo, idTipo, fecha, desde, hasta, nombre_empleado', 'safe', 'on'=>'search'),
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
			'personal_rel' => array(self::BELONGS_TO, 'Personal', array('legajo'=>'legajo')),
			'sector_rel' => array(self::BELONGS_TO, 'Sectores', 'idSector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTicket' => 'Id Ticket',
			'tarjetaId' => 'Tarjeta',
			'legajo' => 'Legajo',
			'idTipo' => 'Id Proveedor',
			'fecha' => 'Fecha',
			'em' => 'Entrada Mañana',
			'sm' => 'Salida Mañana',
			'et' => 'Entrada Tarde',
			'st' => 'Salida Tarde'
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

        $criteria->with = array('personal_rel');
        //$criteria->with = array('sector_rel');
        $criteria->compare('personal_rel.nombre',$this->nombre_empleado,true); 

		$criteria->compare('idHorario',$this->idHorario);
		$criteria->compare('`t`.`tarjetaId`',$this->tarjetaId);
		$criteria->compare('`t`.`legajo`',$this->legajo);
		$criteria->compare('`t`.`idTipo`',$this->idTipo);
		$criteria->compare('`t`.`idSector`',$this->idSector);
		$criteria->compare('idTipo',$this->idTipo);
		$criteria->compare('DATE_FORMAT( `t`.`fecha`, "%Y-%m-%d")',$this->fecha,true);

		if((isset($this->desde) && trim($this->desde) != "") && (isset($this->hasta) && trim($this->hasta) != ""))
			
			$criteria->addBetweenCondition("DATE_FORMAT(`t`.`fecha`, '%Y-%m-%d')", ''.Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->desde).'', ''.Yii::app()->dateFormatter->format("yyyy-MM-dd", $this->hasta).'');

		$sort=new CSort();

		$sort->defaultOrder = '`t`.`idHorario` DESC';

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

	public static function getTipoTicket($tipo) {

		switch ($tipo) {
			case '1':
				$tipo = 'Desayuno';
				break;

			case '2':
				$tipo = 'Almuerzo';
				break;
			case '3':
				$tipo = 'Cena';
				break;

		}

		return $tipo;

	}

	public static function getHorarioEmpleado($legajo) {

		//busco si tiene registro del dia
	
		$hoy = date('Y-m-d');

		$horario = Horarios::model()->findByAttributes(
			array('legajo'=>$legajo),
			array(
				'condition' => 'DATE_FORMAT(fecha, "%Y-%m-%d") = :hoy',
				'params' => array(':hoy' => $hoy ),
				)
			);
		
		return $horario;		

	}

	public static function getHorarioEmpleadoCarga($legajo,$fecha) {

		//busco si tiene registro del dia
		//
	
		$horario = Horarios::model()->findByAttributes(
			array('legajo'=>$legajo),
			array(
				'condition' => 'DATE_FORMAT(fecha, "%Y-%m-%d") = :fecha',
				'params' => array(':fecha' => $fecha ),
				)
			);
		
		return $horario;		

	}

	public static function getHorariosExcel($desde, $hasta) { 
  		
		$horarios = Horarios::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'fecha >= :desde AND fecha <=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $horarios;

	}

	public static function getHorariosPorAno($year) { 

			$desde = $year.'-'.'01-01';
			$hasta = $year.'-'.'12-31';
	   
		$horarios = Horarios::model()->findAllByAttributes(
			array(),
			    array(
			        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
       				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return count($horarios);

	}

	public static function getHorariosArchivar( $year ) { 
	   
		$desde = $year.'-'.'01-01';
		$hasta = $year.'-'.'12-31';

		$horarios = Horarios::model()->findAllByAttributes(
				array(),
				    array(
				        'condition'=>'fecha>=:desde AND fecha<=:hasta', 
        				'params'=>array(':desde'=>$desde, ':hasta'=>$hasta))
				);

		return $horarios;

	}

}

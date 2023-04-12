<?php

/**
 * This is the model class for table "personal".
 *
 * The followings are the available columns in table 'personal':
 * @property string $idPersonal
 * @property string $idSector
 * @property integer $legajo
 * @property string $nombre
 * @property string $fecha
 * @property string $estado
 * @property string $activo
 * @property string $francos
 * @property string $pre
 * @property string $fra
 * @property string $med
 * @property string $ini
 */
class Personal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personal';
	}

	public $sector_buscar;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSector, activo, nombre, legajo, idFrecuencia', 'required'),
			array('legajo, desayunos, comidas, tarjetaId, simultaneos', 'numerical', 'integerOnly'=>true),
			array('idSector, idFrecuencia, idEstado, desayuno_desde, desayuno_hasta, almuerzo_desde, almuerzo_hasta, cena_desde, cena_hasta, em, sm, et, st, cuil', 'length', 'max'=>20),
			array('nombre', 'length', 'max'=>34),
			array('foto', 'length', 'max'=>100),
			array('password', 'length', 'max'=>128),
			array('estado', 'length', 'max'=>30),
			array('activo', 'length', 'max'=>2),
			array('obs','length'),
			array('francos, pre, fra, med, ini', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPersonal, idSector, legajo, nombre, fecha, estado, activo, francos, pre, fra, med, ini, obs', 'safe', 'on'=>'search'),
			array('legajo', 'unique', 'message' => 'El N° de legajo ya existe.'),
			array('tarjetaId', 'unique', 'message' => 'El N° de Tarjeta está asignado a otro empleado.'),
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
			'frecuencia' => array(self::BELONGS_TO, 'Frecuencias', 'idFrecuencia'),
			'estado_rel' => array(self::BELONGS_TO, 'Estados', 'idEstado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPersonal' => 'Id Personal',
			'idSector' => 'Sector',
			'foto' => 'Foto',
			'legajo' => 'Legajo',
			'nombre' => 'Nombre',
			'cuil' => 'Cuil',
			'fecha' => 'Fecha',
			'idEstado' => 'Estado',
			'activo' => 'Activo',
			'francos' => 'Francos',
			'pre' => 'Pre',
			'fra' => 'Fra',
			'med' => 'Med',
			'ini' => 'Ini',
			'obs' => 'Observaciones',
			'tarjetaId' => 'Id Tarjeta',
			'password' => 'Password',
			'desayuno_desde' => 'Desayuno desde',
			'desayuno_hasta' => 'Desayuno hasta',
			'almuerzo_desde' => 'Almuerzo desde',
			'almuerzo_hasta' => 'Almuerzo hasta',
			'cena_desde' => 'Cena desde',
			'cena_hasta' => 'Cena hasta',
			'em' => 'Entrada Mañana',
			'sm' => 'Salida Mañana',
			'et' => 'Entrada Tarde',
			'st' => 'Salida Tarde',
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

		$criteria->compare('idPersonal',$this->idPersonal,true);
		$criteria->compare('`t`.`idSector`',$this->idSector);
		$criteria->compare('`t`.`idEstado`',$this->idEstado);
		$criteria->compare('`t`.`idFrecuencia`',$this->idFrecuencia);
		$criteria->compare('legajo',$this->legajo);
		$criteria->compare('`t`.`nombre`',$this->nombre,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('francos',$this->francos,true);
		$criteria->compare('tarjetaId',$this->tarjetaId);

		$sort=new CSort();

		$sort->defaultOrder = '`t`.`nombre` ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
			'sort' => $sort,
		));
	}

	public function search_activos() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with = array('sector_rel');
        $criteria->compare('sector_rel.tipo',1,true); 

		$criteria->compare('idPersonal',$this->idPersonal,true);
		$criteria->compare('`t`.`idSector`',$this->idSector);
		$criteria->compare('legajo',$this->legajo);
		$criteria->compare('`t`.`nombre`',$this->nombre,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('`t`.`idEstado`',$this->idEstado);
		$criteria->compare('activo',1,true);
		$criteria->compare('francos',$this->francos,true);

		$sort=new CSort();

		$sort->defaultOrder = '`t`.`nombre` ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>100),
			'sort' => $sort,
		));
	}

	public function count_tipo_sector($tipo) {

		$criteria=new CDbCriteria;

		$criteria->with = array('sector_rel');
        $criteria->compare('sector_rel.tipo',$tipo,true); 

		$criteria->compare('activo',1,true);

		$count = Personal::model()->count($criteria);

		return $count;

	}


	public function search_comidas() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPersonal',$this->idPersonal,true);
		$criteria->compare('`t`.`idSector`',$this->idSector);
		$criteria->compare('legajo',$this->legajo);
		$criteria->compare('`t`.`nombre`',$this->nombre,true);
		$criteria->compare('activo',1,true);

		$sort=new CSort();

		$sort->defaultOrder = '`t`.`nombre` ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>10),
			'sort' => $sort,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Personal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getMenuAnos($legajo) {
    	   	
    	return "<div class='btn-group'>
<button id='w1' class='btn btn-sm btn-primary dropdown-toggle' href='#'' data-toggle='dropdown'>
	Ver Gráficos  <span class='caret'></span>
</button>

<ul id='w2' class='dropdown-menu'>

	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2021' ><i class='fa fa-fw fa-calendar'></i> Año 2022</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2021' ><i class='fa fa-fw fa-calendar'></i> Año 2021</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2020' ><i class='fa fa-fw fa-calendar'></i> Año 2020</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2019' ><i class='fa fa-fw fa-calendar'></i> Año 2019</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2018' ><i class='fa fa-fw fa-calendar'></i> Año 2018</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2017' ><i class='fa fa-fw fa-calendar'></i> Año 2017</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2016' ><i class='fa fa-fw fa-calendar'></i> Año 2016</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2015' ><i class='fa fa-fw fa-calendar'></i> Año 2015</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2014' ><i class='fa fa-fw fa-calendar'></i> Año 2014</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2013' ><i class='fa fa-fw fa-calendar'></i> Año 2013</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2012' ><i class='fa fa-fw fa-calendar'></i> Año 2012</a></li>
	<li role='presentation'><a href='".URLRAIZ."/admin/asistencias/francosGrafico?legajo=".$legajo."&a=2011' ><i class='fa fa-fw fa-calendar'></i> Año 2011</a></li>
</ul>
</div>";
}

public function getMenuAnosExcel($legajo) {
    	   	
    	return "<div class='btn-group'>
<button id='w1' class='btn btn-sm btn-primary dropdown-toggle' href='#'' data-toggle='dropdown'>
	Excel  <span class='caret'></span>
</button>

<ul id='w2' class='dropdown-menu'>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2022)' ><i class='fa fa-fw fa-calendar'></i> Año 2022</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2021)' ><i class='fa fa-fw fa-calendar'></i> Año 2021</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2020)' ><i class='fa fa-fw fa-calendar'></i> Año 2020</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2019)' ><i class='fa fa-fw fa-calendar'></i> Año 2019</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2018)' ><i class='fa fa-fw fa-calendar'></i> Año 2018</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2017)' ><i class='fa fa-fw fa-calendar'></i> Año 2017</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2016)' ><i class='fa fa-fw fa-calendar'></i> Año 2016</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2015)' ><i class='fa fa-fw fa-calendar'></i> Año 2015</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2014)' ><i class='fa fa-fw fa-calendar'></i> Año 2014</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2013)' ><i class='fa fa-fw fa-calendar'></i> Año 2013</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2012)' ><i class='fa fa-fw fa-calendar'></i> Año 2012</a>
	</li>
	<li role='presentation'>
	  <a onclick='asistenciasGraficoExcel(".$legajo.",2011)' ><i class='fa fa-fw fa-calendar'></i> Año 2011</a>
	</li>
</ul>
</div>";
}


	public static function getEmpleado($legajo) { 
	    
		$empleado = Personal::model()->findByAttributes(
				array('legajo'=>$legajo));
				
		return $empleado;

	}

	public function getMenuEstados($legajo,$idPersonal)	{
    	 
	$estados = Estados::model()->findAllByAttributes(array('estado'=>1));
	$lista='';

	foreach ($estados as $estado) {
		$lista .= "<li><a style='cursor: pointer' onclick='buscarDiaLegajo(".$legajo.",".$estado->idEstado.",".$idPersonal.")'> ".$estado->nombre."</a></li>";	
	}

    	return "<div class='btn-group'>
					
					<button id='w1' class='btn btn-sm btn-primary dropdown-toggle' href='#'' data-toggle='dropdown'> Estado<span class='caret'></span>
					</button>

					<ul id='w2' class='dropdown-menu'>
						".$lista."
					</ul>

				</div>";
}

	public function getBotonFranco($id) {
    	   	
   	return "<div class='btn-group'>
   				<a href='".URLRAIZ."/admin/default/francoForm?id=".$id."' >
				<button id='w1' class='btn btn-sm btn-primary' >
					Franco  
				</button>
				</a>
			</div>";
	}

	public function getFoto($foto)
	{
    	   	
	if ($foto) {

		$foto = CHtml::Link('
		<span class="popover-trigger">
			<img src="'.URLRAIZ.'/pics/personal/'.$foto.'" width="30px" height="30px" class="img-circle"/>
		</span>', null, array(
					'data-html' => true,
					'data-trigger' => "hover",	
					'data-placement' => 'top',
					'data-content' => "<img src='".URLRAIZ."/pics/personal/".$foto."' width='150'/>",
					'data-toggle' => "popover",
					'data-animation' => false
					));		
		
	} else {

		$foto = CHtml::Link('
			<span class="popover-trigger">
				<img src="'.URLRAIZ.'/images/default-user.png" height="30px" class="img-circle"/>
			</span>', null, array(
						'data-html' => true,
						'data-trigger' => "hover",	
						'data-placement' => 'top',
						'data-content' => "<img src='".URLRAIZ."/images/default-user.png' width='150'/>",
						'data-toggle' => 'popover',
						'data-animation' => false
						));		
		}

	return $foto;
			
	}

	public static function getActivos() {

		$activos = Personal::model()->findAllByAttributes(
			array('activo'=>1),array('order'=>'nombre ASC'));

		return $activos;

	}	

	public function validatePassword($password)	 {
		 	return $this->hashPassword($password)===$this->password;
		 }
		 
	public function hashPassword($password) {
		 	return md5($password);
		}	

/*
	public static function getComidasPersonal($legajo,$desde,$hasta) {

	         $pre = 0.00;

             $asistencias = Asistencias::getAsistenciasPorEmpleado($legajo,$desde,$hasta); 

              foreach ($asistencias as $asistencia) {
                  
                 $importe = Estados::model()->findByPk($asistencia->idEstado);

                 $pre = $pre + $importe->comidas;

              }

              $pre = number_format($pre, 2, '.', '');

              if ($pre==0) {$pre=='-';} else {$pre= '$ '.$pre;}

	return $pre;	
	
	}
*/

	public function validatePasswordComedor($password)	 {
		 	return $this->hashPassword($password)===$this->password;
		 }
		 

}


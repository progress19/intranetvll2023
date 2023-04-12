<?php

class FrancoForm extends CFormModel
{
	public $nombre;
	public $legajo;
	public $sector;
	public $tipo;
	public $dias;
	public $desde;
	public $hasta;
	public $regreso;
	public $obs;


/**
* Declares the validation rules.
*/
public function rules()
{
	return array(
		array('nombre, dias, desde, hasta, regreso, legajo', 'required'),
		array('obs', 'length', 'max'=>200),
		array('dias, obs', 'safe'),
		);
}

/**
* Declares customized attribute labels.
* If not declared here, an attribute would have a label that is
* the same as its name with the first letter in upper case.
*/
public function attributeLabels()
{
	return array(
		'nombre'=>'Apellido y Nombre',
		'legajo'=>'Legajo',
		'sector'=>'Sector',
		'dias'=>'Días',
		'desde'=>'Desde',
		'hasta'=>'Hasta',
		'regreso'=>'Reintegrarse el día',
		'obs'=>'Observaciones'
		);
}


}
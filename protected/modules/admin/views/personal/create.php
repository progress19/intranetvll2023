<?php
/* @var $this PersonalController */
/* @var $model Personal */

$this->menu_personal = 'active';
$this->menu_personal_n = 'active';

$this->breadcrumbs=array(
	'Personal'=>array('admin'),
	'Nuevo',
);

$this->titulo='<i class="fa fa-fw fa-users"></i> Nuevo Empleado';

$horarios = ConfigComedor::model()->findByPk(1);

?>

<?php $this->renderPartial('_form', array(
	'model' => $model,
	'desayuno_desde' => $horarios->desayuno_desde,
	'desayuno_hasta' => $horarios->desayuno_hasta, 
	'almuerzo_desde' => $horarios->almuerzo_desde,
	'almuerzo_hasta' => $horarios->almuerzo_hasta, 
	'cena_desde' => $horarios->cena_desde, 
	'cena_hasta' => $horarios->cena_hasta, 
	)); ?>
<?php
/* @var $this PuestosController */
/* @var $model Puestos */

$this->menu_puestos = 'active';
$this->menu_puestos_n = 'active';

$this->breadcrumbs=array(
	'Puestos'=>array('admin'),
	'Nuevo',
);

$this->titulo='<i class="fa fa-desktop"></i> Nuevo Puesto';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
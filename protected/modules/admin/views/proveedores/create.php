<?php
/* @var $this SectoresController */
/* @var $model Sectores */

$this->menu_proveedores = 'active';
$this->menu_proveedores_n = 'active';

$this->breadcrumbs=array(
	'Proveedores'=>array('admin'),
	'Nuevo',
);

$this->titulo='<i class="fa fa-building-o"></i> Nuevo Proveedor';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
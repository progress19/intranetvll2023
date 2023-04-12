<?php
/* @var $this SectoresController */
/* @var $model Sectores */

$this->menu_sectores = 'active';
$this->menu_sectores_n = 'active';

$this->breadcrumbs=array(
	'Sectores'=>array('admin'),
	'Nuevo',
);

$this->titulo='<i class="fa fa-fw fa-flag-o"></i> Nuevo Sector';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
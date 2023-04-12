<?php
/* @var $this EstadosController */
/* @var $model Estados */

$this->menu_estados = 'active';
$this->menu_estados_n = 'active';

$this->breadcrumbs=array(
	'Estados'=>array('admin'),
	'Nueva',
);

$this->titulo='<i class="fa fa-fw fa-navicon"></i> Nuevo Estado';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
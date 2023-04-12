<?php
/* @var $this FrecuenciasController */
/* @var $model Frecuencias */

$this->menu_frecuencias = 'active';
$this->menu_frecuencias_n = 'active';

$this->breadcrumbs=array(
	'Frecuencias'=>array('admin'),
	'Nueva',
);

$this->titulo='<i class="fa fa-fw fa-arrows-h"></i> Nueva Frecuencia';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
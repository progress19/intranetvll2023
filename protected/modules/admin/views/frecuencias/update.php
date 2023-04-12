<?php
/* @var $this FrecuenciasController */
/* @var $model Frecuencias */

$this->breadcrumbs=array(
	'Frecuencias'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-arrows-h"></i> Editar Frecuencia';

$this->renderPartial('_form', array('model'=>$model));
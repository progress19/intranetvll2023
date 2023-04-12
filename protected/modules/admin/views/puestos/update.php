<?php
/* @var $this PuestosController */
/* @var $model Puestos */

$this->breadcrumbs=array(
	'Puestos'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-desktop"></i> Editar Puesto';

$this->renderPartial('_form', array('model'=>$model));
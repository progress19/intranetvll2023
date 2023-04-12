<?php
/* @var $this SectoresController */
/* @var $model Sectores */

$this->breadcrumbs=array(
	'Sectores'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-building-o"></i> Editar Proveedor';

$this->renderPartial('_form', array('model'=>$model));
<?php
/* @var $this SectoresController */
/* @var $model Sectores */

$this->breadcrumbs=array(
	'Sectores'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-flag-o"></i> Editar Sector';

$this->renderPartial('_form', array('model'=>$model));
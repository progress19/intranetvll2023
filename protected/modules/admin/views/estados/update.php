<?php
/* @var $this EstadosController */
/* @var $model Estados */

$this->breadcrumbs=array(
	'Estados'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-navicon"></i> Editar Estado';

$this->renderPartial('_form', array('model'=>$model));


<?php
/* @var $this ConfigComedorController */
/* @var $model ConfigComedor */

$this->breadcrumbs=array(
	'Comedor',
	'Parámetros',
);

$this->titulo='<i class="glyphicon glyphicon-cutlery"></i> Editar Parámetros';

$this->renderPartial('_form', array('model'=>$model));
<?php
/* @var $this RelfrecestaController */
/* @var $model Relfrecesta */

$this->breadcrumbs=array(
	'Frecuencias - Estado'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-arrows-h"></i> Editar Estado de Frecuencia';

$this->renderPartial('_form', array('model'=>$model));
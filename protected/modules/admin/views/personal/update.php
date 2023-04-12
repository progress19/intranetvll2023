<?php
/* @var $this PersonalController */
/* @var $model Personal */

$this->breadcrumbs=array(
	'Personal'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-users"></i> Editar Empleado';

$this->renderPartial('_form', array('model'=>$model));
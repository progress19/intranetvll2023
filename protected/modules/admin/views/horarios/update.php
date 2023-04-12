<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horario'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-users"></i> Editar Horario';

$this->renderPartial('_form', array('model'=>$model));
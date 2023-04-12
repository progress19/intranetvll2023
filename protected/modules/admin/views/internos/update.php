<?php
/* @var $this InternosController */
/* @var $model Internos */

$this->breadcrumbs=array(
	'Internos'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-phone"></i> Editar Interno';

$this->renderPartial('_form', array('model'=>$model));
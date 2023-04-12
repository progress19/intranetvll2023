<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->menu_configuracion = 'active';

$this->breadcrumbs=array(
	'Configuración');

$this->titulo='<span class="glyphicon glyphicon-cog"></span> Configuración';

$this->renderPartial('_form', array('model'=>$model));
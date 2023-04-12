<?php
/* @var $this AsistenciasController */
/* @var $model Asistencias */

$this->breadcrumbs=array(
	'Asistenciases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Asistencias', 'url'=>array('index')),
	array('label'=>'Manage Asistencias', 'url'=>array('admin')),
);
?>

<h1>Create Asistencias</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
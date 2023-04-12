<?php
/* @var $this AsistenciasController */
/* @var $model Asistencias */

$this->breadcrumbs=array(
	'Asistenciases'=>array('index'),
	$model->idAsistencia=>array('view','id'=>$model->idAsistencia),
	'Update',
);

$this->menu=array(
	array('label'=>'List Asistencias', 'url'=>array('index')),
	array('label'=>'Create Asistencias', 'url'=>array('create')),
	array('label'=>'View Asistencias', 'url'=>array('view', 'id'=>$model->idAsistencia)),
	array('label'=>'Manage Asistencias', 'url'=>array('admin')),
);
?>

<h1>Update Asistencias <?php echo $model->idAsistencia; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
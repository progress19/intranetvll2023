<?php
/* @var $this AsistenciasController */
/* @var $model Asistencias */

$this->breadcrumbs=array(
	'Asistenciases'=>array('index'),
	$model->idAsistencia,
);

$this->menu=array(
	array('label'=>'List Asistencias', 'url'=>array('index')),
	array('label'=>'Create Asistencias', 'url'=>array('create')),
	array('label'=>'Update Asistencias', 'url'=>array('update', 'id'=>$model->idAsistencia)),
	array('label'=>'Delete Asistencias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAsistencia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asistencias', 'url'=>array('admin')),
);
?>

<h1>View Asistencias #<?php echo $model->idAsistencia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idAsistencia',
		'idPersonal',
		'fecha',
		'legajo',
		'nombre',
		'idSector',
		'sector',
		'estado',
		'francos',
	),
)); ?>

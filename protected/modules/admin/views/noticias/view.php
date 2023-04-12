<?php
/* @var $this ActividadesController */
/* @var $model Actividades */

$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	$model->idActividad,
);

$this->menu=array(
	array('label'=>'List Actividades', 'url'=>array('index')),
	array('label'=>'Create Actividades', 'url'=>array('create')),
	array('label'=>'Update Actividades', 'url'=>array('update', 'id'=>$model->idActividad)),
	array('label'=>'Delete Actividades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idActividad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Actividades', 'url'=>array('admin')),
);
?>

<h1>View Actividades #<?php echo $model->idActividad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idActividad',
		'nombre',
		'descripcion',
		'orden',
		'estado',
	),
)); ?>

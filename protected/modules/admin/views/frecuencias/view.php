<?php
/* @var $this FrecuenciasController */
/* @var $model Frecuencias */

$this->breadcrumbs=array(
	'Frecuenciases'=>array('index'),
	$model->idFrecuencia,
);

$this->menu=array(
	array('label'=>'List Frecuencias', 'url'=>array('index')),
	array('label'=>'Create Frecuencias', 'url'=>array('create')),
	array('label'=>'Update Frecuencias', 'url'=>array('update', 'id'=>$model->idFrecuencia)),
	array('label'=>'Delete Frecuencias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFrecuencia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Frecuencias', 'url'=>array('admin')),
);
?>

<h1>View Frecuencias #<?php echo $model->idFrecuencia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFrecuencia',
		'nombre',
		'estado',
	),
)); ?>

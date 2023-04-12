<?php
/* @var $this CancioneroController */
/* @var $model Cancionero */

$this->breadcrumbs=array(
	'Cancioneros'=>array('index'),
	$model->idCancionero,
);

$this->menu=array(
	array('label'=>'List Cancionero', 'url'=>array('index')),
	array('label'=>'Create Cancionero', 'url'=>array('create')),
	array('label'=>'Update Cancionero', 'url'=>array('update', 'id'=>$model->idCancionero)),
	array('label'=>'Delete Cancionero', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCancionero),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cancionero', 'url'=>array('admin')),
);
?>

<h1>View Cancionero #<?php echo $model->idCancionero; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCancionero',
		'nombre',
		'archivo',
		'estado',
	),
)); ?>

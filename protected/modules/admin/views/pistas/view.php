<?php
/* @var $this PistasController */
/* @var $model Pistas */

$this->breadcrumbs=array(
	'Pistases'=>array('index'),
	$model->idPista,
);

$this->menu=array(
	array('label'=>'List Pistas', 'url'=>array('index')),
	array('label'=>'Create Pistas', 'url'=>array('create')),
	array('label'=>'Update Pistas', 'url'=>array('update', 'id'=>$model->idPista)),
	array('label'=>'Delete Pistas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPista),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pistas', 'url'=>array('admin')),
);
?>

<h1>View Pistas #<?php echo $model->idPista; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPista',
		'idSector',
		'idDificultad',
		'nombre',
		'idEstado',
		'idTipo',
	),
)); ?>

<?php
/* @var $this InternosController */
/* @var $model Internos */

$this->breadcrumbs=array(
	'Internoses'=>array('index'),
	$model->idInterno,
);

$this->menu=array(
	array('label'=>'List Internos', 'url'=>array('index')),
	array('label'=>'Create Internos', 'url'=>array('create')),
	array('label'=>'Update Internos', 'url'=>array('update', 'id'=>$model->idInterno)),
	array('label'=>'Delete Internos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInterno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Internos', 'url'=>array('admin')),
);
?>

<h1>View Internos #<?php echo $model->idInterno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idInterno',
		'numero',
		'nombre',
		'grupo',
		'estado',
	),
)); ?>

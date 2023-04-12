<?php
/* @var $this RelfrecestaController */
/* @var $model Relfrecesta */

$this->breadcrumbs=array(
	'Relfrecestas'=>array('index'),
	$model->idRelacion,
);

$this->menu=array(
	array('label'=>'List Relfrecesta', 'url'=>array('index')),
	array('label'=>'Create Relfrecesta', 'url'=>array('create')),
	array('label'=>'Update Relfrecesta', 'url'=>array('update', 'id'=>$model->idRelacion)),
	array('label'=>'Delete Relfrecesta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idRelacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Relfrecesta', 'url'=>array('admin')),
);
?>

<h1>View Relfrecesta #<?php echo $model->idRelacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idRelacion',
		'idFrecuencia',
		'idEstado',
		'calculo',
	),
)); ?>

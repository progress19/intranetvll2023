<?php
/* @var $this SectoresController */
/* @var $model Sectores */

$this->breadcrumbs=array(
	'Sectores'=>array('index'),
	$model->idSector,
);

$this->menu=array(
	array('label'=>'List Sectores', 'url'=>array('index')),
	array('label'=>'Create Sectores', 'url'=>array('create')),
	array('label'=>'Update Sectores', 'url'=>array('update', 'id'=>$model->idSector)),
	array('label'=>'Delete Sectores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSector),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sectores', 'url'=>array('admin')),
);
?>

<h1>View Sectores #<?php echo $model->idSector; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSector',
		'nombre',
	),
)); ?>

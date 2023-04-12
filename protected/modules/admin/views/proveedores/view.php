<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->idProveedor,
);

$this->menu=array(
	array('label'=>'List Proveedores', 'url'=>array('index')),
	array('label'=>'Create Proveedores', 'url'=>array('create')),
	array('label'=>'Update Proveedores', 'url'=>array('update', 'id'=>$model->idProveedor)),
	array('label'=>'Delete Proveedores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idProveedor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Proveedores', 'url'=>array('admin')),
);
?>

<h1>View Proveedores #<?php echo $model->idProveedor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProveedor',
		'nombre',
		'estado',
	),
)); ?>

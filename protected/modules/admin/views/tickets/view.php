<?php
/* @var $this TicketsController */
/* @var $model Tickets */

$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	$model->idTicket,
);

$this->menu=array(
	array('label'=>'List Tickets', 'url'=>array('index')),
	array('label'=>'Create Tickets', 'url'=>array('create')),
	array('label'=>'Update Tickets', 'url'=>array('update', 'id'=>$model->idTicket)),
	array('label'=>'Delete Tickets', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTicket),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tickets', 'url'=>array('admin')),
);
?>

<h1>View Tickets #<?php echo $model->idTicket; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTicket',
		'tarjetaId',
		'legajo',
		'idProveedor',
		'fecha',
	),
)); ?>

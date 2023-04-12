<?php
/* @var $this ConfigComedorController */
/* @var $model ConfigComedor */

$this->breadcrumbs=array(
	'Config Comedors'=>array('index'),
	$model->idConfig,
);

$this->menu=array(
	array('label'=>'List ConfigComedor', 'url'=>array('index')),
	array('label'=>'Create ConfigComedor', 'url'=>array('create')),
	array('label'=>'Update ConfigComedor', 'url'=>array('update', 'id'=>$model->idConfig)),
	array('label'=>'Delete ConfigComedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idConfig),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConfigComedor', 'url'=>array('admin')),
);
?>

<h1>View ConfigComedor #<?php echo $model->idConfig; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idConfig',
		'desayuno_desde',
		'desayuno_hasta',
		'almuerzo_desde',
		'almuerzo_hasta',
		'cena_desde',
		'cena_hasta',
		'inicial_desayuno',
		'inicial_comidas',
	),
)); ?>

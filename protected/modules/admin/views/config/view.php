<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Configs'=>array('index'),
	$model->idConfig,
);

$this->menu=array(
	array('label'=>'List Config', 'url'=>array('index')),
	array('label'=>'Create Config', 'url'=>array('create')),
	array('label'=>'Update Config', 'url'=>array('update', 'id'=>$model->idConfig)),
	array('label'=>'Delete Config', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idConfig),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Config', 'url'=>array('admin')),
);
?>

<h1>View Config #<?php echo $model->idConfig; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idConfig',
		'contacto',
	),
)); ?>

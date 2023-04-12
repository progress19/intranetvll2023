<?php
/* @var $this PistasController */
/* @var $model Pistas */

$this->breadcrumbs=array(
	'Pistases'=>array('index'),
	$model->idPista=>array('view','id'=>$model->idPista),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pistas', 'url'=>array('index')),
	array('label'=>'Create Pistas', 'url'=>array('create')),
	array('label'=>'View Pistas', 'url'=>array('view', 'id'=>$model->idPista)),
	array('label'=>'Manage Pistas', 'url'=>array('admin')),
);
?>

<h1>Update Pistas <?php echo $model->idPista; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
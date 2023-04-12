<?php
/* @var $this PistasController */
/* @var $model Pistas */

$this->breadcrumbs=array(
	'Pistases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pistas', 'url'=>array('index')),
	array('label'=>'Manage Pistas', 'url'=>array('admin')),
);
?>

<h1>Create Pistas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
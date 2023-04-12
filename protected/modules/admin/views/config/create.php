<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Configs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Config', 'url'=>array('index')),
	array('label'=>'Manage Config', 'url'=>array('admin')),
);
?>

<h1>Create Config</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
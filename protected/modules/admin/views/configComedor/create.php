<?php
/* @var $this ConfigComedorController */
/* @var $model ConfigComedor */

$this->breadcrumbs=array(
	'Config Comedors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConfigComedor', 'url'=>array('index')),
	array('label'=>'Manage ConfigComedor', 'url'=>array('admin')),
);
?>

<h1>Create ConfigComedor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
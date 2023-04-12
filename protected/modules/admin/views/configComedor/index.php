<?php
/* @var $this ConfigComedorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Comedors',
);

$this->menu=array(
	array('label'=>'Create ConfigComedor', 'url'=>array('create')),
	array('label'=>'Manage ConfigComedor', 'url'=>array('admin')),
);
?>

<h1>Config Comedors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

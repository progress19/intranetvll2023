<?php
/* @var $this CancioneroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cancioneros',
);

$this->menu=array(
	array('label'=>'Create Cancionero', 'url'=>array('create')),
	array('label'=>'Manage Cancionero', 'url'=>array('admin')),
);
?>

<h1>Cancioneros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

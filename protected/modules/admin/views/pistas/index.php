<?php
/* @var $this PistasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pistases',
);

$this->menu=array(
	array('label'=>'Create Pistas', 'url'=>array('create')),
	array('label'=>'Manage Pistas', 'url'=>array('admin')),
);
?>

<h1>Pistases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

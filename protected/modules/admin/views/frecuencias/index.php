<?php
/* @var $this FrecuenciasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Frecuenciases',
);

$this->menu=array(
	array('label'=>'Create Frecuencias', 'url'=>array('create')),
	array('label'=>'Manage Frecuencias', 'url'=>array('admin')),
);
?>

<h1>Frecuenciases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

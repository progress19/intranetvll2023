<?php
/* @var $this AsistenciasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asistenciases',
);

$this->menu=array(
	array('label'=>'Create Asistencias', 'url'=>array('create')),
	array('label'=>'Manage Asistencias', 'url'=>array('admin')),
);
?>

<h1>Asistenciases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

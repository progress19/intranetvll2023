<?php
/* @var $this InternosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Internoses',
);

$this->menu=array(
	array('label'=>'Create Internos', 'url'=>array('create')),
	array('label'=>'Manage Internos', 'url'=>array('admin')),
);
?>

<h1>Internoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

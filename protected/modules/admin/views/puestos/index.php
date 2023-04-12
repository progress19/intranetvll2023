<?php
/* @var $this SectoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sectores',
);

$this->menu=array(
	array('label'=>'Create Sectores', 'url'=>array('create')),
	array('label'=>'Manage Sectores', 'url'=>array('admin')),
);
?>

<h1>Sectores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

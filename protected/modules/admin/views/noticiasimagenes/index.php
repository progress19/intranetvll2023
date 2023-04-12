<?php
/* @var $this ActividadesimagenesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividadesimagenes',
);

$this->menu=array(
	array('label'=>'Create Actividadesimagenes', 'url'=>array('create')),
	array('label'=>'Manage Actividadesimagenes', 'url'=>array('admin')),
);
?>

<h1>Actividadesimagenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

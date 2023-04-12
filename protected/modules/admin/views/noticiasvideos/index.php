<?php
/* @var $this ActividadesvideosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividadesvideoses',
);

$this->menu=array(
	array('label'=>'Create Actividadesvideos', 'url'=>array('create')),
	array('label'=>'Manage Actividadesvideos', 'url'=>array('admin')),
);
?>

<h1>Actividadesvideoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

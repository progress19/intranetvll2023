<?php
/* @var $this RelfrecestaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Relfrecestas',
);

$this->menu=array(
	array('label'=>'Create Relfrecesta', 'url'=>array('create')),
	array('label'=>'Manage Relfrecesta', 'url'=>array('admin')),
);
?>

<h1>Relfrecestas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

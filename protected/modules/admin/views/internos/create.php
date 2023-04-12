<?php
/* @var $this InternosController */
/* @var $model Internos */

$this->menu_internos = 'active';
$this->menu_internos_n = 'active';

$this->breadcrumbs=array(
	'Internos'=>array('admin'),
	'Nueva',
);

$this->titulo='<i class="fa fa-fw fa-phone"></i> Nuevo Interno';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
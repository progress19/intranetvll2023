<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->breadcrumbs=array(
	'Noticias'=>array('admin'),
	'Nueva',
);

$this->titulo='<i class="fa fa-fw fa-newspaper-o"></i> Nueva Noticia';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
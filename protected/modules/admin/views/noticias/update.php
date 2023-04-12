<?php
/* @var $this ActividadesController */
/* @var $model Noticias */

$this->breadcrumbs=array(
	'Noticias'=>array('admin'),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-newspaper-o"></i> Editar Noticia : '. $model->nombre;
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
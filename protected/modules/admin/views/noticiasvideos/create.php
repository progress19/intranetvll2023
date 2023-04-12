<?php
/* @var $this ActividadesvideosController */
/* @var $model Actividadesvideos */

$this->breadcrumbs=array(
	'Videos Noticias'=>array('admin', 'idNoticia' => $_REQUEST['idNoticia']),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-newspaper-o"></i> Nuevo Video ';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
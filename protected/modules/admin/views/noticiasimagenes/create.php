<?php
/* @var $this ActividadesimagenesController */
/* @var $model Actividadesimagenes */

$this->breadcrumbs=array(
	'Imágenes Noticias'=>array('admin', 'id' => $_REQUEST['idNoticia']),
	'Editar',
);

$this->titulo='<i class="fa fa-fw fa-newspaper-o"></i> Nueva Imagen ';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
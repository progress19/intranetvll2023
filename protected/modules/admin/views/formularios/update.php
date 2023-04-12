<?php
/* @var $this FormulariosController */
/* @var $model Formularios */

$this->menu_formularios = 'active';

$this->breadcrumbs=array(
	'Formularios'=>array('admin'),
	'Actualizar',
);

$this->titulo='<i class="fa fa-fw fa-edit"></i> Editar Formulario '. $model->nombre;

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
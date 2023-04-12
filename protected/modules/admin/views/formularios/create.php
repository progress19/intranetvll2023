<?php
/* @var $this ReglamentosController */
/* @var $model Reglamentos */

$this->menu_formularios = 'active';
$this->menu_formularios_n = 'active';

$this->breadcrumbs=array(
	'Formularios'=>array('index'),
	'Nuevo Formulario',
);

$this->titulo='<i class="fa fa-fw fa-edit"></i> Nuevo Formulario';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
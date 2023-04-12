<?php
/* @var $this ReglamentosController */
/* @var $model Reglamentos */

$this->menu_reglamentos = 'active';

$this->breadcrumbs=array(
	'Reglamentos'=>array('admin'),
	'Actualizar',
);

$this->titulo='<i class="fa fa-fw fa-legal"></i> Editar Reglamento '. $model->nombre;

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
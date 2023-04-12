<?php
/* @var $this ReglamentosController */
/* @var $model Reglamentos */

$this->menu_reglamentos = 'active';
$this->menu_reglamentos_n = 'active';

$this->breadcrumbs=array(
	'Reglamentos'=>array('index'),
	'Nuevo Reglamento',
);

$this->titulo='<i class="fa fa-fw fa-legal"></i> Nuevo Reglamento';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
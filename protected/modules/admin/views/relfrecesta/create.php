<?php
/* @var $this RelfrecestaController */
/* @var $model Relfrecesta */

$this->breadcrumbs=array(
	'Frecuencias - Estado'=>array('admin','idFrecuencia'=>$_REQUEST['idFrecuencia']),
	'Nuevo Estado de Frecuencia',
);
 
	$relfrecesta = new Relfrecesta();
	$relfrecesta->idFrecuencia = $_REQUEST['idFrecuencia']; 

$this->titulo='<i class="fa fa-fw fa-arrows-h"></i> Nuevo Estado de Frecuencia '.$relfrecesta->frecuencia->nombre;

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
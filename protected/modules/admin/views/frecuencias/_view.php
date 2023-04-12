<?php
/* @var $this FrecuenciasController */
/* @var $data Frecuencias */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFrecuencia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFrecuencia), array('view', 'id'=>$data->idFrecuencia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>
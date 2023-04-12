<?php
/* @var $this EstadosController */
/* @var $data Estados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEstado), array('view', 'id'=>$data->idEstado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>
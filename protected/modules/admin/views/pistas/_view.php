<?php
/* @var $this PistasController */
/* @var $data Pistas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPista')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPista), array('view', 'id'=>$data->idPista)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSector')); ?>:</b>
	<?php echo CHtml::encode($data->idSector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDificultad')); ?>:</b>
	<?php echo CHtml::encode($data->idDificultad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstado')); ?>:</b>
	<?php echo CHtml::encode($data->idEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipo')); ?>:</b>
	<?php echo CHtml::encode($data->idTipo); ?>
	<br />


</div>
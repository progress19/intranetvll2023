<?php
/* @var $this AsistenciasController */
/* @var $data Asistencias */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAsistencia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idAsistencia), array('view', 'id'=>$data->idAsistencia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPersonal')); ?>:</b>
	<?php echo CHtml::encode($data->idPersonal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('legajo')); ?>:</b>
	<?php echo CHtml::encode($data->legajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSector')); ?>:</b>
	<?php echo CHtml::encode($data->idSector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sector')); ?>:</b>
	<?php echo CHtml::encode($data->sector); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('francos')); ?>:</b>
	<?php echo CHtml::encode($data->francos); ?>
	<br />

	*/ ?>

</div>
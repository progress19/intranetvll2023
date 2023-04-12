<?php
/* @var $this PersonalController */
/* @var $data Personal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPersonal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPersonal), array('view', 'id'=>$data->idPersonal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSector')); ?>:</b>
	<?php echo CHtml::encode($data->idSector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sector')); ?>:</b>
	<?php echo CHtml::encode($data->sector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('legajo')); ?>:</b>
	<?php echo CHtml::encode($data->legajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('francos')); ?>:</b>
	<?php echo CHtml::encode($data->francos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre')); ?>:</b>
	<?php echo CHtml::encode($data->pre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fra')); ?>:</b>
	<?php echo CHtml::encode($data->fra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('med')); ?>:</b>
	<?php echo CHtml::encode($data->med); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ini')); ?>:</b>
	<?php echo CHtml::encode($data->ini); ?>
	<br />

	*/ ?>

</div>
<?php
/* @var $this ActividadesController */
/* @var $data Actividades */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idActividad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idActividad), array('view', 'id'=>$data->idActividad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>
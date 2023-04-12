<?php
/* @var $this TicketsController */
/* @var $data Tickets */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTicket')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTicket), array('view', 'id'=>$data->idTicket)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarjetaId')); ?>:</b>
	<?php echo CHtml::encode($data->tarjetaId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('legajo')); ?>:</b>
	<?php echo CHtml::encode($data->legajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idProveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>
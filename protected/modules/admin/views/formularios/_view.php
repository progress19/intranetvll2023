<?php
/* @var $this CancioneroController */
/* @var $data Cancionero */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCancionero')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCancionero), array('view', 'id'=>$data->idCancionero)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archivo')); ?>:</b>
	<?php echo CHtml::encode($data->archivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>
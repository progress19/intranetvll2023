<?php
/* @var $this InternosController */
/* @var $data Internos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInterno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInterno), array('view', 'id'=>$data->idInterno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>
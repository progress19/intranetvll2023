<?php
/* @var $this RelfrecestaController */
/* @var $data Relfrecesta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRelacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRelacion), array('view', 'id'=>$data->idRelacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFrecuencia')); ?>:</b>
	<?php echo CHtml::encode($data->idFrecuencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstado')); ?>:</b>
	<?php echo CHtml::encode($data->idEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calculo')); ?>:</b>
	<?php echo CHtml::encode($data->calculo); ?>
	<br />


</div>
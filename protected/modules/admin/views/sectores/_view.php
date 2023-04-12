<?php
/* @var $this SectoresController */
/* @var $data Sectores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSector')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSector), array('view', 'id'=>$data->idSector)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>
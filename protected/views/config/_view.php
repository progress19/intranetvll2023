<?php
/* @var $this ConfigController */
/* @var $data Config */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idConfig')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idConfig), array('view', 'id'=>$data->idConfig)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contacto')); ?>:</b>
	<?php echo CHtml::encode($data->contacto); ?>
	<br />


</div>
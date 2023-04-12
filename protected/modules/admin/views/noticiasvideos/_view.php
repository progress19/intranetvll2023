<?php
/* @var $this ActividadesvideosController */
/* @var $data Actividadesvideos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVideo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idVideo), array('view', 'id'=>$data->idVideo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idActividad')); ?>:</b>
	<?php echo CHtml::encode($data->idActividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>
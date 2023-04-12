<?php
/* @var $this ConfigComedorController */
/* @var $data ConfigComedor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idConfig')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idConfig), array('view', 'id'=>$data->idConfig)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desayuno_desde')); ?>:</b>
	<?php echo CHtml::encode($data->desayuno_desde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desayuno_hasta')); ?>:</b>
	<?php echo CHtml::encode($data->desayuno_hasta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('almuerzo_desde')); ?>:</b>
	<?php echo CHtml::encode($data->almuerzo_desde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('almuerzo_hasta')); ?>:</b>
	<?php echo CHtml::encode($data->almuerzo_hasta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cena_desde')); ?>:</b>
	<?php echo CHtml::encode($data->cena_desde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cena_hasta')); ?>:</b>
	<?php echo CHtml::encode($data->cena_hasta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('inicial_desayuno')); ?>:</b>
	<?php echo CHtml::encode($data->inicial_desayuno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicial_comidas')); ?>:</b>
	<?php echo CHtml::encode($data->inicial_comidas); ?>
	<br />

	*/ ?>

</div>
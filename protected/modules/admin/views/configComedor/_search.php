<?php
/* @var $this ConfigComedorController */
/* @var $model ConfigComedor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idConfig'); ?>
		<?php echo $form->textField($model,'idConfig',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desayuno_desde'); ?>
		<?php echo $form->textField($model,'desayuno_desde'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desayuno_hasta'); ?>
		<?php echo $form->textField($model,'desayuno_hasta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'almuerzo_desde'); ?>
		<?php echo $form->textField($model,'almuerzo_desde'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'almuerzo_hasta'); ?>
		<?php echo $form->textField($model,'almuerzo_hasta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cena_desde'); ?>
		<?php echo $form->textField($model,'cena_desde'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cena_hasta'); ?>
		<?php echo $form->textField($model,'cena_hasta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inicial_desayuno'); ?>
		<?php echo $form->textField($model,'inicial_desayuno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inicial_comidas'); ?>
		<?php echo $form->textField($model,'inicial_comidas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
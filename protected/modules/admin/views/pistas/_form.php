<?php
/* @var $this PistasController */
/* @var $model Pistas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pistas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idSector'); ?>
		<?php echo $form->textField($model,'idSector'); ?>
		<?php echo $form->error($model,'idSector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idDificultad'); ?>
		<?php echo $form->textField($model,'idDificultad'); ?>
		<?php echo $form->error($model,'idDificultad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idEstado'); ?>
		<?php echo $form->textField($model,'idEstado',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'idEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idTipo'); ?>
		<?php echo $form->textField($model,'idTipo'); ?>
		<?php echo $form->error($model,'idTipo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this AsistenciasController */
/* @var $model Asistencias */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idAsistencia'); ?>
		<?php echo $form->textField($model,'idAsistencia'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'legajo'); ?>
		<?php echo $form->textField($model,'legajo'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'idEstado'); ?>
		<?php echo $form->textField($model,'idEstado',array('size'=>15,'maxlength'=>15)); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
)
); ?>
	
	<div class="container">
	<div class="row">
		<div class="col-md-5">
	
		<div class="form-group">
		  <?php echo $form->labelEx($model,'Usuario'); ?>
		  <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	    </div>	

	    <div class="form-group">
		  <?php echo $form->labelEx($model,'Apellido'); ?>
		  <?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	    </div>	

		<div class="form-group">
		  <?php echo $form->labelEx($model,'Nombre'); ?>
		  <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	    </div>	


	
		<div class="form-group">
			
				<?php echo CHtml::submitButton('Buscar',array('class' => 'btn btn-primary')); ?>
		
		</div>
	</div>
</div>
</div>

<?php $this->endWidget(); ?>
<?php
/* @var $this SectoresController */
/* @var $model Sectores */
/* @var $form CActiveForm */
?>
<?php $this->menu_puestos = 'active'; ?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
)
);
 ?>

<div class="col-md-9">
	<?php echo $form->errorSummary($model); ?>
</div>

    <div class="col-md-9">
        <div class="box box-primary">
             <div class="box-body">

	<div class="col-md-4">
		<div class="form-group">
			<?php echo $form->labelEx($model,'nombre'); ?>
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>
	
	<div class="clearfix"></div>

	<div class="col-md-4">
		<div class="form-group">
			<?php echo $form->labelEx($model,'ip'); ?>
			<?php echo $form->textField($model,'ip',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'ip'); ?>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<?php echo $form->labelEx($model,'ubicacion'); ?>
			<?php echo $form->textField($model,'ubicacion',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'ubicacion'); ?>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-3">
	<div class="form-group">
		<?php echo $form->labelEx($model,'Estado '); ?>
		<?php echo $form->dropDownList($model,'estado',array (1=>'Activado','0'=>'Desactivado'), array ('class' => 'form-control')); ?>
	</div>
	<?php echo $form->error($model,'estado'); ?>
</div>
<div class="clearfix"></div>


</div> <!-- body -->
   <div class="box-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
   </div>
   <div class="clearfix"></div>
   </div>

</div>

<?php $this->endWidget(); ?>
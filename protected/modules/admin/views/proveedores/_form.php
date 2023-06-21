<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */
/* @var $form CActiveForm */
?>
<?php $this->menu_proveedores = 'active'; ?>

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

	<div class="col-md-2">
		<div class="form-group">
			<?php echo $form->labelEx($model,'desayuno', array('style' => 'padding-right: 10px;')); ?>
			<?php echo $form->checkBox($model,'desayuno', array('value'=>'1', 'uncheckValue'=>'0')); ?>
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
			<?php echo $form->labelEx($model,'almuerzo', array('style' => 'padding-right: 10px;')); ?>
			<?php echo $form->checkBox($model,'almuerzo', array('value'=>'1', 'uncheckValue'=>'0')); ?>
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
			<?php echo $form->labelEx($model,'cena', array('style' => 'padding-right: 10px;')); ?>
			<?php echo $form->checkBox($model,'cena', array('value'=>'1', 'uncheckValue'=>'0')); ?>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-3">
		<div class="form-group">
	       <?php echo $form->labelEx($model,'Estado'); ?>
	       <?php echo $form->dropDownList($model,'estado',array (1=>'Activado',0=>'Desactivado'), array ('class' => 'form-control')); ?>
	    </div>
	    <?php echo $form->error($model,'estado'); ?>
    </div>

</div> <!-- body -->
   <div class="box-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
   </div>
   <div class="clearfix"></div>
   </div>

</div>

<?php $this->endWidget(); ?>
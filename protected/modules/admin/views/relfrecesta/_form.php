<?php
/* @var $this RelfrecestaController */
/* @var $model Relfrecesta */
/* @var $form CActiveForm */
?>

<?php $this->layout='//layouts/dashboard_admin'; ?>

<?php $this->menu_frecuencias = 'active';?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)
);?>

<div class="col-md-9">
	<?php echo $form->errorSummary($model); ?>
</div>

<div class="col-md-9">
<div class="box box-primary">
<div class="box-body">

	<?php echo $form->hiddenField($model,'idFrecuencia',array('value'=>$_REQUEST['idFrecuencia'])); ?>
	<?php echo $form->hiddenField($model,'estado',array('value'=>1)); ?>

	<div class="col-md-6">
	<div class="form-group">
      <?php echo $form->labelEx($model,'Estado'); ?>
      <?php echo $form->dropDownList($model,'idEstado', CHtml::listData(Estados::model()->findAll(array('order' => 'idEstado ASC')), 'idEstado', 'nombre'), array('empty'=>'Seleccione un Estado','class' => 'form-control'))?>
	</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-3">
	<div class="form-group">
		<?php echo $form->labelEx($model,'calculo'); ?>
		<?php echo $form->textField($model,'calculo',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'calculo'); ?>
	</div>
	</div>

</div>

    <div class="box-footer">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
    </div><div class="clearfix"></div>
    </div>

</div>
</div>

<?php $this->endWidget(); ?>





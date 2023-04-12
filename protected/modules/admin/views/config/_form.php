<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

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
);
?>

<?php echo $form->errorSummary($model); ?>

    <div class="col-md-9">
        <div class="box box-primary">
             <div class="box-body">

	<div class="col-md-12">
	<div class="form-group">
		<?php echo $form->labelEx($model,'Formulario de contacto'); ?>
		<?php echo $form->textArea($model,'contacto',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'contacto'); ?>
		Si desea ingresar más de una dirección, deben ir separadas por ";"</br>
		Ejemplo : info@pixtudios.net;ventas@pixtudios.net
	</div>
	</div>
</div>

	<div class="box-footer">
    <div class="col-md-12">
    	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
   </div>
   </div>		

<div class="clearfix"></div>

</div>
</div>

<?php $this->endWidget(); ?>


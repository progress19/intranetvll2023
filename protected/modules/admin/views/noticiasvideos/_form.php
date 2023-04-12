<?php
/* @var $this ActividadesvideosController */
/* @var $model Actividadesvideos */
/* @var $form CActiveForm */
?>

<?php $this->menu_noticias = 'active';?>

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

<div class="col-md-8">
<?php echo $form->errorSummary($model); ?>
</div>

<div class="col-md-8">
<div class="box box-primary">
<div class="box-body">

	<?php echo $form->hiddenField($model,'idNoticia',array('value'=>$_REQUEST['idNoticia'])); ?>
	<?php echo $form->hiddenField($model,'estado',array('value'=>1)); ?>


 	<div class="col-md-7">
    <div class="form-group">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>128,'class' => 'form-control', 'placeholder' => 'Ingrese solo el Id de video de Youtube')); ?>
	</div>	
		<?php echo $form->error($model,'link'); ?>
    </div>
		<div class="clearfix"></div>

<div class="col-md-12">
<div class="row buttons">	<hr>
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
</div>
</div>

</div>
</div>
</div>


<?php $this->endWidget(); ?>
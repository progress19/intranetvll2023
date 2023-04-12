<?php
/* @var $this FormulariosController */
/* @var $model Formularios */
/* @var $form CActiveForm */
?>

<?php $this->menu_formularios = $this->menu_formularios_n = 'active';  ?>

  	<div class="col-md-8">
 		<div class="box box-primary">
 			<div class="box-body">

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
));
?>	

<?php echo $form->errorSummary($model); ?>

 <!-- Main content -->

 			<div class="col-md-7">
 				<div class="form-group">	
 					<?php echo $form->labelEx($model,'nombre'); ?>
 					<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
 				</div>
 				<?php echo $form->error($model,'nombre'); ?>
			</div>

				<div class="clearfix"></div>

     						<div class="col-md-12">
 							<div class="form-group">
 								<?php echo $form->labelEx($model,'archivo'); ?>
	     					    <?php echo CHtml::activeFileField($model, 'archivo', array('class' => 'input_Personal_foto' )); ?> 
 				            	<?php echo $form->error($model,'archivo'); ?>
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
 						</div><!-- /.box-body -->

 						<div class="box-footer">
 							<div class="col-md-12">
 								<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
 							</div>
 							<div class="clearfix"></div>
 						</div>

 					</div><!-- /.box -->
 				</div><!-- /.col-lg-8 -->

<?php $this->endWidget(); ?>


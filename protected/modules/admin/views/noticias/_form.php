<?php
/* @var $this ActividadesController */
/* @var $model Actividades */
/* @var $form CActiveForm */
?>

<?php $this->menu_noticias = $this->menu_noticias_n = 'active';  ?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
)
); ?>

<div class="col-md-9">
<?php echo $form->errorSummary($model); ?>
</div>

<div class="col-md-9">
<div class="box box-primary">
<div class="box-body">
  
 	<div class="col-md-5">
    <div class="form-group">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>	
		<?php echo $form->error($model,'nombre'); ?>
    </div>

    <div class="clearfix"></div> 

    
	<div class="col-md-12">
		<div class="form-group" style="width: 98%;">
			<?php echo $form->labelEx($model,'descripcion'); ?>

			<?php            
			$this->widget(
				'booster.widgets.TbCKEditor',
				array(
					'attribute' => 'descripcion',
					'model'=> $model,
					'value'=> $model->descripcion,
					'editorOptions' => array(
						'plugins' => 'basicstyles,toolbar,enterkey,entities,floatingspace,wysiwygarea,indentlist,link,list,dialog,dialogui,button,indent,fakeobjects'
						)));
						?>
					</div>	
	</div>
       
	<div class="col-md-3">
    <div class="form-group">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>
		<?php echo $form->error($model,'orden'); ?>
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
</div><!-- /.box -->
<div class="box-footer">
   <div class="col-md-12">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
    </div>
    <div class="clearfix"></div>
</div>
</div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php $this->endWidget(); ?>

<?php
/* @var $this ActividadesimagenesController */
/* @var $model Actividadesimagenes */
/* @var $form CActiveForm */
?>

<?php 
$this->menu_noticias = 'active';
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
);?>

<?php echo $form->errorSummary($model); ?>

<div class="col-md-8">
<div class="box box-primary">
<div class="box-body">

	<?php echo $form->hiddenField($model,'idNoticia',array('value'=>$_REQUEST['idNoticia'])); ?>
	<?php echo $form->hiddenField($model,'estado',array('value'=>1)); ?>

	<div class="col-md-6">
	<div class="form-group">
		<?php echo $form->labelEx($model,'imagen'); ?>
	    <?php echo CHtml::activeFileField($model, 'imagen', array('class' => 'input_Personal_foto' )); ?> 
	    <?php echo $form->error($model,'imagen'); ?>
	</div>
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

<div class="col-md-4">
  <div class="box box-primary">
    <div class="box-body">
    <?php echo $form->labelEx($model,'Imágen '); ?>
        <?php if($model->isNewRecord!='1'){ ?><br>
       
          <?php 
           	echo CHtml::image(Yii::app()->request->baseUrl.'/pics/noticias/'.$model->imagen,
          	"sin imagen",array('class'=>'img-responsive'));
                     ?>  
       
        <?php } ?>
    </div>
  </div>
</div>


<?php $this->endWidget(); ?>
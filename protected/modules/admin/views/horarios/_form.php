<?php
/* @var $this HorariosController */
/* @var $model Horarios */
/* @var $form CActiveForm */
?>

<?php $this->menu_horarios = 'active'; ?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
/*'enableAjaxValidation'=>true,
'enableClientValidation'=>true,*/
'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)
);
 ?>

<div class="col-md-9">
	<?php echo $form->errorSummary($model); ?>
</div>

    <div class="col-md-9">
        <div class="box box-primary">
             <div class="box-body">

	<div class="col-md-3">
	<div class="form-group">
		<?php echo $form->labelEx($model,'legajo'); ?>: 
    <?php echo $model->legajo; ?>
	</div>
	</div>

  <div class="clearfix"></div>

  <div class="col-md-3">
  <div class="form-group">
    <label for="">Nombre: </label>
    <?php echo $model->personal_rel->nombre; ?>
  </div>
  </div>
	
<div class="clearfix"></div>

  <div class="col-md-2">
    <div class="form-group">
      <?php echo $form->labelEx($model,'tarjetaId'); ?>: 
      <?php echo $model->tarjetaId; ?>
    </div>
  </div>


  <div class="clearfix"></div>

  <div class="col-md-12"><h5 class="sub"><b>Registro Horario</b></h5></div>

    <div class="col-md-2">
     <div class="form-group">
      <?php echo $form->labelEx($model,'em'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'em',
                  'id' => 'em',
                  'model'=>$model,
                  'attribute'=>'em',
                  'noAppend' => true,
                   'options' => array(
                      'showMeridian' => false
                ),
              'htmlOptions'=>array('readonly'=>true,),
              'htmlOptions' => array('class' => 'form-control',),
                )
            ); 
        ?>
      </div>
  </div>

  <div class="col-md-2">
     <div class="form-group">
      <?php echo $form->labelEx($model,'sm'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'sm',
                  'id' => 'sm',
                  'model'=>$model,
                  'attribute'=>'sm',
                  'noAppend' => true,
                  'options' => array(
                    'format'=> "HH:mm",
                      'showMeridian' => false
                ),
              'htmlOptions'=>array('readonly'=>true,),
              'htmlOptions' => array('class' => 'form-control',),
                )
            ); 
        ?>
      </div>
  </div>

    <div class="col-md-2">
     <div class="form-group">
      <?php echo $form->labelEx($model,'et'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'et',
                  'id' => 'et',
                  'model'=>$model,
                  'attribute'=>'et',
                  'noAppend' => true,
                   'options' => array(
                      'showMeridian' => false
                ),
              'htmlOptions'=>array('readonly'=>true,),
              'htmlOptions' => array('class' => 'form-control',),
                )
            ); 
        ?>
      </div>
  </div>

  <div class="col-md-2">
     <div class="form-group">
      <?php echo $form->labelEx($model,'st'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'st',
                  'id' => 'st',
                  'model'=>$model,
                  'attribute'=>'st',
                  'noAppend' => true,
                   'options' => array(
                      'showMeridian' => false
                ),
              'htmlOptions'=>array('readonly'=>true,),
              'htmlOptions' => array('class' => 'form-control',),
                )
            ); 
        ?>
      </div>
  </div>


<div class="clearfix"></div>

<p><b>Para dejar el valor de hora sin registro, dejar el campo vacio.</b></p>

</div> <!-- body -->
 
   <div class="box-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
   </div>
   <div class="clearfix"></div>
   </div>

</div>
</div>
<?php //echo 'A'.$model->em;die();?>


<?php if ($model->em==''): ?>
    <script>$('#em').val('00:00');</script>
<?php else : ?>
  <script>$('#em').val('<?php echo Yii::app()->dateFormatter->format("HH:mm", $model->em); ?>')</script>
<?php endif ?>

<?php if ($model->sm==''): ?>
    <script>$('#sm').val('00:00');</script>
<?php else : ?>
  <script>$('#sm').val('<?php echo Yii::app()->dateFormatter->format("HH:mm", $model->sm); ?>')</script>
<?php endif ?>

<?php if ($model->et==''): ?>
    <script>$('#et').val('00:00');</script>
<?php else : ?>
  <script>$('#et').val('<?php echo Yii::app()->dateFormatter->format("HH:mm", $model->et); ?>')</script>
<?php endif ?>

<?php if ($model->st==''): ?>
    <script>$('#st').val('00:00');</script>
<?php else : ?>
  <script>$('#st').val('<?php echo Yii::app()->dateFormatter->format("HH:mm", $model->st); ?>')</script>
<?php endif ?>


<?php $this->endWidget(); ?>


<?php
/* @var $this ConfigComedorController */
/* @var $model ConfigComedor */
/* @var $form CActiveForm */
/*
* @property string $idConfig
 * @property string $desayuno_desde
 * @property string $desayuno_hasta
 * @property string $almuerzo_desde
 * @property string $almuerzo_hasta
 * @property string $cena_desde
 * @property string $cena_hasta
 * @property integer $inicial_desayuno
 * @property integer $inicial_comidas
*/
?>

<?php $this->menu_comidas_parametros = $this->menu_comidas = 'active'; ?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
	'id' => 'horizontalForm',
	'type' => 'horizontal',
	)
);
?>

<div class="col-md-10">
	<?php echo $form->errorSummary($model); ?>
</div>

    <div class="col-md-10">
        <div class="box box-primary">
             <div class="box-body">


	<!-- D E S A Y U N O -->

	<div class="col-md-4">
		<h5 class="sub"><b>Horarios Desayuno</b></h5>
	</div>

	<div class="col-md-4">
		<h5 class="sub"><b>Horarios Almuerzo</b></h5>
	</div>

	<div class="col-md-4">
		<h5 class="sub"><b>Horarios Cena</b></h5>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-2">
		<div class="form-group">
		  <?php echo $form->labelEx($model,'Desde'); ?>
	      <?php     
	      $this->widget(
	              'booster.widgets.TbTimePicker',
	              array(
	                'name' => 'desayuno_desde',
	                'model'=>$model,
	                'attribute'=>'desayuno_desde',
	                'noAppend' => true,
	                 'options' => array(
	                    'showMeridian' => false
	              ),
	           'htmlOptions'=>array(
	                'readonly'=>true,
	           ),
	                'htmlOptions' => array(
	                  'class' => 'form-control',
	                  ),
	              )
	          ); 

	      ?>
	    </div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
		  <?php echo $form->labelEx($model,'Hasta'); ?>
	      <?php     
	      $this->widget(
	              'booster.widgets.TbTimePicker',
	              array(
	                'name' => 'desayuno_hasta',
	                'model'=>$model,
	                'attribute'=>'desayuno_hasta',
	                'noAppend' => true,
	                 'options' => array(
	                    'showMeridian' => false
	              ),
	           'htmlOptions'=>array(
	                'readonly'=>true,
	           ),
	                'htmlOptions' => array(
	                  'class' => 'form-control',
	                  ),
	              )
	          ); 

	      ?>
	    </div>
	</div>             	

	<!-- A L M U E R Z O  -->

	<div class="col-md-2">
		<div class="form-group">
		  <?php echo $form->labelEx($model,'Desde'); ?>
	      <?php     
	      $this->widget(
	              'booster.widgets.TbTimePicker',
	              array(
	                'name' => 'almuerzo_desde',
	                'model'=>$model,
	                'attribute'=>'almuerzo_desde',
	                'noAppend' => true,
	                 'options' => array(
	                    'showMeridian' => false
	              ),
	           'htmlOptions'=>array(
	                'readonly'=>true,
	           ),
	                'htmlOptions' => array(
	                  'class' => 'form-control',
	                  ),
	              )
	          ); 

	      ?>
	    </div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
		  <?php echo $form->labelEx($model,'Hasta'); ?>
	      <?php     
	      $this->widget(
	              'booster.widgets.TbTimePicker',
	              array(
	                'name' => 'almuerzo_hasta',
	                'model'=>$model,
	                'attribute'=>'almuerzo_hasta',
	                'noAppend' => true,
	                 'options' => array(
	                    'showMeridian' => false
	              ),
	           'htmlOptions'=>array(
	                'readonly'=>true,
	           ),
	                'htmlOptions' => array(
	                  'class' => 'form-control',
	                  ),
	              )
	          ); 

	      ?>
	    </div>
	</div>


	<!-- C E N A  -->

	<div class="col-md-2">
		<div class="form-group">
		  <?php echo $form->labelEx($model,'Desde'); ?>
	      <?php     
	      $this->widget(
	              'booster.widgets.TbTimePicker',
	              array(
	                'name' => 'cena_desde',
	                'model'=>$model,
	                'attribute'=>'cena_desde',
	                'noAppend' => true,
	                 'options' => array(
	                    'showMeridian' => false
	              ),
	           'htmlOptions'=>array(
	                'readonly'=>true,
	           ),
	                'htmlOptions' => array(
	                  'class' => 'form-control',
	                  ),
	              )
	          ); 

	      ?>
	    </div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
		  <?php echo $form->labelEx($model,'Hasta'); ?>
	      <?php     
	      $this->widget(
	              'booster.widgets.TbTimePicker',
	              array(
	                'name' => 'cena_hasta',
	                'model'=>$model,
	                'attribute'=>'cena_hasta',
	                'noAppend' => true,
	                 'options' => array(
	                    'showMeridian' => false
	              ),
	           'htmlOptions'=>array(
	                'readonly'=>true,
	           ),
	                'htmlOptions' => array(
	                  'class' => 'form-control',
	                  ),
	              )
	          ); 

	      ?>
	    </div>
	</div>

	<div class="clearfix"></div>

	<hr>

	<div class="col-md-2">
		<div class="form-group">
			<?php echo $form->labelEx($model,'Inicial Desayunos'); ?>
			<?php echo $form->textField($model,'inicial_desayuno',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'inicial_desayuno'); ?>
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
			<?php echo $form->labelEx($model,'Inicial Comidas'); ?>
			<?php echo $form->textField($model,'inicial_comidas',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'inicial_comidas'); ?>
		</div>
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





















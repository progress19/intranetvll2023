<?php
  /* @var $this PersonalController */
  /* @var $model Personal */
  /* @var $form CActiveForm */
?>

<?php $this->menu_personal = 'active'; ?>

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
  ));
?>

  <div class="col-md-9">
  	<?php echo $form->errorSummary($model); ?>
  </div>

  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-body">

	<div class="col-md-3">
  	<div class="form-group">
  		<?php echo $form->labelEx($model,'legajo'); ?>
  		<?php echo $form->textField($model,'legajo',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
  		<?php echo $form->error($model,'legajo'); ?>
  	</div>
	</div>

	<div class="col-md-6">
  	<div class="form-group">
  		<?php echo $form->labelEx($model,'nombre'); ?>
  		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
  		<?php echo $form->error($model,'nombre'); ?>
  	</div>
	</div>

  <div class="col-md-3">
    <div class="form-group">
      <?php echo $form->labelEx($model,'cuil'); ?>
      <?php echo $form->textField($model,'cuil',array('id'=>'cuil','size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
      <?php echo $form->error($model,'cuil'); ?>
    </div>
  </div>

  <div class="clearfix"></div>

	<div class="col-md-5">
  	<div class="form-group">
      <?php echo $form->labelEx($model,'Sector'); ?>
      <?php echo $form->dropDownList($model,'idSector', CHtml::listData(Sectores::model()->findAll(array('order' => 'nombre ASC')), 'idSector', 'nombre'), array('empty'=>'Seleccione un Sector','class' => 'form-control'))?>
  	</div>
	</div>

	<div class="col-md-4">
  	<div class="form-group">
      <?php echo $form->labelEx($model,'Frecuencia Francos'); ?>
      <?php echo $form->dropDownList($model,'idFrecuencia', CHtml::listData(Frecuencias::model()->findAll(array('order' => 'nombre ASC')), 'idFrecuencia', 'nombre'), array('empty'=>'Seleccione una Frecuencia','class' => 'form-control'))?>
  	</div>
	</div>

  <div class="col-md-3">
    <div class="form-group">
      <?php echo $form->labelEx($model,'Saldo de Francos'); ?>
      <?php echo $form->textField($model,'francos',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
      <?php echo $form->error($model,'francos'); ?>
    </div>
  </div>
  	
	<div class="clearfix"></div>

  <div class="col-md-2">
    <div class="form-group">
      <?php echo $form->labelEx($model,'tarjetaId'); ?>
      <?php echo $form->textField($model,'tarjetaId',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
      <?php echo $form->error($model,'tarjetaId'); ?>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <?php echo $form->labelEx($model,'contraseña'); ?>
      <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
    </div>
    <?php echo $form->error($model,'password'); ?>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <?php echo $form->labelEx($model,'desayunos'); ?>
      <?php echo $form->textField($model,'desayunos',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
      <?php echo $form->error($model,'desayunos'); ?>
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <?php echo $form->labelEx($model,'comidas'); ?>
      <?php echo $form->textField($model,'comidas',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
      <?php echo $form->error($model,'comidas'); ?>
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <?php echo $form->labelEx($model,'Simultáneos'); ?>
      <?php echo $form->textField($model,'simultaneos',array('readonly'=>(Yii::app()->user->roles=='supervisor-rrhh') ? 'true' : '','size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
      <?php echo $form->error($model,'simultaneos'); ?>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="col-md-12"><h5 class="sub"><b>Horarios Comedor</b></h5></div>

    <div class="col-md-2">
     <div class="form-group">
      <?php echo $form->labelEx($model,'desayuno_desde'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'desayuno_desde',
                  'id' => 'desayuno_desde',
                  'model'=>$model,
                  'attribute'=>'desayuno_desde',
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
      <?php echo $form->labelEx($model,'desayuno_hasta'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'desayuno_hasta',
                  'id' => 'desayuno_hasta',
                  'model'=>$model,
                  'attribute'=>'desayuno_hasta',
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
      <?php echo $form->labelEx($model,'almuerzo_desde'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'almuerzo_desde',
                  'id' => 'almuerzo_desde',
                  'model'=>$model,
                  'attribute'=>'almuerzo_desde',
                  'noAppend' => true,
                   'options' => array(
                      'showMeridian' => false,
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
      <?php echo $form->labelEx($model,'almuerzo_hasta'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'almuerzo_hasta',
                  'id' => 'almuerzo_hasta',
                  'model'=>$model,
                  'attribute'=>'almuerzo_hasta',
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
      <?php echo $form->labelEx($model,'cena_desde'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'cena_desde',
                  'id' => 'cena_desde',
                  'model'=>$model,
                  'attribute'=>'cena_desde',
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
      <?php echo $form->labelEx($model,'cena_hasta'); ?>
        <?php     
        $this->widget(
                'booster.widgets.TbTimePicker',
                array(
                  'name' => 'cena_hasta',
                  'id' => 'cena_hasta',
                  'model'=>$model,
                  'attribute'=>'cena_hasta',
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


  <div class="col-md-12"><h5 class="sub"><b>Control Horario</b></h5></div>

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


  <div class="col-md-12">
    <div class="form-group">
      <?php echo $form->labelEx($model,'obs'); ?>
      <?php $this->widget('booster.widgets.TbCKEditor',
        array('attribute' => 'obs',
          'model'=> $model,
          'value'=> $model->obs,
          'editorOptions' => array(
            'plugins' => 'basicstyles,toolbar,enterkey,entities,floatingspace,wysiwygarea,indentlist,link,list,dialog,dialogui,button,indent,fakeobjects'
          )));
          ?>
        </div>
      </div>

  <div class="col-md-12">
	<div class="form-group">
	    <?php echo $form->labelEx($model,'Foto '); ?>
	    <?php echo CHtml::activeFileField($model, 'foto', array('class' => 'input_Personal_foto' )); ?> 
	    <?php echo $form->error($model,'foto'); ?>
	</div>
	</div>      

	<div class="col-md-3">
	<div class="form-group">
       <?php echo $form->labelEx($model,'Activo'); ?>
       <?php echo $form->dropDownList($model,'activo',array (1=>'Activado',0=>'Desactivado'), array ('class' => 'form-control')); ?>
    </div>
    <?php echo $form->error($model,'activo'); ?>
  </div>

    <?php 

    /*
    $unidad = Relfrecesta::getUnidadFrecuencia(1,2);
    echo $unidad['calculo'];
    */
    ?>

<div class="clearfix"></div>

</div> <!-- body -->
 
   <div class="box-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
   </div>
   <div class="clearfix"></div>
   </div>

</div>
</div>

<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-body">
    <?php echo $form->labelEx($model,'Foto '); ?>
        <?php if($model->isNewRecord!='1'){ ?><br>
        <a style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-lg" title="">
          <?php 
          if ($model->foto) {
          	echo CHtml::image(Yii::app()->request->baseUrl.'/pics/personal/'.$model->foto,
          	"sin imagen",array('class'=>'img-responsive'));
          	  } else {
          	echo CHtml::image(Yii::app()->request->baseUrl.'/images/default-user.png',
          	"sin imagen",array('class'=>'img-responsive'));
          	  }
           ?>  
        </a>
        <?php } ?>
    </div>
  </div>
</div>



<?php if (isset($almuerzo_desde)): ?>

  <script>
  $('#desayuno_desde').val('<?php echo $desayuno_desde; ?>');
  $('#desayuno_hasta').val('<?php echo $desayuno_hasta; ?>');
  $('#almuerzo_desde').val('<?php echo $almuerzo_desde; ?>');
  $('#almuerzo_hasta').val('<?php echo $almuerzo_hasta; ?>');

  $('#cena_desde').val('<?php echo $cena_desde; ?>');
  $('#cena_hasta').val('<?php echo $cena_hasta; ?>');
  $('#Personal_simultaneos').val(1);

</script>
  
<?php endif ?>

<?php $this->endWidget(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
    $('#cuil').mask('00-00000000-0');
  });
</script>
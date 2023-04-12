
<div class="col-md-12">
	
<?php if ($empleado): ?>

<div class="box-body">

<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-body">
              
          <?php 
          if ($empleado->foto) {
            echo CHtml::image(Yii::app()->request->baseUrl.'/pics/personal/'.$empleado->foto,
            "sin imagen",array('class'=>'img-responsive img-thumbnail'));
              } else {
            echo CHtml::image(Yii::app()->request->baseUrl.'/images/default-user.png',
            "sin imagen",array('class'=>'img-responsive img-thumbnail'));
              }
           ?>  
            
    </div>
  </div>
</div>

<div class="col-md-9">

<?php 
  echo '<p style="font-size: 20px;"><strong>Apellido y Nombre : </strong>'.$empleado->nombre.'</br></p>';
  echo '<p style="font-size: 20px;"><strong>Sector : </strong>'.$empleado->sector_rel->nombre.'</br></p>';
?>
    
  <hr>

	<p style="font-size: 16px;">Fecha: <b><?php echo $fecha; ?></b></p>

	<hr>

  
  <?php if ($horario): ?>

    <p><b> El día que intenta ingresar, ya se encuentra registrado para el N° de Legajo.</b></p>

    <p>Entrada Mañana: <b><?php echo ($horario->em>0) ? date("H:i",$horario->em).'hs' : '-'; ?></b> </p>
    <p>Salida Mañana: <b><?php echo ($horario->sm>0) ? date("H:i",$horario->sm).'hs' : '-'; ?></b> </p>
    <p>Entrada Tarde: <b><?php echo ($horario->et>0) ? date("H:i",$horario->et).'hs' : '-'; ?></b> </p>
    <p>Salida Tarde: <b><?php echo ($horario->st>0) ? date("H:i",$horario->st).'hs' : '-'; ?></b> </p>
    
  <?php else: ?>

<?php $model=new Horarios; ?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'action'=>Yii::app()->createUrl('//admin/horarios/create'),
'type' => 'horizontal',
/*'enableAjaxValidation'=>true,
'enableClientValidation'=>true,*/
'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)
);
 ?>


  <input id="fecha" name="Horarios[fecha]" type="hidden" value="<?php echo $fecha; ?>">
  <input id="tarjetaId" name="Horarios[tarjetaId]" type="hidden" value="<?php echo $empleado->tarjetaId; ?>">
  <input id="legajo" name="Horarios[legajo]" type="hidden" value="<?php echo $empleado->legajo; ?>">
  <input id="idSector" name="Horarios[idSector]" type="hidden" value="<?php echo $empleado->idSector; ?>">

  <div class="clearfix"></div>

    <div class="col-md-3">
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

  <div class="col-md-3">
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

    <div class="col-md-3">
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

  <div class="col-md-3">
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
 
   <div class="box-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
   </div>
   <div class="clearfix"></div>


<?php $this->endWidget(); ?>


  <?php endif ?>


  <div class="clearfix"></div>

</div>

<div class="clearfix"></div>

</div><!-- /.box-header -->

<?php else: ?>

	<h4>No se encontró N° de legajo.</h4>
	
<?php endif ?>

</div>




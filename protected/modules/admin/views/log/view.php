<?php $this->menu_log = 'active'; ?>

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
    <div class="box box-primary">
      <div class="box-body">

  <div class="col-md-4">
  	<div class="form-group">
      <?php echo $form->labelEx($model,'Id'); ?>: 
      <?php echo $model->id; ?>
  	</div>
	</div>

  <div class="clearfix"></div>
  
  <div class="col-md-4">
  	<div class="form-group">
      <?php echo $form->labelEx($model,'Fecha y hora'); ?>: 
      <?php echo Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm", $model->fecha); ?>hs.
  	</div>
	</div>
  
  <div class="clearfix"></div>
  
  <div class="col-md-4">
  	<div class="form-group">
      <?php echo $form->labelEx($model,'Usuario'); ?>: 
      <?php echo $model->usuario->nombre; ?>
  	</div>
	</div>

  <div class="clearfix"></div>

  <div class="col-md-4">
  	<div class="form-group">
      <?php echo $form->labelEx($model,'Tipo'); ?>: 
      <?php echo $model->tipo->nombre; ?>
  	</div>
	</div>

  <div class="clearfix"></div>

  <div class="col-md-4">
    <div class="form-group">
      <?php echo $form->labelEx($model,'Puesto IP'); ?>: 
      <?php echo $model->puesto_ip; ?>
    </div>
  </div>

<div class="clearfix"></div>

<div class="col-md-12">
    <div class="form-group">
      <?php echo $form->labelEx($model,'Detalle'); ?>: 
      <?php echo $model->detalle; ?>
    </div>
  </div>

</div> <!-- body -->
 
   <div class="box-footer">
      <div class="col-md-12">
        <button onclick="window.history.back()" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span> Salir</button>
    </div>
   <div class="clearfix"></div>
  </div>

</div>
</div>

<?php $this->endWidget(); ?>


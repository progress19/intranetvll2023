<?php
/* @var $this TicketsController */
/* @var $model Tickets */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-md-12">	
<div class="alert alert-info" style="overflow: auto;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
      
	<div class="col-md-2">
	<div class="form-group">
		
	<label class="control-label" for="">Resumen desde</label>

      <?php 

      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'model' => $model,
           'attribute' => 'desde',
           'id' => 'desde',
           'name'=>'desde',
           'flat'=>false,
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd-mm-yy',
            'buttonImageOnly'=> true,
            'changeMonth'=>true,
            'changeYear'=>true,
            ),
           'htmlOptions'=>array(
            'class'=>'form-control',
          ),
          ));

	?>

	</div>
</div>
	
	<div class="col-md-2">
	<div class="form-group">
		
		<label class="control-label" for="">Hasta</label>

	<?php

      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'model' => $model,
           'attribute' => 'hasta',
           'id' => 'hasta',
           'name'=>'hasta',
           'flat'=>false,
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd-mm-yy',
            'buttonImageOnly'=> true,
            'changeMonth'=>true,
            'changeYear'=>true,
          ),
           'htmlOptions'=>array(
            'class'=>'form-control'),
          ));

 ?>

</div>
</div>
   <!--
	<div class="form-group">
		<div class="col-md-2" style="padding-top: 21px">
			<button class="btn btn-primary" type="submit" style="width: 100%"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar </button>
		</div>
	</div>
-->

	<div class="form-group">
		<div class="col-md-3" style="padding-top: 21px">
			<button class="btn btn-primary" onclick="estadisticasComProve()" style="width: 100%"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Estadísticas x Proveedor</button>
		</div>
	</div>

  <div class="form-group">
    <div class="col-md-3" style="padding-top: 21px">
      <button class="btn btn-primary" onclick="estadisticasComSector()" style="width: 100%"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Estadísticas x Sector</button>
    </div>
  </div>

  <div style="padding-top: 19px;" class="col-md-3">
    <a class="btn btn-primary" onclick="ticketsExcel()" style="text-decoration: none;" >
      <span class="fa fa-fw fa-file-excel-o" aria-hidden="true"></span> Exportar a Excel
    </a>
  </div>

<?php $this->endWidget(); ?>

<div id="estadisticas"></div>


</div><!-- search-form -->
</div>
</div>

<div class="modal" id="modal-estadisticasProve" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Estadísticas x Proveedor</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">

      <?php echo CHtml::link('<i class="fa fa-fw fa-print"></i> Imprimir',array('Tickets/ticketsProve'), array('target'=>'_blank', 'class'=>'btn btn-primary')); ?>

        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-fw fa-close"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal" id="modal-estadisticasSector" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Estadísticas x Sector</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">

      <?php echo CHtml::link('<i class="fa fa-fw fa-print"></i> Imprimir',array('Tickets/ticketsSector'), array('target'=>'_blank', 'class'=>'btn btn-primary')); ?>

        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-fw fa-close"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	//$("#content").removeClass('fade out');
	$("#modal-estadisticas").removeClass('fade');
  document.getElementById("desde").value = "<?php echo date('d-m-Y') ?>";
  document.getElementById("hasta").value = "<?php echo date('d-m-Y') ?>";
</script>


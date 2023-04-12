<?php
/* @var $this PersonalController */
/* @var $model Personal */

  $this->menu_comidas = 'active';
  $this->titulo='<i class="glyphicon glyphicon-cutlery"></i> Control de Comidas';

?>

<?php $this->breadcrumbs=array('Administrador');?>
   
<div class="col-md-12">  
<div class="box box-primary">
    <div class="box-header">

<div class="row">
<div class="col-md-12">
<div class="">

<form class="form-horizontal" role="form">
    
    <div class="col-md-4">
      <div class="form-group">
        <label for="inputType" class="col-md-5 control-label">Desde :</label>
          <div class="col-md-7">
          <?php 

          $this->widget('zii.widgets.jui.CJuiDatePicker', array(
               'language'=>'es',
               'name'=>'desde',
               'flat'=>false,
               'options'=>array(
                'firstDay'=>1,
                'constrainInput'=>true,
                'currentText'=>'Now',
                'dateFormat'=>'dd-mm-yy',
                'buttonImageOnly'=> true,
                'changeMonth'=>true,
                'changeYear'=>true),
               'htmlOptions'=>array(
                'class'=>'form-control',
                 'style'=>'font-size:15px',
               ),
              ));

              ?>
          </div>
      </div>
    </div>

      <div class="col-md-4">
      <div class="form-group">
      <label for="inputType" class="col-md-4 control-label">Hasta :</label>
      <div class="col-md-6">
      <?php 

      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'name'=>'hasta',
           'flat'=>false,
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd-mm-yy',
            'buttonImageOnly'=> true,
            'changeMonth'=>true,
            'changeYear'=>true),
            'htmlOptions'=>array(
            'class'=>'form-control',
             'style'=>'width:20px;font-size:15px',
           ),
          ));

          ?>
      </div>
    </div>
    </div>
    
</form>
  <div class="col-md-2">
  <a class="btn btn-primary" onclick="comidas()" style="text-decoration: none;" >
    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar
  </a>
  </div>

  <div class="col-md-2">
  <a class="btn btn-primary" onclick="comidasExcel()" style="text-decoration: none;" >
    <span class="fa fa-fw fa-file-excel-o" aria-hidden="true"></span> Exportar a Excel
  </a>
  </div>
  <div class="clearfix"></div>

</div>
<hr>
</div>
</div>

  <div class="clearfix"></div>

  <div id="comidas"></div>

</div><!-- /.box-header -->
</div>

<script>
  document.getElementById("desde").value = "<?php echo date('d-m-Y') ?>";
  document.getElementById("hasta").value = "<?php echo date('d-m-Y') ?>"; 
</script>

<?php 
  // (#5)
  Yii::app()->clientScript->registerScript('re-install-date-picker', "
  function reinstallDatePicker(id, data) {
          //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
      $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy-mm-dd'}));
  }
  ");
?>





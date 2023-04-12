<?php
/* @var $this PersonalController */
/* @var $model Personal */

  $this->menu_horarios = 'active';
  $this->menu_horarios_cargar = 'active';
  
  $this->titulo='<i class="glyphicon glyphicon-time"></i> Control Horario';

?>

<?php $this->breadcrumbs=array('Administrador');?>  

<div class="col-md-12">  
<div class="box box-primary">
    <div class="box-header">

<div class="row">
<div class="col-md-12">
<div class="alert alert-info">

<form class="form-horizontal" role="form">
    
      <div class="col-md-2">
        <div class="form-group">  
          <label for="inputType" class="">N° de Legajo:</label>
              <input type="text" id='legajo' class="form-control"> 
        </div>
      </div>

      <div class="clearfix"></div>


    <div class="col-md-3">
      <div class="form-group">
        <label for="inputType" class="control-label">Fecha :</label>
        <?php 

        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
             'language'=>'es',
             'name'=>'fecha',
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
               'style'=>'width:20px;',
             ),
            ));

            ?>

      </div>
    </div>

    <div class="clearfix"></div>
    
</form>

  <div class="col-md-2">
    <a class="btn btn-primary" onclick="cargarHorario()" style="text-decoration: none;" >
      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Nuevo Registro
    </a>
  </div>

  <div class="clearfix"></div>

</div>
</div>
</div>

  <div class="clearfix"></div>

  <div id="cargarHorario"></div>

</div><!-- /.box-header -->
</div>

<script>
  document.getElementById("fecha").value = "<?php echo date('d-m-Y') ?>";
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





<?php
/* @var $this AsistenciasController */
/* @var $model Asistencias */

  $this->menu_horarios = 'active';
  $this->menu_horarios_exportar = 'active';
  
  $this->titulo='<i class="fa fa-fw fa-file-excel-o"></i> Exportar Registros Horarios a Excel';

?>

<?php

$this->breadcrumbs=array(
  'Administrador',);

?>  
<div class="col-md-10">  
<div class="box box-primary">
  <div class="box-header">
  
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'page-form',
    'enableAjaxValidation'=>false,
)); ?>

<div class="row">
<div class="col-md-3">
<div class="form-group"> 
<b>Desde :</b>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'model'=>$model,
           'name'=>'from_date',
           'flat'=>false,
           'value'=>isset(Yii::app()->request->cookies['from_date']) ? Yii::app()->request->cookies['from_date'] : '',
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd-mm-yy',
            'buttonImageOnly'=> true,
            'changeMonth' => true,
            'changeYear' => true,
    ),
    'htmlOptions'=>array(
      'class'=>'form-control',
    ),
));
?>
</div>
</div>

<div class="col-md-3">
<div class="form-group"> 
<b>Hasta :</b>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'model'=>$model,
           'name'=>'to_date',
           'flat'=>false,
           'value'=>isset(Yii::app()->request->cookies['to_date']) ? Yii::app()->request->cookies['to_date'] : '',
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd-mm-yy',
            'buttonImageOnly'=> true,
            'changeMonth' => true,
            'changeYear' => true,
    ),
    'htmlOptions'=>array(
      'class'=>'form-control',
    ),
));
?>
</div>
</div>

<div style="padding-top: 19px;" class="col-md-3">
    <a class="btn btn-primary" onclick="horariosExcel()" style="text-decoration: none;" >
      <span class="fa fa-fw fa-file-excel-o" aria-hidden="true"></span> Exportar a Excel
    </a>
</div>

<?php $this->endWidget(); ?>
</div>

  <div class="row">
    <div class="col-md-2">

    </div>
    
    <div id="errorFecha" style="padding: 5px"></div>
  </div>

</div><!-- /.box-header -->
</div>

<?php 
// (#5)
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_due_date').datepicker(jQuery.extend(
    {
      showMonthAfterYear:false,
      changeMonth:true,
      changeYear:true,
      showButtonPanel:true,
    },
    jQuery.datepicker.regional['es'],{'dateFormat':'yy-mm-dd'}));
}
");

?>






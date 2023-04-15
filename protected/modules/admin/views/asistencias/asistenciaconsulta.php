<?php
/* @var $this PersonalController */
/* @var $model Personal */

  $this->menu_asistencias = 'active';
  
  $this->titulo='<i class="fa fa-fw fa-calendar"></i> Consulta de Asistencias';

  $model = new Asistencias();
?>

<?php

$this->breadcrumbs=array(
  'Administrador',);

?>  
<div class="col-md-12">  
<div class="box box-primary">
    <div class="box-header">

<div class="row">
<div class="col-md-5">
<div class="alert alert-info">


    <div class="form-group">
      <label style="padding-top: 8px;" for="inputType" class="col-md-7 control-label"><span class="text15">Control de Asistencias para el día : </span></label>
      <div class="col-md-4">

      </div>
    </div>
<br>

</div>
</div>
</div>

<?php

    $this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
    // 40px is the height of the main navigation at bootstrap
    'filter'=>$model,
    'type' => 'striped',
    'dataProvider'=>$model->search(),
    'responsiveTable' => true,
    'template'=>'{summary}{items}{pager}',
    'enablePagination' => true,
    
    'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)

    'columns'=>array(

     'legajo',

      array(
       //'name'=>'legajo',
       //'value' => '$data->personal->nombre',
       'value'=>'isset($data->personal_rel)? $data->personal_rel->nombre:"--"',
       'headerHtmlOptions'=>array('width'=>'350px'),
       'type'=>'raw'
    ),


/*
    array('name'=>'idSector', 
          'value'=>'isset($data->sector_rel)? $data->sector_rel->nombre:"--"',
          'header'=>'Sector',
          'filter'=> CHtml::listData(Sectores::model()->findAll(array('order'=>'nombre')),'idSector','nombre'),
          'type'  => 'raw',
       ), 

    array(
       'name'=>'legajo',
       'value' => '$data->legajo',
       'headerHtmlOptions'=>array('width'=>'100px'),
       'type'=>'raw'
    ),

    array(
      'type' => 'raw',
      'value' => '$data->getFoto($data->foto)',
    ),
 
      array(
       'name'=>'nombre',
       'value' => '$data->nombre',
       'headerHtmlOptions'=>array('width'=>'350px'),
       'type'=>'raw'
    ),

    array(
      'type' => 'raw',
      'value' => '$data->getMenuEstados($data->legajo)',
    ),

    array(
        'class'=>'DataColumn',
        'name'=>'idEstado',
        'value'=>'isset($data->estado_rel)? $data->estado_rel->nombre:"--"',
        'evaluateHtmlOptions'=>true,
        'htmlOptions'=>array('id'=>'"u_estado_{$data->legajo}"'),
        'filter'=> CHtml::listData(Estados::model()->findAll(array('order'=>'nombre')),'idEstado','nombre'),
        'filterHtmlOptions'=>array('class'=>'max'),
    ),

    array(
        'class'=>'DataColumn',
        'name'=>'fecha',
        'value' => 'Yii::app()->dateFormatter->format("dd-MM-yyyy", $data->fecha)',
        'evaluateHtmlOptions'=>true,
        'htmlOptions'=>array('id'=>'"u_fecha_{$data->legajo}"'),
        'cssClassExpression' => '$data["fecha"] < date("Y-m-d") ? "fuente-roja" : "fuente-negra"',

                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha', 
                'language' => 'es',
                'htmlOptions' => array(
                    'id' => 'datepicker_for_due_date',
                    'size' => '10',
                ),
                
                'options' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
            ), 
            true), // (#4)
    ),

    array(
        'class'=>'DataColumn',
        'name'=>'francos',
        'evaluateHtmlOptions'=>true,
        'htmlOptions'=>array('id'=>'"u_francos_{$data->legajo}"'),
        'cssClassExpression' => '$data["francos"] < 0 ? "fuente-roja" : "fuente-negra"',
    ),


     array(
      'type' => 'raw',
      'value' => '$data->getMenuAnos($data->legajo)',
  ),
*/
    ),
    ));

?>

</div><!-- /.box-header -->
</div>

<script>
  document.getElementById("fecha_de_asistencia").value = "<?php echo date('d-m-Y') ?>";
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





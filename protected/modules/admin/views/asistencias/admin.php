<?php
/* @var $this AsistenciasController */
/* @var $model Asistencias */

  $this->menu_asistencias = 'active';
  $this->menu_asistencias_consultas = 'active';
  
  $this->titulo='<i class="fa fa-fw fa-calendar"></i> Consulta de Asistencias';

?>

<?php

$this->breadcrumbs=array(
  'Administrador',);

?>  
<div class="col-md-10">  
<div class="box box-primary">
  <div class="box-header">

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
    'ajaxUpdate'=>true,

    'columns'=>array(

      array(
        'class'=>'DataColumn',
        'name'=>'fecha',
        'value' => 'Yii::app()->dateFormatter->format("dd-MM-yyyy", $data->fecha)',
        'evaluateHtmlOptions'=>true,
        'htmlOptions'=>array('id'=>'"u_fecha_{$data->legajo}"'),
//        'cssClassExpression' => '$data["fecha"] < date("Y-m-d") ? "fuente-roja" : "fuente-negra"',

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
       // 'name'=>'sector_buscar', 
        'value'=>'isset($data->personal_rel->sector_rel)? $data->personal_rel->sector_rel->nombre:"--"',
        'header'=>'Sector',
        'filter'=> CHtml::listData(Sectores::model()->findAll(array('order'=>'nombre')),'idSector','nombre'),
        'type'  => 'raw',
     ), 

    array(
          'name'=>'legajo', 
          'value'=>'$data->legajo',
          'header'=>'N° Legajo',
          'headerHtmlOptions'=>array('width'=>'110px'),
          'type'  => 'raw',
       ), 

	   array(
	        'name'=>'idPersonal', 
          'value'=>'isset($data->personal_rel)? $data->personal_rel->nombre:"--"',
          'header'=>'Nombre',
          'filter'=> CHtml::listData(Personal::model()->findAll(array('order'=>'nombre')),'idPersonal','nombre'),
          'type'  => 'raw',
       ), 

    array(
       'name'=>'idEstado',
       'value'=>'isset($data->estado_rel)? $data->estado_rel->nombre:"--"',
       'header' => 'Estado',
       'filter'=> CHtml::listData(Estados::model()->findAll(array('order'=>'nombre')),'idEstado','nombre'),
       //'headerHtmlOptions'=>array('width'=>'150px'),
       'type'=>'raw'
	),
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






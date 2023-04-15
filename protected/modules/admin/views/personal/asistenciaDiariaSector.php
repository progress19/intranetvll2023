<?php
/* @var $this PersonalController */
/* @var $model Personal */

  $this->menu_asistencias = 'active';
  $this->menu_asistencias_diaria = 'active';
  
  $this->titulo='<i class="fa fa-fw fa-calendar"></i> Asistencias Diaria de Personal';

$_REQUEST['idSector'] = Yii::app()->user->idSector;

if (isset($_REQUEST['idSector'])) {
/* personal desde sector */
  $idSector = $_REQUEST['idSector'];
  $model = new Personal();
  $model->idSector = $_REQUEST['idSector']; 
     if (isset($_GET['Personal'])) {$model->attributes = $_GET['Personal'];} 
 } 
 else {$idSector=0;}

?>

<?php

$this->breadcrumbs=array('Administrador',);?>  

<div class="col-md-12">  
<div class="box box-primary">
    <div class="box-header">

<div class="row">
<div class="col-md-7">
<div class="alert alert-info">
<span class="text16">Control de Asistencias para el día : </span><span class="text16"><strong id="fecha_de_asistencia"><?php echo date('d-m-Y') ?></strong></span>
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
    'dataProvider'=>$model->search_activos(),
    'responsiveTable' => false,
    'template'=>'{summary}{items}{pager}',
    'enablePagination' => true,
    'rowCssClassExpression'=>'$data->francos < 0 ? "francodebe" : "a"',

    'columns'=>array(

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
       'headerHtmlOptions'=>array('width'=>'300px'),
       'type'=>'raw'
    ),

    array(
      'type' => 'raw',
      'value' => '$data->getMenuEstados($data->legajo,$data->idPersonal)',
    ),

    array(
        'class'=>'DataColumn',
        'name'=>'idEstado',
        'header' => 'Último Estado',
        'value'=>'isset($data->estado_rel)? $data->estado_rel->nombre:"--"',
        'evaluateHtmlOptions'=>true,
        'htmlOptions'=>array('id'=>'"u_estado_{$data->legajo}"'),
        'filter'=> CHtml::listData(Estados::model()->findAll(array('order'=>'nombre')),'idEstado','nombre'),
        'filterHtmlOptions'=>array('class'=>'max'),
    ),

    array(
        'class'=>'DataColumn',
        'name'=>'fecha',
        'header'=>'Último registro',
        'value' => 'Yii::app()->dateFormatter->format("dd-MM-yyyy", $data->fecha)',
        'evaluateHtmlOptions'=>true,
        'htmlOptions'=>array('id'=>'"u_fecha_{$data->legajo}"'),
        'cssClassExpression' => '$data["fecha"] < date("Y-m-d") ? "fuente-roja" : "fuente-negra"',
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

    ),));

?>

</div><!-- /.box-header -->
</div>





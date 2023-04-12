<?php
/* @var $this PersonalController */
/* @var $model Personal */

  $this->menu_personal = 'active';
  $this->menu_personal_l = 'active';
  $this->titulo='<i class="fa fa-fw fa-users"></i> Personal';

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


$this->breadcrumbs=array(
  'Administrador',);

?>  
<div class="col-md-12">  
<div class="box box-primary">
    <div class="box-header">

    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Empleado</a>

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
    'rowCssClassExpression'=>'$data->francos < 0 ? "francodebe" : "a"',

    'columns'=>array(

    array(
       'name'=>'legajo',
       'value' => 'CHtml::link($data->legajo, Yii::app()->createUrl("admin/personal/update",array("id"=>$data->primaryKey)))',
       'headerHtmlOptions'=>array('width'=>'100px'),
       'type'=>'raw'
    ),
 
  array(
        'name'=>'foto',
        'filter'=>'',
        'type'=>'html',
        'value'=>'(!empty($data->foto))
        ?CHtml::image(Yii::app()->baseUrl."/pics/personal/".$data->foto,"",array("class"=>"img-circle","style"=>"height:30px; width: 30px;"))
        :CHtml::image(URLRAIZ."/images/default-user.png", "foto", array("class" => "img-circle","style"=>"height: 30px"))',
     ),
 
      array(
       'name'=>'nombre',
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/personal/update",array("id"=>$data->primaryKey)))',
       //'headerHtmlOptions'=>array('width'=>'300px'),
       'type'=>'raw'
    ),

        array('name'=>'idSector', 
              'value'=>'isset($data->sector_rel)? $data->sector_rel->nombre:"--"',
              'header'=>'Sector',
              'filter'=> CHtml::listData(Sectores::model()->findAll(array('order'=>'nombre')),'idSector','nombre'),
              'type'  => 'raw',
           ),

        array('name'=>'idFrecuencia', 
              'value'=>'isset($data->frecuencia)? $data->frecuencia->nombre:"--"',
              'header'=>'Frecuencia',
              'filter'=> CHtml::listData(Frecuencias::model()->findAll(array('order'=>'nombre')),'idFrecuencia','nombre'),
              'type'  => 'raw',
        ),

      array(
           'name'=>'idEstado',
           'value'=>'isset($data->estado_rel)? $data->estado_rel->nombre:"--"',
           'header' => 'Último Estado',
           'filter'=> CHtml::listData(Estados::model()->findAll(array('order'=>'nombre')),'idEstado','nombre'),
           'headerHtmlOptions'=>array('width'=>'150px'),
           'type'=>'raw'
      ),

        array(
         'name'=>'fecha',
         'value' => 'Yii::app()->dateFormatter->format("dd-MM-yyyy", $data->fecha)',
         'header' => 'Último registro',
         'headerHtmlOptions'=>array('width'=>'150px'),
         'type'=>'raw'
    ),
   
    array(
      'name'=>'francos', 
         'value'=>'($data->francos)? $data->francos:"--"',
         'header'=>'Francos',
         'htmlOptions'=>array('style'=>'text-align:right', 'class'=>'celdafranco'),
         'headerHtmlOptions'=>array('width'=>'100px'),
         'type'  => 'raw',
           ),

     array(
      'type' => 'raw',
      'value' => '$data->getMenuAnos($data->legajo)',
  ),

    array(  
            'class' => 'booster.widgets.TbToggleColumn',
            'name' => 'activo',
            'header' => 'Activo',
            'filter'=>array('1'=>'Activado','0'=>'Desactivado'),
        ),

   array(
      'htmlOptions' => array('nowrap'=>'nowrap'),
      'class'=>'booster.widgets.TbButtonColumn',
      'viewButtonUrl'=>'Yii::app()->createUrl("admin/personal/update?id=$data->idPersonal" )', // url de la acción 'update'
      'updateButtonUrl'=>'Yii::app()->createUrl("admin/personal/update?id=$data->idPersonal" )', // url de la acción 'update'
      )

    ),));

?>

</div><!-- /.box-header -->
</div>



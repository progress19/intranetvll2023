<?php
/* @var $this PistasController */
/* @var $model Pistas */

  $this->menu_pistas = 'active';
  $this->titulo='<i class="fa fa-flag" aria-hidden="true"></i> Estado de Pistas';

?>

<?php

$this->breadcrumbs=array(
  'Administrador',);

?>  
<div class="col-md-12">  
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

    'columns'=>array(
      
      array(
       'name'=>'nombre',
       'value' => '$data->nombre',
       'headerHtmlOptions'=>array('width'=>'200px'),
       'type'=>'raw'
    ),

    array(
      'name'=>'idEstado',
      'type' => 'raw',
      'value' => '$data->getMenuEstados($data->idPista,$data->idEstado)',
      'filter'=> CHtml::listData(Pstestados::model()->findAll(
        array('order'=>'nombre_es')
      ),'idEstado','nombre_es'),
    ),

    array(
      'name'=>'idTipo',
      'type' => 'raw',
      'value' => '$data->getMenuTipos($data->idPista,$data->idTipo)',
      'filter'=> CHtml::listData(Psttiponieve::model()->findAll(
        array('order'=>'nombre_es')
      ),'idTipo','nombre_es'),
    ),

    array('name'=>'idSector', 
      'value'=>'isset($data->sector_rel)? $data->sector_rel->nombre_es:"--"',
      'header'=>'Sector',
      'filter'=> CHtml::listData(Sectorespst::model()->findAll(
        array('order'=>'nombre_es')
      ),'idSector','nombre_es'),
      'type'  => 'raw',
   ), 

    array(
      'name'=>'idDificultad',
      'type' => 'raw',
      'value'=>'isset($data->dificultad_rel)? $data->dificultad_rel->nombre_es:"--"',
      'filter'=> CHtml::listData(Pstdificultades::model()->findAll(
        array('order'=>'nombre_es')
      ),'idDificultad','nombre_es'),
    ),

/*
    array('name'=>'idSector', 
          'value'=>'isset($data->sector_rel)? $data->sector_rel->nombre:"--"',
          'header'=>'Sector',
          'filter'=> CHtml::listData(Sectores::model()->findAll(
            array('order'=>'nombre')
          ),'idSector','nombre'),
          'type'  => 'raw',
       ), 

    array(
       'name'=>'legajo',
       'value' => '$data->legajo',
       'headerHtmlOptions'=>array('width'=>'80px'),
       'type'=>'raw'
    ),

      array(
       'name'=>'nombre',
       'value' => '$data->nombre',
       'headerHtmlOptions'=>array('width'=>'200px'),
       'type'=>'raw'
    ),

    array(
      'type' => 'raw',
      'value' => '$data->getMenuEstados($data->legajo,$data->idPersonal)',
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
        'name'=>'francos',
        'evaluateHtmlOptions'=>true,
        'htmlOptions'=>array('id'=>'"u_francos_{$data->legajo}"'),
        'cssClassExpression' => '$data["francos"] < 0 ? "fuente-roja" : "fuente-negra"',
    ),
*/

    ),));

?>

</div><!-- /.box-header -->
</div>

<!--  	'idPista',
		'idSector',
		'idDificultad',
		'nombre',
		'idEstado',
		'idTipo', 
	-->















































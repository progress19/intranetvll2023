<?php
/* @var $this EstadosController */
/* @var $model Estados */

  $this->menu_estados = 'active';
  $this->menu_estados_l = 'active';
  $this->titulo='<i class="fa fa-fw fa-navicon"></i> Estados';

?>
<?php $this->breadcrumbs=array('Estados',);?>
  
<div class="col-md-8">  
<div class="box box-primary">
    <div class="box-header">

    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Estado</a>

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
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/estados/update",array("id"=>$data->primaryKey)))',
       //'headerHtmlOptions'=>array('width'=>'300px'),
       'type'=>'raw'
		),

   array(
    'name' => 'abr',
    'header' => 'Abr.',
    'filter' => '',
      'value'=>function($data){
          return '<span 
      data-original-title="'.$data->nombre.'" 
      data-toggle="tooltip" 
      title="'.$data->nombre.'" 
      style="background-color:'.$data->colorFondo.';color:'.$data->colorFuente.'" 
      class="badge">'.$data->abr.'</span>';
    },
     // 'value' => '<span>$data->nombre</span>',
      'type'=>'raw'
    ),

    array(
         'name'=>'desayunos', 
         'value'=>'$data->desayunos',
         'header'=>'Desayunos',
         'htmlOptions'=>array('style'=>'text-align:right'),
         'headerHtmlOptions'=>array('width'=>'120px'),
         'type'  => 'raw',
           ),

    array(
         'name'=>'comidas', 
         'value'=>'$data->comidas',
         'header'=>'Comidas',
         'htmlOptions'=>array('style'=>'text-align:right'),
         'headerHtmlOptions'=>array('width'=>'120px'),
         'type'  => 'raw',
           ),
          
    array(  
        'class' => 'booster.widgets.TbToggleColumn',
        'name' => 'estado',
        'header' => 'Estado',
        'filter'=>array('1'=>'Activado','0'=>'Desactivado'),
	    ),

	 array(
	    'htmlOptions' => array('nowrap'=>'nowrap'),
	    'class'=>'booster.widgets.TbButtonColumn',
	    'viewButtonUrl'=>'Yii::app()->createUrl("admin/estados/update?id=$data->idEstado" )', // url de la acción 'update'
	    'updateButtonUrl'=>'Yii::app()->createUrl("admin/estados/update?id=$data->idEstado" )', // url de la acción 'update'
	    ),

    ),));

?>

</div><!-- /.box-header -->
</div>
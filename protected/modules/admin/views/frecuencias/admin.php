<?php
/* @var $this FrecuenciasController */
/* @var $model Frecuencias */

  $this->menu_frecuencias = 'active';
  $this->menu_frecuencias_l = 'active';
  $this->titulo='<i class="fa fa-fw fa-arrows-h"></i> Frecuencias';

?>
<?php

$this->breadcrumbs=array(
  'Frecuencias',);

?>  
<div class="col-md-5">  
<div class="box box-primary">
    <div class="box-header">

    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nueva Frecuencia</a>

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
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/frecuencias/update",array("id"=>$data->primaryKey)))',
       //'headerHtmlOptions'=>array('width'=>'300px'),
       'type'=>'raw'
		),
     
     array(
	    'type' => 'raw',
	    'value' => '$data->getBotonEstados($data->idFrecuencia)',
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
	    'viewButtonUrl'=>'Yii::app()->createUrl("admin/frecuencias/update?id=$data->idFrecuencia" )', // url de la acción 'update'
	    'updateButtonUrl'=>'Yii::app()->createUrl("admin/frecuencias/update?id=$data->idFrecuencia" )', // url de la acción 'update'
	    )

    ),));

?>

</div><!-- /.box-header -->
</div>
</div>
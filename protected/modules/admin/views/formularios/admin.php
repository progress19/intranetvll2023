<?php
/* @var $this ReglamentosController */
/* @var $model Formularios */

/*
  ini_set('memory_limit', '1256M');
   $asistencias = Asistencias::model()->findAllByAttributes(
    array(),array(
    'condition'=>'idAsistencia>50000 AND idAsistencia<60000'));


foreach ($asistencias as $value) {
  
  $empleado = Personal::getEmpleado($value->legajo);
    
  //echo $empleado->nombre.'<br>';
  
    $asistencia_a = Asistencias::model()->findByPk($value->idAsistencia);     

        if (isset($empleado->idPersonal)) {
             $asistencia_a->idPersonal = $empleado->idPersonal;
             $asistencia_a->save(false);
        }
 }
*/

$this->menu_formularios = 'active';
$this->menu_formularios_l = 'active';

$this->breadcrumbs=array(
	'Formularios'=>array('admin'),
	'Administrador',
);

$this->titulo='<i class="fa fa-fw fa-edit"></i> Formularios';

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tblnoticias-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="col-md-10">

<div class="box box-primary">
    <div class="box-header">
    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Formulario</a>

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
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/formularios/update",array("id"=>$data->primaryKey)))',
       'headerHtmlOptions'=>array('width'=>'450px'),
       'type'=>'raw'
),
    array(
       'name'=>'archivo',
       'value' => 'CHtml::link($data->archivo, Yii::app()->createUrl("pics/formularios/".$data->archivo), array("target"=>"_blank"))',
       'headerHtmlOptions'=>array('width'=>'450px'),
       'type'=>'raw'
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
    'viewButtonUrl'=>'Yii::app()->createUrl("/admin/formularios/update?id=$data->idFormulario" )', // url de la acción 'update'
    )
    ),
    )
    );

?>

</div><!-- /.box-header -->
</div>  




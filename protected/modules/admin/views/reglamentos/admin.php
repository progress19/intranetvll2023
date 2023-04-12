<?php
/* @var $this ReglamentosController */
/* @var $model Reglamentos */

$this->menu_reglamentos = 'active';
$this->menu_reglamentos_l = 'active';

$this->breadcrumbs=array(
	'Reglamentos'=>array('admin'),
	'Administrador',
);

$this->titulo='<i class="fa fa-fw fa-legal"></i> Reglamentos';

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
    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Reglamento</a>

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
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/reglamentos/update",array("id"=>$data->primaryKey)))',
       'headerHtmlOptions'=>array('width'=>'450px'),
       'type'=>'raw'
),
    array(
       'name'=>'archivo',
       'value' => 'CHtml::link($data->archivo, Yii::app()->createUrl("pics/reglamentos/".$data->archivo), array("target"=>"_blank"))',
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
    'viewButtonUrl'=>'Yii::app()->createUrl("/admin/reglamentos/update?id=$data->idReglamento" )', // url de la acción 'update'
    )
    ),
    )
    );

?>

</div><!-- /.box-header -->
</div>  




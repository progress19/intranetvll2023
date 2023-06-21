<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

  $this->menu_proveedores = 'active';
  $this->menu_proveedores_l = 'active';
  $this->titulo='<i class="fa fa-building-o"></i> Proveedores';

?>
<?php

$this->breadcrumbs=array(
  'Administrador',);

?>  
<div class="col-md-9">  
<div class="box box-primary">
    <div class="box-header">

    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Proveedor</a>

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
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/proveedores/update",array("id"=>$data->primaryKey)))',
       //'headerHtmlOptions'=>array('width'=>'300px'),
       'type'=>'raw'
		  ),

      array(
        'name' => 'desayuno',
        'type' => 'raw',
        'value' => '$data->getEstadoHabilitado($data->desayuno)',
        'filter'=>array('1'=>'Habilitado','0'=>'Deshabilitado'),
        'htmlOptions' => array('style' => 'text-align:center'),
      ),

      array(
        'name' => 'almuerzo',
        'type' => 'raw',
        'value' => '$data->getEstadoHabilitado($data->almuerzo)',
        'filter'=>array('1'=>'Habilitado','0'=>'Deshabilitado'),
        'htmlOptions' => array('style' => 'text-align:center'),
      ),

      array(
        'name' => 'cena',
        'type' => 'raw',
        'value' => '$data->getEstadoHabilitado($data->cena)',
        'filter'=>array('1'=>'Habilitado','0'=>'Deshabilitado'),
        'htmlOptions' => array('style' => 'text-align:center'),
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
	    'viewButtonUrl'=>'Yii::app()->createUrl("admin/proveedores/update?id=$data->idProveedor" )', // url de la acción 'update'
	    'updateButtonUrl'=>'Yii::app()->createUrl("admin/proveedores/update?id=$data->idProveedor" )', // url de la acción 'update'
	    )

    ),));

?>

</div><!-- /.box-header -->
</div>


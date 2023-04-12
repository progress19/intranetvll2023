<?php
/* @var $this SectoresController */
/* @var $model Sectores */

  $this->menu_sectores = 'active';
  $this->menu_sectores_l = 'active';
  $this->titulo='<i class="fa fa-fw fa-flag-o"></i> Sectores';

?>
<?php

$this->breadcrumbs=array(
  'Administrador',);

?>  
<div class="col-md-7">  
<div class="box box-primary">
    <div class="box-header">

    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Sector</a>

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
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/sectores/update",array("id"=>$data->primaryKey)))',
       //'headerHtmlOptions'=>array('width'=>'300px'),
       'type'=>'raw'
		),

      array(  
        'name' => 'tipo',
        'header' => 'Tipo',
        'value' => '$data->tipo==1 ? "Corporativo" : "No Corporativo"',
        'filter'=>array('1'=>'Corporativo','0'=>'No Corporativo'),
      ),
     
     array(
	    'type' => 'raw',
	    'value' => '$data->getBotonPersonal($data->idSector)',
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
	    'viewButtonUrl'=>'Yii::app()->createUrl("admin/sectores/update?id=$data->idSector" )', // url de la acción 'update'
	    'updateButtonUrl'=>'Yii::app()->createUrl("admin/sectores/update?id=$data->idSector" )', // url de la acción 'update'
	    )

    ),));

?>

</div><!-- /.box-header -->
</div>


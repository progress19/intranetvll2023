<?php
/* @var $this InternosController */
/* @var $model Internos */

  $this->menu_internos = 'active';
  $this->menu_internos_l = 'active';
  $this->titulo='<i class="fa fa-fw fa-phone"></i> Internos';

?>
<?php

$this->breadcrumbs=array(
  'Internos',);

?>  
<div class="col-md-7">  
<div class="box box-primary">
    <div class="box-header">

    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Interno</a>

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
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/internos/update",array("id"=>$data->primaryKey)))',
       //'headerHtmlOptions'=>array('width'=>'300px'),
       'type'=>'raw'
		),

      array(
       'name'=>'numero',
       'value' => 'CHtml::link($data->numero, Yii::app()->createUrl("admin/internos/update",array("id"=>$data->primaryKey)))',
       //'headerHtmlOptions'=>array('width'=>'110px'),
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
	    'viewButtonUrl'=>'Yii::app()->createUrl("admin/internos/update?id=$data->idInterno" )', // url de la acción 'update'
	    'updateButtonUrl'=>'Yii::app()->createUrl("admin/internos/update?id=$data->idInterno" )', // url de la acción 'update'
	    )

    ),));

?>

</div><!-- /.box-header -->
</div>

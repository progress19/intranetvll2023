<?php
/* @var $this RelfrecestaController */
/* @var $model Relfrecesta */

  $this->menu_frecuencias = 'active';
  $this->menu_frecuencias_l = 'active';

$this->breadcrumbs=array(
	'Frecuencias - Estados'
);

/* relacion */
  $rel_frecuencia_estado = new Relfrecesta();
  $rel_frecuencia_estado->idFrecuencia = $_REQUEST['idFrecuencia']; // IMPORTANTE!!!
    if (isset($_GET['Relfrecesta'])) {
        $rel_frecuencia_estado->attributes = $_GET['Relfrecesta'];
    }

$this->titulo='Frecuencia : '.$rel_frecuencia_estado->frecuencia->nombre.' - Estados ';

?>

<div class="col-md-6">

<div class="box box-primary">
    <div class="box-header">
    <h3 class="box-title"></h3>
     <a class="btn btn-primary" href="<?php echo URLRAIZ ?>/admin/relfrecesta/create?idFrecuencia=<?php echo $rel_frecuencia_estado->idFrecuencia?>" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Estado</a>

  <?php

   /* relacion */
    $this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
    'filter'=>$rel_frecuencia_estado,
    'type' => 'striped',
    'dataProvider'=>$rel_frecuencia_estado->search(),
    'responsiveTable' => true,
    'template'=>'{summary}{items}{pager}',
    'enablePagination' => true,
    'columns'=>array(
   
        array('name'=>'idEstado', 
           	  'value' => 'CHtml::link(isset($data->estado_rel)? $data->estado_rel->nombre:"--", Yii::app()->createUrl("admin/relfrecesta/update",array("id"=>$data->primaryKey,"idFrecuencia"=>$data->idFrecuencia)))',
           	  'header'=>'Estado',
            //'filter'=> CHtml::listData(Sectores::model()->findAll(array('order'=>'nombre')),'idSector','nombre'),
           	  'type'  => 'raw',
           ),

        'calculo',

      array(
      'htmlOptions' => array('nowrap'=>'nowrap'),
      'class'=>'booster.widgets.TbButtonColumn',
      'viewButtonUrl'=>'Yii::app()->createUrl("admin/relfrecesta/update?id=$data->idRelacion&idFrecuencia=$data->idFrecuencia" )',
      'updateButtonUrl'=>'Yii::app()->createUrl("admin/relfrecesta/update?id=$data->idRelacion&idFrecuencia=$data->idFrecuencia" )',
      )
     ),
    )
    );
?>



</div><!-- /.box-header -->
</div>       
</div>


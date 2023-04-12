<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->menu_noticias_l = $this->menu_noticias = 'active';

$this->breadcrumbs=array(
  'Noticias'=>array('admin'),
  'Administrador',
);

$this->titulo=' <i class="fa fa-fw fa-newspaper-o"></i> Noticias';

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $('#portada-grid').yiiGridView('update', {
    data: $(this).serialize()
  });
  return false;
});
");
?>

<div class="col-md-8">
<div class="box box-primary">
    <div class="box-header">
    <a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nueva Noticia</a>

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
      'header' => 'Imagen',
      'value'=>'$data->getImagenNoticia($data->idNoticia, "height:70px")',
      'type'=>'html',
      'headerHtmlOptions'=>array('width'=>'100px'),
      ),

    array(
       'name'=>'nombre',
       'value' => 'CHtml::link($data->nombre, Yii::app()->createUrl("admin/noticias/update",array("id"=>$data->primaryKey)))',
       //'headerHtmlOptions'=>array('width'=>'250px'),
       'type' => 'raw',
),

    array(
       'name'=>'orden',
       'value'=>'$data->orden',
        'headerHtmlOptions'=>array('width'=>'100px'),
        ),

     array(
          'class'=>'CButtonColumn',
          'template'=>'{galeria}',
          'header'=>'Galeria',
          'buttons'=>array
          (  
              'galeria' => array
              (    
                   'label'=>'', 
                   'options'=>array( 'class'=>'glyphicon glyphicon-picture' ),
                   'url'=>'Yii::app()->createUrl("admin/noticiasimagenes/admin", array("id"=>$data->idNoticia))',
              ),
            ),
      ),

     array(
          'class'=>'CButtonColumn',
          'template'=>'{videos}',
          'header'=>'Videos',
          'buttons'=>array
          (  
              'videos' => array
              (    
                   'label'=>'', 
                   'options'=>array( 'class'=>'glyphicon glyphicon-film' ),
                   'url'=>'Yii::app()->createUrl("admin/noticiasvideos/admin", array("idNoticia"=>$data->idNoticia))',
              ),
            ),
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
    'viewButtonUrl'=>'Yii::app()->createUrl("/admin/noticias/update?id=$data->idNoticia" )', // url de la acción 'update'
    )
    ),
    )
    );

?>

</div><!-- /.box-header -->
</div>  
</div>


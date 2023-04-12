<?php
/* @var $this NoticiasimagenesController */
/* @var $model Noticiasimagenes */

$this->breadcrumbs=array('Galeria');

$this->menu_noticias = 'active';

/* GALERIA */
  $galeria = new Noticiasimagenes();
  $galeria->idNoticia = $_REQUEST['id']; // IMPORTANTE!!!
    if (isset($_GET['Noticiasimagenes'])) {
        $galeria->attributes = $_GET['Noticiasimagenes'];
    }

$this->titulo='<i class="fa fa-fw fa-newspaper-o"></i> Galeria '.$galeria->noticia->nombre;

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#noticiasimagenes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="col-md-6">
<div class="box box-primary">
    <div class="box-header">
     <a class="btn btn-primary" href="<?php echo URLRAIZ ?>/admin/noticiasimagenes/create?idNoticia=<?php echo $galeria->idNoticia?>" role="button"><span class="glyphicon glyphicon-plus"></span> Nueva Imagen</a>

  <?php
   /* GALERIA */
    $this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
    'filter'=>$galeria,
    'type' => 'striped',
    'dataProvider'=>$galeria->search(),
    'responsiveTable' => true,
    'template'=>'{summary}{items}{pager}',
    'enablePagination' => true,
    'columns'=>array(
         array(
           	'name'=>'imagen',
            'filter'=>'',
            'type'=>'html',
			      'value'=>'(!empty($data->imagen))?CHtml::image(Yii::app()->baseUrl."/pics/noticias/".$data->imagen,"",array("style"=>"width:100px")):"no imagen"'),
          
         array(  
            'class' => 'booster.widgets.TbToggleColumn',
            'toggleAction' => 'noticiasimagenes/toggle',
            'name' => 'estado',
            'header' => 'Estado',
            'filter'=>array('1'=>'Activado','0'=>'Desactivado'),
        ),

        array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'booster.widgets.TbButtonColumn',
            'updateButtonUrl'=>'Yii::app()->createUrl("admin/noticiasimagenes/update?id=$data->idImagen&idNoticia=$data->idNoticia" )',
            'viewButtonUrl'=>'Yii::app()->createUrl("admin/noticiasimagenes/update?id=$data->idImagen&idNoticia=$data->idNoticia" )',
            )
    ),
    )
    );
?>

<div class="modal" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" z-index="9999999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

</div><!-- /.box-header -->
</div>       
</div>


<?php
/* @var $this NoticiasvideosController */
/* @var $model Noticiasvideos */

$this->breadcrumbs=array(
	'Videos'
);

$this->menu_noticias = 'active';

/* GALERIA */
  $galeria = new Noticiasvideos();
  $galeria->idNoticia = $_REQUEST['idNoticia']; // IMPORTANTE!!!
    if (isset($_GET['Noticiasvideos'])) {
        $galeria->attributes = $_GET['Noticiasvideos'];
    }

$this->titulo='<i class="fa fa-fw fa-newspaper-o"></i> Videos '.$galeria->noticia->nombre;

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

<div class="col-md-8">
<div class="box box-primary">
    <div class="box-header">
     <a class="btn btn-primary" href="<?php echo URLRAIZ ?>/admin/noticiasvideos/create?idNoticia=<?php echo $galeria->idNoticia?>" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Video</a>

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
       'name'=>'link',
       'value' => 'CHtml::link($data->link, Yii::app()->createUrl("admin/noticiasvideos/update",array(
       "id"=>$data->idVideo,
       "idNoticia"=>$data->idNoticia)
        ))',
       'headerHtmlOptions'=>array('width'=>'250px'),
       'type' => 'raw',
),
         array(  
            'class' => 'booster.widgets.TbToggleColumn',
            'toggleAction' => 'noticiasvideos/toggle',
            'name' => 'estado',
            'header' => 'Estado',
            'filter'=>array('1'=>'Activado','0'=>'Desactivado'),
        ),

        array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'booster.widgets.TbButtonColumn',
            'updateButtonUrl'=>'Yii::app()->createUrl("admin/noticiasvideos/update?id=$data->idVideo&idNoticia=$data->idNoticia" )',
            'viewButtonUrl'=>'Yii::app()->createUrl("admin/noticiasvideos/update?id=$data->idVideo&idNoticia=$data->idNoticia" )',
            )
    ),
    )
    );
?>



</div><!-- /.box-header -->
</div>       
</div>



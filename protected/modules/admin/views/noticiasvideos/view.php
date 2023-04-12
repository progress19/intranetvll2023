<?php
/* @var $this ActividadesvideosController */
/* @var $model Actividadesvideos */

$this->breadcrumbs=array(
	'Video Actividad'=>array('admin','id'=>$model->idActividad),
	$model->idVideo,
);

$this->titulo='Video Actividad : '. $model->actividad->nombre;
$this->menu_actividades = 'active';
?>

<div class="col-md-8">
<div class="box box-primary">
<div class="box-body">

<!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/lgZBsWGaQY0?autoplay=1"></iframe>
</div>

</div>
</div>
</div>


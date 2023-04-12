<?php
/* @var $this ActividadesimagenesController */
/* @var $model Actividadesimagenes */

//$this->layout='//layouts/';


$this->breadcrumbs=array(
	'Imagen Galeria Actividad'=>array('admin','id'=>$model->idActividad),
	$model->idImagen,
);

$this->titulo='Imagen Actividad : '. $model->actividad->nombre;
$this->menu_actividades = 'active';
?>

<div class="col-md-8">
<div class="box box-primary">
<div class="box-body">

<?php echo CHtml::image(Yii::app()->request->baseUrl.'/../pics/actividades/'.$model->imagen,"imagen", array('class'=>'img-responsive')); ?>  

</div>
</div>
</div>




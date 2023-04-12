<?php
/* @var $this UsuarioController */
/* @var $model Usuario */


/* $this->layout='column3';*/


$this->menu_usuarios = 'active';

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->username,
);

$this->titulo='Usuario '. $model->username;
?>

<div class="row">
<div class="col-md-8">
<div class="box box-primary">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		        array(
            'name'=>'username',
            'label'=>'Usuario'
            ),
		'apellido',
		'nombre',
		'estado',
	),
)); ?>
<div class="box-footer">
<br>
<?php
	echo CHtml::link('<span class="glyphicon glyphicon-trash"></span> Borrar', array('usuario/delete', 'id'=>$model->id),
	array(
	'submit'=>array('usuario/delete', 'id'=>$model->id),
	'class' => 'btn btn-danger','confirm'=>'Esta seguro de borrar el usuario?'
	));
?>

<?php
	echo CHtml::link('<span class="glyphicon glyphicon-edit"></span> Editar', array('usuario/update', 'id'=>$model->id),
	array(
	'submit'=>array('usuario/update', 'id'=>$model->id),
	'class' => 'btn btn-primary'
	));
?>
     
</div>

</div>
</div>


</div>


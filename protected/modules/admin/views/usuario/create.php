<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->menu_usuarios = 'active';
$this->menu_usuarios_n = 'active';

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<?php $this->titulo='<span class="glyphicon glyphicon-user"></span> Nuevo Usuario'; ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
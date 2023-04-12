<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->menu_usuarios = 'active';

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Editar',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);

$this->titulo='<span class="glyphicon glyphicon-user"></span> Editar Usuario '. $model->username;

?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this PersonalController */
/* @var $model Personal */

$this->menu_personal = 'active';

$this->breadcrumbs=array(
    'Personal'=>array('admin'),
    'Nuevo',
);

$this->titulo='<i class="fa fa-fw fa-users"></i> Formulario de Franco';

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
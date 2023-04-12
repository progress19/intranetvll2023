<?php

$this->menu_personal = 'active';

$this->titulo='<i class="fa fa-fw fa-users"></i> Formulario de Franco';

?>
<?php

$empleado = Personal::model()->findByPk($_REQUEST['id']);  

$this->breadcrumbs=array(
  'Administrador',);

?>  


<div class="col-md-12">  
<div class="box box-primary">
<div class="box-header">

<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
 
    <?php echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username') ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'password'); ?>
        <?php echo $form->passwordField($model,'password') ?>
    </div>
 
    <div class="row rememberMe">
        <?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe'); ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->

<?php 

echo '<strong>Apellido y Nombre : </strong>'.$empleado->nombre.'</br>';
echo '<strong>Sector : </strong>'.$empleado->sector_rel->nombre.'</br>';


 ?>


</div><!-- /.box-header -->
</div>
</div>





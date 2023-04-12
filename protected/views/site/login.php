<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->layout = '//layouts/login';

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);
?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
)
); ?>   

<div class="form-box" id="login-box">
    <div class="header">
        <p><h5>Bienvenido al Administrador de Intranet:</h5></p>
        <div class="conte-logo">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/laslenaslogo.jpg" style="width: 170px;">
        </div>          
        
    </div>
    <form action="../../index.html" method="post">

        <div class="body">

         <br>
         <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user" style="top:0px"></span>
            <?php echo $form->textField($model,'username', array('class' => 'form-control', 'placeholder' => 'Usuario' )); ?>
        </div>
        <?php echo $form->error($model,'username'); ?>
        <br>
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-lock" style="top:0px"></span>
            <?php echo $form->passwordField($model,'password',array('class' => 'form-control','placeholder' => 'Contraseña')); ?>

        </div>
        <?php echo $form->error($model,'password'); ?>

        <br>
        <div class="input-group">
            <input type="checkbox" name="remember_me"/> Recordar
        </div>
 
  <hr>                                                               
        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
            <span class="glyphicon glyphicon-log-in" aria-hidden="true"> </span>  &nbsp;  Login</button>  
        </div>
        <div class="clearfix"></div><br>
        <p><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/recuperar">
        <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span> &nbsp;Olvidé la contraseña</a></p>
  </div>
</form>

</div>

<?php $this->endWidget(); ?>


<?php
$this->layout = '//layouts/login';
$this->pageTitle=Yii::app()->name . ' - Login - Recuperar contraseña';
?>

<div class="form-box" id="login-box">
    <div class="header">
        <p><h5>Bienvenido al Administrador online de :</h5></p>
        <a href="login">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/laslenaslogo.jpg" style="width: 170px;">
        </a>
    </div>
    <div id="mensajeR"></div>    
    <form id="frmRecuperar" class="form-horizontal" role="form">

        <div class="body" id="a" style="min-height: 150px;">
        <br>
   
                <p>Por favor ingrese su nombre de usuario, recibirá un email informando la contraseña.</p>    
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="usuario" id="ContactUsuario" placeholder="Usuario">
                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="footer"> 
            <input type="hidden" class="form-control" name="url" id="URLRAIZ" value="<?php echo  Yii::app()->request->baseUrl ?>">                                                              

            <div class="col-md-6 col-md-offset-3" id='b'>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button><br> 
            </div>


        </div>
    </form>
</div>

<?php if(Yii::app()->user->hasFlash('recuperar')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('recuperar'); ?>
    </div>

<?php endif; ?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/forms.js"></script>




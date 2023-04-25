<?php $this->layout = '';?>

<div class="panel panel-primary">
    <div class="panel-heading horario-header">
    	<div class="col-md-4">
        <a href=" <?php echo URLRAIZ.'/lector' ?> "><img src="<?php echo URLRAIZ ?>/images/logo_las_lenas.png" style="height: 70px; margin-top:6px" alt=""></a>
       	</div>
    	<div class="col-md-8 pull-right">
    		<a href=" <?php echo URLRAIZ.'/lector' ?> "><h2 style="text-align: right;color: var(--color-f);">SISTEMA DE CONTROL HORARIO VLL</h2></a><span id="clock"></span>
    	</div>
    </div>
    <div class="panel-body">

		<div id="mensajeInicial" class="animated pulse">
			<img src="<?php echo URLRAIZ.'/images/hold_card-512.png'?>" style="margin:0 auto; height: 260px" alt="">
			<h1>Por favor,<BR> acercá la tarjeta al lector...</h1>
		</div>
	   	<div id="loading-card"></div>
    	<div id="datosEmpleado"></div>

        <img style='position: absolute;height: 132px;bottom:81px; right:44px' class='animated fadeIn' src='images/logo2023.jpg'>
    
    </div>
    
    <div class="panel-footer">Todos los derechos reservados por Valle de las Leñas S.A. - Desarrollado por ML.-

        <span style="float: right;right;color: var(--color-g);"><?php echo Puestos::getNombrePuestoIp(get_client_ip_env ()); ?></span>
        <input class="pull-right" type="text" name="idCard" id="idCard" onchange="buscarPersonalIdCard(this.value,2)" >
        <input class="pull-right" type="hidden" name="tipoUrl" id="tipoUrl" value="2" > <!-- 1 comedor / 2 horario -->
    </div>
    
</div>

<script>
    $(document).ready(function() {    
        document.getElementById("idCard").focus();
        $("#idCard").val('');
        autenticacion_time = setTimeout('recarga()', 7000)
        focusIdCarda = setInterval(focusIdCard, 3000);
        setInterval(recarga_horario, 7000000);  //recarga home cada 2 horas
        $('#popoverData').popover();
    });
</script>

<a href=""></a>
                    
<?php //echo get_client_ip_env();?>








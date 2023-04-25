<?php $this->layout = '';?>

<div class="panel panel-primary">
    
    <div class="panel-heading">
    	<div class="col-md-6">
    		<a href=" <?php echo URLRAIZ.'/lector' ?> "><img src="<?php echo URLRAIZ ?>/images/logo_las_lenas.png" style="height: 70px; margin-top:6px" alt=""></a>
       	</div>
    	<div class="col-md-6 pull-right">
    		<a href="<?php echo URLRAIZ.'/lector' ?>"><h2 style="text-align: right;color: var(--color-f);">INTRANET VLL</h2></a><span id="clock"></span>
    	</div>
    </div>
    <div class="panel-body">

    <script>
        //clearTimeout(autenticacion_time);
        //horario_time = setTimeout('recarga_horario()', 7000)
    </script>

    <div class="col-md-12" style="text-align: center; margin-top: 60px;">

        <h1 style='font-size:52px';>Hola, <span id='saludo'></span></h1>
        <h2>por favor, seleccioná una opción...</h2>
        <div class="divide80"></div>

        <div class="col-md-12">

            <a href="horario" type="button" class="btn move btn-opcion" autocomplete="off"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> HORARIO</a>

            <a href="comedor" type="button" class="btn move btn-opcion" autocomplete="off"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> COMEDOR</a>

        </div>

    </div>
    
    <img style='position: absolute;height: 159px;bottom:81px; right:44px' class='animated pulse' src='images/logo2023.jpg'>

</div>
    
    <div class="panel-footer">Todos los derechos reservados por Valle de las Leñas S.A. - Desarrollado por ML.-
        <span style="float: right;right;color: var(--color-g);"><?php echo Puestos::getNombrePuestoIp(get_client_ip_env ()); ?></span>
        <input class="pull-right" type="text" name="idCard" id="idCard" onchange="buscarPersonalIdCard(this.value,1)" >
        <input class="pull-right" type="hidden" name="tipoUrl" id="tipoUrl" value="1" > <!-- 1 comedor / 2 horario -->
    </div>
    
</div>

<script>
    $(document).ready(function() {    
        document.getElementById("idCard").focus();
        $("#idCard").val('');
        focusIdCarda = setInterval(focusIdCard, 3000);
        setInterval(recarga, 7000000);//recarga home cada 2horas
        $('#popoverData').popover();
    });

    // Obtenemos la hora del sistema
    var hora = new Date().getHours();

    // Obtenemos el elemento div donde queremos mostrar el saludo
    var divSaludo = document.getElementById('saludo');

    // Definimos los saludos según la hora del sistema
    var buenDia = 'buen día!';
    var buenasTardes = 'buenas tardes!';
    var buenasNoches = '¡buenas noches!';

    // Verificamos la hora y mostramos el saludo adecuado en el div
    if (hora >= 6 && hora < 12) {
    divSaludo.textContent = buenDia;
    } else if (hora >= 12 && hora < 18) {
    divSaludo.textContent = buenasTardes;
    } else {
    divSaludo.textContent = buenasNoches;
    }

</script>

<a href=""></a>
                    





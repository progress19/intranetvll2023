<?php $this->layout = '';?>

<div class="panel panel-primary">
    
    <div class="panel-heading">
    	<div class="col-md-6">
    		<a href=" <?php echo URLRAIZ.'/lector' ?> "><img src="<?php echo URLRAIZ ?>/images/logo_las_lenas.png" style="height: 79px;" alt=""></a>
       	</div>
    	<div class="col-md-6 pull-right">
    		<a href=" <?php echo URLRAIZ.'/lector' ?> "><h2 style="text-align: right;">INTRANET VLL</h2></a><span id="clock"></span>
    	</div>
    </div>
    <div class="panel-body">

<script>
    //clearTimeout(autenticacion_time);
    //horario_time = setTimeout('recarga_horario()', 7000)
</script>

<div class="col-md-12" style="text-align: center;">
    <div class="divide160"></div>

<h2>SELECCIONÁ LA OPCION...</h2>
<div class="divide80"></div>

<div class="col-md-12">

    <a href="horario" type="button" class="btn move btn-opcion" autocomplete="off"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> HORARIO</a>

    <a href="comedor" type="button" class="btn move btn-opcion" autocomplete="off"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> COMEDOR</a>

</div>

</div>

</div>
    
<div class="panel-footer">Todos los derechos reservados por Valle de las Leñas S.A. - Desarrollado por <a id="popoverData" class="" href="#" data-html="true"  data-content="<div><b>Análisis, desarrollo y programación : </b><br>Mauricio Lavilla - mauriciolav@gmail.com</div>" rel="popover" data-placement="top" data-original-title="" style="color: #000;" data-trigger="hover">ML</a>.-

<span style="float: right;"><?php echo Puestos::getNombrePuestoIp(get_client_ip_env ()); ?></span>

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

</script>

<a href=""></a>
                    





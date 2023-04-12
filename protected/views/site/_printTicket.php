<script>
	//setTimeout('recarga()',4000)
</script>
<?php $this->layout = '';?>
<?php 
$ticket = Tickets::model()->findByPk($idTicket);

switch ($ticket->tipo) {
	case '1':
		$tipo = "DESAYUNO";
		break;
	case '2':
		$tipo = "ALMUERZO";
		break;
	case '3':
		$tipo = "CENA";
		break;
}

?>

<div class="panel panel-primary">
    <div class="panel-heading">
    	<div class="col-md-6">
    		<a href=" <?php echo URLRAIZ.'/lector' ?> "><img src="<?php echo URLRAIZ ?>/images/logo_las_lenas.png" style="height: 79px;" alt=""></a>
       	</div>
    	<div class="col-md-6 pull-right">
    		<a href=" <?php echo URLRAIZ.'/lector' ?> "><h2 style="text-align: right;">SISTEMA COMEDOR VLL</h2></a><span id="clock"></span>
    	</div>
    </div>

<div class="panel-body">

	<div class="imprimiendo">	    	
    	<h2>IMPRIMIENDO...</h2>

		<img src="images/loading.gif" alt="" />

    	<h2>POR FAVOR, RETIRÁ TU TICKET AL FINALIZAR</h2>
    	<h2>GRACIAS!</h2>

	</div>
	<div class="divide20"></div>
		
		<div class="col-md-4 col-md-offset-4">

		<div class="ticket-contenedor">
		<div class="ticket" id="ticket">

	<div class="col-md-12" style="position: absolute; z-index: ">
		<img src="<?php echo URLRAIZ ?>/images/laslenaslogo_fondo.png" style="padding-top: 25px" class="img-responsive center-block">
	</div>

		<div class="col-md-12">
			<p style="font-size: 10pt; margin: 0;"><b>RRHH - VALLE DE LAS LEÑAS S.A.</b></p>
			<p style="font-size: 8pt; margin: 0; font-family: sans-serif;">Fecha : <?php echo Yii::app()->dateFormatter->format('dd-MM-y H:m',$ticket->fecha); ?>hs.</p>
			<div class="divide10"></div>
			
			<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">Ticket N° : <?php echo $ticket->idTicket; ?></p>
			<div class="divide10"></div>

			<p style="font-size: 10pt; margin: 0; font-family: sans-serif;"><?php echo $ticket->personal_rel->nombre; ?></p>
			<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">N° de Legajo : <?php echo $ticket->personal_rel->legajo; ?></p>
			<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">N° de Tarjeta : <?php echo $ticket->personal_rel->tarjetaId; ?></p>
			<div class="divide10"></div>

			<p style="font-size: 11pt; margin: 0; font-family: sans-serif;">Proveedor : <b><?php echo $ticket->proveedor_rel->nombre; ?></b></p>
			<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">Tipo : <?php echo $tipo; ?> </p>
			<div class="divide10"></div>

			<p style="font-size: 10pt; margin: 0; font-family: sans-serif;"><b>Consumos del período :</b></p>
			<p style="font-size: 9pt; margin: 0; font-family: sans-serif;">Desayunos : <?php echo $desayunos; ?> | Almuerzos : <?php echo $almuerzos; ?> | Cenas : <?php echo $cenas; ?></p>
			<p style="font-size: 9pt; margin: 0; font-family: sans-serif;">Saldo Desayunos : <?php echo $ticket->personal_rel->desayunos; ?> tickets.</p>
			<p style="font-size: 9pt; margin: 0; font-family: sans-serif;">Saldo Comidas : <?php echo $ticket->personal_rel->comidas; ?> tickets.</p>
			<br>

			<p style="font-size: 8pt; margin: 0; text-align: right; font-family: Arial;">&copy; IntranetVll ver 4.0 </p>
		</div>
		<div class="clearfix"></div>

		<br>

		</div>
		</div>

		</div>

    </div>
    
    <div class="panel-footer">Todos los derechos reservados por Valle de las Leñas S.A.</div>
    
</div>

<style>
	
</style>


<script>

function printDiv(nombreDiv) {
	var contenido = document.getElementById('ticket').innerHTML;
    var contenidoOriginal = document.body.innerHTML;
    document.body.innerHTML = contenido;
    window.print();
    document.body.innerHTML = contenidoOriginal;
}

//$(document).ready(function(){printDiv(ticket);})
//$(window).load(function() { printDiv(ticket) });

$(document).ready(function(){setTimeout(function(){printDiv(ticket);},2000);});

</script>


	


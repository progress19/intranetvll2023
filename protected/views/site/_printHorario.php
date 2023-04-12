<script>
	setTimeout('recarga_horario()',400000)
</script>
<?php $this->layout = '';?>

<?php 

$horario = Horarios::model()->findByPk($idHorario);

switch ($horario->idTipo) {
	case '1':
		$tipo = "ENTRADA";
		break;
	case '2':
		$tipo = "SALIDA";
		break;
	}

?>

<div class="panel panel-primary">
    <div class="panel-heading horario-header">
    	<div class="col-md-4">
    		<a href=" <?php echo URLRAIZ.'/horario' ?> "><img src="<?php echo URLRAIZ ?>/images/logo_las_lenas.png" style="height: 79px;" alt=""></a>
       	</div>
    	<div class="col-md-8 pull-right">
    		<a href=" <?php echo URLRAIZ.'/horario' ?> "><h2 style="text-align: right;">SISTEMA DE CONTROL HORARIO VLL</h2></a><span id="clock"></span>
    	</div>
    </div>

<div class="panel-body">

	<div class="imprimiendo">	    	
    	<h2>IMPRIMIENDO...</h2>

		<img src="images/loading.gif" alt="" />

    	<h2>POR FAVOR, RETIRÁ TU COMPROBANTE AL FINALIZAR</h2>
    	<h2>GRACIAS!</h2>

	</div>
	<div class="divide20"></div>
		
		<div class="col-md-4 col-md-offset-4">

		<div class="ticket-contenedor">
		<div class="ticket" id="ticket">

	<div class="col-md-12" style="position: absolute; z-index: 0">
		<img src="<?php echo URLRAIZ ?>/images/laslenaslogo_fondo.png" style="padding-top: 25px" class="img-responsive center-block">
	</div>

	<div class="col-md-12">
		

		<p style="font-size: 10pt; margin: 0;"><b>RRHH - VALLE DE LAS LEÑAS S.A.</b></p>
		<p style="font-size: 8pt; margin: 0; font-family: sans-serif;">Fecha : <?php echo Yii::app()->dateFormatter->format('dd-MM-y H:m',$horario->fecha); ?>hs.</p>
		<div class="divide10"></div>
		
		<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">Registro N° : <?php echo $horario->idHorario; ?></p>
		<div class="divide10"></div>

		<p style="font-size: 10pt; margin: 0; font-family: sans-serif;"><?php echo $horario->personal_rel->nombre; ?></p>
		<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">N° de Legajo : <?php echo $horario->personal_rel->legajo; ?></p>
		<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">N° de Tarjeta : <?php echo $horario->personal_rel->tarjetaId; ?></p>
		<div class="divide10"></div>


		<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">Día : <?php echo Yii::app()->dateFormatter->format('dd-MM-y',$horario->fecha); ?>.</p>
		<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">Hora : <?php echo Yii::app()->dateFormatter->format('H:m',$horario->fecha); ?>hs. </p>
		<p style="font-size: 10pt; margin: 0; font-family: sans-serif;">Opción : <?php echo $tipo; ?> </p>


		<div class="divide10"></div>

		<br>

		<p style="font-size: 8pt; margin: 0; text-align: right; font-family: Arial;">&copy; IntranetVll ver 4.0 </p>
	</div> <div class="clearfix"></div>

<br>

		</div>
		</div>

		</div>

    </div>
    
    <div class="panel-footer">Todos los derechos reservados por Valle de las Leñas S.A.
        
    </div>
    
</div>

<style>
	
</style>


<script>

function printDiv(nombreDiv) {
     var contenido= document.getElementById('ticket').innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}

$(document).ready(function(){printDiv(ticket);})

</script>


	


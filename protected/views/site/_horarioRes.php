<script>
	clearTimeout(autenticacion_time);
	clearTimeout(focusIdCarda);
	horario_time = setTimeout('recarga()', 7000) /* 7000 */
</script>

<div class="col-md-6 col-md-offset-3 tarjeta">

	<div class="col-md-3">

		<?php if ($empleado->foto): ?>
			<img id="foto-card" src="<?php echo URLRAIZ.'/pics/personal/'.$empleado->foto ?>" class="img-responsive" alt="">
		<?php else: ?>
			<img id="foto-card" src="<?php echo URLRAIZ.'/images/default-user.png'?>" class="img-responsive" alt="">
		<?php endif ?>
		
	</div>

	<div class="col-md-9">

		<h1><?php echo $empleado->nombre; ?></h1>
		<h4>N° Legajo : <?php echo $empleado->legajo; ?></h4>
		<h3>Sector : <?php echo $empleado->sector_rel->nombre; ?></h3>
	
		<h4 class="turnos-horario-info"> 
			<p><b>Turno mañana: </b>Entrada: (<?php echo $empleado->em ?>hs.) - Salida: (<?php echo $empleado->sm ?>hs.)</p>
			<p><b>Turno tarde: </b>Entrada: (<?php echo $empleado->et ?>hs.) - Salida: (<?php echo $empleado->st ?>hs.)</p>
		</h4>

	</div>

<input type="hidden" value="<?php echo $empleado->tarjetaId ?>" id="idCard_save">
<input type="hidden" value="<?php echo $empleado->legajo ?>" id="idLegajo_save">

</div>

<div class="clearfix"></div>

<div class="col-md-12" id="horarios" style="text-align: center;">

	<h2 style='margin-top:0'>Seleccioná la opción...</h2>
	<div class="divide20"></div>

	<div class="col-md-6 col-md-offset-0">

		<?php if ($em) {$class_btn_em = 'disabled';} else {$class_btn_em = '';} ?>
		<?php if ($sm) {$class_btn_sm = 'disabled';} else {$class_btn_sm = '';} ?>
		<?php if ($et) {$class_btn_et = 'disabled';} else {$class_btn_et = '';} ?>
		<?php if ($st) {$class_btn_st = 'disabled';} else {$class_btn_st = '';} ?>
			
		<h2 style='margin:0 0 20px 0'>Turno mañana</h2>
		
		<button type="button" onfocus="javascripts:selectHorario(this.value)" id="bot1" class="btn move btn-horarios" value="1" autocomplete="off" <?php echo $class_btn_em; ?>>
			<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Entrada <?php echo ($em != '') ? '('.$em.'hs)<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '';?>
		</button>

		<button type="button" onfocus="javascripts:selectHorario(this.value)" id="bot2" class="btn move btn-horarios" value="2" autocomplete="off" <?php echo $class_btn_sm; ?>>
			<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salida <?php echo ($sm != '') ? '('.$sm.'hs)<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '';?>
		</button>

	</div>

<div class="col-md-6">

	<h2 style='margin:0 0 20px 0'>Turno tarde</h2>

	<button type="button" onfocus="javascripts:selectHorario(this.value)" id="bot3" class="btn move btn-horarios" value="3" autocomplete="off" <?php echo $class_btn_et; ?>>
		<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Entrada <?php echo ($et != '') ? '('.$et.'hs)<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '';?>
	</button>

	<button type="button" onfocus="javascripts:selectHorario(this.value)" id="bot4" class="btn move btn-horarios" value="4" autocomplete="off" <?php echo $class_btn_st; ?>>
		<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salida <?php echo ($st != '') ? '('.$st.'hs)<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '';?>
	</button>

</div>

</div>

<br><br>

<script>

//$("#bot1").focus(); 

function selectHorario(id){

	$('#idTipo').val(id);
	$(".btn").removeClass('prove_seleccionado');
	$(".btn").addClass('prove_noseleccionado');
	$('#bot'+id).removeClass('prove_noseleccionado');
	$('#bot'+id).addClass('prove_seleccionado');
	$('#bot'+id).addClass('animated pulse');

}

/* evento con click */

$('.btn-horarios').click(function() {
	clearTimeout(horario_time);

	var idTipo = $('#idTipo').val();
	var idCard = $('#idCard_save').val();
	var idLegajo = $('#idLegajo_save').val();
	$('#horarios').html('<img src="images/loading.gif" style="padding-top: 100px;" alt="" />');
	$.ajax({   
		url: "site/saveHorario",
		data: "idTipo="+idTipo+"&idCard="+idCard+"&idLegajo="+idLegajo,      
		success: function(datos){   
			$('#horarios').html('<h1 style="margin-top:50px;text-align: center !important;"><i class="glyphicon glyphicon-ok"></i><br /><br />Se registró el horario correctamente.</h1>');
			setTimeout('recarga()', 2000) //2000
		} 
	});
})

/* evento teclado */
	
$(document).keydown(
    function(e)  {    

    	$('.move').removeClass('animated pulse');

    	if (e.keyCode==13) {  //enter
    		//alert($('#idTipo').val());
            clearTimeout(horario_time);
            var idCard = $('#idCard_save').val();
            var idTipo = $('#idTipo').val();
            var idLegajo = $('#idLegajo_save').val();
            $('#horarios').html('<img src="images/loading.gif" style="padding-top: 100px;" alt="" />');
            $.ajax({   
                url: "site/saveHorario",
                data: "idCard="+idCard+"&idTipo="+idTipo+"&idLegajo="+idLegajo,     
                success: function(datos){   
                    //setTimeout(function() { $('.home-page').html(datos) },100)
			    } 
            });
    	}

        if (e.keyCode == 39) {    
            $(".move:focus").next().focus();
        }
        if (e.keyCode == 37) {   
            $(".move:focus").prev().focus();
        }
    }
);

</script>

<input type="hidden" id="idTipo">









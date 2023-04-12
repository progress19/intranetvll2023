<script>
	clearTimeout(autenticacion_time);
	clearTimeout(focusIdCarda);
	horario_time = setTimeout('recarga()', 7000) /* 7000 */
</script>

<div class="col-md-8 col-md-offset-2 tarjeta">

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
		<hr>

		<div class="col-md-12">
			<h4 class="turnos-horario-info"> 
				
				<p><b>Turno mañana: </b>Entrada: (<?php echo $empleado->em ?>hs.) - Salida: (<?php echo $empleado->sm ?>hs.)</p>

				<p><b>Turno tarde: </b>Entrada: (<?php echo $empleado->et ?>hs.) - Salida: (<?php echo $empleado->st ?>hs.)</p>

			</h4>
		</div>

	</div>

</div>

<div class="clearfix"></div>

<div class="col-md-12" style="text-align: center;">

	<div class="divide20"></div>

		<h1 style="color: red; text-align: center !important; font-size: 80px;"><i class="fas fa-exclamation"></i></h1> 
		<h1 style="text-align: center !important;"><?php echo $msgNo; ?></h1>
		

		<?php if ($msg_noPuestos): ?>
			<h2><?php echo $msg_noPuestos; ?></h2>
		<?php endif ?>

		<?php if ($puestosOk): ?>
			<h3>Por favor, dirijite a : </h3>
			<h2><?php echo $puestosOk; ?></h1>
			<h3>para registrar tus horarios.Gracias!</h3>	
		<?php endif ?>
		
	</div>

<br><br>











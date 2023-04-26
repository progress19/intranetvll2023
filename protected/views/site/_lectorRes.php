<script>
	clearTimeout(inicioComedor);
	clearTimeout(focusIdCarda);
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
		<h4>Legajo:<?php echo $empleado->legajo; ?> | <?php echo $empleado->sector_rel->nombre; ?></h4>
		<div style='border-top:1px solid #555; padding-bottom:15px'></div>
		<div class="row">
			<div class="col-md-7">
				<h4 class="turnos-info"> 
					<p class="<?php echo ($horario_corr == 1) ? 'active-turno' : '' ?>">
					Desayuno: <?php echo $empleado->desayuno_desde.' a '.$empleado->desayuno_hasta; ?> 
					</p> 
					<p class="<?php echo ($horario_corr == 2) ? 'active-turno' : '' ?>">
					Almuerzo: <?php echo $empleado->almuerzo_desde.' a '.$empleado->almuerzo_hasta; ?> 
					</p>
					<p class="<?php echo ($horario_corr == 3) ? 'active-turno' : '' ?>">
					Cena: <?php echo $empleado->cena_desde.' a '.$empleado->cena_hasta; ?>
					</p>
				</h4>
			</div>

			<div class="col-md-5" style="text-align: center;">
				<h4>Desayunos <span class="badge <?php echo ($empleado->desayunos > 5) ? 'badge-green' : 'badge-red' ?>"><?php echo $empleado->desayunos; ?></span></h4>
				<h4>Comidas <span class="badge <?php echo ($empleado->comidas > 5) ? 'badge-green' : 'badge-red' ?>"><?php echo $empleado->comidas; ?></span>
				</h4>
			</div>
		</div>

	</div>

<input type="hidden" value="<?php echo $horario_corr ?>" id="idTipo_save">
<input type="hidden" value="<?php echo $empleado->tarjetaId ?>" id="idCard_save">
<input type="hidden" value="<?php echo $empleado->legajo ?>" id="idLegajo_save">

</div>

<div class="clearfix"></div>

<div id="proveedores"></div>

<!-- CONTRASEÑA -->

<br><br>

<div class="mensaje-comedor">

	<?php if ($asistencia_comida > 0): //compruebo ultimo estado de asistencia ?>

		<?php if ($horario_corr > 0): //compruebo si corresponde horario para generar - 0 no ?>
			
			<?php if ($saldo==1): // si tiene saldo... ?>

				<?php if ($simultaneos==1): ?>
				
				<div class="col-md-10 col-md-offset-1" id="conte-keypad">
					<div class="col-md-6">
						<?php echo $this->renderPartial('_keypad', array('tarjetaId' => $empleado->tarjetaId));?>
					</div>	
					
					<div class="col-md-6">	
						<?php echo $this->renderPartial('_autenticacion', array('tarjetaId' => $empleado->tarjetaId, 'app' => 1));?>
					</div>
				</div>
				
				<?php else: ?>
				
					<div class="col-md-12 center">
						<i class="fas fa-thumbs-down" style="font-size: 85px; color: white"></i><br><br>
						<h2 class="center">Ya generaste la cantidad de tickets</h2>
						<h2 class="center">permitidos para este turno.</h2>
					</div> 

				<script>setInterval('recarga()',7000)</script>
				
				<?php endif ?> <!-- if simultaneos -->	

				<?php else: // si no tiene saldo... ?> 

					<div class="col-md-12 center">
						<i class="fas fa-thumbs-down" style="font-size: 85px; color: white"></i><br><br>
						<h2 class="center">Saldo insuficiente para generar el ticket.</h2>
					</div>

					<script>setInterval('recarga()',5000)</script>

			<?php endif ?> <!-- if si tiene saldo -->

		<?php else: // si no corresponde horario ?>

			<div class="col-md-12 center">
				<i class="fas fa-ban" style="font-size: 85px; color: white"></i><br><br>
				<h2>Según la hora actual, no puedes generar un ticket.</h2>
			</div>

			<script>setInterval('recarga()',5000)</script>

		<?php endif // if de si corresponde horario ?>	

	<?php else: // si no corresponde generar ticket segun estado de asistencia ?>

		<div class="col-md-12 center">
			<i class="fas fa-ban" style="font-size: 85px; color: white"></i><br><br>
			<h2>Según tu estado actual de asistencia (<b><?php echo $empleado->estado_rel->nombre ?></b>)</h2>
			<h2>no tienes permitido generar tickets.</h2>
		</div>

		<script>setInterval('recarga()',6500)</script>

	<?php endif // if segun estado asistencia ?>	

</div>









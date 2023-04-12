<script>
	clearTimeout(focusIdCarda);
</script>

<?php if ($app==1): ?>

	<script>autenticacion_time = setInterval('recarga()',12000);</script>

<?php else: ?>

	<script>autenticacion_time = setInterval('recarga_horario()',12000);</script>
	
<?php endif ?>

<div id="mensajes">
	<h2></h2>
	<div id="errorPass"></div>
</div>

<div id="autenticacion">
	<div class="col-md-12">
		<input type="password" style="width: 70%" name="pass" id="pass" tabindex="1" onchange="autenticacion(<?php echo $tarjetaId; ?>,this.value)" autofocus="autofocus" />

	</div>
</div>





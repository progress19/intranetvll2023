<script>setInterval('recarga()',6000)</script>

<?php if ($app==1): ?>

	<script>setInterval('recarga()',6000);</script>

<?php else: ?>

	<script>setInterval('recarga_horario()',6000);</script>
	
<?php endif ?>

<div class="col-md-12 noCardFind">
	<i class="fas fa-exclamation" style="color: red"></i>
	<h2 style="text-align: center !important;">NO SE ENCONTRÓ PERSONAL ASOCIADO A ESTA TARJETA.</h2>
</div>
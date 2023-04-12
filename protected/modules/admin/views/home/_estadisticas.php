<?php date_default_timezone_set('America/Mendoza'); ?>

<?php 
	$wfec = explode("-",Yii::app()->user->fecha);
	$fecha = "$wfec[2]-$wfec[1]-$wfec[0]";
 ?>

<div class="col-md-9">

      	<span class="text15"><h4>Estadisticas para el día : <b><?php echo $fecha; ?></b></h4></span><hr>

		<?php 

			echo '<h4>Total Personal : <strong>'.$total_empleados.'</strong></h4>';
			echo '<h4>Total Personal Corporativo Activo: <strong>'.$total_empleados_co.'</strong></h4>';
			echo '<h4>Total Personal No Corporativo Activo: <strong>'.$total_empleados_no_co.'</strong></h4>';
			//echo '<h4>Total Personal Activo : <strong>'.$activos.'</strong></h4></br>';

			foreach ($estados_array as $key => $estado ) {
				
				if ($estado>0) {
					echo '<h4>'.$key.' : <strong>'.$estado.'</strong></h4>';	
				}
				
			}

		 ?>

</div>	

<div class="clearfix"></div>
<hr>

<h5><strong><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Última actualización : </strong><?php echo Yii::app()->user->ultima_act; ?></h5>

<div class="clearfix"></div>


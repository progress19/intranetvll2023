<link id="theme-style" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
<?php $this->layout='no'; ?>
<br>
<body onload="window.print();">

<?php 
if ($_REQUEST['FrancoForm']['tipo']=='Franco Simple' OR $_REQUEST['FrancoForm']['tipo']=='Franco Interno') {
 	
 	$saldo = $_REQUEST['FrancoForm']['francos'] - $_REQUEST['FrancoForm']['dias']; 
 
 } else {

 	$saldo = $_REQUEST['FrancoForm']['francos']; 

 }
?>

<div class="container body-franco">

	<div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">

	<div class="col-md-12" style="position: absolute; z-index: -1">
		<img src="<?php echo URLRAIZ ?>/images/laslenaslogo-franco.jpg" class="img-responsive center-block">
	</div>

	<div class="col-xs-5">
		<img src="<?php echo URLRAIZ.'/images/logo_las_lenas.png' ?>" alt="">
	</div>

	<div style="text-align: center; padding-top: 7px; font-size: 14px;" class="col-xs-5">
		Malarg&#252;e, <?php 
		$hoy = date("d-m-Y");	
		echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($hoy,'long',null));  
		?>.
	</div>

	<div class="col-xs-2">
	<div class="or-dup">
		ORIGINAL
	</div>
	</div>
	<div class="clearfix"></div>

	<div class="divider15"></div>
	
	<div class="col-md-12">
		<div class="img-fondo-titulo">
			<img src="<?php echo URLRAIZ ?>/images/gris.jpg" style="width: 100%; height: 20px;">
		</div>
		<div class="col-xs-12 titulo-franco">DATOS LICENCIA</div>	
	</div>
	<div class="clearfix"></div>
	<div class="divider15"></div>
	
	<div class="col-xs-12"><strong>SECTOR : </strong><?php echo $_REQUEST['FrancoForm']['sector']; ?></div>

	<div class="col-xs-5"><strong>NOMBRE : </strong><?php echo $_REQUEST['FrancoForm']['nombre']; ?></div>
	<div class="col-xs-3"><strong>LEGAJO : </strong><?php echo $_REQUEST['FrancoForm']['legajo']; ?></div>
	<div class="col-xs-4"><strong>FIRMA : </strong></div>

	<div class="clearfix"></div>

	<div class="col-xs-4"><strong>LICENCIA : </strong><?php echo $_REQUEST['FrancoForm']['tipo']; ?></div>
	<div class="col-xs-4"><strong>DIAS : </strong><?php echo $_REQUEST['FrancoForm']['dias']; ?></div>

	<div class="col-xs-6"><strong>OBSERVACIONES : </strong><?php echo $_REQUEST['FrancoForm']['obs']; ?></div>
	<div class="clearfix"></div>

	<div class="col-xs-4"><strong>DESDE : </strong><?php echo $_REQUEST['FrancoForm']['desde']; ?></div>
	<div class="col-xs-4"><strong>HASTA : </strong><?php echo $_REQUEST['FrancoForm']['hasta']; ?></div>
	<div class="col-xs-4"><strong>REGRESO : </strong><?php echo $_REQUEST['FrancoForm']['regreso']; ?></div>
	<div class="clearfix"></div>

	<div class="divider15"></div>
	<div class="col-md-12">
		<div class="img-fondo-titulo">
			<img src="<?php echo URLRAIZ ?>/images/gris.jpg" style="width: 100%; height: 20px;">
		</div>
		<div class="col-xs-12 titulo-franco">AUTORIZACIONES</div>	
	</div>
	<div class="clearfix"></div>
	<div class="divider30"></div>
	
	<div class="col-xs-6"><strong>RESPONSABLE SECTOR : </strong></div>
	<div class="col-xs-6"><strong>RECURSOS HUMANOS : </strong></div>
	<div class="clearfix"></div>

	<div class="divider15"></div>
	<div class="col-md-12">
		<div class="img-fondo-titulo">
			<img src="<?php echo URLRAIZ ?>/images/gris.jpg" style="width: 100%; height: 20px;">
		</div>
		<div class="col-xs-12 titulo-franco">SALDOS</div>	
	</div>
	<div class="clearfix"></div>
	<div class="divider15"></div>

	<div class="col-xs-5"><strong>FRANCOS AL REGRESO : </strong><?php echo $saldo; ?> d&#237;as.</div>
	<div class="col-xs-7"><strong>FIRMA Y FECHA RECEPCION RRHH : </strong></div>
	<div class="clearfix"></div>

	</div>

<!-- DUPLICADO               ################################################################################## -->
<div class="clearfix"></div>
<div class="divider30"></div>
<div style="border-width: 1px; border-style: dashed; border-color: red; "></div> 
<div class="divider15"></div>
<div class="clearfix"></div>


	<div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">

	<div class="col-md-12" style="position: absolute; z-index: -1">
		<img src="<?php echo URLRAIZ ?>/images/laslenaslogo-franco.jpg" class="img-responsive center-block">
	</div>

	<div class="col-xs-5">
		<img src="<?php echo URLRAIZ.'/images/logo_las_lenas.png' ?> " alt="">
	</div>

	<div style="text-align: center; padding-top: 7px; font-size: 14px;" class="col-xs-5">
		Malarg&#252;e, <?php 
		$hoy = date("d-m-Y");	
		echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($hoy,'long',null));  
		?>.
	</div>

	<div class="col-xs-2">
	<div class="or-dup">
		DUPLICADO
	</div>
	</div>
	<div class="clearfix"></div>

	<div class="divider15"></div>
	
	<div class="col-md-12">
		<div class="img-fondo-titulo">
			<img src="<?php echo URLRAIZ ?>/images/gris.jpg" style="width: 100%; height: 20px;">
		</div>
		<div class="col-xs-12 titulo-franco">DATOS LICENCIA</div>	
	</div>
	<div class="clearfix"></div>
	<div class="divider15"></div>
	
	<div class="col-xs-12"><strong>SECTOR : </strong><?php echo $_REQUEST['FrancoForm']['sector']; ?></div>

	<div class="col-xs-5"><strong>NOMBRE : </strong><?php echo $_REQUEST['FrancoForm']['nombre']; ?></div>
	<div class="col-xs-3"><strong>LEGAJO : </strong><?php echo $_REQUEST['FrancoForm']['legajo']; ?></div>
	<div class="col-xs-4"><strong>FIRMA : </strong></div>

	<div class="clearfix"></div>

	<div class="col-xs-4"><strong>LICENCIA : </strong><?php echo $_REQUEST['FrancoForm']['tipo']; ?></div>
	<div class="col-xs-4"><strong>DIAS : </strong><?php echo $_REQUEST['FrancoForm']['dias']; ?></div>

	<div class="col-xs-6"><strong>OBSERVACIONES : </strong><?php echo $_REQUEST['FrancoForm']['obs']; ?></div>
	<div class="clearfix"></div>

	<div class="col-xs-4"><strong>DESDE : </strong><?php echo $_REQUEST['FrancoForm']['desde']; ?></div>
	<div class="col-xs-4"><strong>HASTA : </strong><?php echo $_REQUEST['FrancoForm']['hasta']; ?></div>
	<div class="col-xs-4"><strong>REGRESO : </strong><?php echo $_REQUEST['FrancoForm']['regreso']; ?></div>
	<div class="clearfix"></div>

	<div class="divider15"></div>
	<div class="col-md-12">
		<div class="img-fondo-titulo">
			<img src="<?php echo URLRAIZ ?>/images/gris.jpg" style="width: 100%; height: 20px;">
		</div>
		<div class="col-xs-12 titulo-franco">AUTORIZACIONES</div>	
	</div>
	<div class="clearfix"></div>
	<div class="divider30"></div>
	
	<div class="col-xs-6"><strong>RESPONSABLE SECTOR : </strong></div>
	<div class="col-xs-6"><strong>RECURSOS HUMANOS : </strong></div>
	<div class="clearfix"></div>

	<div class="divider15"></div>
	<div class="col-md-12">
		<div class="img-fondo-titulo">
			<img src="<?php echo URLRAIZ ?>/images/gris.jpg" style="width: 100%; height: 20px;">
		</div>
		<div class="col-xs-12 titulo-franco">SALDOS</div>	
	</div>
	<div class="clearfix"></div>
	<div class="divider15"></div>

	<div class="col-xs-5"><strong>FRANCOS AL REGRESO : </strong><?php echo $saldo; ?> d&#237;as.</div>
	<div class="col-xs-7"><strong>FIRMA Y FECHA RECEPCION RRHH : </strong></div>
	<div class="clearfix"></div>

	</div>

</div> <!-- container -->


<br><br>
</body>


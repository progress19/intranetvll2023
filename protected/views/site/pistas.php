<?php $this->layout = '//layouts/'; ?>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pistas.css">

<div class="logo-imperial">
	<img src="<?php echo URLRAIZ ?>/images/logo-imperial.png" alt="" width="300px" >
</div>

<div class="contenedor">
	<div class="container-fluid fondo">

		<div class="jumbotron">

			<div id="s1_cs1"></div>
			<div id="s2"></div>
			<div id="s3"></div>

		</div>
	</div>	
</div>

<div class="div-fondo">
	
<div class="marco-top-left"></div>
<div class="marco-top-right"></div>
<div class="marco-right"></div>	
<div class="marco-bottom"></div>	
<div class="marco-left"></div>

<div class="logo-lenas">
	<img src="<?php echo URLRAIZ ?>/images/logo_las_lenas.png" alt="">
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pistas.js" type="text/javascript"></script> 

<script>
	go();
	recarga();
</script>

</div>
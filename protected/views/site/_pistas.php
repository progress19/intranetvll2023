<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css">

<div class="col-md-6">
<h1>SECTOR I</h1>
<div class="table-responsive">
<table class="tg table">

  <tr>
    <th class="tg-031e" style="width: 400px">PISTA</th>
    <th class="tg-031e">ESTADO</th>
    <th class="tg-031e">NIEVE</th>
  </tr>

  <?php foreach ($pistas_s1 as $pista): ?>

  <tr>
    <td class="tg-031e"><?php echo $pista->nombre ?></td>
    <td class="tg-031e">
    	<div class="es"><?php echo $pista->estados_rel->nombre_es ?></div>
    	<div class="en"><?php echo $pista->estados_rel->nombre_en ?></div>
    </td>
    <td class="tg-031e">
    	<div class="es"><?php echo $pista->tipo_rel->nombre_es ?></div>
    	<div class="en"><?php echo $pista->tipo_rel->nombre_en ?></div>
    </td>
  </tr>

<?php endforeach ?>

</table>
</div>

</div>


<div class="col-md-6">
<h1>CONEXION SECTOR I</h1>
<div class="table-responsive">

<table class="tg table">

  <tr>
    <th class="tg-031e" style="width: 450px">PISTA</th>
    <th class="tg-031e">ESTADO</th>
    <th class="tg-031e">NIEVE</th>
  </tr>

  <?php foreach ($pistas_c1 as $pista): ?>

  <tr>
    <td class="tg-031e"><?php echo $pista->nombre ?></td>
    <td class="tg-031e">
    	<div class="es"><?php echo $pista->estados_rel->nombre_es ?></div>
    	<div class="en"><?php echo $pista->estados_rel->nombre_en ?></div>
    </td>
    <td class="tg-031e">
    	<div class="es"><?php echo $pista->tipo_rel->nombre_es ?></div>
    	<div class="en"><?php echo $pista->tipo_rel->nombre_en ?></div>
    </td>
  </tr>

<?php endforeach ?>

</table>
</div>
</div>

<style type="text/css">
.tg  {
	border-collapse:collapse;
	border-spacing:0;
	border-color:#aaa;
}

.tg td {
	font-family:Arial, sans-serif;
	font-size:29px;
	padding:10px 5px;
	border-style:solid;
	border-width:0px;
	overflow:hidden;
	word-break:normal;
	border-top-width:1px;
	border-bottom-width:1px;
	border-color:#aaa;
	color:#333;
	background-color:transparent;
}

.tg th{font-family:Arial, sans-serif;font-size:17px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:#aaa;color:#fff;background-color:#f38630;}

.table td {
	/*width: 30px;*/
}

table {
	table-layout: fixed;
}

</style>
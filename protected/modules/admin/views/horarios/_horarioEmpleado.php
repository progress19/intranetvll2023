<link id="theme-style" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
<?php $this->layout='no'; ?>

<body onload="window.print();">

<div class="container">
<div class="col-md-8">
    
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-lboi{border-color:inherit;text-align:left;vertical-align:middle; width: 10%}
.tg .tg-9wq8{border-color:inherit;text-align:left;vertical-align:middle; width: 40%}
.tg .tg-egj9{font-size:14px;border-color:inherit;text-align:right;vertical-align:middle;width: 50%}
</style>

<table class="tg">
  <tr>
    
    <th class="tg-lboi" style="border: 0">
        <img src="<?php echo URLRAIZ ?>/images/laslenaslogo.jpg" class="img-responsive" style="padding-top: 5px;width: 80px;" alt="">
    </th>
    
    <th class="tg-9wq8" style="border: 0">
         <p><h4>VALLE DE LAS LEÑAS S.A.</h4></p>
        <p>CUIT : 30-58962293-2</p>    
    </th>
    
    <th class="tg-egj9" style="border: 0">
        
        <h4><b>Informe Control Horario.</b></h4>
        <h5>Desde el <b><?php echo Yii::app()->dateFormatter->format("dd-MM-yyyy", $desde); ?></b> hasta el <b><?php echo Yii::app()->dateFormatter->format("dd-MM-yyyy", $hasta) ?></b></h5>

    </th>
  
  </tr>
</table>

<div class="clearfix"></div>
<hr>

<div class="col-md-12">
    <p><b>Apellido y Nombre: </b><?php echo $empleado->nombre ?></p>  
    <p><b>CUIL: </b><?php echo $empleado->cuil ?></p>
    <p><b>N° de legajo: </b><?php echo $empleado->legajo ?></p>    
</div>

<table class="tg table tabla-ticket">
  
  <tr>
    <th class="tg-8m2u">Fecha</th>
    <th class="tg-7btt">Entrada Mañana<br></th>
    <th class="tg-7btt">Salida Mañana<br></th>
    <th class="tg-7btt">Entrada Tarde</th>
    <th class="tg-7btt">Salida Tarde</th>
  </tr>
    
<?php foreach ($registros as $registro): ?>

  <tr>
    
    <td class="tg-us36"><?php echo Yii::app()->dateFormatter->format("dd-MM-yyyy", $registro->fecha); ?></td>
    
    <td style="text-align: right"><?php echo ($registro->em>0) ? date("H:i",$registro->em).'hs' : '-'; ?></td>
    <td style="text-align: right"><?php echo ($registro->sm>0) ? date("H:i",$registro->sm).'hs' : '-'; ?></td>
    
    <td style="text-align: right"><?php echo ($registro->et>0) ? date("H:i",$registro->et).'hs' : '-'; ?></td>
    <td style="text-align: right"><?php echo ($registro->st>0) ? date("H:i",$registro->st).'hs' : '-'; ?></td>

  </tr>

<?php endforeach ?>

</table>

<br>

<table>
  <tr>
    <th style="width: 80%">
        <br>
        <p>Copia retirada por el empleado.</p><br>
        <p>Firma:</p>
        <p>Aclaración:</p>
        <p>Fecha:</p>
        <p>Hora:</p>
    </th>

    <th>
        <img src="<?php echo URLRAIZ ?>/images/firma-horario.jpg" class="img-responsive" style="width: 180px;" alt=""> 
    </th>

  </tr>
</table>


<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#111;}
.tg .tg-8m2u{font-weight:bold;border-color:#444}
.tg .tg-us36{border-color:inherit;vertical-align:top;text-align: right;}
.tg .tg-2ffh{background-color:#26ade4;color:#ffffff;border-color:#444;text-align:center;vertical-align:top}
.tg .tg-7btt{font-weight:bold;border-color:#444;text-align:center;vertical-align:top}
.tg .tg-wp0h{background-color:#26ade4;color:#ffffff;border-color:#444;vertical-align:top}
.tg .tg-pl2q{font-weight:bold;background-color:#26ade4;color:#ffffff;border-color:#444;text-align:center;vertical-align:top}
p {line-height: 1}
table {line-height: 1;}

.table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 8px;
    line-height: 1;
    vertical-align: top;
    border-top: 1px solid #ddd;
}

</style>

</body>

<style>
    .estadis {text-align: right;}
</style>
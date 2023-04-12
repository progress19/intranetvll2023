<link id="theme-style" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
<?php $this->layout='no'; ?>

<body onload="window.print();">

    <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-8m2u{font-weight:bold;border-color:#444}
.tg .tg-us36{border-color:inherit;vertical-align:top;text-align: right;}
.tg .tg-2ffh{background-color:#26ade4;color:#ffffff;border-color:#444;text-align:center;vertical-align:top}
.tg .tg-7btt{font-weight:bold;border-color:#444;text-align:center;vertical-align:top}
.tg .tg-wp0h{background-color:#26ade4;color:#ffffff;border-color:#444;vertical-align:top}
.tg .tg-pl2q{font-weight:bold;background-color:#26ade4;color:#ffffff;border-color:#444;text-align:center;vertical-align:top}
</style>

<div class="container">
<div class="col-md-8">

<div class="col-md-4" style="padding: 0;">
	<img src="<?php echo URLRAIZ ?>/images/logo_intranet-negro.png" class="img-responsive" style="padding-top: 5px;" alt="">
</div>

<div class="col-md-8" style="text-align: right;">
	<h4><b>Resumen de Tickets por Proveedor.</b></h4>
	<h5>Desde el <b><?php echo Yii::app()->dateFormatter->format("dd-MM-yyyy", $desde); ?></b> hasta el <b><?php echo Yii::app()->dateFormatter->format("dd-MM-yyyy", $hasta) ?></b></h5>
</div>


<table class="tg table tabla-ticket">
  <tr>
    <th class="tg-8m2u" rowspan="2">Proveedor</th>
    <th class="tg-7btt" colspan="3">Desayunos<br></th>
    <th class="tg-7btt" colspan="3">Almuerzos<br></th>
    <th class="tg-7btt" colspan="3">Cenas</th>
    <th class="tg-7btt" colspan="3">Total Comidas</th>
  </tr>
  <tr>
    <td class="tg-2ffh">Corp.</td>
    <td class="tg-wp0h">NoCorp</td>
    <td class="tg-pl2q">Total</td>
    <td class="tg-2ffh">Corp.</td>
    <td class="tg-wp0h">NoCorp</td>
    <td class="tg-pl2q">Total</td>
    <td class="tg-2ffh">Corp.</td>
    <td class="tg-wp0h">NoCorp</td>
    <td class="tg-pl2q">Total</td>
    <td class="tg-2ffh">Corp.</td>
    <td class="tg-wp0h">NoCorp</td>
    <td class="tg-pl2q">TOTAL</td>
  </tr>
  


<?php 


$tot_desayunos_corp = 0;
$tot_desayunos_nocorp = 0;
$total_desayunos_corp = 0;
$total_desayunos_nocorp = 0;

$tot_almuerzos_corp = 0;
$tot_almuerzos_nocorp = 0;
$total_almuerzos_corp = 0;
$total_almuerzos_nocorp = 0;

$tot_cenas_corp = 0;
$tot_cenas_nocorp = 0;
$total_cenas_corp = 0;
$total_cenas_nocorp = 0;

$total = 0; ?>
  
<?php foreach ($proveedores as $proveedor): ?>

  <tr>
    <td class="tg-us36"><?php echo $proveedor->nombre ?></td>

    <!-- DESAYUNOS -->

    <td class="tg-us36"> <!-- Des Corp -->
        <?php 
            $desayunos_corp = Tickets::getComProveedor($proveedor->idProveedor, $desde, $hasta, 1,1); 
            $tot_desayunos_corp = $tot_desayunos_corp + $desayunos_corp;

            echo ($desayunos_corp>0 ? $desayunos_corp : '-');
        ?>
    </td> 
    
    <td class="tg-us36"> <!-- Des No Corp -->
        <?php 
            $desayunos_nocorp = Tickets::getComProveedor($proveedor->idProveedor, $desde, $hasta, 1,0); 
            $tot_desayunos_nocorp = $tot_desayunos_nocorp + $desayunos_nocorp;

            echo ($desayunos_nocorp>0 ? $desayunos_nocorp : '-');
        ?>
    </td>
    <td class="tg-us36">
        <?php echo ($tot_desayunos_corp+$tot_desayunos_nocorp>0 ? $tot_desayunos_corp+$tot_desayunos_nocorp : '-');?>
    </td>
 

<!-- ALMUERZOS -->

    <td class="tg-us36"> <!-- Alm Corp -->
        <?php 
            $almuerzos_corp = Tickets::getComProveedor($proveedor->idProveedor, $desde, $hasta, 2,1); 
            $tot_almuerzos_corp = $tot_almuerzos_corp + $almuerzos_corp;

            echo ($almuerzos_corp>0 ? $almuerzos_corp : '-');
        ?>
    </td> 
    
    <td class="tg-us36"> <!-- Alm No Corp -->
        <?php 
            $almuerzos_nocorp = Tickets::getComProveedor($proveedor->idProveedor, $desde, $hasta, 2,0); 
            $tot_almuerzos_nocorp = $tot_almuerzos_nocorp + $almuerzos_nocorp;

            echo ($almuerzos_nocorp>0 ? $almuerzos_nocorp : '-');
        ?>
    </td>
    <td class="tg-us36">
        <?php echo ($tot_almuerzos_corp+$tot_almuerzos_nocorp>0 ? $tot_almuerzos_corp+$tot_almuerzos_nocorp : '-');?>
    </td>

<!-- CENAS -->
    
    <td class="tg-us36"> <!-- Cenas Corp -->
        <?php 
            $cenas_corp = Tickets::getComProveedor($proveedor->idProveedor, $desde, $hasta, 3,1); 
            $tot_cenas_corp = $tot_cenas_corp + $cenas_corp;

            echo ($cenas_corp>0 ? $cenas_corp : '-');
        ?>
    </td> 
    <td class="tg-us36"> <!-- Cenas No Corp -->
        <?php 
           $cenas_nocorp = Tickets::getComProveedor($proveedor->idProveedor, $desde, $hasta, 3,0); 
            $tot_cenas_nocorp = $tot_cenas_nocorp + $cenas_nocorp;

            echo ($cenas_nocorp>0 ? $cenas_nocorp : '-');
        ?>
    </td>
    <td class="tg-us36">
        <?php echo ($tot_cenas_corp+$tot_cenas_nocorp>0 ? $tot_cenas_corp+$tot_cenas_nocorp : '-');
         ?>
    </td>

<!-- TOTALES -->

    <td class="tg-us36 estadis">
        <?php echo ($tot_almuerzos_corp + $tot_cenas_corp>0 ? $tot_almuerzos_corp + $tot_cenas_corp : '-'); ?>
    </td>
    <td class="tg-us36 estadis">
        <?php echo ($tot_almuerzos_nocorp + $tot_cenas_nocorp>0 ? $tot_almuerzos_nocorp + $tot_cenas_nocorp : '-'); ?>
    </td>
    <td class="tg-us36 estadis"><b>
        <?php echo ($tot_almuerzos_corp + $tot_cenas_corp + $tot_almuerzos_nocorp + $tot_cenas_nocorp>0 ? $tot_almuerzos_corp + $tot_cenas_corp + $tot_almuerzos_nocorp + $tot_cenas_nocorp : '-'); ?></b>
    </td>
   
  </tr>

<?php 
$total_desayunos_corp = $total_desayunos_corp + $tot_desayunos_corp;
$total_desayunos_nocorp = $total_desayunos_nocorp + $tot_desayunos_nocorp;
$total_almuerzos_corp = $total_almuerzos_corp + $tot_almuerzos_corp;
$total_almuerzos_nocorp = $total_almuerzos_nocorp + $tot_almuerzos_nocorp;
$total_cenas_corp = $total_cenas_corp + $tot_cenas_corp;
$total_cenas_nocorp = $total_cenas_nocorp + $tot_cenas_nocorp;
?>
 
<?php $tot_desayunos_corp = $tot_desayunos_nocorp = $tot_almuerzos_corp = $tot_almuerzos_nocorp = $tot_cenas_corp = $tot_cenas_nocorp = $total = 0; ?>

<?php endforeach ?>

    <tr>
        <td class="estadis"><b>TOTALES</b></td>
        
        <td class="estadis">
            <b><?php echo ($total_desayunos_corp>0 ? $total_desayunos_corp : '-'); ?></b>
        </td>
        <td class="estadis">
            <b><?php echo ($total_desayunos_nocorp>0 ? $total_desayunos_nocorp : '-'); ?></b>
        </td>
        <td class="estadis">
            <b><?php echo ($total_desayunos_corp+$total_desayunos_nocorp>0 ? $total_desayunos_corp+$total_desayunos_nocorp : '-'); ?></b>
        </td>

        <td class="estadis">
            <b><?php echo ($total_almuerzos_corp>0 ? $total_almuerzos_corp : '-'); ?></b>
        </td>
        <td class="estadis">
            <b><?php echo ($total_almuerzos_nocorp>0 ? $total_almuerzos_nocorp : '-'); ?></b>
        </td>
        <td class="estadis">
            <b><?php echo ($total_almuerzos_corp+$total_almuerzos_nocorp>0 ? $total_almuerzos_corp+$total_almuerzos_nocorp : '-'); ?></b>
        </td>

        <td class="estadis">
            <b><?php echo ($total_cenas_corp>0 ? $total_cenas_corp : '-'); ?></b>
        </td>
        <td class="estadis">
            <b><?php echo ($total_cenas_nocorp>0 ? $total_cenas_nocorp : '-'); ?></b>
        </td>
        <td class="estadis">
            <b><?php echo ($total_cenas_corp+$total_cenas_nocorp>0 ? $total_cenas_corp+$total_cenas_nocorp : '-'); ?></b>
        </td>

        <td class="estadis">
            <b><?php echo ($total_almuerzos_corp+$total_cenas_corp>0 ? $total_almuerzos_corp+$total_cenas_corp : '-'); ?></b>
        </td>
        <td class="estadis">
            <b><?php echo ($total_almuerzos_nocorp+$total_cenas_nocorp>0 ? $total_almuerzos_nocorp+$total_cenas_nocorp : '-'); ?></b>
        </td>
        <td class="estadis">
            <b><?php echo ($total_almuerzos_corp+$total_cenas_corp+$total_almuerzos_nocorp+$total_cenas_nocorp>0 ? $total_almuerzos_corp+$total_cenas_corp+$total_almuerzos_nocorp+$total_cenas_nocorp : '-'); ?></b>
        </td>
    </tr>

</table>





</div>
</div>
</body>

<style>
	.estadis {text-align: right;}
</style>
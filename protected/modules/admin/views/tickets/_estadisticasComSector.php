<h5>Desde el <b><?php echo $_REQUEST['desde'] ?></b> hasta el <b><?php echo $_REQUEST['hasta']; ?></b></h5>
<br>
	
<table class="table tabla-ticket" >
  <tr>
    <th class="estadis">Sector</th>
    <th class="estadis">Desayunos</th>
    <th class="estadis">Almuerzos</th>
    <th class="estadis">Cenas</th>
    <th class="estadis">Total Comidas</th>
  </tr>

<?php $tot_desayunos = $tot_almuerzos = $tot_cenas = $total = 0; ?>
  
<?php foreach ($sectores as $sector): ?>

   <?php $total_total = Tickets::getTotalComSector($sector->idSector, $desde, $hasta); ?> 

    <?php if ($total_total>0): ?>
        
    <tr>
    <td class="estadis"><?php echo $sector->nombre ?></td>
    <td class="estadis">
    	<?php 
            $desayunos = Tickets::getComSector($sector->idSector, $desde, $hasta, 1); 
            $tot_desayunos = $tot_desayunos + $desayunos;
            echo ($desayunos>0 ? $desayunos : '-');
        ?>
    </td>
    <td class="estadis">
    	<?php 
            $almuerzos = Tickets::getComSector($sector->idSector, $desde, $hasta, 2); 
            $tot_almuerzos = $tot_almuerzos + $almuerzos;
            echo ($almuerzos>0 ? $almuerzos : '-');
        ?>
    </td>
    <td class="estadis">
    	<?php 
            $cenas = Tickets::getComSector($sector->idSector, $desde, $hasta, 3); 
            $tot_cenas = $tot_cenas + $cenas;
            echo ($cenas>0 ? $cenas : '-');
        ?>
    </td>
    <td class="estadis">
    	<?php 
            $total = $total + $total_total;
            echo ($total_total>0 ? $total_total : '-');
        ?>
    </td>
  </tr>

<?php endif ?>

<?php endforeach ?>

    <tr>

    <td class="estadis"><b>TOTALES</b></td>
    <td class="estadis">
        <b><?php echo ($tot_desayunos>0 ? $tot_desayunos : '-'); ?></b>
    </td>
    <td class="estadis">
        <b><?php echo ($tot_almuerzos>0 ? $tot_almuerzos : '-'); ?></b>
    </td>
    <td class="estadis">
        <b><?php echo ($tot_cenas>0 ? $tot_cenas : '-'); ?></b>
    </td>
    <td class="estadis">
        <b><?php echo ($total>0 ? $total : '-'); ?></b>
    </td>
  </tr>

</table>


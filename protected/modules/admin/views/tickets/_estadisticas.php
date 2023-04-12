<h5>Desde el <b><?php echo $_REQUEST['desde'] ?></b> hasta el <b><?php echo $_REQUEST['hasta']; ?></b></h5>
<br>
	
<table class="table tabla-ticket" >
  <tr>
    <th class="estadis">Proveedor</th>
    <!--<th class="estadis">Desayunos</th>-->
    <th class="estadis">Almuerzos</th>
    <th class="estadis">Cenas</th>
    <th class="estadis">Total Comidas</th>
  </tr>
  
<?php foreach ($proveedores as $proveedor): ?>

  <tr>

    <td class="estadis"><?php echo $proveedor->nombre ?></td>
    <!--<td class="estadis">
    	<?php //echo Tickets::getDesComProveedor($proveedor->idProveedor, $desde, $hasta, 1); ?>
    </td>-->
    <td class="estadis">
    	<?php echo Tickets::getDesComProveedor($proveedor->idProveedor, $desde, $hasta, 2); ?>
    </td>
    <td class="estadis">
    	<?php echo Tickets::getDesComProveedor($proveedor->idProveedor, $desde, $hasta, 3); ?>
    </td>
    <td class="estadis">
    	<?php echo Tickets::getTotalDesComProveedor($proveedor->idProveedor, $desde, $hasta); ?>
    </td>
  </tr>

<?php endforeach ?>

</table>


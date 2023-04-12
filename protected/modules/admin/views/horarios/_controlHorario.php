
<div class="col-md-12">
	
<?php if ($empleado): ?>

<div class="box-body">

<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-body">
              
          <?php 
          if ($empleado->foto) {
            echo CHtml::image(Yii::app()->request->baseUrl.'/pics/personal/'.$empleado->foto,
            "sin imagen",array('class'=>'img-responsive img-thumbnail'));
              } else {
            echo CHtml::image(Yii::app()->request->baseUrl.'/images/default-user.png',
            "sin imagen",array('class'=>'img-responsive img-thumbnail'));
              }
           ?>  
            
    </div>
  </div>
</div>

<div class="col-md-9">

<?php 
echo '<p><strong>Apellido y Nombre : </strong>'.$empleado->nombre.'</br></p>';
echo '<p><strong>Sector : </strong>'.$empleado->sector_rel->nombre.'</br></p>';
?>
    
  <hr>

	<p>Control Horario desde el <b><?php echo $desde; ?></b> al <b><?php echo $hasta; ?></b>.</p>

<table>

  <tr>
    <th>Fecha</th>
    <th>Entrada Mañana</th>
    <th>Salida Mañana</th>
    <th>Subtotal</th>
    <th>Entrada Tarde</th>
    <th>Salida Tarde</th>
    <th>Subtotal</th>
    <th>TOTAL</th>
  </tr>

	<?php 

  $total = '00:00';

	foreach ($registros as $registro): ?>

    <?php $sub_m = $sub_t = $total_dia = '00:00'; ?>

  <tr>

    <td><b><?php echo Yii::app()->dateFormatter->format("dd-MM-yyyy", $registro->fecha); ?></b></td>
    <td style="text-align: right"><?php echo ($registro->em>0) ? date("H:i",$registro->em).'hs' : '-'; ?></td>
    <td style="text-align: right"><?php echo ($registro->sm>0) ? date("H:i",$registro->sm).'hs' : '-'; ?></td>
    
    <td><b>
      
      <?php if ($registro->em AND $registro->sm) {
        echo $sub_m = timestampdiff($registro->em, $registro->sm); echo 'hs';
      } ?>

    </b></td>

    <td style="text-align: right"><?php echo ($registro->et>0) ? date("H:i",$registro->et).'hs' : '-'; ?></td>
    <td style="text-align: right"><?php echo ($registro->st>0) ? date("H:i",$registro->st).'hs' : '-'; ?></td>

  	<td><b>
    
      <?php if ($registro->et AND $registro->st) {
        echo $sub_t = timestampdiff($registro->et, $registro->st); echo 'hs';
      } ?> 

    </b></td>
  	
    <td><b>
      <?php echo $total_dia = getTotal($sub_m, $sub_t);echo 'hs' ?> 
    </b></td>

  </tr>
		
  <?php $total = $total + hora_a_segundos($total_dia); ?>

<?php endforeach ?>

</table>

		<hr>

		<?php 

    $total = $total / 3600;

    echo '<b><h4>'.'Total carga horaria: '. number_format($total,2) .'hs</h4></b>'; ?>
			
    <div class="clearfix"></div>

</div>

<div class="clearfix"></div>

</div><!-- /.box-header -->



<?php else: ?>

	<h4>No se encontró N° de legajo.</h4>

	
<?php endif ?>


</div>


<style>table td, table th {border: 1px solid #ccc;}</style>

<?php

function hora_a_segundos($pa6) { 
    list($h, $m) = explode(':', $pa6); 
    return ($h * 3600) + ($m * 60); 
} 

  function timestampdiff($qw,$saw) {
      $datetime1 = new DateTime("@$qw");
      $datetime2 = new DateTime("@$saw");
      $interval = $datetime1->diff($datetime2);
      //return $interval->format('%Hh %Im');
      return $interval->format('%H:%I');
  }

function getTotal($total_manana,$total_tarde) {

      //$total_manana = "01:30";
      //$total_tarde = "02:30";
             
      //echo $total_manana.'-'.$total_tarde.'<br>';

      $h =  strtotime($total_manana);
      $h2 = strtotime($total_tarde);

      $minute = date("i", $h2);
      $hour = date("H", $h2);

      $convert = strtotime("+$minute minutes", $h);
      $convert = strtotime("+$hour hours", $convert);

      $new_time = date('H:i', $convert);

      return $new_time;

}

function getTotalCarga($total_manana,$total_tarde) {

      $total_manana = "17:01";
      $total_tarde = "10:00";
             
      //echo $total_manana.'-'.$total_tarde.'<br>';

      $h =  strtotime($total_manana);
      $h2 = strtotime($total_tarde);

      $minute = date("i", $h2);
      $hour = date("H", $h2);

      $convert = strtotime("+$minute minutes", $h);
      $convert = strtotime("+$hour hours", $convert);

      $new_time = date('H:i', $convert);

      echo $new_time;

      return $new_time;

}

?>
<?php $activos = Personal::getActivos();?>

<div class="col-md-8">
<table class="table table-hover">
    <thead>
      <tr>
        <th>N° Legajo</th>
        <th>Nombre</th>
        <th>Sector</th>
        <!--<th class="right">Desayunos<br>Asistencias</th>
        <th class="right">Desayunos<br>Consumos</th>-->
        <th class="right">Comidas<br>Asistencias</th>
        <th class="right">Comidas<br>Consumos</th>
        <th class="right">Diferencia</th>
        
      </tr>
    </thead>
    
    <tbody>
      
      <?php foreach ($activos as $empleado) : ?>

            <?php 
             $desayunos = $comidas = $tickets_desayunos = $tickets_comidas = 0;
             $asistencias = Asistencias::getAsistenciasPorEmpleado($empleado->legajo,$desde,$hasta); 

              foreach ($asistencias as $asistencia) {
                  
                 $importe = Estados::model()->findByPk($asistencia->idEstado);

                 $comidas = $comidas + $importe->comidas;
                 $desayunos = $desayunos + $importe->desayunos;

              }

              //$comidas = number_format($comidas, 2, '.', '');
              
              //$tickets_desayunos = Tickets::getTicketsDesayunosPersonalFechaTipo($empleado->legajo, $desde, $hasta);
              $tickets_comidas = Tickets::getTicketsComidasPersonalFechaTipo($empleado->legajo, $desde, $hasta);

            ?>

      <tr>
      
        <td><?php echo $empleado->legajo; ?></td>
        <td><?php echo $empleado->nombre; ?></td>
        <td><?php echo $empleado->sector_rel->nombre; ?></td>
 <!--
        <td style="text-align: right;"> 
          <?php //if ($desayunos==0) {echo '0';} else {echo $desayunos;} ?>
        </td>
-->
  <!-- 
        <td style="text-align: right;"> 
          <?php //if ($tickets_desayunos==0) {echo '0';} else {echo $tickets_desayunos;} ?>
        </td>
-->

        <td style="text-align: right;"> <!-- comidas/asis -->
          <?php if ($comidas==0) {echo '0';} else {echo $comidas;} ?>
        </td>

        <td style="text-align: right;"> <!-- comidas/asis -->
          <?php if ($tickets_comidas==0) {echo '0';} else {echo $tickets_comidas;} ?>
        </td>
        
        <td style="text-align: right;"> <!-- diferencia -->
          <?php $diferencia = $comidas - $tickets_comidas;

          if ($diferencia < 0) {
            echo '<b><span style="color:red">'.$diferencia.'</span></b>';
          } else {
            echo '<span>'.$diferencia.'</span>';
          }
          ?>
        </td>
      
      </tr>

    <?php endforeach ?>
    
    </tbody>

  </table>
</div>
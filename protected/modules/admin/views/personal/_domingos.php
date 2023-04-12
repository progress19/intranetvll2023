<?php $activos = Personal::getActivos();?>

<div class="col-md-6">
<table class="table table-hover">
    <thead>
      <tr>
        <th>N° Legajo</th>
        <th>Nombre</th>
        <th>Sector</th>
        <th>Domingos</th>
        
      </tr>
    </thead>
    
    <tbody>
      
      <?php foreach ($activos as $empleado) : ?>
      
      <tr>
      
        <td><?php echo $empleado->legajo; ?></td>
        <td><?php echo $empleado->nombre; ?></td>
        <td><?php echo $empleado->sector_rel->nombre; ?></td>
        <td style="text-align: right;">
             <?php 
              $pre = 0;
              $asistencias = Asistencias::getAsistenciasPorEmpleado($empleado->legajo,$desde,$hasta); 

              foreach ($asistencias as $asistencia) {
                
                  $diasem = date('l', strtotime($asistencia->fecha));  

                  if ( $asistencia->idEstado == 1 OR $asistencia->idEstado == 14 ) { // presente y comision
                       if ($diasem == "Sunday") {  
                       $pre = $pre + 1; }
                  }

                  if ( $asistencia->idEstado == 2 OR $asistencia->idEstado == 4 OR $asistencia->idEstado == 9 ) { // sale franco , 1/2 franco , 1/2 franco empresa 
                       if ($diasem == "Sunday") {  
                       $pre = $pre + 0.5; }
                  }   
              }

              if ($pre==0) {echo '-';} else {echo $pre;}
       
             ?>

        </td>
      
      </tr>

    <?php endforeach ?>
    
    </tbody>

  </table>
</div>
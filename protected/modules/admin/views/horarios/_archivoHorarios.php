
<div class="col-md-12">
<table class="table table-hover">
   
<?php $years = range( 2019, date('Y') ); $total = 0; ?> 

<?php //$years = range( 2013, 2015 ); ?> 

    <thead>
      <tr>
        <th>TABLA</th>
        <?php foreach ( $years as $year ): ?>
          <th><?php echo $year ?></th>
        <?php endforeach ?>
        <th>TOTAL</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>Principal</td>
        <?php foreach ( $years as $year ): ?>
          <td><?php echo $total_year = Horarios::getHorariosPorAno( $year ); ?></td>
          <?php $total = $total + $total_year ?>
        <?php endforeach ?>
        <td><b><?php echo $total; $total = 0 ?></b></td>
      </tr>
    <tr>
      <td>Archivo</td>
        <?php foreach ( $years as $year ): ?>
          <td><?php echo $total_year =HorariosArchivo::getHorariosPorAno( $year ); ?></td>
          <?php $total = $total + $total_year ?>
        <?php endforeach ?>
        <td><b><?php echo $total; ?></b></td>
    </tr>
  </tbody>
</table>
  <br>

<p>Valores expresados en registros.</p>
<hr>

  <div class='btn-group'>
      <button class='btn btn-primary dropdown-toggle' href='#' data-toggle='dropdown'> ARCHIVAR  <span class='caret'></span></button>
      <ul id='w2' class='dropdown-menu'>
          <?php foreach ( $years as $year ): ?>
            <li role='presentation'>
              <a href='#' class="sure" onclick="archivarHorarios( <?php echo $year ?> )" >
                <i class='fa fa-fw fa-calendar'></i> Año <?php echo $year ?>
              </a>
            </li>
          <?php endforeach ?>  
      </ul>
  </div>

  <div class='btn-group'>
      <button class='btn btn-primary dropdown-toggle' href='#' data-toggle='dropdown'> DESARCHIVAR  <span class='caret'></span></button>
      <ul id='w2' class='dropdown-menu'>
          <?php foreach ( $years as $year ): ?>
            <li role='presentation'>
              <a href='#' class="sure" onclick="desarchivarHorarios( <?php echo $year ?> )" >
                <i class='fa fa-fw fa-calendar'></i> Año <?php echo $year ?>
              </a>
            </li>
          <?php endforeach ?>  
      </ul>
  </div>


</div>

<script>

  // ## ARCHIVAR ### -->  

  function archivarHorarios( year ) {

      if ( confirm('Está seguro de ejecutar el proceso ?') ) {

        $('#estadisticas').html('<div class="col-md-12" style="text-align:center"><img src="<?php echo URLRAIZ.'/images/loading.gif' ?>" style="padding-top: 30px;"><h3>ATENCION: Aguardar la finalización del proceso de archivado.</h3><h3>Cancelar o abandonar esta pantalla podria ocasionar la perdida permanente de datos.</h3></div>');

          $.ajax({   
              url: "<?php echo URLRAIZ ?>/admin/horarios/archivarHorarios",   
              data: "year="+year,   
              method: "post",
              success: function(data){     
             
                $('#estadisticas').html(data);
                $('#btn-aceptar').fadeIn();
       
              } 
          });
      }
      
      return false;
  }

  // ## DESARCHIVAR ### -->  

    function desarchivarHorarios( year ) {

      if ( confirm('Está seguro de ejecutar el proceso ?') ) {

        $('#estadisticas').html('<div class="col-md-12" style="text-align:center"><img src="<?php echo URLRAIZ.'/images/loading.gif' ?>" style="padding-top: 30px;"><h3>ATENCION: Aguardar la finalización del proceso de desarchivado.</h3><h3>Cancelar o abandonar esta pantalla podria ocasionar la perdida permanente de datos.</h3></div>');

          $.ajax({   
              url: "<?php echo URLRAIZ ?>/admin/horariosArchivo/desarchivarHorarios",   
              data: "year="+year,   
              method: "post",
              success: function(data){     
             
                $('#estadisticas').html(data);
                $('#btn-aceptar').fadeIn();
       
              } 
          });
      }
      
      return false;
  }

</script>

<style>td, th {text-align: right !important;}</style>
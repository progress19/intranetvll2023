
<?php $this->layout='//layouts/dashboard_admin'; ?>
<?php 

if (Yii::app()->user->roles=='administrador') : ?>

<?php 
  $this->titulo='<i class="fa fa-fw fa-archive"></i> Archivo Tickets';
  $this->menu_archivo = 'active';
  $this->menu_archivo_tickets = 'active';
?>

  <div class="col-md-12">  
    <div class="box box-primary">
        <div class="box-header">

          <div id="estadisticas"></div>
          <a class="btn btn-primary" id="btn-aceptar" onclick="getEstadisticas()" style="text-decoration: none; display: none;">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> CONTINUAR
          </a>

      <br><br>
      <div class="divider30"></div>
      
      </div><!-- /.box-header -->
    </div>
  </div>
  
  <div class="clearfix"></div>

  <script type="text/javascript">
      
    function getEstadisticas() {

      $('#btn-aceptar').fadeOut();
      $("#estadisticas").removeClass('displayNone');
      $('#estadisticas').html('<img src="<?php echo URLRAIZ.'/images/loading.gif' ?>" style="padding: 30px;">');
      $.ajax({
         url: "<?php echo URLRAIZ.'/admin/tickets/archivoTicketsAjax' ?>",
          success: function(datos) {
            fecha = true;
              $("#estadisticas").removeClass('opaco');
              $("#estadisticas").html(datos);
          }
      });

    }

    $(document).ready(function() {
      getEstadisticas();
    });

  </script> 

<?php else : ?>

  <p>NO AUTORIZADO.</p>

<?php endif ?>


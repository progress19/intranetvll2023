<?php date_default_timezone_set('America/Mendoza'); ?>
<?php $this->layout='//layouts/dashboard_admin'; ?>
<?php 

if (Yii::app()->user->roles=='administrador' or Yii::app()->user->roles=='supervisor-rrhh') : ?>

<?php
$this->titulo='Estadísticas';

if (isset($_REQUEST[0]['fecha'])) {
  $fecha = $_REQUEST[0]['fecha'];
  
} else {$fecha = date('d-m-Y');}


?>

<div class="col-md-12">  
<div class="box box-primary">
    <div class="box-header">

  <div class="col-md-6">
      <div id="estadisticas"></div>
    </div>

      <div class="col-md-3">
    <label for="">Seleccione fecha para estadisticas :</label>      
      <?php 
      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'name'=>'fecha_de_estadistica',
           'flat'=>false,
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd-mm-yy',
            'buttonImageOnly'=> true,
            'changeMonth'=>true,
            'changeYear'=>true,            
           ),

           'htmlOptions'=>array(
            'class'=>'form-control',
             'style'=>'width:20px;font-size:19px',
           ),
          ));
 ?>
      </div>

  <br><br>
  <div class="divider30"></div>
        

  <div class="col-md-5"> 
  <span><a class="btn btn-primary" onclick="refrescar_estadisticas()" ><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</a></span><br><br>

  </div>

  <script>
          {
            $("#estadisticas").removeClass('displayNone');
            $('#estadisticas').html('<img src="<?php echo URLRAIZ.'/images/loading.gif' ?>" style="padding: 30px;">');
            $.ajax({
                 url: "<?php echo URLRAIZ.'/admin/home/estadisticas?fecha='.$fecha ?>",
                success: function(datos){
                    fecha = true;
                    $("#estadisticas").removeClass('opaco');
                    $("#estadisticas").html(datos);
                }
            });
        }
    </script>  

  <script>
      document.getElementById("fecha_de_estadistica").value = "<?php echo $fecha ?>";
  </script>

  </div><!-- /.box-header -->
</div>
</div>
<div class="clearfix"></div>

<?php else : ?>

<!--<div class="col-md-12" style="text-align: center; top: 100px; background: rgba(255, 255, 255, 1) none repeat scroll 0% 0%; padding: 50px;">
  <img src="<?php //echo URLRAIZ ?>/images/laslenaslogo.jpg" style="width: 300px;" >
</div>
-->

<script type="text/javascript">
  $(document).ready(function(){
    $('.box-solid').hide(); 
});
  
</script>

<?php endif ?>


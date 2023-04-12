<?php
/* @var $this PersonalController */
/* @var $model Personal */

  $this->menu_comidas = 'active';
  $this->titulo='<i class="glyphicon glyphicon-cutlery"></i> Carga de saldo masivo';

?>

<?php $this->breadcrumbs=array('Administrador');?>
   
<div class="col-md-12">  
<div class="box box-primary">
    <div class="box-header">

<div class="row">
<div class="col-md-12" id="msj_inicial">
<div class="">

  <h3 style="line-height: 1.5em;"><b style="color: red;">ATENCIÓN!!! </b>: este proceso, ELIMINARÁ los saldos actuales de desayuno y comida del personal ACTIVO, y los ACTUALIZARÁ a su saldo inicial de acuerdo al parámetro preestablecido.</h3>
  
  <br>
  
  <h4>Al concluir el proceso, todo el personal ACTIVO, tendrá como saldo inicial de desayunos el valor de <b><?php echo $saldo_inicial_desayunos; ?></b> tickets y comidas el valor de <b><?php echo $saldo_inicial; ?></b> tickets.</h4>

 <br><br>

  <a class="btn btn-primary" onclick="cargaSaldoMasivo()" style="text-decoration: none;" >
    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> CARGAR AHORA!
  </a>

  <div class="clearfix"></div>

</div>
<hr>
</div>
</div>

  <div class="clearfix"></div>

  <div id="carga" style="text-align: center;"></div>

  <div id="msj_final" style="display: none;">
  	<h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Proceso Terminado!</h4><br>
  	<h5>Se actualizáron los saldos de <b id="saldo_inicial"></b> legajos.</h5>
  </div>

  </div><!-- /.box-header -->
</div>







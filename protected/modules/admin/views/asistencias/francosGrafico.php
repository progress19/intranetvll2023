 <?php 
  $this->menu_personal = 'active';
  $this->menu_personal_l = 'active';
  $this->titulo='<i class="fa fa-fw fa-users"></i> Planilla de Asistencia';

 ?>

<div class="col-md-12">  
<div class="box box-primary">
    <div class="box-header">

    <div class="col-md-6">
    <?php $empleado = Personal::getEmpleado($_REQUEST['legajo']) ?>
    <h3 style="margin-top: 0px;">
    	<?php echo "Año : ".$_REQUEST['a']; ?><br>
    	<?php echo $empleado['nombre']. " (".$_REQUEST['legajo'].")" ?>
    </h3>
    </div>
    <div class="col-md-6 pull-right"><h3 class="pull-right">Saldo Francos : <?php echo $empleado['francos'] ?></h3></div>
    <div class="clearfix"></div>
    <hr>

<?php 

//$asistencias = Asistencias::getAsistencias($_REQUEST['legajo'],$_REQUEST['a']); 

$legajo = $_REQUEST['legajo'];
$ano = $_REQUEST['a'];

?>

<script>
  function buscarAsistencia(fecha,tdid) {
  $('#'+tdid).html('<img src="../../images/franco-loader.gif" alt="" />');
    $.ajax({   
        //"dataType": "jsonp", 
        url: "buscarAsistenciaAjax",   
        data: "legajo="+<?php echo $legajo; ?>+"&fecha="+fecha,   
        success: function(msg){     
            $('#'+tdid).html(msg);
        } 
    });
}
</script>

<div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th>MESES</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
        <th>12</th>
        <th>13</th>
        <th>14</th>
        <th>15</th>
        <th>16</th>
        <th>17</th>
        <th>18</th>
        <th>19</th>
        <th>20</th>
        <th>21</th>
        <th>22</th>
        <th>23</th>
        <th>24</th>
        <th>25</th>
        <th>26</th>
        <th>27</th>
        <th>28</th>
        <th>29</th>
        <th>30</th>
        <th>31</th>

      </tr>
    </thead>
    <tbody>
 
      <tr class="success">
      <td>ENERO</td>

		<td id="01-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-01'); ?>,'01-01');</script></td>
	    <td id="01-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-02'); ?>,'01-02');</script></td>
	    <td id="01-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-03'); ?>,'01-03');</script></td>
	    <td id="01-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-04'); ?>,'01-04');</script></td>
	    <td id="01-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-05'); ?>,'01-05');</script></td>
	    <td id="01-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-06'); ?>,'01-06');</script></td>
	    <td id="01-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-07'); ?>,'01-07');</script></td>
	    <td id="01-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-08'); ?>,'01-08');</script></td>
	    <td id="01-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-09'); ?>,'01-09');</script></td>
	    <td id="01-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-10'); ?>,'01-10');</script></td>
	    <td id="01-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-11'); ?>,'01-11');</script></td>
	    <td id="01-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-12'); ?>,'01-12');</script></td>
	    <td id="01-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-13'); ?>,'01-13');</script></td>
	    <td id="01-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-14'); ?>,'01-14');</script></td>
	    <td id="01-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-15'); ?>,'01-15');</script></td>
	    <td id="01-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-16'); ?>,'01-16');</script></td>
	    <td id="01-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-17'); ?>,'01-17');</script></td>
	    <td id="01-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-18'); ?>,'01-18');</script></td>
	    <td id="01-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-19'); ?>,'01-19');</script></td>
	    <td id="01-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-20'); ?>,'01-20');</script></td>
	    <td id="01-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-21'); ?>,'01-21');</script></td>
	    <td id="01-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-22'); ?>,'01-22');</script></td>
	    <td id="01-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-23'); ?>,'01-23');</script></td>
	    <td id="01-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-24'); ?>,'01-24');</script></td>
	    <td id="01-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-25'); ?>,'01-25');</script></td>
	    <td id="01-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-26'); ?>,'01-26');</script></td>
	    <td id="01-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-27'); ?>,'01-27');</script></td>
	    <td id="01-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-28'); ?>,'01-28');</script></td>
	    <td id="01-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-29'); ?>,'01-29');</script></td>
	    <td id="01-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-30'); ?>,'01-30');</script></td>
	    <td id="01-31"><script>buscarAsistencia(<?php echo json_encode($ano.'-01-31'); ?>,'01-31');</script></td>

      </tr>
    <tr class="danger">
    <td>FEBRERO</td>
 
	    <td id="02-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-01'); ?>,'02-01');</script></td>
	    <td id="02-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-02'); ?>,'02-02');</script></td>
	    <td id="02-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-03'); ?>,'02-03');</script></td>
	    <td id="02-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-04'); ?>,'02-04');</script></td>
	    <td id="02-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-05'); ?>,'02-05');</script></td>
	    <td id="02-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-06'); ?>,'02-06');</script></td>
	    <td id="02-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-07'); ?>,'02-07');</script></td>
	    <td id="02-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-08'); ?>,'02-08');</script></td>
	    <td id="02-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-09'); ?>,'02-09');</script></td>
	    <td id="02-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-10'); ?>,'02-10');</script></td>
	    <td id="02-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-11'); ?>,'02-11');</script></td>
	    <td id="02-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-12'); ?>,'02-12');</script></td>
	    <td id="02-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-13'); ?>,'02-13');</script></td>
	    <td id="02-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-14'); ?>,'02-14');</script></td>
	    <td id="02-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-15'); ?>,'02-15');</script></td>
	    <td id="02-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-16'); ?>,'02-16');</script></td>
	    <td id="02-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-17'); ?>,'02-17');</script></td>
	    <td id="02-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-18'); ?>,'02-18');</script></td>
	    <td id="02-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-19'); ?>,'02-19');</script></td>
	    <td id="02-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-20'); ?>,'02-20');</script></td>
	    <td id="02-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-21'); ?>,'02-21');</script></td>
	    <td id="02-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-22'); ?>,'02-22');</script></td>
	    <td id="02-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-23'); ?>,'02-23');</script></td>
	    <td id="02-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-24'); ?>,'02-24');</script></td>
	    <td id="02-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-25'); ?>,'02-25');</script></td>
	    <td id="02-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-26'); ?>,'02-26');</script></td>
	    <td id="02-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-27'); ?>,'02-27');</script></td>
	    <td id="02-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-28'); ?>,'02-28');</script></td>
	    <td id="02-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-29'); ?>,'02-29');</script></td>
	    <td id="02-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-30'); ?>,'02-30');</script></td>
	    <td id="02-31"><script>buscarAsistencia(<?php echo json_encode($ano.'-02-31'); ?>,'02-31');</script></td>

      </tr>

      <tr class="success">
        <td>MARZO</td>
        <td id="03-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-01'); ?>,'03-01');</script></td>
	    <td id="03-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-02'); ?>,'03-02');</script></td>
	    <td id="03-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-03'); ?>,'03-03');</script></td>
	    <td id="03-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-04'); ?>,'03-04');</script></td>
	    <td id="03-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-05'); ?>,'03-05');</script></td>
	    <td id="03-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-06'); ?>,'03-06');</script></td>
	    <td id="03-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-07'); ?>,'03-07');</script></td>
	    <td id="03-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-08'); ?>,'03-08');</script></td>
	    <td id="03-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-09'); ?>,'03-09');</script></td>
	    <td id="03-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-10'); ?>,'03-10');</script></td>
	    <td id="03-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-11'); ?>,'03-11');</script></td>
	    <td id="03-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-12'); ?>,'03-12');</script></td>
	    <td id="03-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-13'); ?>,'03-13');</script></td>
	    <td id="03-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-14'); ?>,'03-14');</script></td>
	    <td id="03-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-15'); ?>,'03-15');</script></td>
	    <td id="03-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-16'); ?>,'03-16');</script></td>
	    <td id="03-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-17'); ?>,'03-17');</script></td>
	    <td id="03-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-18'); ?>,'03-18');</script></td>
	    <td id="03-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-19'); ?>,'03-19');</script></td>
	    <td id="03-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-20'); ?>,'03-20');</script></td>
	    <td id="03-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-21'); ?>,'03-21');</script></td>
	    <td id="03-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-22'); ?>,'03-22');</script></td>
	    <td id="03-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-23'); ?>,'03-23');</script></td>
	    <td id="03-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-24'); ?>,'03-24');</script></td>
	    <td id="03-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-25'); ?>,'03-25');</script></td>
	    <td id="03-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-26'); ?>,'03-26');</script></td>
	    <td id="03-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-27'); ?>,'03-27');</script></td>
	    <td id="03-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-28'); ?>,'03-28');</script></td>
	    <td id="03-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-29'); ?>,'03-29');</script></td>
	    <td id="03-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-30'); ?>,'03-30');</script></td>
	    <td id="03-31"><script>buscarAsistencia(<?php echo json_encode($ano.'-03-31'); ?>,'03-31');</script></td>
      </tr>

      <tr class="danger">
        <td>ABRIL</td>
        <td id="04-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-01'); ?>,'04-01');</script></td>
	    <td id="04-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-02'); ?>,'04-02');</script></td>
	    <td id="04-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-03'); ?>,'04-03');</script></td>
	    <td id="04-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-04'); ?>,'04-04');</script></td>
	    <td id="04-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-05'); ?>,'04-05');</script></td>
	    <td id="04-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-06'); ?>,'04-06');</script></td>
	    <td id="04-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-07'); ?>,'04-07');</script></td>
	    <td id="04-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-08'); ?>,'04-08');</script></td>
	    <td id="04-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-09'); ?>,'04-09');</script></td>
	    <td id="04-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-10'); ?>,'04-10');</script></td>
	    <td id="04-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-11'); ?>,'04-11');</script></td>
	    <td id="04-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-12'); ?>,'04-12');</script></td>
	    <td id="04-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-13'); ?>,'04-13');</script></td>
	    <td id="04-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-14'); ?>,'04-14');</script></td>
	    <td id="04-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-15'); ?>,'04-15');</script></td>
	    <td id="04-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-16'); ?>,'04-16');</script></td>
	    <td id="04-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-17'); ?>,'04-17');</script></td>
	    <td id="04-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-18'); ?>,'04-18');</script></td>
	    <td id="04-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-19'); ?>,'04-19');</script></td>
	    <td id="04-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-20'); ?>,'04-20');</script></td>
	    <td id="04-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-21'); ?>,'04-21');</script></td>
	    <td id="04-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-22'); ?>,'04-22');</script></td>
	    <td id="04-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-23'); ?>,'04-23');</script></td>
	    <td id="04-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-24'); ?>,'04-24');</script></td>
	    <td id="04-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-25'); ?>,'04-25');</script></td>
	    <td id="04-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-26'); ?>,'04-26');</script></td>
	    <td id="04-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-27'); ?>,'04-27');</script></td>
	    <td id="04-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-28'); ?>,'04-28');</script></td>
	    <td id="04-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-29'); ?>,'04-29');</script></td>
	    <td id="04-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-04-30'); ?>,'04-30');</script></td>
	    <td></td>
	   </tr>


    <tr class="success">
      <td>MAYO</td>
		<td id="05-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-01'); ?>,'05-01');</script></td>
	    <td id="05-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-02'); ?>,'05-02');</script></td>
	    <td id="05-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-03'); ?>,'05-03');</script></td>
	    <td id="05-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-04'); ?>,'05-04');</script></td>
	    <td id="05-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-05'); ?>,'05-05');</script></td>
	    <td id="05-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-06'); ?>,'05-06');</script></td>
	    <td id="05-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-07'); ?>,'05-07');</script></td>
	    <td id="05-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-08'); ?>,'05-08');</script></td>
	    <td id="05-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-09'); ?>,'05-09');</script></td>
	    <td id="05-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-10'); ?>,'05-10');</script></td>
	    <td id="05-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-11'); ?>,'05-11');</script></td>
	    <td id="05-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-12'); ?>,'05-12');</script></td>
	    <td id="05-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-13'); ?>,'05-13');</script></td>
	    <td id="05-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-14'); ?>,'05-14');</script></td>
	    <td id="05-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-15'); ?>,'05-15');</script></td>
	    <td id="05-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-16'); ?>,'05-16');</script></td>
	    <td id="05-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-17'); ?>,'05-17');</script></td>
	    <td id="05-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-18'); ?>,'05-18');</script></td>
	    <td id="05-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-19'); ?>,'05-19');</script></td>
	    <td id="05-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-20'); ?>,'05-20');</script></td>
	    <td id="05-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-21'); ?>,'05-21');</script></td>
	    <td id="05-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-22'); ?>,'05-22');</script></td>
	    <td id="05-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-23'); ?>,'05-23');</script></td>
	    <td id="05-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-24'); ?>,'05-24');</script></td>
	    <td id="05-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-25'); ?>,'05-25');</script></td>
	    <td id="05-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-26'); ?>,'05-26');</script></td>
	    <td id="05-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-27'); ?>,'05-27');</script></td>
	    <td id="05-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-28'); ?>,'05-28');</script></td>
	    <td id="05-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-29'); ?>,'05-29');</script></td>
	    <td id="05-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-30'); ?>,'05-30');</script></td>
	    <td id="05-31"><script>buscarAsistencia(<?php echo json_encode($ano.'-05-31'); ?>,'05-31');</script></td>

      </tr>
    <tr class="danger">
    <td>JUNIO</td>
	    <td id="06-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-01'); ?>,'06-01');</script></td>
	    <td id="06-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-02'); ?>,'06-02');</script></td>
	    <td id="06-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-03'); ?>,'06-03');</script></td>
	    <td id="06-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-04'); ?>,'06-04');</script></td>
	    <td id="06-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-05'); ?>,'06-05');</script></td>
	    <td id="06-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-06'); ?>,'06-06');</script></td>
	    <td id="06-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-07'); ?>,'06-07');</script></td>
	    <td id="06-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-08'); ?>,'06-08');</script></td>
	    <td id="06-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-09'); ?>,'06-09');</script></td>
	    <td id="06-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-10'); ?>,'06-10');</script></td>
	    <td id="06-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-11'); ?>,'06-11');</script></td>
	    <td id="06-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-12'); ?>,'06-12');</script></td>
	    <td id="06-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-13'); ?>,'06-13');</script></td>
	    <td id="06-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-14'); ?>,'06-14');</script></td>
	    <td id="06-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-15'); ?>,'06-15');</script></td>
	    <td id="06-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-16'); ?>,'06-16');</script></td>
	    <td id="06-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-17'); ?>,'06-17');</script></td>
	    <td id="06-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-18'); ?>,'06-18');</script></td>
	    <td id="06-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-19'); ?>,'06-19');</script></td>
	    <td id="06-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-20'); ?>,'06-20');</script></td>
	    <td id="06-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-21'); ?>,'06-21');</script></td>
	    <td id="06-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-22'); ?>,'06-22');</script></td>
	    <td id="06-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-23'); ?>,'06-23');</script></td>
	    <td id="06-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-24'); ?>,'06-24');</script></td>
	    <td id="06-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-25'); ?>,'06-25');</script></td>
	    <td id="06-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-26'); ?>,'06-26');</script></td>
	    <td id="06-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-27'); ?>,'06-27');</script></td>
	    <td id="06-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-28'); ?>,'06-28');</script></td>
	    <td id="06-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-29'); ?>,'06-29');</script></td>
	    <td id="06-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-06-30'); ?>,'06-30');</script></td>
	    <td></td>
      </tr>

      <tr class="success">
        <td>JULIO</td>
        <td id="07-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-01'); ?>,'07-01');</script></td>
	    <td id="07-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-02'); ?>,'07-02');</script></td>
	    <td id="07-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-03'); ?>,'07-03');</script></td>
	    <td id="07-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-04'); ?>,'07-04');</script></td>
	    <td id="07-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-05'); ?>,'07-05');</script></td>
	    <td id="07-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-06'); ?>,'07-06');</script></td>
	    <td id="07-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-07'); ?>,'07-07');</script></td>
	    <td id="07-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-08'); ?>,'07-08');</script></td>
	    <td id="07-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-09'); ?>,'07-09');</script></td>
	    <td id="07-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-10'); ?>,'07-10');</script></td>
	    <td id="07-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-11'); ?>,'07-11');</script></td>
	    <td id="07-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-12'); ?>,'07-12');</script></td>
	    <td id="07-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-13'); ?>,'07-13');</script></td>
	    <td id="07-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-14'); ?>,'07-14');</script></td>
	    <td id="07-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-15'); ?>,'07-15');</script></td>
	    <td id="07-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-16'); ?>,'07-16');</script></td>
	    <td id="07-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-17'); ?>,'07-17');</script></td>
	    <td id="07-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-18'); ?>,'07-18');</script></td>
	    <td id="07-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-19'); ?>,'07-19');</script></td>
	    <td id="07-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-20'); ?>,'07-20');</script></td>
	    <td id="07-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-21'); ?>,'07-21');</script></td>
	    <td id="07-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-22'); ?>,'07-22');</script></td>
	    <td id="07-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-23'); ?>,'07-23');</script></td>
	    <td id="07-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-24'); ?>,'07-24');</script></td>
	    <td id="07-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-25'); ?>,'07-25');</script></td>
	    <td id="07-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-26'); ?>,'07-26');</script></td>
	    <td id="07-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-27'); ?>,'07-27');</script></td>
	    <td id="07-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-28'); ?>,'07-28');</script></td>
	    <td id="07-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-29'); ?>,'07-29');</script></td>
	    <td id="07-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-30'); ?>,'07-30');</script></td>
	    <td id="07-31"><script>buscarAsistencia(<?php echo json_encode($ano.'-07-31'); ?>,'07-31');</script></td>
      </tr>

      <tr class="danger">
        <td>AGOSTO</td>
        <td id="08-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-01'); ?>,'08-01');</script></td>
	    <td id="08-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-02'); ?>,'08-02');</script></td>
	    <td id="08-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-03'); ?>,'08-03');</script></td>
	    <td id="08-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-04'); ?>,'08-04');</script></td>
	    <td id="08-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-05'); ?>,'08-05');</script></td>
	    <td id="08-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-06'); ?>,'08-06');</script></td>
	    <td id="08-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-07'); ?>,'08-07');</script></td>
	    <td id="08-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-08'); ?>,'08-08');</script></td>
	    <td id="08-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-09'); ?>,'08-09');</script></td>
	    <td id="08-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-10'); ?>,'08-10');</script></td>
	    <td id="08-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-11'); ?>,'08-11');</script></td>
	    <td id="08-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-12'); ?>,'08-12');</script></td>
	    <td id="08-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-13'); ?>,'08-13');</script></td>
	    <td id="08-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-14'); ?>,'08-14');</script></td>
	    <td id="08-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-15'); ?>,'08-15');</script></td>
	    <td id="08-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-16'); ?>,'08-16');</script></td>
	    <td id="08-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-17'); ?>,'08-17');</script></td>
	    <td id="08-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-18'); ?>,'08-18');</script></td>
	    <td id="08-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-19'); ?>,'08-19');</script></td>
	    <td id="08-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-20'); ?>,'08-20');</script></td>
	    <td id="08-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-21'); ?>,'08-21');</script></td>
	    <td id="08-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-22'); ?>,'08-22');</script></td>
	    <td id="08-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-23'); ?>,'08-23');</script></td>
	    <td id="08-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-24'); ?>,'08-24');</script></td>
	    <td id="08-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-25'); ?>,'08-25');</script></td>
	    <td id="08-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-26'); ?>,'08-26');</script></td>
	    <td id="08-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-27'); ?>,'08-27');</script></td>
	    <td id="08-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-28'); ?>,'08-28');</script></td>
	    <td id="08-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-29'); ?>,'08-29');</script></td>
	    <td id="08-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-30'); ?>,'08-30');</script></td>
	    <td id="08-31"><script>buscarAsistencia(<?php echo json_encode($ano.'-08-31'); ?>,'08-31');</script></td>
	   </tr>

	  <tr class="success">
        <td>SETIEMBRE</td>
        <td id="09-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-01'); ?>,'09-01');</script></td>
	    <td id="09-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-02'); ?>,'09-02');</script></td>
	    <td id="09-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-03'); ?>,'09-03');</script></td>
	    <td id="09-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-04'); ?>,'09-04');</script></td>
	    <td id="09-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-05'); ?>,'09-05');</script></td>
	    <td id="09-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-06'); ?>,'09-06');</script></td>
	    <td id="09-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-07'); ?>,'09-07');</script></td>
	    <td id="09-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-08'); ?>,'09-08');</script></td>
	    <td id="09-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-09'); ?>,'09-09');</script></td>
	    <td id="09-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-10'); ?>,'09-10');</script></td>
	    <td id="09-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-11'); ?>,'09-11');</script></td>
	    <td id="09-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-12'); ?>,'09-12');</script></td>
	    <td id="09-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-13'); ?>,'09-13');</script></td>
	    <td id="09-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-14'); ?>,'09-14');</script></td>
	    <td id="09-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-15'); ?>,'09-15');</script></td>
	    <td id="09-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-16'); ?>,'09-16');</script></td>
	    <td id="09-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-17'); ?>,'09-17');</script></td>
	    <td id="09-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-18'); ?>,'09-18');</script></td>
	    <td id="09-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-19'); ?>,'09-19');</script></td>
	    <td id="09-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-20'); ?>,'09-20');</script></td>
	    <td id="09-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-21'); ?>,'09-21');</script></td>
	    <td id="09-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-22'); ?>,'09-22');</script></td>
	    <td id="09-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-23'); ?>,'09-23');</script></td>
	    <td id="09-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-24'); ?>,'09-24');</script></td>
	    <td id="09-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-25'); ?>,'09-25');</script></td>
	    <td id="09-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-26'); ?>,'09-26');</script></td>
	    <td id="09-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-27'); ?>,'09-27');</script></td>
	    <td id="09-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-28'); ?>,'09-28');</script></td>
	    <td id="09-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-29'); ?>,'09-29');</script></td>
	    <td id="09-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-09-30'); ?>,'09-30');</script></td>
	    <td></td>
	   </tr>

	   <tr class="danger">
        <td>OCTUBRE</td>
        <td id="10-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-01'); ?>,'10-01');</script></td>
	    <td id="10-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-02'); ?>,'10-02');</script></td>
	    <td id="10-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-03'); ?>,'10-03');</script></td>
	    <td id="10-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-04'); ?>,'10-04');</script></td>
	    <td id="10-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-05'); ?>,'10-05');</script></td>
	    <td id="10-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-06'); ?>,'10-06');</script></td>
	    <td id="10-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-07'); ?>,'10-07');</script></td>
	    <td id="10-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-08'); ?>,'10-08');</script></td>
	    <td id="10-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-09'); ?>,'10-09');</script></td>
	    <td id="10-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-10'); ?>,'10-10');</script></td>
	    <td id="10-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-11'); ?>,'10-11');</script></td>
	    <td id="10-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-12'); ?>,'10-12');</script></td>
	    <td id="10-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-13'); ?>,'10-13');</script></td>
	    <td id="10-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-14'); ?>,'10-14');</script></td>
	    <td id="10-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-15'); ?>,'10-15');</script></td>
	    <td id="10-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-16'); ?>,'10-16');</script></td>
	    <td id="10-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-17'); ?>,'10-17');</script></td>
	    <td id="10-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-18'); ?>,'10-18');</script></td>
	    <td id="10-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-19'); ?>,'10-19');</script></td>
	    <td id="10-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-20'); ?>,'10-20');</script></td>
	    <td id="10-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-21'); ?>,'10-21');</script></td>
	    <td id="10-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-22'); ?>,'10-22');</script></td>
	    <td id="10-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-23'); ?>,'10-23');</script></td>
	    <td id="10-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-24'); ?>,'10-24');</script></td>
	    <td id="10-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-25'); ?>,'10-25');</script></td>
	    <td id="10-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-26'); ?>,'10-26');</script></td>
	    <td id="10-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-27'); ?>,'10-27');</script></td>
	    <td id="10-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-28'); ?>,'10-28');</script></td>
	    <td id="10-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-29'); ?>,'10-29');</script></td>
	    <td id="10-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-30'); ?>,'10-30');</script></td>
	    <td id="10-31"><script>buscarAsistencia(<?php echo json_encode($ano.'-10-31'); ?>,'10-31');</script></td>
	   </tr>

     <tr class="success">
        <td>NOVIEMBRE</td>
        <td id="11-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-01'); ?>,'11-01');</script></td>
	    <td id="11-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-02'); ?>,'11-02');</script></td>
	    <td id="11-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-03'); ?>,'11-03');</script></td>
	    <td id="11-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-04'); ?>,'11-04');</script></td>
	    <td id="11-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-05'); ?>,'11-05');</script></td>
	    <td id="11-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-06'); ?>,'11-06');</script></td>
	    <td id="11-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-07'); ?>,'11-07');</script></td>
	    <td id="11-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-08'); ?>,'11-08');</script></td>
	    <td id="11-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-09'); ?>,'11-09');</script></td>
	    <td id="11-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-10'); ?>,'11-10');</script></td>
	    <td id="11-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-11'); ?>,'11-11');</script></td>
	    <td id="11-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-12'); ?>,'11-12');</script></td>
	    <td id="11-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-13'); ?>,'11-13');</script></td>
	    <td id="11-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-14'); ?>,'11-14');</script></td>
	    <td id="11-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-15'); ?>,'11-15');</script></td>
	    <td id="11-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-16'); ?>,'11-16');</script></td>
	    <td id="11-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-17'); ?>,'11-17');</script></td>
	    <td id="11-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-18'); ?>,'11-18');</script></td>
	    <td id="11-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-19'); ?>,'11-19');</script></td>
	    <td id="11-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-20'); ?>,'11-20');</script></td>
	    <td id="11-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-21'); ?>,'11-21');</script></td>
	    <td id="11-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-22'); ?>,'11-22');</script></td>
	    <td id="11-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-23'); ?>,'11-23');</script></td>
	    <td id="11-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-24'); ?>,'11-24');</script></td>
	    <td id="11-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-25'); ?>,'11-25');</script></td>
	    <td id="11-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-26'); ?>,'11-26');</script></td>
	    <td id="11-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-27'); ?>,'11-27');</script></td>
	    <td id="11-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-28'); ?>,'11-28');</script></td>
	    <td id="11-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-29'); ?>,'11-29');</script></td>
	    <td id="11-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-11-30'); ?>,'11-30');</script></td>
	    <td></td>
	   </tr>

	   <tr class="danger">
        <td>DICIEMBRE</td>
        <td id="12-01"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-01'); ?>,'12-01');</script></td>
	    <td id="12-02"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-02'); ?>,'12-02');</script></td>
	    <td id="12-03"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-03'); ?>,'12-03');</script></td>
	    <td id="12-04"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-04'); ?>,'12-04');</script></td>
	    <td id="12-05"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-05'); ?>,'12-05');</script></td>
	    <td id="12-06"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-06'); ?>,'12-06');</script></td>
	    <td id="12-07"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-07'); ?>,'12-07');</script></td>
	    <td id="12-08"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-08'); ?>,'12-08');</script></td>
	    <td id="12-09"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-09'); ?>,'12-09');</script></td>
	    <td id="12-10"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-10'); ?>,'12-10');</script></td>
	    <td id="12-11"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-11'); ?>,'12-11');</script></td>
	    <td id="12-12"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-12'); ?>,'12-12');</script></td>
	    <td id="12-13"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-13'); ?>,'12-13');</script></td>
	    <td id="12-14"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-14'); ?>,'12-14');</script></td>
	    <td id="12-15"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-15'); ?>,'12-15');</script></td>
	    <td id="12-16"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-16'); ?>,'12-16');</script></td>
	    <td id="12-17"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-17'); ?>,'12-17');</script></td>
	    <td id="12-18"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-18'); ?>,'12-18');</script></td>
	    <td id="12-19"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-19'); ?>,'12-19');</script></td>
	    <td id="12-20"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-20'); ?>,'12-20');</script></td>
	    <td id="12-21"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-21'); ?>,'12-21');</script></td>
	    <td id="12-22"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-22'); ?>,'12-22');</script></td>
	    <td id="12-23"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-23'); ?>,'12-23');</script></td>
	    <td id="12-24"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-24'); ?>,'12-24');</script></td>
	    <td id="12-25"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-25'); ?>,'12-25');</script></td>
	    <td id="12-26"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-26'); ?>,'12-26');</script></td>
	    <td id="12-27"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-27'); ?>,'12-27');</script></td>
	    <td id="12-28"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-28'); ?>,'12-28');</script></td>
	    <td id="12-29"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-29'); ?>,'12-29');</script></td>
	    <td id="12-30"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-30'); ?>,'12-30');</script></td>
	    <td id="12-31"><script>buscarAsistencia(<?php echo json_encode($ano.'-12-31'); ?>,'12-31');</script></td>
	   </tr>
	 	
    </tbody>
  </table>
</div>

</div>
</div>
</div>


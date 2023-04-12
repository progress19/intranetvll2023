function buscarAsistencia(fecha,tdid) {
  $('#'+tdid).html('<img src="../../images/franco-loader.gif" alt="" />');
    $.ajax({   
        //"dataType": "jsonp", 
        url: "buscarAsistenciaAjax",   
//       data: "legajo="+<?php echo $legajo; ?>+"&fecha="+fecha,   
        success: function(msg){     
            $('#'+tdid).html(msg);
        } 
    });
}

/* ASISTENCIAS */

function buscarDiaLegajo(legajo,idEstado,idPersonal) {
    $('#u_estado_'+legajo).html('<img src="../../images/franco-loader.gif" alt="" />');
    $('#u_fecha_'+legajo).html('<img src="../../images/franco-loader.gif" alt="" />');
    $('#u_francos_'+legajo).html('<img src="../../images/franco-loader.gif" alt="" />');

    var fecha = document.getElementById("fecha_de_asistencia").value;
          
    $.ajax({   
        //"dataType": "jsonp", 
        url: "buscarDiaLegajoAjax",   
        data: "legajo="+legajo+"&idEstado="+idEstado+"&fecha="+fecha+"&idPersonal="+idPersonal,   
        success: function(msg){     
            var variables = msg;
            var elem = variables.split('|');
            estado = elem[0];
            hoy = elem[1];
            saldo = elem[2];
            
              //alert(hoy);
              $('#u_estado_'+legajo).html(estado);
              $('#u_fecha_'+legajo).html(hoy);
              $('#u_francos_'+legajo).html(saldo);

              $('#u_fecha_'+legajo).removeClass('fuente-roja');
              $('#u_fecha_'+legajo).addClass('fuente-negra');

       } 
    });

}

function refrescar_estadisticas() {
  
      var fecha = document.getElementById("fecha_de_estadistica").value;
      $('#estadisticas').html('<img src="../images/loading.gif" style="padding: 30px;">');

      $.ajax({   
        //"dataType": "jsonp", 
        url: "home/refrescar_estadisticas",   
        data: "fecha="+fecha,   
        success: function(datos){     
            $("#estadisticas").addClass('displayNone');
            $(".btn").addClass('displayNone');
            $("#estadisticas").html(datos);

       } 
    });
  
}

function domingos() {
  
      var desde = document.getElementById("desde").value;
      var hasta = document.getElementById("hasta").value;
      $('#domingos').html('<img src="../../images/loading.gif" style="padding: 30px;">');

      $.ajax({   
        //"dataType": "jsonp", 
        url: "domingosAjax",   
        data: "desde="+desde+"&hasta="+hasta,   
        success: function(datos){     
            //$("#domingos").addClass('displayNone');
            $(".btn").addClass('displayNone');
            $("#domingos").html(datos);
       } 
    });
  }

function domingosExcel() {
  
      var desde = document.getElementById("desde").value;
      var hasta = document.getElementById("hasta").value;
      $('#domingos').html('<img src="../../images/loading.gif" style="padding: 30px;">');

      $.ajax({   
        url: "domingosAjaxExcel",   
        data: "desde="+desde+"&hasta="+hasta,  
        success: function(datos){     
            //$("#domingos").addClass('displayNone');
            $(".btn").addClass('displayNone');
            $('#domingos').html(datos);
            window.open('domingosAjaxExcel1?desde='+desde+'&hasta='+hasta,'_blank' );
       } 
    });
  }

  function comidas() {
  
      var desde = document.getElementById("desde").value;
      var hasta = document.getElementById("hasta").value;
      $('#comidas').html('<img src="../../images/loading.gif" style="padding: 30px;">');

      $.ajax({   
        url: "comidasAjax",   
        data: "desde="+desde+"&hasta="+hasta,   
        success: function(datos){     
            $(".btn").addClass('displayNone');
            $("#comidas").html(datos);
       } 
    });
  }

function comidasExcel() {
  
      var desde = document.getElementById("desde").value;
      var hasta = document.getElementById("hasta").value;
      $('#comidas').html('<img src="../../images/loading.gif" style="padding: 30px;">');

      $.ajax({   
        url: "comidasAjaxExcel",   
        data: "desde="+desde+"&hasta="+hasta,  
        success: function(datos){     
            //$("#comidas").addClass('displayNone');
            $(".btn").addClass('displayNone');
            $('#comidas').html('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Proceso Terminado!');
            window.open('comidasAjaxExcel?desde='+desde+'&hasta='+hasta,'_blank' );
       } 
    });
  }


function asistenciasExcel() {
  
      var desde = document.getElementById("from_date").value;
      var hasta = document.getElementById("to_date").value;

      if (desde=='' || hasta=='') {$('#errorFecha').html('<p style="color: red; font-weight: 600;">Error : debe ingresar un rango de fechas para realizar el informe.</p>');} 
        else {
            $('#errorFecha').html('');
            window.open('asistenciasAjaxExcel?desde='+desde+'&hasta='+hasta,'_blank' );
    /*
      $.ajax({   
       // url: "asistenciasAjaxExcel",   
        //data: "desde="+desde+"&hasta="+hasta,  
        success: function(datos){     
            //$("#domingos").addClass('displayNone');
            //$(".btn").addClass('displayNone');
            //$('#domingos').html(datos);
            window.open('asistenciasAjaxExcel?fecha='+fecha,'_blank' );
       } 
     });
    */
        }
    }

function asistenciasGraficoExcel(legajo,ano) {
      alert('El archivo comenzará a generase, clic en OK y espere la siguiente ventana.');
      $.ajax({   
       
          success: function(datos){     
            window.open('../asistencias/francosGraficoExcel?legajo='+legajo+'&a='+ano,'_blank' );
       } 
    });

    }

function selectTodosLosDias(){

if($("#Shows_todoslosdias:checked").val() == 'on'){
    $('#divFecha').addClass( 'displayNone' );
}

else {
    $('#divFecha').removeClass( 'displayNone' );   
}}

function estadisticasComProve() {
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();

    $.ajax({
      url: 'estadisticasComProveAjax',
      type: 'POST',
      data: "desde="+desde+"&hasta="+hasta,  
        success: function(datos){ 
          $("#content").removeClass('fade out');
          $('#modal-estadisticasProve').modal('show');
          $('.modal-body').html(datos); 
        }

    })
}

function estadisticasComSector() {
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();

    $.ajax({
      url: 'estadisticasComSectorAjax',
      type: 'POST',
      data: "desde="+desde+"&hasta="+hasta,  
        success: function(datos){ 
          $("#content").removeClass('fade out');
          $('#modal-estadisticasSector').modal('show');
          $('.modal-body').html(datos); 
        }

    })
}

function cargaSaldoMasivo() {
      
      $("#msj_inicial").fadeOut();
      $(".btn").fadeOut();
      $('#carga').html('<img src="../../images/loading.gif" style="padding: 30px;">');

      $.ajax({   
        url: "cargaMasivaAjax",   
        success: function(datos){   
          $("#carga").addClass('displayNone');
          $("#msj_final").fadeIn();
          $('#saldo_inicial').html(datos);  
      } 
    });

}

function ticketsExcel() {
  
      var desde = document.getElementById("desde").value;
      var hasta = document.getElementById("hasta").value;

      if (desde=='' || hasta=='') {$('#errorFecha').html('<p style="color: red; font-weight: 600;">Error : debe ingresar un rango de fechas para realizar el informe.</p>');} 
        else {
            $('#errorFecha').html('');
            window.open('ticketsAjaxExcel?desde='+desde+'&hasta='+hasta,'_blank' );

        }
    }
function guardarEstadoPista(idPista, idEstado) {

        $.ajax({   
        url: "guardarEstadoPistaAjax", 
        type: 'POST',
        data: "idPista="+idPista+"&idEstado="+idEstado,   
        success: function(datos){   
               
      } 
    });
        }

  function guardarTipoPista(idPista, idTipo) {

        $.ajax({   
        url: "guardarTipoPistaAjax", 
        type: 'POST',
        data: "idPista="+idPista+"&idTipo="+idTipo,   
        success: function(datos){   
               
      } 
    });      

}

function controlHorario() {
  
      var legajo = document.getElementById("legajo").value;
      var desde = document.getElementById("desde").value;
      var hasta = document.getElementById("hasta").value;

      $('#controlHorario').html('<img src="../../images/loading.gif" style="padding: 30px;">');

      $.ajax({   
        //"dataType": "jsonp", 
        url: "controlHorarioAjax",   
        data: "desde="+desde+"&hasta="+hasta+"&legajo="+legajo,   
        success: function(datos){     

            $(".btn").addClass('displayNone');
            $("#controlHorario").html(datos);
       } 
    });
  }

  function cargarHorario() {
  
      var legajo = document.getElementById("legajo").value;
      var fecha = document.getElementById("fecha").value;
      
      $('#cargarHorario').html('<img src="../../images/loading.gif" style="padding: 30px;">');

      $.ajax({   
        //"dataType": "jsonp", 
        url: "cargarHorarioAjax",   
        data: "fecha="+fecha+"&legajo="+legajo,   
        success: function(datos){     

            $(".btn").addClass('displayNone');
            $("#cargarHorario").html(datos);
       } 
    });
  }

function horarioEmpleado() {
  
      var legajo = document.getElementById("legajo").value;
      var desde = document.getElementById("desde").value;
      var hasta = document.getElementById("hasta").value;

      $('#controlHorario').html('<img src="../../images/loading.gif" style="padding: 30px;">');

      if (desde=='' || hasta=='' || legajo=='') {

        $('#controlHorario').html('<p style="color: red; font-weight: 600;">Error : debe ingresar todos los campos para realizar el informe.</p>');} 
        
        else {

            $('#controlHorario').html('');
            window.open('horarioEmpleadoPrint?desde='+desde+'&hasta='+hasta+'&legajo='+legajo,'_blank' );
      
      }

}
 
function horariosExcel() {
  
      var desde = document.getElementById("from_date").value;
      var hasta = document.getElementById("to_date").value;

      if (desde=='' || hasta=='') {$('#errorFecha').html('<p style="color: red; font-weight: 600;">Error : debe ingresar un rango de fechas para realizar el informe.</p>');} 
        else {
            $('#errorFecha').html('');
            window.open('horariosAjaxExcel?desde='+desde+'&hasta='+hasta,'_blank' );

        }
    }



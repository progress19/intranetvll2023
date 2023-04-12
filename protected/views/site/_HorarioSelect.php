
<script>
    clearTimeout(autenticacion_time);
    horario_time = setTimeout('recarga_horario()',7000)
</script>

<div class="col-md-12">

<h2>SELECCIONÁ LA OPCION...</h2>
<div class="divide80"></div>

<div class="col-md-12">
	<button type="button" onfocus="javascripts:selectHorario(this.value)" id="bot1" class="btn move btn-horarios" value="1" autocomplete="off"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> ENTRADA</button>

	<button type="button" onfocus="javascripts:selectHorario(this.value)" id="bot2" class="btn move btn-horarios" value="2" autocomplete="off"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> SALIDA</button>
</div>

</div>

<script>

$("#bot1").focus(); 

function selectHorario(id){

	$('#idTipo').val(id);
	$(".btn").removeClass('prove_seleccionado');
	$(".btn").addClass('prove_noseleccionado');
	$('#bot'+id).removeClass('prove_noseleccionado');
	$('#bot'+id).addClass('prove_seleccionado');
	$('#bot'+id).addClass('animated pulse');

}

/* evento con click*/

$('.btn-horarios').click(function() {

            clearTimeout(horario_time);
    
            var idTipo = $('#idTipo').val();
            var idCard = $('#idCard_save').val();
            var idLegajo = $('#idLegajo_save').val();
            $('#proveedores').html('<img src="images/loading.gif" style="padding-top: 100px;" alt="" />');
            $.ajax({   
                url: "site/saveHorario",
                data: "idTipo="+idTipo+"&idCard="+idCard+"&idLegajo="+idLegajo,      
                success: function(datos){   
                    
                    setTimeout(function() { $('.home-page').html(datos) },100)
                    //$(location).attr('href','/intranetvll2/lector');
               } 
            });

})

/* evento teclado */
	
$(document).keydown(
    function(e)  {    

    	$('.move').removeClass('animated pulse');

    	if (e.keyCode==13) {  //enter
    		//alert($('#idTipo').val());
            clearTimeout(horario_time);
            var idCard = $('#idCard_save').val();
            var idTipo = $('#idTipo').val();
            var idLegajo = $('#idLegajo_save').val();
            $('#horarios').html('<img src="images/loading.gif" style="padding-top: 100px;" alt="" />');
            $.ajax({   
                url: "site/saveHorario",
                data: "idCard="+idCard+"&idTipo="+idTipo+"&idLegajo="+idLegajo,     
                success: function(datos){   
                    
                    setTimeout(function() { $('.home-page').html(datos) },100)

               } 
            });
    	}

        if (e.keyCode == 39) {    
            $(".move:focus").next().focus();
        }
        if (e.keyCode == 37) {   
            $(".move:focus").prev().focus();
        }
    }
);

</script>

<input type="hidden" id="idTipo">
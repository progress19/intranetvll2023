<script>
    //clearTimeout(autenticacion_time); activar si va autenticacion
    proveedor_time = setTimeout('recarga()',12000)
</script>

<div class="col-md-12">

<h2>Por favor, seleccioná el lugar...</h2>
<br>
<?php foreach ($proveedores as $proveedor): ?>
	
<button type="button" onfocus="javascripts:selectProve(this.value)" id="bot<?php echo $proveedor->idProveedor; ?>" class="btn move btn-proveedores hvr-grow" value="<?php echo $proveedor->idProveedor; ?>" autocomplete="off"><?php echo $proveedor->nombre; ?></button>

<?php endforeach ?>

</div>

<script>
	$("#proveedores_radio_0").focus(); 
	$("#proveedores_radio_0").prop("checked", true);
</script>

<script>
    $("#bot1").focus(); 

    function selectProve(id){
        $('#idProveedor').val(id);
        //$(".btn").removeClass('prove_seleccionado');
        //$(".btn").addClass('prove_noseleccionado');
        //$('#bot'+id).removeClass('prove_noseleccionado');
        //$('#bot'+id).addClass('prove_seleccionado');
        $('#bot'+id).addClass('animated pulse');
    }

    /* evento con click*/

    $('.btn-proveedores').click(function() {
        clearTimeout(proveedor_time);

        var idProve = $('#idProveedor').val();
        var idCard = $('#idCard_save').val();
        var idTipo = $('#idTipo_save').val();
        var idLegajo = $('#idLegajo_save').val();
        $('#proveedores').html('<img src="images/loading.gif" style="padding-top: 100px;" alt="" />');
        $.ajax({   
            url: "site/saveTicket",
            data: "idProve="+idProve+"&idCard="+idCard+"&idTipo="+idTipo+"&idLegajo="+idLegajo,      
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
                //alert($('#idProveedor').val());
                clearTimeout(proveedor_time);
                var idProve = $('#idProveedor').val();
                var idCard = $('#idCard_save').val();
                var idTipo = $('#idTipo_save').val();
                var idLegajo = $('#idLegajo_save').val();
                $('#proveedores').html('<img src="images/loading.gif" style="padding-top: 100px;" alt="" />');
                $.ajax({   
                    url: "site/saveTicket",
                    data: "idProve="+idProve+"&idCard="+idCard+"&idTipo="+idTipo+"&idLegajo="+idLegajo,     
                    success: function(datos){   
                        
                        setTimeout(function() { $('.home-page').html(datos) },100)
                        //$(location).attr('href','/intranetvll2/lector');
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

<input type="hidden" id="idProveedor">
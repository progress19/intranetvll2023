$(document).ready(function(){

/* FORM RECUPERAR CONTRASEÑA */

$("#mensajeR").hide();

$("#frmRecuperar").validate({

    event: "blur",rules: {'usuario': "required"},
    messages: {'usuario': "Ingrese un usuario"},
    debug: true,errorElement: "label",
    submitHandler: function(form){
        $("#a").hide();
        $("#b").hide();
        $("#mensajeR").show();
        $("#mensajeR").html("<div class='col-md-12' style='text-align: center; color:#000; font-size: 14px; background-color: rgb(255, 255, 255); min-height: 150px; padding-top: 55px;'><img src='../images/loading1.gif' style='vertical-align:middle;margin:0 10px 0 0' />Enviando contraseña...</div>");
        $.ajax({
            type: "POST",
            url:$('#URLRAIZ').val()+"/admin/default/recuperarpass",
            contentType: "application/x-www-form-urlencoded",
            processData: true,
            data: "usuario="+escape($('#ContactUsuario').val()),
            dataType: 'json',
            success: function(r){
                console.log(r);
                $("#mensajeR").html("<div class='col-md-12' style='text-align: center; color:#000; font-size: 14px; background-color: rgb(255, 255, 255); min-height: 150px; padding-top: 55px;'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span> "+r.msg+"</div>");
                setTimeout(function() {$('#mensajeR').fadeOut('fast');}, 3000000);

            }
        });
    }
});

 


                

	});

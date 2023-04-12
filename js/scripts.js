
function buscarPersonalIdCard(idCard,app) { // app 1 => Comedor / 2 => Horario 

   $('#datosEmpleado').html('');
   $('#mensajeInicial').addClass('animated bounceOutDown');
   $('#mensajeInicial').hide(); 
   $('#loading-card').fadeIn();
   $('#loading-card').html('<img src="images/loading.gif" alt="" />');

   var idCard = parseInt(idCard);

    $.ajax({   
        url: "site/buscarPersonalIdCardAjax",   
        data: "idCard="+idCard+"&app="+app,   
        success: function(datos){     
       
            $('#mensajeInicial').fadeOut(); 
            $('#loading-card').hide();
            $('#datosEmpleado').addClass('animated bounceInLeft');
            $("#datosEmpleado").html(datos);
            $("#idCard").val('');
            $("#pass").val('');
            $('#mensajes h2').html('POR FAVOR, INGRESA TU CONTRASEÑA...');
            setTimeout(function() { $('.active-turno').addClass('animated bounceIn');},600);
            setTimeout(function() { $('#pass').addClass('animated shake');},600);
            clearTimeout(focusIdCard);
        } 
    });
}

function autenticacion (idCard,pass) {

      $.ajax({   
        url: "site/autenticacionCardAjax",   
        data: "idCard="+idCard+"&pass="+pass,   
        success: function(datos){   
            
        if (datos==1) {
            
                $('.container-keypad').addClass('animated bounceOutLeft');
                $('#mensajes h2').addClass('animated bounceOutLeft');
                $('#autenticacion').addClass('animated bounceOutLeft');

                var url = parseInt($('#tipoUrl').val());

                switch(url) {  
                  case 1:
                    var url_res = 'site/renderProveedores';
                    var div = 'proveedores';  
                    break;
                  case 2:
                    var url_res = 'site/renderRegistroHorarios';
                    var div = 'horarios';
                    break;
                } 

                $('#conte-keypad').hide();

              $.ajax({   
                url: url_res,   
                success: function(datos){   

            if (url==1) { //comedor

                    $("#foto-card").animate({height: 200},100);
                    $("#datosEmpleado h1").animate({fontSize: 24},150);
                    $("#datosEmpleado h1").animate({marginTop: 0},200);
                    $("#datosEmpleado h4").animate({fontSize: 15},250);
                    $("#datosEmpleado h3").animate({fontSize: 17},300);
                    $("#datosEmpleado h5").animate({fontSize: 11},300);
                    $("#datosEmpleado hr").animate({marginTop: 10},300);
                    $(".turnos-info p").animate({fontSize: 17},350);
                    $(".badge-green").animate({fontSize: 18},350);
                    $(".tarjeta").animate({height: 240},350);
                    $("#"+div).animate({top: 260},300);
                    $("#"+div+' h2').addClass('animated wobble');
                }

                    $('#errorPass').addClass('animated bounceOutLeft');
                    $('#'+div).addClass('animated bounceInLeft');
                    $('#'+div).html(datos);
                    $("#pass").val('');
                    $("#"+div).animate({top: 260},300);
                    $("#"+div+' h2').addClass('animated wobble');

               } 
            });
  
        } 

        if (datos==0) { // error pass

            $('#errorPass').addClass('animated shake');
            $('#mensajes H2').addClass('displayNone');
            $('#errorPass').html('<h2 style="color: red;text-align: center !important;"><i class="fas fa-thumbs-down"></i> CONTRASEÑA INCORRECTA, REINTENTA...</h2>');
            $('#errorPass').addClass('animated shake');

              $.ajax({   

                url: "site/renderInputPass", 
                data: "idCard="+idCard,   
                success: function(datos){   
                    clearTimeout(autenticacion_time);

                    $('#autenticacion').html(datos);
                    $("#pass").focus(); 
                    $('#errorPass').removeClass('animated shake');
                    $("#pass").val('');
                } 
            });
        } 
       } 
    });

}

function focusIdCard() {

    document.getElementById("idCard").focus();
    $("#idCard").val('');
    }

function focusIdCarda() {

    document.getElementById("idCard").focus();
    $("#idCard").val('');

    var focusIdCard = setTimeout(focusIdCarda(),3000);

}

function om() { //check terminal ip 'fraude'

    //ip_request_localhost_server_token_SEND_NOW();

    $('input').on("paste",function(e) {
        e.preventDefault();
    });

    $('input').keypress(function(event) {
        if (event.keyCode == 13) {event.preventDefault()}

    });

}

function recarga() {location.href = 'lector'}

function recarga_horario() {location.href = 'horario'}


var dayarray=new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado")
var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")

function getthedate(){
    var mydate = new Date()
    var year = mydate.getYear()
    if (year < 1000)
        year+=1900
    var day = mydate.getDay()
    var month = mydate.getMonth()
    var daym = mydate.getDate()
    if (daym<10)
        daym="0"+daym
    var hours=mydate.getHours()
    var minutes=mydate.getMinutes()
    var seconds=mydate.getSeconds()
    var dn="AM"
    if (hours>=12)
        dn="PM"
    if (hours>12){
        hours=hours-12
    }
    if (hours==0)
        hours=12
    if (minutes<=9)
        minutes="0"+minutes
    if (seconds<=9)
        seconds="0"+seconds
//change font size here
var cdate="<p class='fecha'>"+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+" | "+hours+":"+minutes+":"+seconds+" "+dn+"</p>"
if (document.all)
    document.all.clock.innerHTML=cdate
else if (document.getElementById)
    document.getElementById("clock").innerHTML=cdate
else
    document.write(cdate)
}

if (!document.all&&!document.getElementById)
    getthedate()
function goforit(){
    if (document.all||document.getElementById)
        setInterval("getthedate()",1000)
}


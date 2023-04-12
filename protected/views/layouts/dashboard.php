<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  

<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>   
  
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/pretty-photo/css/prettyPhoto.css"> 
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body class="home-page">
    <div class="wrapper">
        <!-- ******HEADER****** --> 
        <header class="header">  
            <div class="top-bar">
              <div class="container">              
        
              </div>      
            </div><!--//to-bar-->
            <div class="header-main container">
                <h1 class="col-md-2 col-sm-2">
                    <a href="<?php echo URLRAIZ ?>"><img id="logo" src="<?php echo URLRAIZ ?>/images/laslenaslogo.jpg" class="logo" ></a>
                </h1><!--//logo-->           
                <div class="info col-md-10 col-sm-10">
          
                    <span id="clock"></span>
                    <h6><body onLoad="goforit()"></h6>

                  <div class="contact pull-right">
            
                    <strong>Bienvenido a la Intranet de Valle de Las Leñas.</strong> <br>
El objetivo de este espacio es potenciar la comunicación interna entre los sectores que integran
Valle de Las Leñas S.A. ofreciendo así toda información que consideremos de interés común.
La Intranet se ha creado como una herramienta interna con el objetivo de conseguir
una comunicación más efectiva y facilitar la coordinación entre los diferentes
sectores, centralizando su información y optimizando los recursos disponibles.            
      

                  </div><!--//contact-->
                </div><!--//info-->
            </div><!--//header-main-->
        </header><!--//header-->
        
        <!-- ******NAV****** -->
        <nav class="main-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item"><a href="<?php echo URLRAIZ ?>">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">RRHH <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo URLRAIZ ?>/admin/personal/asistenciadiariasector" target="new">Asistencias</a></li>
                                <li><a href="<?php echo URLRAIZ ?>/site/reglamentos">Reglamentos</a></li>
                                <li><a href="<?php echo URLRAIZ ?>/site/formularios">Formularios</a></li>  
                            </ul>
                        </li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </div><!--//container-->
        </nav><!--//main-nav-->
        
        <!-- ******CONTENT****** --> 
        <div class="content container">

           <?php echo $content; ?>

        </div><!--//content-->
    </div><!--//wrapper-->
    
    <div class="divider20" style="background-color: rgb(245, 245, 245);"></div>

    <!-- ******FOOTER****** --> 
    <footer class="footer">
       <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <small class="copyright col-md-7 col-sm-12 col-xs-12">Intranet Valle de Las Leñas S.A. | Todos los Derechos Reservados por <a href="http://www.laslenas.com" target="_new">Valle de Las Leñas</a> | Desarrollado por <a id="popoverData" class="" href="#" data-html="true"  data-content="<div><b>Análisis, desarrollo y programación : </b><br>Mauricio Lavilla - mauriciolav@gmail.com</div>" rel="popover" data-placement="top" data-original-title="" style="color: #FFF;" data-trigger="hover">ML</a>.-</small>

                </div><!--//row-->
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->
    
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-hover-dropdown.min.js"></script> 

<script>

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
var cdate="<small><font color='000000' face='Arial'><b>"+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+" "+hours+":"+minutes+":"+seconds+" "+dn
+"</b></font></small>"
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

$('#popoverData').popover();

</script>

</body>

</html> 










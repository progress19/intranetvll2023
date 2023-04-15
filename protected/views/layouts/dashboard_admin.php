<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
  
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/nprogress.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/skins/skin-purple-light.min.css" rel="stylesheet" type="text/css" />

<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body class="skin-purple-light sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin" class="logo">

           <img src="<?php echo URLRAIZ ?>/images/logo_intranet.png" class="img-responsive" alt="" /> 

        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                       
              <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>

                                <?php if(!Yii::app()->user->isGuest and isset(Yii::app()->user->nombre)){
                                    echo Yii::app()->user->nombre.' '.Yii::app()->user->apellido; } ?> 

                                    <i class="caret">
                                    </i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <?php if(isset(Yii::app()->user->avatar)) : ?>
                                    <img src="<?php echo Yii::app()->request->baseUrl.Yii::app()->user->avatar; ?>" class="img-circle" alt="Imagen Usuario" />
                                    <?php endif ?>

                                    <p>
                                        <?php if(!Yii::app()->user->isGuest and isset(Yii::app()->user->nombre)){
                                            echo Yii::app()->user->nombre.' '.Yii::app()->user->apellido; } ?> 
                                            <small>
                                                <?php if(!Yii::app()->user->isGuest and isset(Yii::app()->user->ultimologin)){
                                                    echo "Ultimo Acceso: ".Yii::app()->dateFormatter->format("d-M-y h:m a", Yii::app()->user->ultimologin);} ?>                                         
                                                </small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="col-xs-4 text-center">
                                                <a href="#"></a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#"></a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#"></a>
                                            </div>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                            <?php if (Yii::app()->user->roles=='administrador') : ?>
                                                    
                                              <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/usuario/admin" class="btn btn-default btn-flat">Perfil</a>
                                            
                                            <?php endif ?>

                                            </div>
                                            <div class="pull-right">
                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout" class="btn btn-default btn-flat">Log out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                <?php if(isset(Yii::app()->user->avatar)) : ?>
                <img src="<?php echo Yii::app()->request->baseUrl.Yii::app()->user->avatar; ?>" class="img-circle" alt="Imagen Usuario" />
                <?php endif ?>
            </div>
            <div class="pull-left info">
                <p>Hola,                 
                    <?php if(!Yii::app()->user->isGuest and isset(Yii::app()->user->nombre)){
                        echo Yii::app()->user->nombre; } ?> </p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->

<?php 
if(Yii::app()->user->roles=='administrador'){require_once Yii::app()->basePath . '/modules/admin/views/default/menu_admin.php';}
if(Yii::app()->user->roles=='supervisor-rrhh'){require_once Yii::app()->basePath . '/modules/admin/views/default/menu_supervisor-rrhh.php';}
if(Yii::app()->user->roles=='supervisor'){require_once Yii::app()->basePath . '/modules/admin/views/default/menu_supervisor.php';}
if(Yii::app()->user->roles=='pistas'){require_once Yii::app()->basePath . '/modules/admin/views/default/menu_pistas.php';}
?>

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
                                      
        <section class="content-header fade out">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $this->titulo  ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
            $this->widget('booster.widgets.TbBreadcrumbs',
                array('links'=>$this->breadcrumbs,));?>
        </section>


        <!-- Main content -->
        <section id="content" class="content fade out">

            <?php echo $content; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 5.5 - Abril 2023.
        </div>
        <strong><a href="http://laslenas.com/" target="new">Valle de Las Leñas S.A.</a> - </strong> Todos los Derechos Reservados. - - Desarrollado por <a id="popoverData" class="" href="#" data-html="true"  data-content="<div><b>Análisis, desarrollo y programación : </b><br>Mauricio Lavilla - mauriciolav@gmail.com</div>" rel="popover" data-placement="top" data-original-title="" style="color: #000;" data-trigger="hover">ML</a>.-
      </footer>
    
    </div><!-- ./wrapper -->

    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- AdminLTE App -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/app.min.js" type="text/javascript"></script>  
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/nprogress.js" type="text/javascript"></script>  
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/scripts.js" type="text/javascript"></script> 
    
  <script>
    $('body').show();

    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);

    $('#popoverData').popover();

  </script>

  </body>

</html>

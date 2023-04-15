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
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
  
    <script defer src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/fontawesome/on-server/js/fontawesome-all.js"></script>
    <!-- Theme CSS -->  
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles-lector.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body class="home-page">
    <div class="wrapper ">
        <div class="container">
        <div class="col-md-12">
           <?php echo $content; ?>
        </div>
        </div>
    </div><!--//wrapper-->
    
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap-hover-dropdown.min.js"></script> 

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js" type="text/javascript"></script> 

<script>goforit();</script>

</body>

</html> 










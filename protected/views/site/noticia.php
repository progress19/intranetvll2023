<link href="<?php echo Yii::app()->request->baseUrl; ?>/lightbox/css/lightbox.css" rel="stylesheet">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/lightbox/js/lightbox.js"></script>

<div class="page-wrapper">
    <header class="page-heading clearfix">
        <h1 class="heading-title pull-left">Noticias</h1>
        <div class="breadcrumbs pull-right">
            <ul class="breadcrumbs-list">
                <li><a href="<?php echo URLRAIZ; ?>">Home</a><i class="fa fa-angle-right"></i></li>
                <li class="current">Noticias</li>
            </ul>
        </div><!--//breadcrumbs-->
    </header> 
 
<div class="col-md-12">
	<h3><?php echo $noticia->nombre; ?></h3><br>
</div>

<div class="col-md-12">

<div class="" style="float:left; padding: 0 15px 0 0">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

          <?php

          $n=1;         
          foreach ($imagenes as $imagen) {

            if ($n==1) {

              ?>

              <div class="item active" name="fotos">
                <a href = "<?php echo URLRAIZ.'/pics/noticias/'. $imagen->imagen ?>" data-lightbox="lightbox" rel="group1" >
                  <?php echo CHtml::image($this->createUrl('site/maxresi', array('imagen'=>'./pics/noticias/'. $imagen->imagen,'alto'=>315, 'ancho'=>470)));?></a>
                </div>

                <?php } ELSE { ?>    

                <div class="item" name="fotos">
                  <a href = "<?php echo URLRAIZ.'/pics/noticias/'. $imagen->imagen ?>" data-lightbox="lightbox" rel="group1" >
                    <?php echo CHtml::image($this->createUrl('site/maxresi', array('imagen'=>'./pics/noticias/'. $imagen->imagen,'alto'=>315, 'ancho'=>470)));?></a>
                  </div>

                  <?php } ?>   

                  <?php
                  $n++;
                } ?>    
    
  </div>

  <!-- Controls -->
  
  <div id="carousel-control" class="displayNone">
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>

</div>
</div>

<div class="">
	<?php echo $noticia->descripcion; ?>
</div>

</div>

<div class="clearfix"></div>


<div class="divider20"></div>

<div class="col-md-6">

    <?php foreach ($videos as $video) : ?>

      <!-- 16:9 aspect ratio -->
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video->link; ?>"></iframe>
      </div>

    <?php endforeach ?> 
</div>
<div class="clearfix"></div>

<br><br><br>
</div>
 

    <script type="text/javascript">
      var elementos = document.getElementsByName("fotos");
      if (elementos.length>1) {
      	$("#carousel-control").removeClass("displayNone");	
      }
    </script>




<?php 
$imagen = Noticias::getImagenNoticiaHome($data->idNoticia);
?>

<article class="news-item page-row has-divider clearfix row">       
    
    <?php if ($imagen) : ?>
    <figure class="thumb col-md-3 col-sm-4 col-xs-5">
        <?php echo $imagen ?>
    </figure>
    <?php endif ?>
    
    <div class="details col-md-9 col-sm-8 col-xs-7">
        <h3 class="title"><a href="<?php echo URLRAIZ.'/site/noticia?idNoticia='.$data->idNoticia ?>"><?php echo $data->nombre; ?></a></h3>
        <p><?php echo recortar_texto($data->descripcion,220) ?> </p>
        <a class="btn btn-theme read-more" href="<?php echo URLRAIZ.'/site/noticia?idNoticia='.$data->idNoticia ?>">Leer Más...<i class="fa fa-chevron-right"></i></a>
    </div>
</article><!--//news-item-->
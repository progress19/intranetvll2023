<div class="page-wrapper">
    <header class="page-heading clearfix">
        <h1 class="heading-title pull-left"><i class="fa fa-fw fa-newspaper-o"></i> Noticias</h1>
        <div class="breadcrumbs pull-right">
            <ul class="breadcrumbs-list">
                <li><a href="<?php echo URLRAIZ; ?>">Home</a><i class="fa fa-angle-right"></i></li>
                <li class="current">Noticias</li>
            </ul>
        </div><!--//breadcrumbs-->
    </header> 
    <div class="page-content">
        <div class="row page-row">
            <div class="news-wrapper col-md-7 col-sm-7">                         

                <?php echo $this->renderPartial("_noticias",  array(
                    'dataProvider' => $dataProvider,
//"pageSize"=>$pageSize, 
                    ))?>

                </div><!--//news-wrapper-->

                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-fw fa-phone"></i> Internos Telefónicos</h3>
                        </div>
                        <div class="panel-body">

                            <?php 

                            $internos_array = array();

                            foreach ($internos as $interno) {
                                $internos_array[] = $interno->nombre.' - '.$interno->numero;
                            }

                            $this->widget(
                                'booster.widgets.TbTypeahead',
                                array(
                                    'name' => 'demo-typeahead',
                                    'datasets' => array(
                                        'source' => $internos_array,
                                        'limit' => 2,
                                        ),
                                    'options' => array(
                                        'hint' => true,
                                        'highlight' => true,
                                        'minLength' => 1,
                                        'maxItems'=>4,
                                        
                                        ),
                                        'htmlOptions' => array(
                                            'placeholder' => 'Ingrese nombre a Buscar...'
                                        ),
                                    )
                                );
                                ?>   

                            </div>
                        </div>
                    </div>


                    <aside class="page-sidebar col-md-5 col-sm-5">                    
                        <section class="widget has-divider">
                            <h3 class="title"><i class="fa fa-fw fa-sun-o"></i> Pronóstico</h3>

      <link href="//es.snow-forecast.com/stylesheets/feed.css" media="screen" rel="stylesheet" type="text/css" /><div id="wf-weatherfeed"><iframe style="overflow:hidden;border:none;" allowtransparency="true" height="272" width="100%" src="//es.snow-forecast.com/resorts/Las-Lenas/forecasts/feed/mid/m" scrolling="no" frameborder="0" marginwidth="0" marginheight="0"><p>Su navegador no da soporte a iframes</p></iframe><div id="wf-link"><a href="http://www.snow-forecast.com/"><img alt="Snow Forecast" src="//es.snow-forecast.com/images/feed/snowlogo-150.png"/></a><p id="cmt">Panorama detallado del Pronóstico de Nieve para <a href="http://es.snow-forecast.com/resorts/Las-Lenas?utm_source=embeddable&amp;utm_medium=widget&amp;utm_campaign=Las-Lenas">Las Leñas</a> en:<br /><a href="http://es.snow-forecast.com/resorts/Las-Lenas?utm_source=embeddable&amp;utm_medium=widget&amp;utm_campaign=Las-Lenas"><strong>snow-forecast.com</strong></a></p><div style="clear: both;"></div></div></div>
                        </section><!--//widget-->

                        <section class="widget has-divider">
                            <h3 class="title">Enlaces de Interés</h3>
                            <article class="events-item row page-row">                                    

                                <div class="details col-md-9 col-sm-8 col-xs-8">
                                    
                                </div><!--//details-->                                    
                            </article>

                        </section><!--//widget-->

                    </aside>
                </div><!--//page-row-->
            </div><!--//page-content-->
        </div><!--//page--> 



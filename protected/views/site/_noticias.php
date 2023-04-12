<?php
$template = '
       <div class="pull-right pager_res">
            {pager} 
       </div>     
       <div class="clearfix"></div>
    
    {items}

    <div class="pull-right pager_res">
        {pager}
    </div>  
    ';

    ?>


<?php 

$this->widget('booster.widgets.TbListView', array(
    'ajaxType'=>'post',
    'ajaxUpdate'=>true,
    'dataProvider'=>$dataProvider,
    'id'=>'noticias',
    'template' => $template,
    'itemView'=>'_noticia',
    'summaryText' => "{start} - {end} de {count} Noticias",
    //'viewData'=>array('page'=>$page),
    //'itemsTagName'=>'table',
    'itemsCssClass'=>'items table table-striped table-condensed',
    'emptyText'=>'<i> Disculpe, no se encontraron registros para la consulta realizada</i>',
    ));

 ?>


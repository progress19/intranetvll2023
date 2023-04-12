<div class="page-wrapper">
    <header class="page-heading clearfix">
        <h1 class="heading-title pull-left">Reglamentos</h1>
        <div class="breadcrumbs pull-right">
            <ul class="breadcrumbs-list">
                <li><a href="<?php echo URLRAIZ; ?>">Home</a><i class="fa fa-angle-right"></i></li>
                <li class="current">Reglamentos</li>
            </ul>
        </div><!--//breadcrumbs-->
    </header> 

<div class="col-md-8">
		<?php

		$gridDataProvider = new CArrayDataProvider($reglamentos,
			array(
         	'keyField'=>false,
         	'pagination'=>array(
            'pageSize'=>30,
         )));

		$this->widget(
        'booster.widgets.TbGridView',
        array(
            'dataProvider' => $gridDataProvider,
            //'template' => "{items}",
            'columns' => array(
            	array(
            		'header' => 'Nombre',
            		'value' => '$data->nombre'),

    array(
       'name'=>'archivo',
       'header'=>'Archivo',
       'value' => 'CHtml::link($data->archivo, Yii::app()->createUrl("pics/reglamentos/".$data->archivo), array("target"=>"_blank"))',
       'headerHtmlOptions'=>array('width'=>'450px'),
       'type'=>'raw'
	),

    array(
    'class'=>'zii.widgets.grid.CButtonColumn',
    'template' => '{view}',
    'buttons'=>array(
        'view' => array(
            'url' => 'Yii::app()->createUrl("pics/reglamentos/".$data->archivo)', // view url
            'options' => array('target' => '_new'),
        ),
    ),
),

   	)
    )
    );

 ?>

<hr>

<p style="font-style: oblique;"><span class="glyphicon glyphicon-zoom-in"></span> Clic en nombre de Archivo para visualizar.</p>


</div>

</div>   

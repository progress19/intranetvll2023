<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->menu_usuarios = 'active';
$this->menu_usuarios_l = 'active';

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Usuarios', 'url'=>array('index')),
	array('label'=>'Nuevo usuario', 'url'=>array('create')),
);

$this->titulo='Usuarios';

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="box box-solid">
<div class="box-header">
<h3 class="box-title"></h3>
<a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Usuario</a>

<?php echo CHtml::link('<span class="glyphicon glyphicon-search"></span> Buscar','#',array('class'=>'btn btn-primary search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</div>
</div>



<div class="box box-primary">
<div class="box-header">

<?php 

 $this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
    // 40px is the height of the main navigation at bootstrap
    'filter'=>$model,
    'type' => 'striped',
    'dataProvider'=>$model->search(),
    'responsiveTable' => true,
    'template'=>'{summary}{items}{pager}',
    'enablePagination' => true,
	'columns'=>array(
        array(
            'name'=>'username',
            'header'=>'Usuario'
            ),
            array(  
            'name' => 'avatar',
            'header' => 'Avatar',
            'type'=>'html',
            'filter'=> '',
            'value'=>'$data->getAvatar()',
        ),
        'apellido',
        'nombre',
       	    array(  
            'class' => 'booster.widgets.TbToggleColumn',
            'name' => 'estado',
            'header' => 'Estado',
            'filter'=>array('1'=>'Activado','0'=>'Desactivado'),
        ),
             array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
    )
  ))  

    );


/* con ventana modal para la vista 
 $this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
    // 40px is the height of the main navigation at bootstrap
    'filter'=>$model,
    'type' => 'striped',
    'dataProvider'=>$model->search(),
    'responsiveTable' => true,
    'template'=>'{summary}{items}{pager}',
    'enablePagination' => true,
	'columns'=>array(
		'username',
		'password', array(
    'htmlOptions' => array('nowrap'=>'nowrap'),
    'class'=>'booster.widgets.TbButtonColumn',
                'buttons'=>array(
                'view'=>
                    array(
                        'url'=>'Yii::app()->createUrl("usuario/view", array("id"=>$data->id))',
                        'options'=>array(
                            'ajax'=>array(
                                'type'=>'POST',
                                'url'=>"js:$(this).attr('href')",
                                'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
                            ),
                        ),
                    ),
            ),
    )
  ))  
  );*/



 ?>

<!-- View Popup  -->
<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'viewModal')); ?>
<!-- Popup Header -->
<div class="modal-header">
<h4>View Employee Details</h4>
</div>
<!-- Popup Content -->
<div class="modal-body">
<p>Employee Details</p>
</div>
<!-- Popup Footer -->
<div class="modal-footer">

<!-- close button -->
<?php $this->widget('booster.widgets.TbButton', array(
    'label'=>'Close',
    'url'=>'#',
    'htmlOptions'=>array('data-dismiss'=>'modal'),
)); ?>
<!-- close button ends-->
</div>
<?php $this->endWidget(); ?>
<!-- View Popup ends -->

</div>
</div>
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

$this->titulo='<span class="glyphicon glyphicon-user"></span> Usuarios';

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

<div class="col-md-12">
<div class="box box-primary">
<div class="box-header">
<a class="btn btn-primary" href="create" role="button"><span class="glyphicon glyphicon-plus"></span> Nuevo Usuario</a>


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
       'value' => 'CHtml::link($data->username, Yii::app()->createUrl("admin/usuario/update",array("id"=>$data->primaryKey)))',
       'headerHtmlOptions'=>array('width'=>'150px'),
       'type'=>'raw'
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
        'email',

        array(
            'name'=>'roles',
            'filter'=>'',
            'header' => 'Rol',
            'type'=>'raw',
            //'value' => '($data->roles == "administrador") ? "Administrador" : "Supervisor"',
            'value' => function($data) {
              switch ($data->roles) {
                case 'administrador':
                    return 'Administrador';
                  break;
                case 'supervisor':
                    return 'Supervisor';
                  break;
                case 'supervisor-rrhh':
                    return 'Supervisor-RRHH';
                  break;
                case 'pistas':
                    return 'Pistas';
                  break;
                
                default:
                  return 'sin rol';  
                  break;
              }
            },
        ),
        array('name'=>'idSector', 
              'value'=>'isset($data->sector_rel)? $data->sector_rel->nombre:"--"',
              'header'=>'Sector',
              'filter'=> CHtml::listData(Sectores::model()->findAll(array('order'=>'nombre')),'idSector','nombre'),
              'type'  => 'raw',
           ),
       	    array(  
            'class' => 'booster.widgets.TbToggleColumn',
            'name' => 'estado',
            'header' => 'Estado',
            'filter'=>array('1'=>'Activado','0'=>'Desactivado'),
        ),
             array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'viewButtonUrl'=>'Yii::app()->createUrl("/admin/usuario/update?id=$data->id" )', // url de la acción 'update'
    )
  ))  

    );

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
</div>
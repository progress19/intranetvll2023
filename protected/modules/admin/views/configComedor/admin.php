<?php
/* @var $this ConfigComedorController */
/* @var $model ConfigComedor */

$this->breadcrumbs=array(
	'Config Comedors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ConfigComedor', 'url'=>array('index')),
	array('label'=>'Create ConfigComedor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#config-comedor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Config Comedors</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'config-comedor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idConfig',
		'desayuno_desde',
		'desayuno_hasta',
		'almuerzo_desde',
		'almuerzo_hasta',
		'cena_desde',
		/*
		'cena_hasta',
		'inicial_desayuno',
		'inicial_comidas',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

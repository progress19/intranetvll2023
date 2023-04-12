<?php
/* @var $this HorariosController */
/* @var $model Horarios */

$this->menu_horarios = 'active';
$this->menu_horarios_registros = 'active';
$this->titulo='<i class="glyphicon glyphicon-time"></i> Control Horario - Registros';

$this->breadcrumbs=array('Administrador',);	?>  

	<?php 
	// this is the date picker
	$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		// 'model'=>$model,
	    'name' => 'Horarios[desde]',
	    'language' => 'es',
		'value' => $model->desde,
	    // additional javascript options for the date picker plugin
	    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeMonth' => 'true',
			'changeYear'=>'true',
			'constrainInput' => 'false',
	    ),
	    'htmlOptions'=>array(
	    	'id' => 'datepicker_desde',
			'style'=>'height:30px;width:85px; display:inline;font-size:12px',
	    ),

	),true) . ' a  ' . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		//'model'=>$model,
	    'name' => 'Horarios[hasta]',
	    'language' => 'es',
		'value' => $model->hasta,
	    // additional javascript options for the date picker plugin
	    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeMonth' => 'true',
			'changeYear'=>'true',
			'constrainInput' => 'false',
	    ),
	    'htmlOptions'=>array(
	    	'id' => 'datepicker_hasta',
			'style'=>'height:30px; width:85px; display:inline;font-size:12px',
	    ),

	),true);

	?>

	<div class="col-md-12">  
		<div class="box box-primary">
			<div class="box-header">

<?php

$this->widget(
	'booster.widgets.TbExtendedGridView',
	array(
		'id'=>'config-grid',
		'filter'=>$model,
		'type' => 'striped',
		'dataProvider'=>$model->search(),
		'responsiveTable' => true,
		'template'=>'{summary}{items}{pager}',
		'enablePagination' => true,
		'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
		'ajaxUpdate'=>true,

'columns'=>array(

	array(
		'name'=>'idHorario',
		'value' => 'CHtml::link($data->idHorario, Yii::app()->createUrl("admin/horarios/update",array("id"=>$data->primaryKey)))',
		'header' => 'ID Registro',
		'headerHtmlOptions'=>array('width'=>'90px'),
		'type'=>'raw'
	),

	array(
		'name'=>'Fecha y Hora',
		'filter'=>$dateisOn,
		'value' => 'Yii::app()->dateFormatter->format("dd-MM-yyyy", $data->fecha)',
		'headerHtmlOptions'=>array('width'=>'200px'),
	), 

		'legajo',

	array(
		'name'=>'nombre_empleado', 
		'value'=>'isset($data->personal_rel) ? $data->personal_rel->nombre:"--"',
		'header'=>'Empleado',
		'headerHtmlOptions'=>array('width'=>'190px'),
	),

		'tarjetaId',
	
	array(
		'name'=>'idSector', 
		'value'=>'isset($data->sector_rel) ? $data->sector_rel->nombre:"--"',
		'header'=>'Sector',
		'filter'=> CHtml::listData(Sectores::model()->findAll(array('order'=>'nombre')),'idSector','nombre'),
		'type'  => 'raw',
		'headerHtmlOptions'=>array('width'=>'190px'),
	),

	array(
		'name'=>'em',
		'value'=>'($data->em>0) ? Yii::app()->dateFormatter->format("HH:mm", $data->em)."hs":"--"',
		'headerHtmlOptions'=>array('width'=>'200px'),
		'htmlOptions'=>array('style'=>'text-align:right'),
	), 

	array(
		'name'=>'sm',
		'value'=>'($data->sm>0) ? Yii::app()->dateFormatter->format("HH:mm", $data->sm)."hs":"--"',
		'headerHtmlOptions'=>array('width'=>'200px'),
		'htmlOptions'=>array('style'=>'text-align:right'),
	), 

	array(
		'name'=>'et',
		'value'=>'($data->et>0) ? Yii::app()->dateFormatter->format("HH:mm", $data->et)."hs":"--"',
		'headerHtmlOptions'=>array('width'=>'200px'),
		'htmlOptions'=>array('style'=>'text-align:right'),
	), 

	array(
		'name'=>'st',
		'value'=>'($data->st>0) ? Yii::app()->dateFormatter->format("HH:mm", $data->st)."hs":"--"',
		'headerHtmlOptions'=>array('width'=>'200px'),
		'htmlOptions'=>array('style'=>'text-align:right'),
	), 

	array(
		'htmlOptions' => array('nowrap'=>'nowrap'),
		'template' => '{delete}',
		'class'=>'booster.widgets.TbButtonColumn',
	)

),));

?>

	</div><!-- /.box-header -->
</div>

<?php 
// (#5)
Yii::app()->clientScript->registerScript('re-install-date-picker', "
	function reinstallDatePicker(id, data) {

		$('#datepicker_desde').datepicker(jQuery.extend(
			{
				showMonthAfterYear:false,
				changeMonth:true,
				changeYear:true,
				showButtonPanel:true,
			},
			jQuery.datepicker.regional['es'],{'dateFormat':'dd-mm-yy'}));


		$('#datepicker_hasta').datepicker(jQuery.extend(
			{
				showMonthAfterYear:false,
				changeMonth:true,
				changeYear:true,
				showButtonPanel:true,
			},
			jQuery.datepicker.regional['es'],{'dateFormat':'dd-mm-yy'}));
		}

		");

		?>


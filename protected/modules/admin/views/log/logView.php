<?php
/* @var $this TicketsController */
/* @var $model Tickets */

$this->menu_log = 'active';
$this->titulo='<i class="fa fa-file-o"></i> Log File';

$this->breadcrumbs=array('Administrador');	?>  

<?php 
// this is the date picker
$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					// 'model'=>$model,
				    'name' => 'Tickets[desde]',
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
					// 'model'=>$model,
				    'name' => 'Tickets[hasta]',
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
				Yii::app()->clientScript->registerScript('search', "
					$('.search-form form').submit(function(){
						
						//var hasta = $('#hasta').val(),
						$('#config-grid').yiiGridView('update', {
							//desde = '44455',
							data: $(this).serialize()
							//data:'Tickets[desde]='+$('#desde').val()+'&Tickets[hasta]',
						});
						return false;
					});
					");
				?>

					<div class="search-form">
						<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
					</div><!-- search-form -->

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
		'name'=>'id',
		'value' => '$data->id',
		'header' => 'ID Log',
		'headerHtmlOptions'=>array('width'=>'90px'),
	),

	array(
		'name'=>'Fecha y Hora',
		'filter'=>$dateisOn,
		'value' => 'Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm", $data->fecha)',
		'headerHtmlOptions'=>array('width'=>'200px'),
	), 

  array('name'=>'idUsuario', 
		'value'=>'isset($data->usuario) ? $data->usuario->username:"--"',
		'header'=>'Usuario',
		'filter'=> CHtml::listData( Usuario::model()->findAll( array('order'=>'username') ),'id','username' ),
		'type'  => 'raw',
	), 

	array('name'=>'idTipo', 
		'value'=>'isset($data->tipo) ? $data->tipo->nombre:"--"',
		'header'=>'Tipo',
		'filter'=> CHtml::listData( LogTipos::model()->findAll( array('order'=>'nombre') ),'id','nombre'),
		'type'  => 'raw',
	),

  /*
	array(
		'name'=>'nombre_empleado', 
		'value'=>'isset($data->personal_rel) ? $data->personal_rel->nombre:"--"',
		'header'=>'Empleado',
		'headerHtmlOptions'=>array('width'=>'190px'),
	),

	'legajo',

	array('name'=>'idSector', 
		'value'=>'isset($data->sector_rel) ? $data->sector_rel->nombre:"--"',
		'header'=>'Sector',
		'filter'=> CHtml::listData(Sectores::model()->findAll(array('order'=>'nombre')),'idSector','nombre'),
		'type'  => 'raw',
		'headerHtmlOptions'=>array('width'=>'190px'),
	),

	'tarjetaId',

	array(
		'name' => 'tipo',
     	'type' => 'raw',
		'value' => '$data->getTipoTicket($data->tipo)',
		'filter'=>array(''=>'Todos','1'=>'Desayuno','2'=>'Almuerzo','3'=>'Cena'),
		'headerHtmlOptions'=>array('width'=>'120px'),
    ),

	array(
		'htmlOptions' => array('nowrap'=>'nowrap'),
		'template' => '{delete}',
		'class'=>'booster.widgets.TbButtonColumn',
	)
*/
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


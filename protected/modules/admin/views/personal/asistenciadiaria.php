<?php
    /* @var $this PersonalController */
    /* @var $model Personal */
    
      $this->menu_asistencias = 'active';
      $this->menu_asistencias_diaria = 'active';
      
      $this->titulo='<i class="fa fa-fw fa-calendar"></i> Asistencias Diaria de Personal';
    
    if (isset($_REQUEST['idSector'])) {
    /* personal desde sector */
      $idSector = $_REQUEST['idSector'];
      $model = new Personal();
      $model->idSector = $_REQUEST['idSector']; 
         if (isset($_GET['Personal'])) {$model->attributes = $_GET['Personal'];} 
     } 
     else {$idSector=0;}
?>

<?php $this->breadcrumbs=array('Administrador',); ?>  

<div class="col-md-12">
<div class="box box-primary">
    <div class="box-header">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <div class="form-group">
                        <label style="padding-top: 8px;" for="inputType" class="col-md-6 control-label"><span class="text15">Control de Asistencias para el día : </span></label>
                        <div class="col-md-4">
                                <?php 

                                    if (Yii::app()->user->roles!='administrador') { $minDate = '0 days'; } else { $minDate = null; }
                                    
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'language'=>'es',
                                        'name'=>'fecha_de_asistencia',
                                        'flat'=>false,
                                        'options'=>array(
                                            'firstDay'=>1,
                                            'constraininput'=>true,
                                            'currentText'=>'Now',
                                            'dateFormat'=>'dd-mm-yy',
                                            'buttonImageOnly'=> true,
                                            'changeMonth'=>true,
                                            'changeYear'=>true,
                                            'readonly' => true,
                                            'minDate'=> $minDate,
                                        ),
                                        'htmlOptions'=>array(
                                            'class'=>'form-control',
                                            'style'=>'width:20px;font-size:19px',
                                        ),
                                    ));
                                ?>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <?php
            $this->widget(
            'booster.widgets.TbExtendedGridView',
            array(
            // 40px is the height of the main navigation at bootstrap
            'filter'=>$model,
            'type' => 'striped',
            'dataProvider'=>$model->search_activos(),
            'responsiveTable' => true,
            'template'=>'{summary}{items}{pager}',
            'enablePagination' => true,
            'rowCssClassExpression'=>'$data->francos < 0 ? "francodebe" : "a"',
            'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
            
            'columns'=>array(
            
            array('name'=>'idSector', 
                  'value'=>'isset($data->sector_rel)? $data->sector_rel->nombre:"--"',
                  'header'=>'Sector',
                  /*'filter'=> CHtml::listData(Sectores::model()->findAll(
                    array('order'=>'nombre')
                  ),'idSector','nombre'),
                  */
                 'filter' => CHtml::listData(Sectores::model()->findAllByAttributes(
                      array('tipo'=>1)
                    ),'idSector','nombre'), 
                  'type'  => 'raw',
                  'htmlOptions'=>array('style'=>'font-size:13px'),
               ), 
            
            array(
               'name'=>'legajo',
               'value' => '$data->legajo',
               'headerHtmlOptions'=>array('width'=>'80px'),
               'type'=>'raw'
            ),
            
            array(
              'type' => 'raw',
              'value' => '$data->getFoto($data->foto)',
            ),
            
              array(
               'name'=>'nombre',
               'value' => '$data->nombre',
               'headerHtmlOptions'=>array('width'=>'200px'),
               'type'=>'raw'
            ),
            
            array(
              'type' => 'raw',
              'value' => '$data->getMenuEstados($data->legajo,$data->idPersonal)',
            ),
            
            array(
                'class'=>'DataColumn',
                'name'=>'idEstado',
                'value'=>'isset($data->estado_rel)? $data->estado_rel->nombre:"--"',
                'evaluateHtmlOptions'=>true,
                'htmlOptions'=>array('id'=>'"u_estado_{$data->legajo}"'),
                'filter'=> CHtml::listData(Estados::model()->findAll(array('order'=>'nombre')),'idEstado','nombre'),
                'filterHtmlOptions'=>array('class'=>'max'),
            ),
            
            array(
                'class'=>'DataColumn',
                'name'=>'fecha',
                'value' => 'Yii::app()->dateFormatter->format("dd-MM-yyyy", $data->fecha)',
                'evaluateHtmlOptions'=>true,
                'htmlOptions'=>array('id'=>'"u_fecha_{$data->legajo}"'),
                'cssClassExpression' => '$data["fecha"] < date("Y-m-d") ? "fuente-roja" : "fuente-negra"',
            
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model, 
                        'attribute'=>'fecha', 
                        'language' => 'es',
                        'htmlOptions' => array(
                            'id' => 'datepicker_for_due_date',
                            'size' => '10',
                        ),
                        
                        'options' => array(  // (#3)
                            'showOn' => 'focus', 
                            'dateFormat' => 'yy-mm-dd',
                            'showOtherMonths' => true,
                            'selectOtherMonths' => true,
                            'changeMonth' => true,
                            'changeYear' => true,
                            'showButtonPanel' => true,
                        )
                    ), 
                    true), // (#4)
            ),
            
            array(
                'class'=>'DataColumn',
                'name'=>'francos',
                'evaluateHtmlOptions'=>true,
                'htmlOptions'=>array('id'=>'"u_francos_{$data->legajo}"'),
                'cssClassExpression' => '$data["francos"] < 0 ? "fuente-roja" : "fuente-negra"',
            ),
            
            
             array(
              'type' => 'raw',
              'value' => '$data->getMenuAnos($data->legajo)',
            ),
            
            array(
              'type' => 'raw',
              'value' => '$data->getBotonFranco($data->idPersonal)',
            ),
            
            ),));
            
            ?>
    </div>
    <!-- /.box-header -->
</div>
<script>
    document.getElementById("fecha_de_asistencia").value = "<?php echo date('d-m-Y') ?>";
</script>
<?php 
    // (#5)
    Yii::app()->clientScript->registerScript('re-install-date-picker', "
    function reinstallDatePicker(id, data) {
            //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
        $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy-mm-dd'}));
    }
    ");
?>

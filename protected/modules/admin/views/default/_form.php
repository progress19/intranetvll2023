<?php //$this->layout='../layouts/dashboard_admin'; ?>
<?php

$this->menu_personal = 'active';

$empleado = Personal::model()->findByPk($_REQUEST['id']);  

$this->breadcrumbs=array(
  'Administrador',);

?>  

<?php /** @var TbActiveForm $form */
  $form = $this->beginWidget(
  'booster.widgets.TbActiveForm',
  array(
  'id' => 'horizontalForm',
  'type' => 'horizontal',
  'htmlOptions' => array(
          'target' => '_new',
          'enctype' => 'multipart/form-data',
      ),
  )
  );
?>

<div class="col-md-9">
    <?php echo $form->errorSummary($model); ?>
</div>

<div class="col-md-12">  
<div class="box box-primary">
<div class="box-body">

<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-body">
              
          <?php 
          if ($empleado->foto) {
            echo CHtml::image(Yii::app()->request->baseUrl.'/pics/personal/'.$empleado->foto,
            "sin imagen",array('class'=>'img-responsive img-thumbnail'));
              } else {
            echo CHtml::image(Yii::app()->request->baseUrl.'/images/default-user.png',
            "sin imagen",array('class'=>'img-responsive img-thumbnail'));
              }
           ?>  
            
    </div>
  </div>
</div>

<div class="col-md-9">

<?php 
echo '<p><strong>Apellido y Nombre : </strong>'.$empleado->nombre.'</br></p>';
echo '<p><strong>Sector : </strong>'.$empleado->sector_rel->nombre.'</br></p>';
?>
    
    <hr>

    <div class="col-md-3">
      <div class="form-group">
      <?php echo $form->labelEx($model,'tipo'); ?>
      <?php echo $form->dropDownList($model,'tipo',array (
        'Franco Simple' => 'Franco Simple',
        'Franco Interno' => 'Franco Interno',
        'Franco Empresa' => 'Franco Empresa',
        'Franco Compensatorio' => 'Franco Compensatorio',
        'Permiso Pago' => 'Permiso Pago',
        'Permiso no pago' => 'Permiso no pago',
        'Comisión' => 'Comisión',
        'Licencia' => 'Licencia',       
        ), array ('class' => 'form-control')); ?>
      </div>
    </div>

<div class="col-md-3">
      <div class="form-group">
      <?php echo $form->labelEx($model,'dias'); ?>
      <?php echo $form->dropDownList($model,'dias',array (
        '' => 'Seleccione...',
        '1/2' => '1/2',
        '1' => '1','1.5' => '1.5',
        '2' => '2','2.5' => '2.5',
        '3' => '3','3.5' => '3.5',
        '4' => '4','4.5' => '4.5',
        '5' => '5','5.5' => '5.5',
        '6' => '6','6.5' => '6.5',
        '7' => '7','7.5' => '7.5',
        '8' => '8','8.5' => '8.5',
        '9' => '9','9.5' => '9.5',
        '10' => '10','10.5' => '10.5',
        '11' => '11','11.5' => '11.5',
        '12' => '12','12.5' => '12.5',
        '13' => '13','13.5' => '13.5',
        '14' => '14','14.5' => '14.5',
        '15' => '15','15.5' => '15.5',
        '16' => '16','16.5' => '16.5',
        '17' => '17','17.5' => '17.5',
        '18' => '18','18.5' => '18.5',
        '19' => '19','19.5' => '19.5',
        '20' => '20',
        ), array ('class' => 'form-control')); ?>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-3">
    <div class="form-group">
    <?php echo $form->labelEx($model,'desde'); ?>  

     <?php
      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'model'=>$model,
           'attribute'=>'desde',
           'flat'=>false,
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd/mm/yy',
            'buttonImageOnly'=> true,
           ),
           'htmlOptions'=>array(
            'class'=>'form-control'
           ),
          ));
     ?>
    </div>
    </div>

    <div class="col-md-3">
    <div class="form-group">
    <?php echo $form->labelEx($model,'hasta'); ?>  

     <?php
      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'model'=>$model,
           'attribute'=>'hasta',
           'flat'=>false,
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd/mm/yy',
            'buttonImageOnly'=> true,
           ),
           'htmlOptions'=>array(
            'class'=>'form-control'
           ),
          ));
     ?>
    </div>
    </div>

    <div class="col-md-3">
    <div class="form-group">
    <?php echo $form->labelEx($model,'regreso'); ?>  

     <?php
      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
           'language'=>'es',
           'model'=>$model,
           'attribute'=>'regreso',
           'flat'=>false,
           'options'=>array(
            'firstDay'=>1,
            'constrainInput'=>true,
            'currentText'=>'Now',
            'dateFormat'=>'dd/mm/yy',
            'buttonImageOnly'=> true,
           ),
           'htmlOptions'=>array(
            'class'=>'form-control'
           ),
          ));
     ?>
    </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12">
      <div class="form-group">
          <?php echo $form->labelEx($model,'obs'); ?>
          <?php echo $form->textField($model,'obs',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
          <?php echo $form->error($model,'obs'); ?>
        </div>
      </div> 

</div>

<input value="<?php echo $empleado->legajo; ?>" name="FrancoForm[legajo]" id="FrancoForm_legajo" type="hidden">
<input value="<?php echo $empleado->nombre; ?>" name="FrancoForm[nombre]" id="FrancoForm_nombre" type="hidden">
<input value="<?php echo $empleado->sector_rel->nombre; ?>" name="FrancoForm[sector]" id="FrancoForm_sector" type="hidden">
<input value="<?php echo $empleado->francos; ?>" name="FrancoForm[francos]" id="FrancoForm_francos" type="hidden">

<div class="clearfix"></div>


</div><!-- /.box-header -->

   <div class="box-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-print"></i> Imprimir</button>
   </div>
   <div class="clearfix"></div>
   </div>

</div>
</div>


<?php $this->endWidget(); ?>




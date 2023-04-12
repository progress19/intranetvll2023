<script type="text/javascript" src="https://dl.dropboxusercontent.com/u/40036711/Scripts/jquery.ddslick.min.js"></script>
<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>


<div class="col-md-9">
<div class="box box-primary">
<div class="box-body">

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'horizontalForm',
'type' => 'horizontal',
)
); ?>

	<?php echo $form->errorSummary($model); ?>
    
 	<div class="col-md-4">
    <div class="form-group">
		<?php echo $form->labelEx($model,'Apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>	
		<?php echo $form->error($model,'apellido'); ?>
    </div>

    <div class="col-md-4">
	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>	
		<?php echo $form->error($model,'nombre'); ?>
    </div>
   
    <div class="col-md-4">
        <div class="form-group">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
    </div>  
        <?php echo $form->error($model,'email'); ?>
    </div>
    <div class="clearfix"></div>

	<div class="col-md-4">
    <div class="form-group">
		<?php echo $form->labelEx($model,'Usuario'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>	
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="col-md-6">
    <div class="form-group">
		<?php echo $form->labelEx($model,'contraseña'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>
		<?php echo $form->error($model,'password'); ?>
    </div>
    <div class="clearfix"></div>


    <div class="clearfix"></div>

    <div class="col-md-4">
        <div class="form-group">
            <?php echo $form->labelEx($model,'Roles'); ?>
            <?php echo $form->dropDownList($model,'roles',
                array(
                    'administrador'=>'Administrador',
                    'supervisor'=>'Supervisor',
                    'supervisor-rrhh'=>'Supervisor-RRHH',
                    'pistas'=>'Pistas',
                    ),
                     array ('class' => 'form-control')); ?>
        </div>
            <?php echo $form->error($model,'roles'); ?>
    </div>

    <div class="col-md-4">
    <div class="form-group">
      <?php echo $form->labelEx($model,'Sector'); ?>
      <?php echo $form->dropDownList($model,'idSector', CHtml::listData(Sectores::model()->findAll(array('order' => 'nombre ASC')), 'idSector', 'nombre'), array('empty'=>'Seleccione un Sector','class' => 'form-control'))?>
    </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-3">
        <div class="form-group">
            <?php echo $form->labelEx($model,'avatar'); ?>
            <select name="Usuario[avatar]" class="form-control" id="avatar" value="<?php echo $model->avatar; ?>">
              <option class='avatar1' value="1" <?php if (!(strcmp("1", $model->avatar))) {echo "selected=\"selected\"";} ?>>Avatar 1</option>
              <option class='avatar2' value="2" <?php if (!(strcmp("2", $model->avatar))) {echo "selected=\"selected\"";} ?>>Avatar 2</option>
              <option class='avatar3' value="3" <?php if (!(strcmp("3", $model->avatar))) {echo "selected=\"selected\"";} ?>>Avatar 3</option>
              <option class='avatar4' value="4" <?php if (!(strcmp("4", $model->avatar))) {echo "selected=\"selected\"";} ?>>Avatar 4</option>
              <option class='avatar5' value="5" <?php if (!(strcmp("5", $model->avatar))) {echo "selected=\"selected\"";} ?>>Avatar 5</option>
            </select>
    </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <?php echo $form->labelEx($model,'Estado '); ?>
            <?php echo $form->dropDownList($model,'estado',array (1=>'Activado','0'=>'Desactivado'), array ('class' => 'form-control')); ?>
        </div>
            <?php echo $form->error($model,'estado'); ?>
    </div>

<div class="clearfix"></div>          
</div><!-- /.box -->
<div class="box-footer">
   <div class="col-md-12">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
    </div>
    <div class="clearfix"></div>
</div>
</div><!-- /.col-lg-6 -->
</div><!-- /.row -->






<?php $this->endWidget(); ?>

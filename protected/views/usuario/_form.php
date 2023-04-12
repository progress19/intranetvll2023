<script type="text/javascript" src="https://dl.dropboxusercontent.com/u/40036711/Scripts/jquery.ddslick.min.js"></script>
<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-md-5">
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
    
 	<div class="form-group">
		<?php echo $form->labelEx($model,'Apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>	
		<?php echo $form->error($model,'apellido'); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>	
		<?php echo $form->error($model,'nombre'); ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'Usuario'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>	
		<?php echo $form->error($model,'username'); ?>
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'contraseña'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
	</div>
		<?php echo $form->error($model,'password'); ?>


    <div class="form-group">
        <?php echo $form->labelEx($model,'Estado '); ?>
        <?php echo $form->dropDownList($model,'estado',array (1=>'Activado','0'=>'Desactivado'), array ('class' => 'form-control')); ?>
    </div>
        <?php echo $form->error($model,'estado'); ?>



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

 <!--  <div id="myDropdown"></div> -->

              
</div><!-- /.box -->
<div class="box-footer">
   <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
</div>
</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</div><!-- form -->

<script type="text/javascript">
	
//Dropdown plugin data
var ddData = [
    {
        text: "Facebook",
        value: 1,
        selected: false,
        description: "Description with Facebook",
        imageSrc: "http://localhost/navegaadmin/img/avatar2.jpg"
    },
    {
        text: "Twitter",
        value: 2,
        selected: false,
        description: "Description with Twitter",
        imageSrc: "http://dl.dropbox.com/u/40036711/Images/twitter-icon-32.png"
    },
    {
        value: 3,
        description: "Avatar 1",
        selected: true,
        imageSrc: "http://localhost/navegaadmin/img/avatar1.jpg"
    },
    {
        text: "Foursquare",
        value: 4,
        selected: false,
        description: "Description with Foursquare",
        imageSrc: "http://dl.dropbox.com/u/40036711/Images/foursquare-icon-32.png"
    }
];

$('#myDropdown').ddslick({
    data:ddData,
    width:400,
    selectText: "Select your preferred social network",
    imagePosition:"left",
    onSelected: function(selectedData){
        //callback function: do something with selectedData;
    }   
});

</script>



<?php $this->endWidget(); ?>

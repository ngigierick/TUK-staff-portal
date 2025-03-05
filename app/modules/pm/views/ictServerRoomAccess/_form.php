

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'ict-server-room-access-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->datePickerRow($model, 'date_accessed', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->timePickerRow($model, 'time_in', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->timePickerRow($model, 'time_out', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textAreaRow($model, 'reason', array('maxlength' => 300)); ?>
		
		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>

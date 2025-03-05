

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'project-module-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 50)); ?>
		
		
		<?php echo $form->textAreaRow($model, 'content'); ?>
		
		
		<?php echo $form->datePickerRow($model, 'start_date', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->datePickerRow($model, 'end_date', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'completion_stage'); ?>
		
				
		<?php echo $form->dropDownListRow($model, 'status_id', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true))); ?>
		

		
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

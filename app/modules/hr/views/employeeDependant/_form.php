

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-dependant-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->dropDownListRow($model, 'relationship_id', GxHtml::listDataEx(Relationship::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true))); ?>
		
				
		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->datePickerRow($model, 'dob', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'status', GxHtml::listDataEx(Status::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		

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

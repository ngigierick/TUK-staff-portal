

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-nok-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
	
		<?php echo $form->dropDownListRow($model, 'level_id', GxHtml::listDataEx(EmployeeNokLevel::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		 
		<?php echo $form->dropDownListRow($model, 'relationship_id', GxHtml::listDataEx(Relationship::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->checkBoxRow($model, 'status'); ?>
		
		
		

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

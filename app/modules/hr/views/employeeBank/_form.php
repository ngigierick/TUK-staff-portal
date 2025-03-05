

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-bank-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
	<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
	
	
	<?php echo $form->dropDownListRow($model, 'bank_id', GxHtml::listDataEx(BankAccount::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
	
	
	<?php echo $form->textFieldRow($model, 'account_number', array('maxlength' => 50)); ?>
	
	
	<?php echo $form->textFieldRow($model, 'branch', array('maxlength' => 50)); ?>
	
	
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

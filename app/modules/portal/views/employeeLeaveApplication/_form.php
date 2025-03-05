

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-leave-application-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->dropDownList($model, 'leave_id', GxHtml::listDataEx(EmployeeLeave::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownList($model, 'staff_id', GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textField($model, 'start_date', array('maxlength' => 50)); ?>
		
		
		<?php echo $form->textField($model, 'end_date', array('maxlength' => 50)); ?>
		
		
		<?php echo $form->textField($model, 'total_days'); ?>
		
		
		<?php echo $form->textField($model, 'taken_days'); ?>
		
		
		<?php echo $form->textField($model, 'rem_days'); ?>
		
		
		<?php echo $form->textField($model, 'status'); ?>
		
		
		<?php echo $form->checkBox($model, 'is_latest'); ?>
		
		
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 50)); ?>
		

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

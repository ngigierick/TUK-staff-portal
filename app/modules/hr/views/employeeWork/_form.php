

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'employee-work-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textFieldRow($model, 'position', array('maxlength' => 100)); ?>
		
		
		<?php $model->pf_number = $staff->pf_number; echo $form->hiddenField($model, 'pf_number'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'institution', array('maxlength' => 200)); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'country_id', GxHtml::listDataEx(EmployeeCountry::model()->findAllAttributes(null, true)),array('prompt'=>'-Select one-')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'starting_date', array('maxlength' => 100)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'ending_date', array('maxlength' => 100)); ?>
		
	
		

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'icon'=>'ok',
		'size'=>'small',
		'type'=>'success',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		
		'type'=>'warning',
		'size'=>'small',
		'icon'=>'remove',
		'url' => array('//portal/profile/view'),
		'label'=>'Cancel',
	)); ?>
	</div>
<?php	
$this->endWidget();
?>


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => true,
));
?>
<fieldset>
<legend></legend>
<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 20)); ?>

	
		<?php echo $form->textFieldRow($model, 'notes', array('maxlength' => 200)); ?>

		<?php echo $form->dropDownListRow($model, 'paid', GxHtml::listDataEx(FeeCategory::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
	



<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
</fieldset>
<?php	
$this->endWidget();
?>
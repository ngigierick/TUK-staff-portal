<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
));
?>
<fieldset>
<legend>Advanced Search</legend>

		<?php echo $form->textFieldRow($model, 'id'); ?>
	
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 255)); ?>
	
		<?php echo $form->dropDownListRow($model, 'department_id', GxHtml::listDataEx(Department::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	
		<?php echo $form->textFieldRow($model, 'code', array('maxlength' => 10)); ?>
	
		<?php echo $form->dropDownListRow($model, 'type_id', GxHtml::listDataEx(ProgrammeType::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	
		<?php echo $form->dropDownListRow($model, 'duration_id', GxHtml::listDataEx(ProgrammeDuration::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	
		<?php echo $form->textFieldRow($model, 'notes', array('maxlength' => 500)); ?>
	
		<?php echo $form->textFieldRow($model, 'requirements', array('maxlength' => 255)); ?>
	
		<?php echo $form->textFieldRow($model, 'date_modified', array('maxlength' => 30)); ?>
	
		<?php echo $form->textFieldRow($model, 'status_id'); ?>
</fieldset>		
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
<?php	
$this->endWidget();
?>

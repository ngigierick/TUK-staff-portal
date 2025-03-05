

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'salary-scale-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<?php $step = 
		array(0=>'Select one',
		1=>'1st',
		2=>'2nd',
		3=>'3rd',
		4=>'4th',
		5=>'5th',
		6=>'6th',
		7=>'7th',
		8=>'8th',
		9=>'9th',
		10=>'10th',
		11=>'11th',
		12=>'12th',
		13=>'13th',
		14=>'14th',
		15=>'15th'
		
		
		); ?>
		
		<?php echo $form->dropDownListRow($model, 'step',$step); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'grade_id', GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'category_id', GxHtml::listDataEx(EmployeeCategory::model()->findAllAttributes(null, true)),array('empty' => 'Select one')); ?>
		
		
		<?php echo $form->textFieldRow($model, 'basic_salary'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'house_allowance'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'status'); ?>
		
	

		
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

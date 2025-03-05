

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'admission-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->dropDownList($model, 'semester_id', GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownList($model, 'reg_number', GxHtml::listDataEx(Student::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textField($model, 'year_of_study'); ?>
		
		
		<?php echo $form->textField($model, 'semester_of_study'); ?>
		
		
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		

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



<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'score-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->dropDownListRow($model, 'semester_id', GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'student_reg', GxHtml::listDataEx(Student::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'course_unit_id', GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownListRow($model, 'exam_type_id', GxHtml::listDataEx(ExamType::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textFieldRow($model, 'year_of_study'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'semester_of_study'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'marks_obtained'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'marks_total'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'grade', array('maxlength' => 3)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'status'); ?>
		
		
		<?php echo $form->textFieldRow($model, 'remarks', array('maxlength' => 50)); ?>
		
		

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

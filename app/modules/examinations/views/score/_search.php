
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'semester_id', GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'student_reg', GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'course_unit_id', GxHtml::listDataEx(CourseUnit::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'exam_type_id', GxHtml::listDataEx(ExamType::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'year_of_study'); ?>

	
	<?php echo $form->textField($model, 'semester_of_study'); ?>

	
	<?php echo $form->textField($model, 'marks_obtained'); ?>

	
	<?php echo $form->textField($model, 'marks_total'); ?>

	
	<?php echo $form->textField($model, 'grade', array('maxlength' => 3)); ?>

	
	<?php echo $form->textField($model, 'status'); ?>

	
	<?php echo $form->textField($model, 'remarks', array('maxlength' => 50)); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>



<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textFieldRow($model, 'id'); ?>

	
	<?php echo $form->dropDownListRow($model, 'semester_id', GxHtml::listDataEx(Semester::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownListRow($model, 'reg_number', GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textFieldRow($model, 'year_of_study'); ?>

	
	<?php echo $form->textFieldRow($model, 'semester_of_study'); ?>

	
	<?php echo $form->textFieldRow($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>


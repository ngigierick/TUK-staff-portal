
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'pf_number', GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'position_id', GxHtml::listDataEx(Position::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'grade_id', GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'd_start', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'd_end', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'increment_date', array('maxlength' => 30)); ?>

	
	<?php echo $form->dropDownList($model, 'salary_scale_id', GxHtml::listDataEx(SalaryScale::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'category_id'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>


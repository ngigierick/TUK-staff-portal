
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->textField($model, 'step', array('maxlength' => 15)); ?>

	
	<?php echo $form->dropDownList($model, 'grade_id', GxHtml::listDataEx(Grade::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'category_id', GxHtml::listDataEx(EmployeeCategory::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'basic_salary'); ?>

	
	<?php echo $form->textField($model, 'house_allowance'); ?>

	
	<?php echo $form->textField($model, 'status'); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>


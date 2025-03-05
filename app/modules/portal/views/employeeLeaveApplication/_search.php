
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'leave_id', GxHtml::listDataEx(EmployeeLeave::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->dropDownList($model, 'staff_id', GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'start_date', array('maxlength' => 50)); ?>

	
	<?php echo $form->textField($model, 'end_date', array('maxlength' => 50)); ?>

	
	<?php echo $form->textField($model, 'total_days'); ?>

	
	<?php echo $form->textField($model, 'taken_days'); ?>

	
	<?php echo $form->textField($model, 'rem_days'); ?>

	
	<?php echo $form->textField($model, 'status'); ?>

	
	<?php echo $form->dropDownList($model, 'is_latest', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>


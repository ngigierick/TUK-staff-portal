
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'type'=>'horizontal',
)); ?>

	
	<?php echo $form->textField($model, 'id'); ?>

	
	<?php echo $form->dropDownList($model, 'reg_number', GxHtml::listDataEx(Student::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>

	
	<?php echo $form->textField($model, 'date_created', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'fee_balance', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'guardian_status'); ?>

	
	<?php echo $form->textField($model, 'f_name', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'f_id', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'f_occupation', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'm_name', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'm_id', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'm_occupation', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'g_name', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'g_id', array('maxlength' => 30)); ?>

	
	<?php echo $form->textField($model, 'g_occupation', array('maxlength' => 100)); ?>

	
	<?php echo $form->textField($model, 'fee_payment_plan', array('maxlength' => 200)); ?>

	
	<?php echo $form->textField($model, 'fee_payment', array('maxlength' => 200)); ?>

	
	<?php echo $form->textField($model, 'bursary_beneficiary'); ?>

	
	<?php echo $form->textField($model, 'beneficiary_amount', array('maxlength' => 30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>	</div>

<?php $this->endWidget(); ?>


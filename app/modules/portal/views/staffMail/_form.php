

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'staff-mail-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->dropDownList($model, 'staff_id', GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textField($model, 'subject', array('maxlength' => 1000)); ?>
		
		
		<?php echo $form->textArea($model, 'body'); ?>
		
		
		<?php echo $form->textField($model, 'status_id'); ?>
		
		
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textField($model, 'reply_date', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textField($model, 'date_created', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textField($model, 'parent_id'); ?>
		
		
		<?php echo $form->dropDownList($model, 'sender_id', GxHtml::listDataEx(Employee::model()->findAllAttributes(null, true))); ?>
		
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



<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'course-unit-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 50)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'code', array('maxlength' => 20)); ?>
		
		
		<?php echo $form->textAreaRow($model, 'description', array('maxlength' => 100)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'department_id'); ?>
		
		
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



<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'grade-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textField($model, 'name', array('maxlength' => 20)); ?>
		

		<label><?php echo GxHtml::encode($model->getRelationLabel('staffs')); ?></label>
		<?php echo $form->checkBoxList($model, 'staffs', GxHtml::encodeEx(GxHtml::listDataEx(Staff::model()->findAllAttributes(null, true)), false, true)); ?>
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

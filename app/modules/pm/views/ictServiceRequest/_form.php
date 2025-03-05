

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'ict-service-request-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->dropDownList($model, 'user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownList($model, 'type_id', GxHtml::listDataEx(IctEquipment::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->dropDownList($model, 'office_id', GxHtml::listDataEx(Office::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textField($model, 'description', array('maxlength' => 300)); ?>
		
		
		<?php echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textField($model, 'status'); ?>
		

		<label><?php echo GxHtml::encode($model->getRelationLabel('ictServiceRequestActions')); ?></label>
		<?php echo $form->checkBoxList($model, 'ictServiceRequestActions', GxHtml::encodeEx(GxHtml::listDataEx(IctServiceRequestAction::model()->findAllAttributes(null, true)), false, true)); ?>
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

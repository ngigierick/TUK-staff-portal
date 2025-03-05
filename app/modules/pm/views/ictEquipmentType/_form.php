

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'ict-equipment-type-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 100)); ?>
		
		
		<?php //echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		

		<label><?php echo GxHtml::encode($model->getRelationLabel('ictEquipments')); ?></label>
		<?php echo $form->checkBoxList($model, 'ictEquipments', GxHtml::encodeEx(GxHtml::listDataEx(IctEquipment::model()->findAllAttributes(null, true)), false, true)); ?>
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

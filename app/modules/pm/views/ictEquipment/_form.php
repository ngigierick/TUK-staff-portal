

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'ict-equipment-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<?php echo $form->dropDownListRow($model, 'type_id', GxHtml::listDataEx(IctEquipmentType::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->textFieldRow($model, 'common_name', array('append'=>'<span>Name commonly associated with the server or equipment</span>','maxlength' => 100)); ?>
		
		
		<?php echo $form->textAreaRow($model, 'description', array('maxlength' => 300)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'mac_address', array('maxlength' => 50)); ?>
		
		
		<?php //echo $form->textField($model, 'date_modified', array('maxlength' => 30)); ?>
		

		
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

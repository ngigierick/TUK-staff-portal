

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'dependant-form',
	'type'=> 'horizontal',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<fieldset>
	<legend>Add a New Dependant</legend>
	
		<div class="notes">Search for the Staff by entering the PF Number in the field below.</div>
		<div class="control-group">
		<div class="control-label">
		Staff PF Number
		</div>
		<div class="controls">
		<?php
					//autocomplete
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model'=>$model,
				'attribute'=>'staff_id',
				//'id'=>'prog_code',
				'source'=>$this->createUrl('//hr/staff/searchByPF'),
				'options'=>array(
					'delay'=>300,
					'minLength'=>2,
					'showAnim'=>'fold',
					'select'=>"js:function(event, ui) {
						$('#staff_id').val(ui.item.id);
						$('#dependant_form').html('loading dependants for '+ui.item.value+'...');
						
					}"
				),
				'htmlOptions'=>array(
					'size'=>'40'
				),
			));
		?>
		<?php echo $form->hiddenField($model, 'staff_id', array('maxlength' => 30,'id'=>'staff_id')); ?>

		</div>
		
		</div>
		
		
		<?php echo $form->dropDownListRow($model, 'relationship_id', GxHtml::listDataEx(Relationship::model()->findAllAttributes(null, true))); ?>
		
		<div class="notes">Enter the details for the Dependant below.</div>
		
		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30)); ?>
		
		
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30)); ?>
		
		
		
		<?php echo $form->dropDownListRow($model, 'gender_id', GxHtml::listDataEx(Gender::model()->findAllAttributes(null, true))); ?>
		
		
		<?php echo $form->datePickerRow($model, 'dob'); ?>
		
	
		
	<fieldset>
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

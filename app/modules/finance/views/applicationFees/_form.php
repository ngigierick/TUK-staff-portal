
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
));
?>
<?php echo $form->errorSummary($model); ?>

		<fieldset>
		<legend>Academic Details</legend>
		<?php
			$models = AcademicYear::model()->findAll(array('order' => 'id DESC'));
			$ac = CHtml::listData($models, 'id', 'name');
		?>
		<?php echo $form->dropDownListRow($model, 'academicyear_id', GxHtml::listDataEx($models),array('prompt'=>'Select one')); ?>
		<div class="control-group">
		<div class="control-label">
		Course Applied for:
		</div>
		<div class="controls">
		<?php
					//autocomplete
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model'=>$model,
				'attribute'=>'programme_code',
				'id'=>'prog_code',
				'source'=>$this->createUrl('/finance/applicationFees/autocomplete'),
				'options'=>array(
					'delay'=>300,
					'minLength'=>2,
					'showAnim'=>'fold',
					'select'=>"js:function(event, ui) {
						$('#programmecode').val(ui.item.id);
						//$('#code').val(ui.item.code);
					}"
				),
				'htmlOptions'=>array(
					'size'=>'40'
				),
			));
		?>
		<?php echo $form->hiddenField($model, 'programme_code', array('maxlength' => 30,'id'=>'programmecode')); ?>
		</div>
		</div>
		</fieldset>
		
		<fieldset>
		<legend>Applicant's Details</legend>
		
	
		<?php echo $form->dropDownListRow($model, 'title', GxHtml::listDataEx(Title::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		
	

		<?php echo $form->textFieldRow($model, 'surname', array('maxlength' => 30)); ?>
	
	
		<?php echo $form->textFieldRow($model, 'firstname', array('maxlength' => 30)); ?>

	
		<?php echo $form->textFieldRow($model, 'othername', array('maxlength' => 30)); ?>

		</fieldset>
		
		<fieldset>
		
		<legend>Payment Details</legend>
		
		<?php echo $form->dropDownListRow($model, 'bank_account_id', GxHtml::listDataEx(BankAccount::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>


		<?php echo $form->textFieldRow($model, 'bankslip', array('maxlength' => 30)); ?>


		<?php echo $form->textFieldRow($model, 'amount', array('maxlength' => 30)); ?>

		</fieldset>
		
		
		<?php echo $form->hiddenField($model, 'status', array('maxlength' => 30,'value'=>0)); ?>
	


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
<?php	
$this->endWidget();
?>

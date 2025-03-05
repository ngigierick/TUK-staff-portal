<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'role-form',
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
));
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
		
	<?php echo $form->errorSummary($model); ?>

<fieldset>
		
		
		<div class="notes">
	Feel free to contact us! We welcome any suggestions, errors detected, and any relevant information that may concern us. Report any queries, any complaints and we will respond immediately.
	</div>
	
		<?php echo $form->textFieldRow($model,'subject',array('size'=>30,'maxlength'=>30)); ?>
		
		<?php echo $form->textAreaRow($model,'body',array('rows'=>10, 'cols'=>60)); ?>
		
</fieldset>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Send Mail Now',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset Mail Details')); ?>
</div>
<?php	
$this->endWidget();
?>



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<fieldset>
<legend>Search Form</legend>

	<?php echo $form->textFieldRow($model,'subject',array('size'=>30,'maxlength'=>30)); ?>
	
	<?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'cols'=>50)); ?>
	
	
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
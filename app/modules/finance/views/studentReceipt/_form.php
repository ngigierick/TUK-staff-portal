<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'student-receipt-form',
    'type'=>'horizontal',
)); ?>


		<fieldset>
		<legend>Receive Payment from <?php echo $model->studentReg->title.' '.$model->studentReg->surname.' '.$model->studentReg->firstname.' '.$model->studentReg->othername;?></legend>
		<h2>Registration Number: <?php echo $model->studentReg->reg_number;?></h2>
		</fieldset>
		
		<fieldset>
		<legend>Payment Details</legend>
		<?php echo $form->hiddenField($model, 'student_reg'); ?>
		<?php echo $form->dropDownListRow($model, 'bank_account_id', GxHtml::listDataEx(BankAccount::model()->findAllAttributes(null, true)),array('prompt'=>'Select one')); ?>
		<?php echo $form->textFieldRow($model, 'bankslip', array('maxlength' => 30)); ?>
		<?php echo $form->textFieldRow($model, 'amount', array('maxlength' => 30)); ?>
		</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
<?php $this->endWidget(); ?>
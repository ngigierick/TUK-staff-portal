
<h1>PLEASE UPDATE YOUR DETAILS BELOW</h1>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id' => 'employee-qualification-form',
			'action'=>Yii::app()->createUrl('//portal/profile/contacts/'),
			'type'=> 'horizontal',
			'enableAjaxValidation' => false,
		));
		?>
<div class="well" style="float:left;">

		<?php $this->renderPartial("//site/common/notifications"); ?>
		
		<?php echo $form->textFieldRow($model, 'office_email', array('maxlength' => 300)); ?>
		<?php echo $form->textFieldRow($model, 'office_telephone', array('maxlength' => 300)); ?>
		<?php echo $form->textFieldRow($model, 'mobile', array('maxlength' => 300)); ?>
		<?php echo $form->textFieldRow($model, 'mobile2', array('maxlength' => 300)); ?>
			
		<?php echo $form->textFieldRow($model, 'email', array('maxlength' => 100)); ?>
		<?php echo $form->textFieldRow($model, 'email2', array('maxlength' => 100)); ?>
		<?php echo $form->textFieldRow($model, 'postal_address'); ?>
		<?php echo $form->textFieldRow($model, 'postal_code'); ?>
		<?php echo $form->textFieldRow($model, 'town'); ?>
		<div class="control-group ">
		<label class="control-label required" for="EmployeeContact_interest_area"><?php echo $form->labelEx($model,'interest_area'); ?></label>
		<div class="controls">
		<?php echo EmployeeContact::searchInterest($this, $model,'EmployeeContact[interest_area]'); ?>
		e.g. Human Resource, Mathematics, Civil Engineering, ICT, Communication, Business Management, Hospitality
		</div>
		</div>
		<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'success',
				'size'=>'large',
				//'icon'=>'ok',
				'label'=>'Save Details',
			)); ?>
		</div>
			<?php $this->endWidget(); ?>
	
</div>
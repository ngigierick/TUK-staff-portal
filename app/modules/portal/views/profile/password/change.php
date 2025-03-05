
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
));
?>
<fieldset>
<legend>Change Login Password</legend>
<div class="notes">
Changing password is a critical security concern. You are advised to change your password frequently to avoid hacking into your account. Note that if you forget your password, you can always reset a new password by simply answering your security question.
To change your password, you will be required to input your ID/Passport Number if you have never changed your password before, otherwise, your current password will be required.
</div>
<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>
<?php if(empty($model->password)):?>
<div class="control-group">
<div class="control-label">
ID/ Passport Number:
</div>
<div class="controls">
<?php echo CHtml::textField('id_number',''); ?>
</div>
</div>
<?php else:?>

<div class="control-group">
<div class="control-label">
Current Password:
</div>
<div class="controls">
<?php echo CHtml::passwordField('current',''); ?>
</div>
</div>
<?php endif;?>



<div class="control-group">
<div class="control-label">
New Password:
</div>
<div class="controls">
<?php echo CHtml::passwordField('new',''); ?>
</div>
</div>




<div class="control-group">
<div class="control-label">
Verify Password:
</div>
<div class="controls">
<?php echo CHtml::passwordField('confirm',''); ?>
</div>
</div>
</fieldset>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Change my Password',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset Form')); ?>
</div>
<?php	
$this->endWidget();
?>

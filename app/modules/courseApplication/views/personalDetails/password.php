<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=> 'horizontal',
	//'enableAjaxValidation' => true,
));
?>
<fieldset>
<legend>Change Login Password</legend>
<div class="notes">
Changing password is a critical security concern. You are advised to change your password frequently to avoid hacking of applicants' accounts. Note that if you forget your password, you can always request for a new password.
</div>

<div class="control-group">
<div class="control-label">
Current Password:
</div>
<div class="controls">
<?php echo CHtml::passwordField('current',''); ?>
</div>
</div>
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
		'icon'=>'lock',
		'size'=>'medium',
		'label'=>'ChangePassword',
	)); ?>
	
</div>
<?php	
$this->endWidget();
?>
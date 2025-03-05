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
<legend>Reset Password </legend>
<div class="notes">
Kindly reset a password that is too difficult to guess but you easily you can remember.
</div>




<div class="control-group">
<div class="control-label">
New Password:
</div>
<div class="controls">
<?php echo CHtml::passwordField('new','',array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'','autocomplete'=>"off")); ?>
</div>
</div>




<div class="control-group">
<div class="control-label">
Verify New Password:
</div>
<div class="controls">
<?php echo CHtml::passwordField('confirm','',array('prepend'=>'<i class="icon-lock"></i>','maxlength' => 255,'value'=>'','autocomplete'=>"off")); ?>
</div>
</div>
</fieldset>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'danger',
		'icon'=>'ok',
		'label'=>'Reset Password',
	)); ?>
	
</div>
<?php	
$this->endWidget();
?>